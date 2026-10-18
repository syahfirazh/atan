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
        Schema::create('device_controls', function (Blueprint $table) {
            $table->id();

            /*
            |--------------------------------------------------------------------------
            | MODE OPERASI
            |--------------------------------------------------------------------------
            |
            | auto   = Predictive-Adaptive / ML
            | manual = Dikendalikan operator melalui dashboard
            |
            */
            $table->enum('mode', ['auto', 'manual'])
                  ->default('auto');


            /*
            |--------------------------------------------------------------------------
            | VALVE IRIGASI 7 ZONA
            |--------------------------------------------------------------------------
            */
            $table->boolean('valve_a')->default(false);
            $table->boolean('valve_b')->default(false);
            $table->boolean('valve_c')->default(false);
            $table->boolean('valve_d')->default(false);
            $table->boolean('valve_e')->default(false);
            $table->boolean('valve_f')->default(false);
            $table->boolean('valve_g')->default(false);


            /*
            |--------------------------------------------------------------------------
            | POMPA
            |--------------------------------------------------------------------------
            */
            $table->boolean('pump_water')->default(false);
            $table->boolean('pump_fertilizer')->default(false);


            /*
            |--------------------------------------------------------------------------
            | MICROCLIMATE CONTROL
            |--------------------------------------------------------------------------
            */
            $table->boolean('misting')->default(false);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_controls');
    }
};