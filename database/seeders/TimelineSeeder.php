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
                'date' => '2025-12-15',
                'title' => 'Paper Submission Deadline',
                'event_year' => 2025,
            ],
            [
                'round_number' => 1,
                'date' => '2025-01-31',
                'title' => 'Notification of Papers Acceptance',
                'event_year' => 2025,
            ],
            [
                'round_number' => 1,
                'date' => '2025-02-28',
                'title' => 'Registration Deadline',
                'event_year' => 2025,
            ],
            [
                'round_number' => 1,
                'date' => '2025-03-15',
                'title' => 'Camera-Ready Submissions',
                'event_year' => 2025,
            ],

            // === Round 2 ===
            [
                'round_number' => 2,
                'date' => '2025-04-15',
                'title' => 'Paper Submission Deadline | Round 2',
                'event_year' => 2025,
            ],
            [
                'round_number' => 2,
                'date' => '2025-05-21',
                'title' => 'Notification of Papers Acceptance',
                'event_year' => 2025,
            ],
            [
                'round_number' => 2,
                'date' => '2025-06-15',
                'title' => 'Registration Deadline',
                'event_year' => 2025,
            ],
            [
                'round_number' => 2,
                'date' => '2025-06-30',
                'title' => 'Camera-Ready Submissions',
                'event_year' => 2025,
            ],
        ]);
    }
}