<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sensor_logs', function (Blueprint $table) {
            foreach (range('a', 'g') as $zone) {
                $table->double("soil_{$zone}")
                    ->nullable()
                    ->default(null)
                    ->change();
            }

            $table->double('water_temp')
                ->nullable()
                ->default(null)
                ->change();

            $table->double('air_temp')
                ->nullable()
                ->default(null)
                ->change();

            $table->double('air_humidity')
                ->nullable()
                ->default(null)
                ->change();

            // Nilai NPK aktual
            $table->double('npk_n')->nullable();
            $table->double('npk_p')->nullable();
            $table->double('npk_k')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('sensor_logs', function (Blueprint $table) {
            $table->dropColumn(['npk_n', 'npk_p', 'npk_k']);
        });

        // Kolom sensor tetap nullable agar data null
        // tidak dipaksa kembali menjadi angka nol.
    }
};