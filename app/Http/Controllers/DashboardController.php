<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class DashboardController extends Controller
{
    /**
     * =========================================================
     * HALAMAN DASHBOARD
     * =========================================================
     */
    public function index()
    {
        /*
         * Kalau dashboard tidak lagi memakai profil anggota tim,
         * cukup langsung return view.
         */

        return view('dashboard');
    }


    /**
     * =========================================================
     * LIVE DATA
     * =========================================================
     *
     * Endpoint:
     * GET /live-data
     *
     * Digunakan dashboard AJAX setiap ±3 detik.
     */
    public function getLiveData()
    {
        /*
         * Ambil data sensor terbaru.
         */
        $latest = DB::table('sensor_logs')
            ->orderByDesc('created_at')
            ->first();


        /*
         * Ambil histori untuk grafik.
         *
         * Kita ambil 30 data terakhir,
         * kemudian dibalik supaya urut dari lama → terbaru.
         */
        $history = DB::table('sensor_logs')
            ->orderByDesc('created_at')
            ->limit(30)
            ->get()
            ->reverse()
            ->values();


        /*
         * Ambil kondisi aktuator terbaru.
         */
        $control = DB::table('device_controls')
            ->orderByDesc('id')
            ->first();


        /*
         * Buat event/decision history dari data sensor terakhir.
         *
         * Saat nanti sudah ada tabel khusus decision_logs,
         * bagian ini bisa dipindahkan ke tabel tersebut.
         */
        $decisions = DB::table('sensor_logs')
            ->whereNotNull('ml_action')
            ->orderByDesc('created_at')
            ->limit(6)
            ->get()
            ->map(function ($item) {

                return [
                    'time' => date(
                        'H:i',
                        strtotime($item->created_at)
                    ),

                    'zone' => $item->ml_zone
                        ? 'Z' . strtoupper($item->ml_zone)
                        : '-',

                    'decision' => $item->ml_action
                        ?? 'Monitoring',

                    'reason' => $item->ml_reason
                        ?? '-',

                    'source' => 'ML / EDGE',

                    'status' => 'COMPLETED',
                ];
            });


        return response()->json([

            /*
             * Sensor terbaru.
             */
            'latest' => $latest,

            /*
             * Kondisi aktuator.
             */
            'control' => $control,

            /*
             * Grafik historis.
             */
            'history' => $history,

            /*
             * Log keputusan ML.
             */
            'decisions' => $decisions,

        ]);
    }


    /**
     * =========================================================
     * UPDATE CONTROL
     * =========================================================
     *
     * POST /api/controls/update
     */
    public function updateControl(Request $request)
    {
        /*
         * Ambil record device control.
         *
         * Pada rancangan sekarang kita hanya membutuhkan
         * satu record sebagai status aktuator terkini.
         */
        $control = DB::table('device_controls')
            ->orderByDesc('id')
            ->first();


        /*
         * Jika belum ada record sama sekali,
         * buat record default.
         */
        if (!$control) {

            $id = DB::table('device_controls')->insertGetId([

                'mode' => 'auto',

                'valve_a' => false,
                'valve_b' => false,
                'valve_c' => false,
                'valve_d' => false,
                'valve_e' => false,
                'valve_f' => false,
                'valve_g' => false,

                'pump_water' => false,
                'pump_fertilizer' => false,
                'misting' => false,

                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $control = DB::table('device_controls')
                ->where('id', $id)
                ->first();
        }


        /*
         * Field yang boleh diperbarui dari dashboard.
         */
        $allowedFields = [

            'mode',

            'valve_a',
            'valve_b',
            'valve_c',
            'valve_d',
            'valve_e',
            'valve_f',
            'valve_g',

            'pump_water',
            'pump_fertilizer',

            'misting',
        ];


        $updateData = [];


        foreach ($allowedFields as $field) {

            if ($request->has($field)) {

                /*
                 * Mode hanya boleh auto/manual.
                 */
                if ($field === 'mode') {

                    if (
                        in_array(
                            $request->input('mode'),
                            ['auto', 'manual']
                        )
                    ) {

                        $updateData['mode'] =
                            $request->input('mode');
                    }

                    continue;
                }


                /*
                 * Semua field aktuator disimpan boolean.
                 */
                $updateData[$field] =
                    $request->boolean($field);
            }
        }


        /*
         * Tidak ada field valid.
         */
        if (empty($updateData)) {

            return response()->json([

                'success' => false,

                'message' =>
                    'Tidak ada parameter kontrol yang valid.',

            ], 422);
        }


        $updateData['updated_at'] = now();


        /*
         * Update record terakhir.
         */
        DB::table('device_controls')
            ->where('id', $control->id)
            ->update($updateData);


        /*
         * Ambil kondisi terbaru setelah update.
         */
        $updatedControl =
            DB::table('device_controls')
                ->where('id', $control->id)
                ->first();


        return response()->json([

            'success' => true,

            'message' =>
                'Status perangkat berhasil diperbarui.',

            'control' =>
                $updatedControl,

        ]);
    }


    /**
     * =========================================================
     * EXPORT CSV
     * =========================================================
     */
    public function exportCSV()
    {
        $logs = DB::table('sensor_logs')
            ->orderByDesc('created_at')
            ->get();


        $filename =
            'atan_si_tatanen_sensor_logs_'
            . now()->format('Y-m-d_H-i-s')
            . '.csv';


        $headers = [

            'Content-Type' =>
                'text/csv',

            'Content-Disposition' =>
                'attachment; filename="' . $filename . '"',

        ];


        $callback = function () use ($logs) {

            $file =
                fopen('php://output', 'w');


            /*
             * Header CSV.
             */
            fputcsv($file, [

                'Timestamp',

                'Soil A',
                'Soil B',
                'Soil C',
                'Soil D',
                'Soil E',
                'Soil F',
                'Soil G',

                'Water Temp',
                'Air Temp',
                'Air Humidity',

                'pH',
                'EC',
                'TDS',

                'Flow A',
                'Flow B',
                'Flow C',
                'Flow D',
                'Flow E',
                'Flow F',
                'Flow G',

                'Pred A',
                'Pred B',
                'Pred C',
                'Pred D',
                'Pred E',
                'Pred F',
                'Pred G',

                'ML Zone',
                'ML Prediction',
                'ML Confidence',
                'ML Action',

                'Water Today',
                'Water Efficiency',
                'Irrigation Runtime',

            ]);


            foreach ($logs as $log) {

                fputcsv($file, [

                    $log->created_at,

                    $log->soil_a,
                    $log->soil_b,
                    $log->soil_c,
                    $log->soil_d,
                    $log->soil_e,
                    $log->soil_f,
                    $log->soil_g,

                    $log->water_temp,
                    $log->air_temp,
                    $log->air_humidity,

                    $log->ph,
                    $log->ec,
                    $log->tds,

                    $log->flow_a,
                    $log->flow_b,
                    $log->flow_c,
                    $log->flow_d,
                    $log->flow_e,
                    $log->flow_f,
                    $log->flow_g,

                    $log->pred_a,
                    $log->pred_b,
                    $log->pred_c,
                    $log->pred_d,
                    $log->pred_e,
                    $log->pred_f,
                    $log->pred_g,

                    $log->ml_zone,
                    $log->ml_prediction,
                    $log->ml_confidence,
                    $log->ml_action,

                    $log->water_today,
                    $log->water_efficiency,
                    $log->irrigation_runtime,

                ]);
            }


            fclose($file);
        };


        return response()->stream(
            $callback,
            200,
            $headers
        );
    }


    /**
     * =========================================================
     * EXPORT EXCEL
     * =========================================================
     *
     * Sementara kita arahkan ke CSV dulu.
     * Kalau nanti memakai Laravel Excel/Maatwebsite,
     * fungsi ini bisa dibuat file XLSX sebenarnya.
     */
    public function exportExcel()
    {
        return $this->exportCSV();
    }
}