<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

// ======================================================
// DASHBOARD PUBLIK
// ======================================================
Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('/live-data', [DashboardController::class, 'getLiveData'])
    ->name('live.data');


// ======================================================
// AUTHENTICATION
// ======================================================
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.post');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');


// ======================================================
// CONTROL ENDPOINT
// ======================================================
// Sebaiknya hanya operator/login yang dapat mengubah aktuator.
Route::post('/api/controls/update', [DashboardController::class, 'updateControl'])
    ->middleware('auth')
    ->name('controls.update');


// ======================================================
// EXPORT DATA
// ======================================================
Route::middleware('auth')->group(function () {

    Route::get('/export-excel', [DashboardController::class, 'exportExcel'])
        ->name('export.excel');

    Route::get('/export-csv', [DashboardController::class, 'exportCSV'])
        ->name('export.csv');
});