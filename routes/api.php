<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\IotController;

// ========== TELEMETRY SENSOR ==========
Route::post('/telemetry', [IotController::class, 'storeData']);
Route::get('/telemetry/latest', [IotController::class, 'getLatestTelemetry']);

// ========== KONTROL ESP32 ==========
Route::get('/controls', [IotController::class, 'getControlStatus']);
Route::post('/controls/update', [IotController::class, 'updateControl']);

// ========== STATUS KONEKSI ESP32 ==========
Route::post('/device/heartbeat', [IotController::class, 'heartbeat']);
Route::get('/device/status', [IotController::class, 'deviceStatus']);