<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AtanRealSeeder extends Seeder
{
    public function run()
    {
        // Mundurkan waktu 10 hari ke belakang agar syarat $ready >= 7 terpenuhi
        $startDate = now()->subDays(10);
        
        for ($i = 1; $i <= 10; $i++) {
            $date = $startDate->copy()->addDays($i);
            
            // 1. Seed PZEM (Listrik)
            DB::table('atan_pzem_readings')->insert([
                'sample_id'      => 'PZEM-DUMMY-' . $i . '-' . time(),
                'sensor_log_id'  => $i, 
                'voltage_v'      => 220.0 + (rand(-50, 50) / 10),
                'current_a'      => rand(10, 50) / 10,
                'power_w'        => rand(50, 500),
                'total_kwh'      => $i * 0.5,
                'electricity_rp' => rand(1000, 3000),
                'delta_kwh'      => rand(10, 30) / 100,
                'created_at'     => $date,
                'updated_at'     => $date,
            ]);

            // Hitung biaya untuk nutrient batches
            $waterRp = rand(1500, 3000);
            $fertARp = rand(2000, 4000);
            $fertBRp = rand(2000, 4000);
            $totalRp = $waterRp + $fertARp + $fertBRp;

            // 2. Seed Nutrient Batches (Untuk Finance Forecast)
            DB::table('atan_nutrient_batches')->insert([
                'batch_id'        => 'BATCH-DUMMY-' . $i . '-' . time(),
                'recipe_snapshot' => json_encode([
                    'water_l' => 100,
                    'water_price_rp_l' => 15,
                    'items' => [
                        ['group' => 'A', 'name' => 'AB Mix A', 'package_price_rp' => 150000, 'package_qty' => 1000, 'unit' => 'ml', 'used_qty' => 50],
                        ['group' => 'B', 'name' => 'AB Mix B', 'package_price_rp' => 150000, 'package_qty' => 1000, 'unit' => 'ml', 'used_qty' => 50]
                    ]
                ]),
                'water_rp'        => $waterRp,
                'fertilizer_a_rp' => $fertARp,
                'fertilizer_b_rp' => $fertBRp,
                'total_rp'        => $totalRp, // Penambahan kolom total_rp
                'water_l'         => 100,      // Penambahan kolom water_l
                'created_at'      => $date,
                'updated_at'      => $date,
            ]);

            // 3. Seed Cost Events (Untuk Rekap Cost Aktual)
            DB::table('atan_cost_events')->insert([
                [
                    'event_id'       => 'EVT-WATER-' . $i . '-' . time(),
                    'device_id'      => 'ESP32-S3',
                    'equipment'      => 'pump_water',
                    'duration_ms'    => 5000,
                    'power_w'        => null,
                    'energy_kwh'     => null,
                    'electricity_rp' => null,
                    'volume_l'       => 5,
                    'fluid_type'     => 'water',
                    'fluid_rp'       => 2500,
                    'created_at'     => $date,
                    'updated_at'     => $date,
                ],
                [
                    'event_id'       => 'EVT-FERT-' . $i . '-' . time(),
                    'device_id'      => 'ESP32-S3',
                    'equipment'      => 'pump_1',
                    'duration_ms'    => 2000,
                    'power_w'        => 2.17,
                    'energy_kwh'     => 0.001,
                    'electricity_rp' => 1.4,
                    'volume_l'       => 0.5,
                    'fluid_type'     => 'fertilizer',
                    'fluid_rp'       => 5000,
                    'created_at'     => $date,
                    'updated_at'     => $date,
                ]
            ]);
        }
    }
}