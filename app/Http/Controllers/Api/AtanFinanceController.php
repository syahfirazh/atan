<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class AtanFinanceController extends Controller {
 public function forecast() {
  $start=now()->subDays(6)->startOfDay();
  $count=DB::table('atan_pzem_readings')->where('created_at','>=',$start)->selectRaw('COUNT(DISTINCT DATE(created_at)) AS days')->value('days');
  $batchCount=DB::table('atan_nutrient_batches')->where('created_at','>=',$start)->count();
  $dailyEvents=DB::table('atan_nutrient_batches')->where('created_at','>=',$start)->selectRaw('COALESCE(SUM(water_rp),0) as water, COALESCE(SUM(fertilizer_a_rp+fertilizer_b_rp),0) as fertilizer')->first();
  $meter=DB::table('atan_pzem_readings')->where('created_at','>=',$start)->selectRaw('COALESCE(SUM(electricity_rp),0) AS electricity, COALESCE(SUM(delta_kwh),0) AS kwh')->first();
  // Perlu sedikitnya 7 hari berbeda dengan bacaan PZEM; statistik dasar, bukan model ML.
  $ready=$count>=7;
  $water=((float)$dailyEvents->water)/7*30;
  $fert=((float)$dailyEvents->fertilizer)/7*30;
  $elec=((float)$meter->electricity)/7*30;
  return response()->json(['ready'=>$ready,'method'=>'Ekstrapolasi rerata 7 hari menjadi 30 hari, bukan model machine learning',
    'observed_days'=>$count,'observed_batches'=>$batchCount,
    'forecast'=>$ready ? ['water'=>$water,'fertilizer'=>$fert,'electricity'=>$elec,'total'=>$water+$fert+$elec] : null,
    'notice'=>$ready?'Proyeksi statistik dasar; ketidakpastian belum dihitung.':'Minimal 7 hari data PZEM diperlukan. Biaya bahan hanya yang dicatat sebagai batch.']);
 }
}
