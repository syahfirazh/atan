<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AtanNutrientController extends Controller
{
    // Data ini adalah biaya bahan yang disiapkan sebagai satu batch, bukan konsumsi terukur dari ESP32.
    private function estimate(array $recipe): array
    {
        $a=0.0; $b=0.0;
        foreach ($recipe['items'] as $item) {
            $cost=((float)$item['package_price_rp']/(float)$item['package_qty'])*(float)$item['used_qty'];
            if ($item['group']==='A') $a+=$cost; else $b+=$cost;
        }
        $water=(float)$recipe['water_l']*(float)$recipe['water_price_rp_l'];
        return ['fertilizer_a_rp'=>round($a,6),'fertilizer_b_rp'=>round($b,6),
            'water_rp'=>round($water,6),'total_rp'=>round($a+$b+$water,6),
            'water_l'=>(float)$recipe['water_l']];
    }

    private function recipe(): ?array
    {
        $r=DB::table('atan_nutrient_recipes')->where('id',1)->first();
        return $r? ['items'=>json_decode($r->items,true) ?? [],'water_l'=>(float)$r->water_l,
            'water_price_rp_l'=>(float)$r->water_price_rp_l] : null;
    }

    public function showRecipe()
    {
        $r=$this->recipe();
        return response()->json(['recipe'=>$r,'estimate_per_batch'=>$r?$this->estimate($r):null]);
    }

    public function saveRecipe(Request $request)
    {
        $data=$request->validate([
            'items'=>'required|array|min:1|max:100',
            'items.*.group'=>'required|in:A,B',
            'items.*.name'=>'required|string|max:80',
            'items.*.package_price_rp'=>'required|numeric|min:0|max:10000000000',
            'items.*.package_qty'=>'required|numeric|gt:0|max:100000000',
            'items.*.unit'=>'required|in:ml,g',
            'items.*.used_qty'=>'required|numeric|min:0|max:100000000',
            'water_l'=>'required|numeric|min:0|max:100000000',
            'water_price_rp_l'=>'required|numeric|min:0|max:100000000',
        ]);
        DB::table('atan_nutrient_recipes')->updateOrInsert(['id'=>1], [
            'items'=>json_encode($data['items'], JSON_UNESCAPED_UNICODE),
            'water_l'=>$data['water_l'],'water_price_rp_l'=>$data['water_price_rp_l'],
            'updated_at'=>now()
        ]);
        return response()->json(['status'=>'saved','estimate_per_batch'=>$this->estimate($data)]);
    }

    public function recordBatch(Request $request)
    {
        $v=$request->validate(['batch_id'=>'required|string|max:100']);
        $result=DB::transaction(function () use ($v) {
            $already=DB::table('atan_nutrient_batches')->where('batch_id',$v['batch_id'])->first();
            if ($already) return $already;
            $r=$this->recipe();
            if (!$r) abort(422,'Simpan resep terlebih dahulu.');
            $cost=$this->estimate($r);
            DB::table('atan_nutrient_batches')->insertOrIgnore(array_merge([
                'batch_id'=>$v['batch_id'], 'recipe_snapshot'=>json_encode($r,JSON_UNESCAPED_UNICODE),
                'created_at'=>now(),'updated_at'=>now()
            ],$cost));
            return DB::table('atan_nutrient_batches')->where('batch_id',$v['batch_id'])->first();
        });
        return response()->json(['status'=>'recorded','batch'=>$result],201);
    }

    public function summary()
    {
        $sum=function ($query) {
            return $query->selectRaw('COUNT(*) AS batches, COALESCE(SUM(fertilizer_a_rp),0) AS fertilizer_a_rp, COALESCE(SUM(fertilizer_b_rp),0) AS fertilizer_b_rp, COALESCE(SUM(water_rp),0) AS water_rp, COALESCE(SUM(total_rp),0) AS total_rp, COALESCE(SUM(water_l),0) AS water_l')->first();
        };
        $r=$this->recipe();
        return response()->json([
            'basis'=>'Manually confirmed prepared nutrient batches; excludes electricity and relay fluid-volume estimates',
            'recipe_estimate_per_batch'=>$r?$this->estimate($r):null,
            'today'=>$sum(DB::table('atan_nutrient_batches')->whereDate('created_at',today())),
            'month'=>$sum(DB::table('atan_nutrient_batches')->whereYear('created_at',now()->year)->whereMonth('created_at',now()->month)),
            'all'=>$sum(DB::table('atan_nutrient_batches'))
        ]);
    }
}
