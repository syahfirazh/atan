<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DeviceControlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('device_controls')->delete();

        DB::table('device_controls')->insert([

            /*
             * Predictive-adaptive mode.
             */
            'mode' => 'auto',

            /*
             * Valve awal.
             */
            'valve_a' => false,
            'valve_b' => false,
            'valve_c' => false,
            'valve_d' => false,
            'valve_e' => true,
            'valve_f' => false,
            'valve_g' => false,

            /*
             * Pompa air aktif karena Valve E terbuka.
             */
            'pump_water' => true,

            /*
             * Fertigasi standby.
             */
            'pump_fertilizer' => false,

            /*
             * Misting standby.
             */
            'misting' => false,

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}