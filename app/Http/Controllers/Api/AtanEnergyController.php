<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class AtanEnergyController extends Controller {
 public function summary() {
  $now=now();
  $calc=fn($start)=>DB::table('atan_pzem_readings')->when($start,fn($q)=>$q->where('created_at','>=',$start))
   ->selectRaw('COUNT(*) AS readings, COALESCE(SUM(delta_kwh),0) AS kwh, COALESCE(SUM(electricity_rp),0) AS rp')->first();
  return response()->json([
   'basis'=>'PZEM kWh terukur pada sirkuit yang melewati meter; delta baseline pertama 0, reset penghitung tidak menghasilkan konsumsi negatif.',
   'tariff_rp_kwh'=>1444.70,'today'=>$calc($now->copy()->startOfDay()),
   'month'=>$calc($now->copy()->startOfMonth()),'all'=>$calc(null),
   'latest'=>DB::table('atan_pzem_readings')->orderByDesc('id')->first(),
  ])->header('Cache-Control','no-store');
 }
}
