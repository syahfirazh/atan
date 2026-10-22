<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('atan_irrigation_events',function(Blueprint $table){
            $table->id();
            $table->string('event_id',100)->unique();
            $table->string('device_id',100);
            $table->unsignedTinyInteger('fase_tanam');
            $table->decimal('air_keluar_ml',12,2);
            $table->decimal('pupuk_keluar_ml',12,2);
            $table->decimal('tds_final_ppm',10,2)->nullable();
            $table->decimal('ph_final',5,2)->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('atan_irrigation_events'); }
};
