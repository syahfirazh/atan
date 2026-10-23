<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LogSiramSeeder extends Seeder
{
    public function run()
    {
        // Asumsi harga dari konfigurasi nutrisi
        $hargaAirPerMl = 5;    // Rp 5 per mL
        $hargaPupukPerMl = 50; // Rp 50 per mL
        
        $data = [];
        // Set tanggal mulai tanam (contoh: 1 Agustus 2026)
        $startDate = Carbon::create(2026, 8, 1);
        
        // Simulasi 120 Hari Masa Tanam
        for ($hari = 1; $hari <= 120; $hari++) {
            // Tentukan fase berdasarkan umur hari
            $fase = 1;
            if ($hari > 30 && $hari <= 60) $fase = 2;
            elseif ($hari > 60 && $hari <= 90) $fase = 3;
            elseif ($hari > 90) $fase = 4;

            // Fluktuasi acak untuk mensimulasikan koreksi NPK/TDS mesin
            $randomAirKoreksi = rand(-50, 150); 
            $randomPupukKoreksi = rand(-2, 5) + ($fase * 0.5);

            // Dosis dasar proporsional terhadap fase
            $airKeluarMl = (500 * $fase) + $randomAirKoreksi;
            $pupukKeluarMl = (5 * $fase) + $randomPupukKoreksi;
            
            // Cegah angka negatif
            $airKeluarMl = max(500, $airKeluarMl);
            $pupukKeluarMl = max(0, $pupukKeluarMl);

            // Hitung Biaya
            $biayaAir = $airKeluarMl * $hargaAirPerMl;
            $biayaPupuk = $pupukKeluarMl * $hargaPupukPerMl;
            $totalBiaya = $biayaAir + $biayaPupuk;

            $data[] = [
                'device_id' => 'ESP32-S3-ATAN',
                'event_id' => 'BATCH-DUMMY-' . str_pad($hari, 3, '0', STR_PAD_LEFT),
                'fase_tanam' => $fase,
                'air_keluar_ml' => round($airKeluarMl, 2),
                'pupuk_keluar_ml' => round($pupukKeluarMl, 2),
                'total_biaya_rp' => round($totalBiaya, 2),
                'tds_final_ppm' => (400 * $fase) + rand(-15, 15),
                'ph_final' => 6.0 + (rand(-5, 5) / 10),
                // Majukan tanggal sebanyak $hari
                'created_at' => $startDate->copy()->addDays($hari - 1)->format('Y-m-d H:i:s'),
                'updated_at' => $startDate->copy()->addDays($hari - 1)->format('Y-m-d H:i:s'),
            ];
        }

        // Masukkan semua data ke tabel secara batch
        DB::table('log_siram')->insert($data);
    }
}