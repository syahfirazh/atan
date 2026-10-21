<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AtanGrowthController extends Controller
{
    private const PHASES = [
        ['name'=>'Vegetatif Awal','start'=>0,'end'=>30,'ec_target_ms_cm'=>null],
        ['name'=>'Vegetatif Akhir','start'=>31,'end'=>60,'ec_target_ms_cm'=>null],
        ['name'=>'Pembungaan','start'=>61,'end'=>90,'ec_target_ms_cm'=>null],
        ['name'=>'Pembuahan / Panen','start'=>91,'end'=>null,'ec_target_ms_cm'=>null],
    ];

    public function show()
    {
        $row = DB::table('atan_growth_settings')->where('id', 1)->first();
        $date = $row?->planting_date;
        $age = $date ? max(0, Carbon::parse($date)->startOfDay()->diffInDays(today(), false)) : null;
        $phase = null;
        if ($age !== null) {
            foreach (self::PHASES as $p) {
                if ($p['end'] === null || $age <= $p['end']) { $phase = $p; break; }
            }
            if (!$phase) $phase = self::PHASES[3];
        }
        return response()->json([
            'planting_date'=>$date,
            'age_days'=>$age,
            'phase'=>$phase,
            'phase_basis'=>'empat fase kalender awal untuk cabai; rentang umur ilustratif dan harus disesuaikan dengan observasi tanaman, bukan prediksi ML',
            'ec_pdf_reference_ms_cm'=>['min'=>1.6,'max'=>2.6,'crop'=>'paprika hidroponik, bukan cabai'],
            'ec_target_notice'=>'Kenaikan 800 ppm per fase bukan 800 mS/cm; tidak diterapkan otomatis tanpa definisi satuan dan kalibrasi.',
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
