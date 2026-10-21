<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::table('atan_nutrient_batches', function (Blueprint $t) {
            $t->index('created_at', 'atan_batch_time_idx');
        });
    }
    public function down(): void {
        Schema::table('atan_nutrient_batches', function (Blueprint $t) {
            $t->dropIndex('atan_batch_time_idx');
        });
    }
};
