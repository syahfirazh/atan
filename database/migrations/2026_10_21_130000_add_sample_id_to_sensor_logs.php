<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('sensor_logs', function (Blueprint $table) {
            $table->string('sample_id', 100)->nullable()->unique();
            $table->index(['created_at', 'id'], 'sensor_log_date_id_idx');
        });
    }
    public function down(): void {
        Schema::table('sensor_logs', function (Blueprint $table) {
            $table->dropUnique(['sample_id']);
            $table->dropIndex('sensor_log_date_id_idx');
            $table->dropColumn('sample_id');
        });
    }
};
