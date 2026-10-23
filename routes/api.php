
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
// Fase pertumbuhan: hanya pencatatan, tidak mengendalikan aktuator.
use App\Http\Controllers\Api\AtanGrowthController;
Route::get('/growth/current', [AtanGrowthController::class, 'show']);
Route::post('/growth/planting-date', [AtanGrowthController::class, 'save']);
Route::post('/growth/target-ppm', [AtanGrowthController::class, 'saveTarget']);

// Riwayat permanen dari MySQL: tidak bergantung pada browser dan status ESP32.
use App\Http\Controllers\Api\AtanHistoryController;
Route::get('/telemetry/history', [AtanHistoryController::class, 'latest']);
Route::get('/telemetry/export', [AtanHistoryController::class, 'export']);

use App\Http\Controllers\Api\AtanEnergyController;
Route::get('/energy/summary', [AtanEnergyController::class, 'summary']);
use App\Http\Controllers\Api\AtanFinanceController;
Route::get('/finance/forecast', [AtanFinanceController::class, 'forecast']);



// Log kejadian irigasi dari ESP32, data estimasi (bukan flow meter).
Route::post('/log_siram', [\App\Http\Controllers\Api\AtanIrrigationController::class, 'store']);
Route::get('/log_siram/summary', [\App\Http\Controllers\Api\AtanIrrigationController::class, 'latest']);
