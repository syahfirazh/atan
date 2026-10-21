<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AtanHistoryController extends Controller
{
    /**
     * Biaya adalah KUMULATIF sejak mulai pencatatan sampai saat baris sensor tersimpan.
     * Tidak menganggap biaya/batch terjadi tepat saat sensor membaca; tidak menjumlah
     * estimasi volume relay dengan batch yang sudah dicatat sebagai bahan.
     * Waktu berasal dari created_at SERVER Laravel (bukan RTC ESP32).
     */
    private function readingsQuery()
    {
        $q = DB::table('sensor_logs as s')->select([
            's.id','s.sample_id','s.created_at','s.air_temp','s.air_humidity',
            's.water_temp','s.soil_a','s.soil_b','s.soil_c',
            's.soil_adc_a','s.soil_adc_b','s.soil_adc_c',
            's.ph','s.ec','s.tds','s.ph_adc','s.ph_voltage',
            's.tds_adc','s.tds_voltage','s.npk_n','s.npk_p','s.npk_k',
        ]);
        $q->leftJoin('atan_pzem_readings as pz', 'pz.sensor_log_id', '=', 's.id');
        $q->addSelect('pz.voltage_v as pzem_voltage_v','pz.current_a as pzem_current_a','pz.power_w as pzem_power_w','pz.total_kwh as pzem_meter_total_kwh');
        $costs = [
            'energy_kwh' => ['atan_cost_events', 'energy_kwh'],
            'pzem_consumption_kwh' => ['atan_pzem_readings', 'delta_kwh'],
            'pzem_electricity_rp' => ['atan_pzem_readings', 'electricity_rp'],
            'electricity_rp' => ['atan_cost_events', 'electricity_rp'],
            'water_batch_l' => ['atan_nutrient_batches', 'water_l'],
            'water_batch_rp' => ['atan_nutrient_batches', 'water_rp'],
            'fertilizer_a_rp' => ['atan_nutrient_batches', 'fertilizer_a_rp'],
            'fertilizer_b_rp' => ['atan_nutrient_batches', 'fertilizer_b_rp'],
        ];
        foreach ($costs as $alias => [$table, $column]) {
            // Semua tabel memakai index created_at atau dibuatkan index terpisah.
            $q->selectSub(
                DB::table($table)->selectRaw("COALESCE(SUM({$column}), 0)")
                    ->whereColumn('created_at', '<=', 's.created_at'),
                $alias
            );
        }
        // Indikator apakah ada aktivitas pompa air yang dayanya belum diukur.
        $q->selectSub(DB::table('atan_cost_events')->selectRaw('COUNT(*)')
            ->where('equipment', 'pump_water')
            ->whereColumn('created_at', '<=', 's.created_at'), 'unmetered_pump_events');
        return $q;
    }

    public function latest()
    {
        $rows = $this->readingsQuery()->orderByDesc('s.id')->limit(100)->get();
        return response()->json([
            'source' => 'mysql',
            'count' => $rows->count(),
            'total_saved' => DB::table('sensor_logs')->count(),
            'cost_basis' => 'Air/pupuk = batch disiapkan. Listrik PZEM = meter untuk beban yang melewati PZEM. Estimasi relay ditampilkan terpisah dan TIDAK dijumlahkan dengan PZEM.',
            'rows' => $rows,
        ])->header('Cache-Control', 'no-store');
    }

    private function dates(Request $request): array
    {
        $v = $request->validate([
            'from' => 'required|date_format:Y-m-d',
            'to' => 'required|date_format:Y-m-d|after_or_equal:from',
        ]);
        $from = Carbon::createFromFormat('!Y-m-d', $v['from'])->startOfDay();
        $to = Carbon::createFromFormat('!Y-m-d', $v['to'])->endOfDay();
        if ($from->diffInDays($to) > 366) {
            abort(422, 'Rentang maksimal 366 hari per unduhan; data lama tetap tersimpan.');
        }
        return [$v, $from, $to];
    }

    private function csvCell($value, bool $numeric = false): string
    {
        if ($value === null || $value === '') return '';
        if ($numeric && is_numeric($value)) return str_replace('.', ',', (string) $value);
        $text = (string) $value;
        // Hindari formula injection jika ada teks sensor/sumber dari luar.
        if (preg_match('/^[=+@\-\t\r]/u', $text)) $text = "'".$text;
        return $text;
    }

    private function outputRow($handle, array $row, array $numericIndexes = []): void
    {
        foreach ($row as $idx => $value) {
            $row[$idx] = $this->csvCell($value, in_array($idx, $numericIndexes, true));
        }
        fputcsv($handle, $row, ';', '"', '');
    }

    public function export(Request $request): StreamedResponse
    {
        [$v, $from, $to] = $this->dates($request);
        $query = $this->readingsQuery()->whereBetween('s.created_at', [$from, $to])
            ->orderBy('s.id');
        $filename = 'ATAN_Sensor_Biaya_'.$v['from'].'_sampai_'.$v['to'].'.csv';
        return response()->streamDownload(function () use ($query) {
            $h = fopen('php://output', 'w');
            fwrite($h, "\xEF\xBB\xBF"); // BOM UTF-8 untuk Excel
            fwrite($h, "sep=;\r\n");
            $this->outputRow($h, [
                'ID Telemetry', 'Waktu diterima Laravel', 'Soil A (%)', 'Soil B (%)',
                'Soil C (%)', 'Soil ADC A', 'Soil ADC B', 'Soil ADC C',
                'Suhu Udara (C)', 'Kelembapan Udara (%)', 'Suhu Air (C)',
                'pH terkalibrasi', 'EC (mS/cm)', 'TDS (ppm)',
                'N global (raw)', 'P global (raw)', 'K global (raw)',
                'pH ADC', 'pH Tegangan (V)', 'TDS ADC', 'TDS Tegangan (V)',
                'Air batch dibuat - kumulatif (L)',
                'Biaya air batch - kumulatif (Rp)',
                'Biaya pupuk A - kumulatif (Rp)',
                'Biaya pupuk B - kumulatif (Rp)',
                'Listrik relay - kumulatif (kWh)',
                'Biaya listrik relay - kumulatif (Rp)',
                'Kejadian pompa air tanpa daya terukur (jumlah)',
                'PZEM tegangan (V)', 'PZEM arus (A)', 'PZEM daya (W)',
                'PZEM total meter (kWh)', 'PZEM pemakaian tercatat kumulatif (kWh)', 'PZEM biaya tercatat kumulatif (Rp)',
            ]);
            foreach ($query->cursor() as $r) {
                $row = [
                    $r->id, Carbon::parse($r->created_at)->format('d/m/Y H:i:s'),
                    $r->soil_a,$r->soil_b,$r->soil_c,
                    $r->soil_adc_a,$r->soil_adc_b,$r->soil_adc_c,
                    $r->air_temp,$r->air_humidity,$r->water_temp,
                    $r->ph,$r->ec,$r->tds,
                    $r->npk_n,$r->npk_p,$r->npk_k,
                    $r->ph_adc,$r->ph_voltage,$r->tds_adc,$r->tds_voltage,
                    $r->water_batch_l,$r->water_batch_rp,
                    $r->fertilizer_a_rp,$r->fertilizer_b_rp,
                    $r->energy_kwh,$r->electricity_rp,$r->unmetered_pump_events,
                    $r->pzem_voltage_v,$r->pzem_current_a,$r->pzem_power_w,
                    $r->pzem_meter_total_kwh,$r->pzem_consumption_kwh,$r->pzem_electricity_rp,
                ];
                $this->outputRow($h, $row, array_keys($row));
            }
            fclose($h);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Cache-Control' => 'no-store',
        ]);
    }
}
