<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration {
 public function up(): void {
  Schema::create('atan_pzem_state', function(Blueprint $t){$t->unsignedTinyInteger('id')->primary();$t->decimal('last_total_kwh',18,6)->nullable();$t->timestamp('updated_at')->nullable();});
  DB::table('atan_pzem_state')->insert(['id'=>1,'last_total_kwh'=>null,'updated_at'=>now()]);
  Schema::create('atan_pzem_readings', function(Blueprint $t){
   $t->id();$t->string('sample_id',100)->unique();$t->unsignedBigInteger('sensor_log_id')->index();
   $t->decimal('voltage_v',12,3);$t->decimal('current_a',12,4);$t->decimal('power_w',14,3);
   $t->decimal('total_kwh',18,6);$t->decimal('delta_kwh',18,6);$t->decimal('electricity_rp',18,6);
   $t->timestamps();$t->index('created_at');
  });
 }
 public function down():void {Schema::dropIfExists('atan_pzem_readings');Schema::dropIfExists('atan_pzem_state');}
};
