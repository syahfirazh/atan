<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SensorLog;
use App\Models\DeviceControl;
use Illuminate\Http\Request;
use App\Models\DeviceStatus;

class IotController extends Controller
{
    /** Accept actual DHT22 readings now; optional calibrated soils later. */
    public function storeData(Request $request)
    {
        $v = $request->validate([
            'air_temp' => 'required|numeric|between:-40,80',
            'air_humidity' => 'required|numeric|between:0,100',
            'soil_a' => 'nullable|numeric|between:0,100',
            'soil_b' => 'nullable|numeric|between:0,100',
            'soil_c' => 'nullable|numeric|between:0,100',
            'soil_d' => 'nullable|numeric|between:0,100',
            'soil_e' => 'nullable|numeric|between:0,100',
            'soil_f' => 'nullable|numeric|between:0,100',
            'soil_g' => 'nullable|numeric|between:0,100',
            'water_temp' => 'nullable|numeric|between:-10,100',
            'ph' => 'nullable|numeric|between:0,14',
            'ec' => 'nullable|numeric|min:0',
            'tds' => 'nullable|numeric|min:0',
        ]);

        // Current migration has NOT NULL soil and environment fields.
        // Zero here is strictly storage fallback and must not be displayed as measurements.
        $row = [
            'air_temp' => $v['air_temp'],
            'air_humidity' => $v['air_humidity'],
            'water_temp' => $v['water_temp'] ?? 0,
            'ph' => $v['ph'] ?? null,
            'ec' => $v['ec'] ?? null,
            'tds' => $v['tds'] ?? null,
        ];
        foreach (range('a', 'g') as $z) {
            $row['soil_' . $z] = $v['soil_' . $z] ?? 0;
        }
        $log = SensorLog::create($row);
        // Important: telemetry never changes pump/valve commands.
        return response()->json([
            'status' => 'success',
            'message' => 'Data DHT22 diterima.',
            'id' => $log->id,
            'timestamp' => $log->created_at,
        ], 201);
    }

    /** Dashboard: stale readings and uninstalled sensors must not look live. */
    public function getLatestTelemetry()
    {
        $sensor = SensorLog::latest('id')->first();
        if (!$sensor) {
            return response()->json(['status' => 'waiting', 'fresh' => false,
                'temp' => null, 'humidity' => null, 'waterTemp' => null,
                'ph' => null, 'ec' => null, 'tds' => null, 'zones' => [],
                'timestamp' => null]);
        }
        $fresh = $sensor->created_at && $sensor->created_at->gte(now()->subSeconds(20));
        $control = DeviceControl::first();
        $zones = [];
        foreach (range('a', 'g') as $z) {
            $zones[] = [
                'code' => strtoupper($z), 'soil' => null, 'flow' => null,
                'n' => null, 'p' => null, 'k' => null,
                'valve' => (bool) ($control?->{'valve_' . $z} ?? false),
                'pump' => (bool) ($control?->pump_water ?? false),
                'mixer' => null,
            ];
        }
        return response()->json([
            'status' => $fresh ? 'success' : 'waiting',
            'fresh' => (bool) $fresh,
            'temp' => $fresh ? $sensor->air_temp : null,
            'humidity' => $fresh ? $sensor->air_humidity : null,
            'waterTemp' => null, 'ph' => null, 'ec' => null, 'tds' => null,
            'zones' => $zones,
            'timestamp' => $sensor->created_at,
        ]);
    }

    public function getControlStatus()
    {
        return response()->json(DeviceControl::firstOrCreate(['id' => 1]));
    }

    public function updateControl(Request $request)
    {
        $validated = $request->validate([
            'mode' => 'sometimes|required|in:auto,manual',
            'valve_a' => 'sometimes|boolean', 'valve_b' => 'sometimes|boolean',
            'valve_c' => 'sometimes|boolean', 'valve_d' => 'sometimes|boolean',
            'valve_e' => 'sometimes|boolean', 'valve_f' => 'sometimes|boolean',
            'valve_g' => 'sometimes|boolean', 'pump_water' => 'sometimes|boolean',
            'pump_fertilizer' => 'sometimes|boolean',
        ]);
        $control = DeviceControl::firstOrCreate(['id' => 1]);
        $control->fill($validated)->save();
        return response()->json(['status'=>'success', 'data'=>$control]);
    }

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
    $device = DeviceStatus::where(
        'device_id',
        'ESP32-S3-ATAN'
    )->first();

    $online = $device
        && $device->last_seen_at
        && $device->last_seen_at->greaterThan(
            now()->subSeconds(30)
        );

    return response()->json([
        'device_id' => 'ESP32-S3-ATAN',
        'online' => (bool) $online,
        'status' => $online ? 'connected' : 'disconnected',
        'last_seen_at' => $device?->last_seen_at,
    ]);
}
}
