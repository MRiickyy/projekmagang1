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
                'category' => 'Presenter',
                'usd_early_bird' => 650,
                'usd_reguler' => 100,
                'event_id' => 1
            ],
            [
                'category' => 'Participants Non-Presenter',
                'usd_early_bird' => 750,
                'usd_reguler' => 100,
                'event_id' => 1
            ],
        ]);
    }
}
