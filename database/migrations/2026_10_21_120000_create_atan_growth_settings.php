<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void { Schema::create('atan_growth_settings', function(Blueprint $table) {
   $table->unsignedTinyInteger('id')->primary();
   $table->date('planting_date');
   $table->timestamp('updated_at')->nullable();
 }); }
 public function down(): void { Schema::dropIfExists('atan_growth_settings'); }
};
