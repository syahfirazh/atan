<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DeviceControl;
use App\Models\DeviceStatus;
use App\Models\SensorLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class IotController extends Controller
{
    /**
     * Menerima hanya pembacaan sensor yang tersedia dan valid.
     * Heartbeat perangkat ditangani terpisah oleh heartbeat().
     * Tidak pernah mengubah aktuator saat menerima telemetry.
     *
     * PRASYARAT: kolom soil_a..soil_g, air_temp, air_humidity,
     * dan water_temp di sensor_logs sudah diubah menjadi nullable.
     */
    public function storeData(Request $request)
    {
        $rules = [
            'sample_id' => 'sometimes|nullable|string|max:100|regex:/^[A-Za-z0-9_.:-]+$/',
            'air_temp' => 'nullable|numeric|between:-40,80',
            'air_humidity' => 'nullable|numeric|between:0,100',
            'water_temp' => 'nullable|numeric|between:-10,100',
            'ph' => 'nullable|numeric|between:0,14',
            'ec' => 'nullable|numeric|min:0',
            'tds' => 'nullable|numeric|min:0',
            'npk_n' => 'nullable|numeric|min:0',
            'npk_p' => 'nullable|numeric|min:0',
            'npk_k' => 'nullable|numeric|min:0',
            'soil_adc_a' => 'nullable|integer|between:0,4095',
            'soil_adc_b' => 'nullable|integer|between:0,4095',
            'soil_adc_c' => 'nullable|integer|between:0,4095',
            'ph_adc' => 'nullable|integer|between:0,4095',
            'ph_voltage' => 'nullable|numeric|between:0,3.3',
            'tds_adc' => 'nullable|integer|between:0,4095',
            'tds_voltage' => 'nullable|numeric|between:0,3.3',
        ];

        foreach (range('a', 'g') as $zone) {
            $rules['soil_' . $zone] = 'nullable|numeric|between:0,100';
        }

        $validated = $request->validate($rules);
        $hasMeasurement = collect($validated)->except(['sample_id'])->contains(fn ($value) => $value !== null);
        if (!$hasMeasurement) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak ada pembacaan sensor valid. Gunakan endpoint heartbeat untuk status perangkat.',
            ], 422);
        }

        $row = [];
        foreach (['air_temp', 'air_humidity', 'water_temp', 'ph', 'ec', 'tds'] as $field) {
            $row[$field] = $validated[$field] ?? null;
        }
        foreach (range('a', 'g') as $zone) {
            $field = 'soil_' . $zone;
            $row[$field] = $validated[$field] ?? null;
        }

        // NPK memakai kolom baru; tidak mengasumsikan adanya kolom pada DB lama.
        foreach (['npk_n', 'npk_p', 'npk_k'] as $field) {
            if (Schema::hasColumn('sensor_logs', $field)) {
                $row[$field] = $validated[$field] ?? null;
            } elseif (isset($validated[$field])) {
                return response()->json([
                    'status' => 'error',
                    'message' => "Kolom {$field} belum tersedia. Jalankan migration NPK dahulu.",
                ], 422);
            }
        }

        // Diagnostik mentah: bukan nilai pH/TDS/kelembapan terkalibrasi.
        foreach (['soil_adc_a','soil_adc_b','soil_adc_c','ph_adc','ph_voltage','tds_adc','tds_voltage'] as $field) {
            if (!Schema::hasColumn('sensor_logs', $field)) {
                return response()->json(['status'=>'error','message'=>"Migration kolom {$field} belum dijalankan."], 503);
            }
            $row[$field] = $validated[$field] ?? null;
        }

        // ID unik perangkat: pengiriman ulang tidak membuat pembacaan ganda.
        // Dibuat opsional untuk kompatibilitas dengan firmware lama.
        $sampleId = $validated['sample_id'] ?? null;
        if ($sampleId !== null) {
            $row['sample_id'] = $sampleId;
            $inserted = \Illuminate\Support\Facades\DB::table('sensor_logs')->insertOrIgnore(array_merge(
                $row, ['created_at' => now(), 'updated_at' => now()]
            ));
            $log = SensorLog::where('sample_id', $sampleId)->firstOrFail();
            return response()->json([
                'status' => 'success',
                'message' => $inserted ? 'Telemetry tersimpan.' : 'Telemetry sudah pernah diterima.',
                'id' => $log->id,
                'duplicate' => !$inserted,
                'timestamp' => $log->created_at,
            ], $inserted ? 201 : 200);
        }

        $log = SensorLog::create($row);

        return response()->json([
            'status' => 'success',
            'message' => 'Telemetry sensor berhasil disimpan.',
            'id' => $log->id,
            'timestamp' => $log->created_at,
        ], 201);
    }

    /**
     * Snapshot sensor terbaru. Online/offline ESP32 bukan ditentukan di sini,
     * melainkan GET /api/device/status melalui heartbeat.
     */
    public function getLatestTelemetry()
    {
        $sensor = SensorLog::latest('id')->first();
        $fresh = (bool) ($sensor && $sensor->created_at &&
            $sensor->created_at->gte(now()->subSeconds(12)));

        $number = static function ($value) {
            return $value === null ? null : (float) $value;
        };
        $zones = [];
        foreach (range('a', 'g') as $z) {
            $zones[] = [
                'code' => strtoupper($z),
                'soil' => $fresh ? $number($sensor->{'soil_' . $z}) : null,
                // Flow meter dan status fisik aktuator belum dilaporkan pada endpoint ini.
                'flow' => null,
                // NPK global belum dapat dipetakan ke zona tertentu.
                'n' => null,
                'p' => null,
                'k' => null,
                'valve' => null,
                'pump' => null,
                'mixer' => null,
            ];
        }

        return response()->json([
            'status' => $fresh ? 'success' : 'waiting',
            'fresh' => $fresh,
            'temp' => $fresh ? $number($sensor->air_temp) : null,
            'humidity' => $fresh ? $number($sensor->air_humidity) : null,
            'waterTemp' => $fresh ? $number($sensor->water_temp) : null,
            'ph' => $fresh ? $number($sensor->ph) : null,
            'ec' => $fresh ? $number($sensor->ec) : null,
            'tds' => $fresh ? $number($sensor->tds) : null,
            'diagnostic' => [
                'soil_adc' => $fresh ? [$sensor->soil_adc_a, $sensor->soil_adc_b, $sensor->soil_adc_c] : [null,null,null],
                'ph_adc' => $fresh ? $sensor->ph_adc : null,
                'ph_voltage' => $fresh ? $number($sensor->ph_voltage) : null,
                'tds_adc' => $fresh ? $sensor->tds_adc : null,
                'tds_voltage' => $fresh ? $number($sensor->tds_voltage) : null,
            ],
            'npk' => [
                'n' => $fresh && Schema::hasColumn('sensor_logs', 'npk_n') ? $number($sensor->npk_n) : null,
                'p' => $fresh && Schema::hasColumn('sensor_logs', 'npk_p') ? $number($sensor->npk_p) : null,
                'k' => $fresh && Schema::hasColumn('sensor_logs', 'npk_k') ? $number($sensor->npk_k) : null,
            ],
            'zones' => $zones,
            'timestamp' => $sensor?->created_at,
        ]);
    }

    public function getControlStatus()
    {
        return response()->json(DeviceControl::firstOrCreate(['id' => 1]));
    }

    /**
     * Memperbarui setelan kontrol di database (bukan bukti aktuator fisik ON).
     * Lindungi route ini dengan autentikasi dan otorisasi sebelum digunakan luas.
     */
    public function updateControl(Request $request)
    {
        $validated = $request->validate([
            'mode' => 'sometimes|required|in:auto,manual',
            'valve_a' => 'sometimes|boolean',
            'valve_b' => 'sometimes|boolean',
            'valve_c' => 'sometimes|boolean',
            'valve_d' => 'sometimes|boolean',
            'valve_e' => 'sometimes|boolean',
            'valve_f' => 'sometimes|boolean',
            'valve_g' => 'sometimes|boolean',
            'pump_water' => 'sometimes|boolean',
            'pump_fertilizer' => 'sometimes|boolean',
        ]);

        $control = DeviceControl::firstOrCreate(['id' => 1]);
        $control->fill($validated)->save();

        return response()->json(['status' => 'success', 'data' => $control]);
    }

    /** ESP32 melapor aktif tanpa perlu sensor terpasang. */
    public function heartbeat(Request $request)
    {
        $validated = $request->validate([
            'device_id' => 'required|string|max:100',
        ]);

        $device = DeviceStatus::updateOrCreate(
            ['device_id' => $validated['device_id']],
            ['last_seen_at' => now()]
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Heartbeat diterima',
            'device_id' => $device->device_id,
            'last_seen_at' => $device->last_seen_at,
        ]);
    }

    public function deviceStatus()
    {
        $deviceId = 'ESP32-S3-ATAN';
        $device = DeviceStatus::where('device_id', $deviceId)->first();
        $online = (bool) ($device?->last_seen_at &&
            $device->last_seen_at->gte(now()->subSeconds(12)));

        return response()->json([
            'device_id' => $deviceId,
            'online' => $online,
            'status' => $online ? 'connected' : 'disconnected',
            'last_seen_at' => $device?->last_seen_at,
        ]);
    }
}
