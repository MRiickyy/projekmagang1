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
                'timeline_number' => 1,
                'month' => 'DECEMBER',
                'date' => '31',
                'year' => '2024',
                'title' => 'Paper Submission Deadline',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'timeline_number' => 1,
                'month' => 'JANUARY',
                'date' => '31',
                'year' => '2025',
                'title' => 'Notification of Papers Acceptance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'timeline_number' => 1,
                'month' => 'FEBRUARY',
                'date' => '28',
                'year' => '2025',
                'title' => 'Registration Deadline',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'timeline_number' => 1,
                'month' => 'MARCH',
                'date' => '15',
                'year' => '2025',
                'title' => 'Camera-Ready Submissions',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // === Round 2 ===
            [
                'timeline_number' => 2,
                'month' => 'APRIL',
                'date' => '15',
                'year' => '2025',
                'title' => 'Paper Submission Deadline | Round 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'timeline_number' => 2,
                'month' => 'MAY',
                'date' => '21',
                'year' => '2025',
                'title' => 'Notification of Papers Acceptance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'timeline_number' => 2,
                'month' => 'JUNE',
                'date' => '15',
                'year' => '2025',
                'title' => 'Registration Deadline',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'timeline_number' => 2,
                'month' => 'JUNE',
                'date' => '30',
                'year' => '2025',
                'title' => 'Camera-Ready Submissions',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}