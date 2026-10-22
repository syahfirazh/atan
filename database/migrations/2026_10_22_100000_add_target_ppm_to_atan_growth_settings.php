<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('atan_growth_settings', function (Blueprint $table) {
            $table->decimal('target_ppm', 8, 2)->nullable();
        });
    }
    public function down(): void {
        Schema::table('atan_growth_settings', function (Blueprint $table) {
            $table->dropColumn('target_ppm');
        });
    }
};
