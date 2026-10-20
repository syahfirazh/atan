
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\IotController;
use App\Http\Controllers\Api\AtanCostController;

// ===== TELEMETRY SENSOR =====
Route::post('/telemetry', [IotController::class, 'storeData']);
Route::get('/telemetry/latest', [IotController::class, 'getLatestTelemetry']);

// ===== KONTROL ESP32 =====
Route::get('/controls', [IotController::class, 'getControlStatus']);
Route::post('/controls/update', [IotController::class, 'updateControl']);

// ===== STATUS ESP32 =====
Route::post('/device/heartbeat', [IotController::class, 'heartbeat']);
Route::get('/device/status', [IotController::class, 'deviceStatus']);

// ===== BIAYA LISTRIK, AIR, PUPUK =====
// Gunakan middleware/token sesuai implementasi controller biaya.
Route::post('/cost/event', [AtanCostController::class, 'store']);
Route::get('/cost/summary', [AtanCostController::class, 'summary']);


use App\Http\Controllers\Api\AtanNutrientController;

Route::get('/nutrient/recipe', [AtanNutrientController::class, 'showRecipe']);
Route::post('/nutrient/recipe', [AtanNutrientController::class, 'saveRecipe']);
Route::post('/nutrient/batches', [AtanNutrientController::class, 'recordBatch']);
Route::get('/nutrient/summary', [AtanNutrientController::class, 'summary']);