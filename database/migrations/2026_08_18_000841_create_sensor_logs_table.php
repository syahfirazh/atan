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
        Schema::create('sensor_logs', function (Blueprint $table) {
            $table->id();

            /*
            |--------------------------------------------------------------------------
            | SOIL MOISTURE - 7 ZONA
            |--------------------------------------------------------------------------
            | Sesuai desain ATAN si TATANEN:
            | 1 sensor soil moisture untuk setiap zona.
            */
            $table->float('soil_a')->default(0);
            $table->float('soil_b')->default(0);
            $table->float('soil_c')->default(0);
            $table->float('soil_d')->default(0);
            $table->float('soil_e')->default(0);
            $table->float('soil_f')->default(0);
            $table->float('soil_g')->default(0);


            /*
            |--------------------------------------------------------------------------
            | LINGKUNGAN GREENHOUSE
            |--------------------------------------------------------------------------
            */
            $table->float('water_temp')->default(0);
            $table->float('air_temp')->default(0);
            $table->float('air_humidity')->default(0);


            /*
            |--------------------------------------------------------------------------
            | KUALITAS AIR / NUTRISI
            |--------------------------------------------------------------------------
            */
            $table->float('ph')->nullable();
            $table->float('ec')->nullable();
            $table->float('tds')->nullable();

            /*
             * NPK masih berupa portable sampling,
             * bukan sensor realtime permanen per zona.
             */
            $table->string('npk_status')->nullable();


            /*
            |--------------------------------------------------------------------------
            | FLOW METER PER ZONA
            |--------------------------------------------------------------------------
            | Satuan L/min
            */
            $table->float('flow_a')->default(0);
            $table->float('flow_b')->default(0);
            $table->float('flow_c')->default(0);
            $table->float('flow_d')->default(0);
            $table->float('flow_e')->default(0);
            $table->float('flow_f')->default(0);
            $table->float('flow_g')->default(0);


            /*
            |--------------------------------------------------------------------------
            | TOTAL VOLUME AIR PER ZONA
            |--------------------------------------------------------------------------
            | Satuan liter
            */
            $table->float('water_a')->default(0);
            $table->float('water_b')->default(0);
            $table->float('water_c')->default(0);
            $table->float('water_d')->default(0);
            $table->float('water_e')->default(0);
            $table->float('water_f')->default(0);
            $table->float('water_g')->default(0);


            /*
            |--------------------------------------------------------------------------
            | MACHINE LEARNING PREDICTION
            |--------------------------------------------------------------------------
            | Prediksi kelembapan tanah 30 menit ke depan.
            */
            $table->float('pred_a')->nullable();
            $table->float('pred_b')->nullable();
            $table->float('pred_c')->nullable();
            $table->float('pred_d')->nullable();
            $table->float('pred_e')->nullable();
            $table->float('pred_f')->nullable();
            $table->float('pred_g')->nullable();


            /*
            |--------------------------------------------------------------------------
            | ML DECISION ENGINE
            |--------------------------------------------------------------------------
            */
            $table->string('ml_zone')->nullable();
            $table->float('ml_prediction')->nullable();
            $table->float('ml_confidence')->nullable();

            $table->string('ml_action')->nullable();
            $table->text('ml_reason')->nullable();
            $table->text('ml_action_detail')->nullable();


            /*
            |--------------------------------------------------------------------------
            | WATER EFFICIENCY
            |--------------------------------------------------------------------------
            */
            $table->float('water_today')->default(0);
            $table->float('water_efficiency')->default(0);
            $table->float('irrigation_runtime')->default(0);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensor_logs');
    }
};