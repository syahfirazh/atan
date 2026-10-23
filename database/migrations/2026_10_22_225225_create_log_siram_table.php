<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('log_siram', function (Blueprint $table) {
            $table->id();
            $table->string('device_id');
            $table->string('event_id')->unique();
            $table->integer('fase_tanam');
            $table->float('air_keluar_ml');
            $table->float('pupuk_keluar_ml');
            $table->decimal('total_biaya_rp', 12, 2); // Simpan biaya hingga miliaran rupiah dengan 2 desimal
            $table->float('tds_final_ppm')->nullable();
            $table->float('ph_final')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('log_siram');
    }
};