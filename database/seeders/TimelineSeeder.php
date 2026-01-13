<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimelineSeeder extends Seeder
{
    public function run(): void
    {
        
        DB::table('timelines')->insert([
            // === Round 1 ===
            [
                'round_number' => 1,
                'date' => '2025-09-15',
                'title' => 'Full paper submission deadline',
                'event_id' => 1,
            ],
            [
                'round_number' => 1,
                'date' => '2025-09-30',
                'title' => 'Full paper acceptance notification',
                'event_id' => 1,
            ],
        ]);
    }
}