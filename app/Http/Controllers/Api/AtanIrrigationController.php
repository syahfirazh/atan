<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtanIrrigationController extends Controller
{
    /**
     * Menerima data log penyiraman dari ESP32
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk dari ESP32
        $validated = $request->validate([
            'device_id'       => 'required|string',
            'event_id'        => 'required|string',
            'fase_tanam'      => 'required|integer',
            'air_keluar_ml'   => 'required|numeric',
            'pupuk_keluar_ml' => 'required|numeric',
            'tds_final_ppm'   => 'nullable|numeric',
            'ph_final'        => 'nullable|numeric',
        ]);

        // Asumsi harga dasar (Rp 5/mL air, Rp 50/mL pupuk)
        $hargaAirPerMl = 5;
        $hargaPupukPerMl = 50;

        // Hitung total biaya aktual untuk 1x penyiraman ini
        $totalBiaya = ($validated['air_keluar_ml'] * $hargaAirPerMl) + 
                      ($validated['pupuk_keluar_ml'] * $hargaPupukPerMl);

        // Simpan ke database (tabel log_siram)
        DB::table('log_siram')->insert([
            'device_id'       => $validated['device_id'],
            'event_id'        => $validated['event_id'],
            'fase_tanam'      => $validated['fase_tanam'],
            'air_keluar_ml'   => $validated['air_keluar_ml'],
            'pupuk_keluar_ml' => $validated['pupuk_keluar_ml'],
            'total_biaya_rp'  => $totalBiaya,
            'tds_final_ppm'   => $validated['tds_final_ppm'],
            'ph_final'        => $validated['ph_final'],
            'created_at'      => now(),
            'updated_at'      => now(),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Log penyiraman berhasil dicatat',
            'total_biaya' => $totalBiaya
        ], 201);
    }

    /**
     * Mengirimkan data rekap untuk ditampilkan di Dashboard Frontend
     */
    public function latest()
    {
        $batchHariIni = \Illuminate\Support\Facades\DB::table('log_siram')->whereDate('created_at', today())->count();
        $pupukHariIni = \Illuminate\Support\Facades\DB::table('log_siram')->whereDate('created_at', today())->sum('pupuk_keluar_ml');
        
        $totalBatch = \Illuminate\Support\Facades\DB::table('log_siram')->count();
        $totalPupuk = \Illuminate\Support\Facades\DB::table('log_siram')->sum('pupuk_keluar_ml');

        $proyeksiML = \Illuminate\Support\Facades\DB::table('atan_irrigation_events')
            ->orderBy('id', 'desc')
            ->value('proyeksi_pupuk_30_hari_ml') ?? 0;

        return response()->json([
            'status' => 'success',
            'data' => [
                'batch_hari_ini'      => $batchHariIni,
                'pupuk_hari_ini_ml'   => $pupukHariIni,
                'total_batch'         => $totalBatch,
                'total_pupuk_ml'      => $totalPupuk,
                'proyeksi_30_hari_ml' => $proyeksiML
            ]
        ]);
    }
}