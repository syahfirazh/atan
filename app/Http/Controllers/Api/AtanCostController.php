<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtanCostController extends Controller
{
    // Pemetaan masih harus dicocokkan dengan wiring relay fisik.
    // pump_water belum diberi watt; energi kanal tersebut akan NULL.
    private const EQUIPMENT = [
        'pump_water' => ['watts' => null, 'fluid' => 'water'],
        'pump_1'     => ['watts' => 2.17, 'fluid' => 'fertilizer'],
        'pump_2'     => ['watts' => 2.17, 'fluid' => 'fertilizer'],
        'pump_3'     => ['watts' => 2.17, 'fluid' => 'water'],
        'pump_4'     => ['watts' => 2.17, 'fluid' => 'water'],
        'mixer'      => ['watts' => 2.00, 'fluid' => null],
    ];

    private function configNumber(string $name): ?float
    {
        $value = config('atan_cost.' . $name);
        return is_numeric($value) && (float) $value >= 0 ? (float) $value : null;
    }

    public function store(Request $request)
    {
        // Tanpa token sesuai permintaan: hanya untuk LAN tepercaya.
        $v = $request->validate([
            'event_id'    => 'required|string|max:100',
            'device_id'   => 'required|string|max:100',
            'equipment'   => 'required|in:pump_water,pump_1,pump_2,pump_3,pump_4,mixer',
            'duration_ms' => 'required|integer|min:1|max:86400000',
        ]);

        $equipment = self::EQUIPMENT[$v['equipment']];
        $seconds = $v['duration_ms'] / 1000.0;
        $watts = $equipment['watts'];
        $energyKwh = $watts === null ? null : $watts * $seconds / 3600000.0;
        $electricityRp = $energyKwh === null ? null : $energyKwh * 1350.0;

        // Volume/biaya cairan hanya tersedia setelah debit pompa dikalibrasi.
        $rateMlPerSecond = $this->configNumber('flow_ml_s.' . $v['equipment']);
        $volumeL = $rateMlPerSecond === null || $equipment['fluid'] === null
            ? null : $rateMlPerSecond * $seconds / 1000.0;
        $fluidPrice = $equipment['fluid'] === null
            ? null : $this->configNumber('price_rp_l.' . $equipment['fluid']);
        $fluidCost = $volumeL === null || $fluidPrice === null
            ? null : $volumeL * $fluidPrice;

        // event_id harus UNIQUE pada migration, agar retry tidak dihitung dua kali.
        $inserted = DB::table('atan_cost_events')->insertOrIgnore([
            'event_id' => $v['event_id'],
            'device_id' => $v['device_id'],
            'equipment' => $v['equipment'],
            'duration_ms' => $v['duration_ms'],
            'power_w' => $watts,
            'energy_kwh' => $energyKwh,
            'electricity_rp' => $electricityRp,
            'volume_l' => $volumeL,
            'fluid_type' => $equipment['fluid'],
            'fluid_rp' => $fluidCost,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json([
            'status' => 'success',
            'event_id' => $v['event_id'],
            'inserted' => $inserted === 1,
        ], 201);
    }

    public function summary()
    {
        $aggregate = function ($query) {
            return $query->selectRaw(
                'COUNT(*) AS events, '
                . 'COALESCE(SUM(duration_ms),0) AS duration_ms, '
                . 'COALESCE(SUM(energy_kwh),0) AS energy_kwh, '
                . 'COALESCE(SUM(electricity_rp),0) AS electricity_rp, '
                . 'COALESCE(SUM(CASE WHEN fluid_type = ? THEN volume_l ELSE 0 END),0) AS water_l, '
                . 'COALESCE(SUM(CASE WHEN fluid_type = ? THEN volume_l ELSE 0 END),0) AS fertilizer_l, '
                . 'COALESCE(SUM(CASE WHEN fluid_type = ? THEN fluid_rp ELSE 0 END),0) AS water_rp, '
                . 'COALESCE(SUM(CASE WHEN fluid_type = ? THEN fluid_rp ELSE 0 END),0) AS fertilizer_rp',
                ['water', 'fertilizer', 'water', 'fertilizer']
            )->first();
        };

        return response()->json([
            'basis' => 'Estimated from logged relay ON durations, not metered power or fluid',
            'tariff_rp_per_kwh' => 1350,
            'today' => $aggregate(DB::table('atan_cost_events')->whereDate('created_at', today())),
            'month' => $aggregate(DB::table('atan_cost_events')
                ->whereYear('created_at', now()->year)
                ->whereMonth('created_at', now()->month)),
            'all' => $aggregate(DB::table('atan_cost_events')),
            'calibration' => [
                'water_complete' => collect(['pump_water', 'pump_3', 'pump_4'])
                    ->every(fn ($id) => $this->configNumber('flow_ml_s.' . $id) !== null)
                    && $this->configNumber('price_rp_l.water') !== null,
                'fertilizer_complete' => collect(['pump_1', 'pump_2'])
                    ->every(fn ($id) => $this->configNumber('flow_ml_s.' . $id) !== null)
                    && $this->configNumber('price_rp_l.fertilizer') !== null,
            ],
        ]);
    }
}
