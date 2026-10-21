<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AtanGrowthController extends Controller
{
    private const PHASES = [
        ['name'=>'Persemaian','start'=>0,'end'=>18],
        ['name'=>'Vegetatif','start'=>19,'end'=>45],
        ['name'=>'Pembungaan','start'=>46,'end'=>65],
        ['name'=>'Pembuahan','start'=>66,'end'=>95],
        ['name'=>'Panen','start'=>96,'end'=>120],
    ];

    public function show()
    {
        $row = DB::table('atan_growth_settings')->where('id', 1)->first();
        $date = $row?->planting_date;
        $age = $date ? max(0, Carbon::parse($date)->startOfDay()->diffInDays(today(), false)) : null;
        $phase = null;
        if ($age !== null) {
            foreach (self::PHASES as $p) {
                if ($age <= $p['end']) { $phase = $p; break; }
            }
            if (!$phase) $phase = ['name'=>'Panen berlanjut','start'=>121,'end'=>null];
        }
        return response()->json([
            'planting_date'=>$date,
            'age_days'=>$age,
            'phase'=>$phase,
            'phase_basis'=>'umur kalender sejak tanggal tanam, bukan prediksi ML',
            'phases'=>self::PHASES,
        ])->header('Cache-Control', 'no-store');
    }

    public function save(Request $request)
    {
        $data=$request->validate(['planting_date'=>['required','date_format:Y-m-d','before_or_equal:today','after_or_equal:2000-01-01']]);
        DB::table('atan_growth_settings')->updateOrInsert(['id'=>1],[
            'planting_date'=>$data['planting_date'], 'updated_at'=>now(),
        ]);
        return $this->show();
    }
}
