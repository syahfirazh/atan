<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('atan_irrigation_events', function (Blueprint $table) {
            // Menambahkan kolom proyeksi ML
            $table->float('proyeksi_pupuk_30_hari_ml')->nullable()->after('pupuk_keluar_ml');
            
            // Opsional: Pastikan kolom ini juga ada jika sebelumnya belum terbuat
            // $table->float('air_keluar_ml')->nullable();
            // $table->float('pupuk_keluar_ml')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('atan_irrigation_events', function (Blueprint $table) {
            $table->dropColumn('proyeksi_pupuk_30_hari_ml');
        });
    }
};