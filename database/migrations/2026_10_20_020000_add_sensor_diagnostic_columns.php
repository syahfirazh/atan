<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // Jalankan migration nullable terdahulu SEBELUM migration ini.
        Schema::table('sensor_logs', function (Blueprint $table) {
            foreach (['npk_n','npk_p','npk_k','ph_voltage','tds_voltage'] as $field) {
                if (!Schema::hasColumn('sensor_logs', $field)) $table->double($field)->nullable();
            }
            foreach (['soil_adc_a','soil_adc_b','soil_adc_c','ph_adc','tds_adc'] as $field) {
                if (!Schema::hasColumn('sensor_logs', $field)) $table->unsignedSmallInteger($field)->nullable();
            }
        });
    }
    public function down(): void {
        // Data telemetry dipertahankan (rollback non-destruktif).
    }
};
