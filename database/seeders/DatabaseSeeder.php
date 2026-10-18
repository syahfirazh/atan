<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([

            /*
             * Data histori sensor greenhouse.
             */
            SensorLogDummySeeder::class,

            /*
             * Kondisi awal aktuator.
             */
            DeviceControlSeeder::class,

        ]);
    }
}