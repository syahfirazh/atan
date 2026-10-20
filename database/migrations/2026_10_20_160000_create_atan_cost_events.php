<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('atan_cost_events', function (Blueprint $t) {
            $t->id();
            $t->string('event_id', 100)->unique();
            $t->string('device_id', 100);
            $t->string('equipment', 30);
            $t->unsignedInteger('duration_ms');
            $t->decimal('power_w', 10, 4)->nullable();
            $t->decimal('energy_kwh', 20, 12)->nullable();
            $t->decimal('electricity_rp', 20, 8)->nullable();
            $t->decimal('volume_l', 18, 8)->nullable();
            $t->string('fluid_type', 20)->nullable();
            $t->decimal('fluid_rp', 20, 8)->nullable();
            $t->timestamps();
            $t->index(['created_at', 'equipment']);
        });
    }
    public function down(): void { Schema::dropIfExists('atan_cost_events'); }
};
