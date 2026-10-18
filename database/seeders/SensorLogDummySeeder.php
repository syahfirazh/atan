<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SensorLogDummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | RESET DATA DUMMY
        |--------------------------------------------------------------------------
        */
        DB::table('sensor_logs')->delete();


        /*
        |--------------------------------------------------------------------------
        | KONFIGURASI
        |--------------------------------------------------------------------------
        |
        | 72 record
        | interval 5 menit
        | total histori ± 6 jam
        |
        */
        $totalRecords = 72;

        $startTime = Carbon::now()
            ->subMinutes(($totalRecords - 1) * 5);


        /*
        |--------------------------------------------------------------------------
        | NILAI AWAL SOIL MOISTURE
        |--------------------------------------------------------------------------
        */
        $soil = [
            'a' => 82,
            'b' => 78,
            'c' => 85,
            'd' => 80,
            'e' => 76,
            'f' => 84,
            'g' => 79,
        ];


        /*
        |--------------------------------------------------------------------------
        | TOTAL VOLUME AIR
        |--------------------------------------------------------------------------
        */
        $waterVolume = [
            'a' => 0,
            'b' => 0,
            'c' => 0,
            'd' => 0,
            'e' => 0,
            'f' => 0,
            'g' => 0,
        ];


        $irrigationRuntime = 0;


        for ($i = 0; $i < $totalRecords; $i++) {

            /*
            |--------------------------------------------------------------------------
            | SIMULASI WAKTU
            |--------------------------------------------------------------------------
            */
            $time = $startTime->copy()->addMinutes($i * 5);


            /*
            |--------------------------------------------------------------------------
            | SIMULASI LINGKUNGAN
            |--------------------------------------------------------------------------
            */

            // Suhu udara naik perlahan kemudian turun.
            $airTemp =
                27
                + (sin($i / 8) * 3)
                + (mt_rand(-5, 5) / 10);

            // Kelembapan udara berbanding terbalik dengan suhu.
            $airHumidity =
                74
                - (sin($i / 8) * 7)
                + mt_rand(-2, 2);

            // Suhu air lebih stabil.
            $waterTemp =
                24.5
                + (sin($i / 12) * 1.5)
                + (mt_rand(-3, 3) / 10);


            /*
            |--------------------------------------------------------------------------
            | KUALITAS AIR
            |--------------------------------------------------------------------------
            */

            $ph =
                6.2
                + (sin($i / 15) * 0.25)
                + (mt_rand(-5, 5) / 100);

            $ec =
                1.70
                + (sin($i / 18) * 0.18)
                + (mt_rand(-4, 4) / 100);

            /*
             * Simulasi TDS berdasarkan EC.
             */
            $tds = $ec * 500;


            /*
            |--------------------------------------------------------------------------
            | SOIL MOISTURE
            |--------------------------------------------------------------------------
            */

            $flow = [];

            foreach ($soil as $zone => $value) {

                /*
                 * Soil moisture turun secara alami.
                 */
                $soil[$zone] -= mt_rand(4, 10) / 10;


                /*
                 * Jika kelembapan mulai rendah,
                 * sistem melakukan irigasi.
                 */
                if ($soil[$zone] < 64) {

                    $flow[$zone] =
                        mt_rand(14, 20) / 10;

                    /*
                     * Efek irigasi menaikkan kelembapan.
                     */
                    $soil[$zone] += mt_rand(25, 40) / 10;

                    /*
                     * Hitung total volume air.
                     *
                     * flow = L/min
                     * interval = 5 menit
                     */
                    $waterVolume[$zone] +=
                        $flow[$zone] * 5;

                    $irrigationRuntime += 5;

                } else {

                    $flow[$zone] = 0;
                }


                /*
                 * Pastikan nilai 0 - 100.
                 */
                $soil[$zone] =
                    max(0, min(100, $soil[$zone]));
            }


            /*
            |--------------------------------------------------------------------------
            | ML PREDICTION
            |--------------------------------------------------------------------------
            |
            | Simulasi prediksi kelembapan 30 menit ke depan.
            |
            */

            $prediction = [];

            foreach ($soil as $zone => $value) {

                $drop =
                    mt_rand(25, 55) / 10;

                $prediction[$zone] =
                    max(
                        0,
                        min(
                            100,
                            $value - $drop
                        )
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | CARI ZONA PALING KRITIS
            |--------------------------------------------------------------------------
            */

            $lowestPrediction =
                min($prediction);

            $criticalZone =
                array_search(
                    $lowestPrediction,
                    $prediction
                );


            /*
            |--------------------------------------------------------------------------
            | ML DECISION
            |--------------------------------------------------------------------------
            */

            if ($lowestPrediction < 60) {

                $mlAction =
                    'Irrigation Recommended';

                $mlReason =
                    'Kelembapan Zone '
                    . strtoupper($criticalZone)
                    . ' diprediksi turun di bawah batas aman dalam 30 menit.';

                $mlDetail =
                    'Sistem merekomendasikan irigasi pada Zone '
                    . strtoupper($criticalZone)
                    . ' dan melakukan evaluasi ulang setelah aktuasi.';

            } elseif ($airTemp > 31) {

                $mlAction =
                    'Misting Recommended';

                $mlReason =
                    'Suhu udara greenhouse diprediksi berada di atas kondisi optimal.';

                $mlDetail =
                    'Aktifkan sistem misting untuk membantu menurunkan suhu mikroklimat.';

            } else {

                $mlAction =
                    'No Action Required';

                $mlReason =
                    'Kondisi greenhouse masih berada pada rentang yang relatif stabil.';

                $mlDetail =
                    'Sistem melanjutkan monitoring multisensor tanpa aktuasi tambahan.';
            }


            /*
            |--------------------------------------------------------------------------
            | WATER STATISTICS
            |--------------------------------------------------------------------------
            */

            $waterToday =
                array_sum($waterVolume);

            /*
             * Simulasi efisiensi air antara 82 - 94%.
             */
            $waterEfficiency =
                88
                + sin($i / 10) * 4;


            /*
            |--------------------------------------------------------------------------
            | INSERT DATABASE
            |--------------------------------------------------------------------------
            */

            DB::table('sensor_logs')->insert([

                /*
                 * Soil moisture
                 */
                'soil_a' => round($soil['a'], 2),
                'soil_b' => round($soil['b'], 2),
                'soil_c' => round($soil['c'], 2),
                'soil_d' => round($soil['d'], 2),
                'soil_e' => round($soil['e'], 2),
                'soil_f' => round($soil['f'], 2),
                'soil_g' => round($soil['g'], 2),


                /*
                 * Environment
                 */
                'water_temp' =>
                    round($waterTemp, 2),

                'air_temp' =>
                    round($airTemp, 2),

                'air_humidity' =>
                    round($airHumidity, 2),


                /*
                 * Water nutrient
                 */
                'ph' =>
                    round($ph, 2),

                'ec' =>
                    round($ec, 2),

                'tds' =>
                    round($tds, 2),

                'npk_status' =>
                    $i % 15 === 0
                        ? 'Normal'
                        : 'Last Sampling: Normal',


                /*
                 * Flow meter
                 */
                'flow_a' => round($flow['a'], 2),
                'flow_b' => round($flow['b'], 2),
                'flow_c' => round($flow['c'], 2),
                'flow_d' => round($flow['d'], 2),
                'flow_e' => round($flow['e'], 2),
                'flow_f' => round($flow['f'], 2),
                'flow_g' => round($flow['g'], 2),


                /*
                 * Water volume
                 */
                'water_a' =>
                    round($waterVolume['a'], 2),

                'water_b' =>
                    round($waterVolume['b'], 2),

                'water_c' =>
                    round($waterVolume['c'], 2),

                'water_d' =>
                    round($waterVolume['d'], 2),

                'water_e' =>
                    round($waterVolume['e'], 2),

                'water_f' =>
                    round($waterVolume['f'], 2),

                'water_g' =>
                    round($waterVolume['g'], 2),


                /*
                 * Predictions
                 */
                'pred_a' =>
                    round($prediction['a'], 2),

                'pred_b' =>
                    round($prediction['b'], 2),

                'pred_c' =>
                    round($prediction['c'], 2),

                'pred_d' =>
                    round($prediction['d'], 2),

                'pred_e' =>
                    round($prediction['e'], 2),

                'pred_f' =>
                    round($prediction['f'], 2),

                'pred_g' =>
                    round($prediction['g'], 2),


                /*
                 * ML decision engine
                 */
                'ml_zone' =>
                    strtoupper($criticalZone),

                'ml_prediction' =>
                    round($lowestPrediction, 2),

                'ml_confidence' =>
                    mt_rand(86, 96),

                'ml_action' =>
                    $mlAction,

                'ml_reason' =>
                    $mlReason,

                'ml_action_detail' =>
                    $mlDetail,


                /*
                 * Water analytics
                 */
                'water_today' =>
                    round($waterToday, 2),

                'water_efficiency' =>
                    round($waterEfficiency, 2),

                'irrigation_runtime' =>
                    $irrigationRuntime,


                /*
                 * Timestamp
                 */
                'created_at' =>
                    $time,

                'updated_at' =>
                    $time,
            ]);
        }
    }
}