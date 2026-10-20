<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('atan_nutrient_recipes', function (Blueprint $table) {
            $table->id();
            $table->json('items');
            $table->decimal('water_l', 18, 6)->default(0);
            $table->decimal('water_price_rp_l', 18, 6)->default(0);
            $table->timestamps();
        });
        Schema::create('atan_nutrient_batches', function (Blueprint $table) {
            $table->id();
            $table->string('batch_id',100)->unique();
            $table->json('recipe_snapshot');
            $table->decimal('fertilizer_a_rp',18,6);
            $table->decimal('fertilizer_b_rp',18,6);
            $table->decimal('water_rp',18,6);
            $table->decimal('total_rp',18,6);
            $table->decimal('water_l',18,6);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('atan_nutrient_batches');
        Schema::dropIfExists('atan_nutrient_recipes');
    }
};
