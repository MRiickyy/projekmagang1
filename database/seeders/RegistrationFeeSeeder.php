<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrationFeeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('registration_fees')->truncate(); // kosongkan dulu

        DB::table('registration_fees')->insert([
            [
                'category' => 'IEEE Member',
                'usd_physical' => 400,
                'idr_physical' => 4700000,
                'usd_online' => 300,
                'idr_online' => 4000000,
                'event_year' => 2025
            ],
            [
                'category' => 'Non-IEEE Member',
                'usd_physical' => 450,
                'idr_physical' => 5700000,
                'usd_online' => 350,
                'idr_online' => 5000000,
                'event_year' => 2025
            ],
            [
                'category' => 'Student IEEE Member',
                'usd_physical' => 300,
                'idr_physical' => 4000000,
                'usd_online' => 250,
                'idr_online' => 3000000,
                'event_year' => 2025
            ],
            [
                'category' => 'Student Non-IEEE Member',
                'usd_physical' => 330,
                'idr_physical' => 4500000,
                'usd_online' => 280,
                'idr_online' => 3500000,
                'event_year' => 2025
            ],
            [
                'category' => 'Non-Presenter',
                'usd_physical' => 150,
                'idr_physical' => 1500000,
                'usd_online' => 50,
                'idr_online' => 800000,
                'event_year' => 2025
            ],
            [
                'category' => 'Additional Page (fee for 1 page)',
                'usd_physical' => 40,
                'idr_physical' => 600000,
                'usd_online' => 40,
                'idr_online' => 600000,
                'event_year' => 2025
            ],
        ]);
    }
}
