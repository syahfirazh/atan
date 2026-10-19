
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| ATAN si TATANEN - WEB ROUTES
|--------------------------------------------------------------------------
| Fokus tanaman : Cabai
| Mikrokontroler : ESP32-S3
| Halaman        : Welcome & Dashboard
|--------------------------------------------------------------------------
*/


// ======================================================
// 1. HALAMAN WELCOME
// ======================================================

// Profil tanaman cabai dan konfigurasi pupuk
Route::get('/', [WelcomeController::class, 'index'])
    ->name('welcome');


// ======================================================
// 2. DASHBOARD GREENHOUSE
// ======================================================

// Monitoring Living Greenhouse
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');


// ======================================================
// 3. MONITORING SENSOR ESP32-S3
// ======================================================

// Mengambil pembacaan sensor terbaru
Route::get('/live-data', [DashboardController::class, 'getLiveData'])
    ->name('live.data');


// ======================================================
// 4. AUTHENTICATION OPERATOR
// ======================================================

Route::middleware('guest')->group(function () {

    Route::get('/login', [
        AuthController::class,
        'showLoginForm'
    ])->name('login');

    Route::post('/login', [
        AuthController::class,
        'login'
    ])->name('login.post');

});

Route::post('/logout', [
    AuthController::class,
    'logout'
])
    ->middleware('auth')
    ->name('logout');


// ======================================================
// 5. CONTROL AKTUATOR
// ======================================================

// Mengubah status aktuator
// Hanya pengguna login yang diizinkan
Route::post('/api/controls/update', [
    DashboardController::class,
    'updateControl'
])
    ->middleware('auth')
    ->name('controls.update');


// ======================================================
// 6. EXPORT RIWAYAT DATA
// ======================================================

Route::middleware('auth')->group(function () {

    // Export Excel
    Route::get('/export-excel', [
        DashboardController::class,
        'exportExcel'
    ])->name('export.excel');

    // Export CSV
    Route::get('/export-csv', [
        DashboardController::class,
        'exportCSV'
    ])->name('export.csv');

});
