<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    
    public function run(): void
    {
        $event = Event::firstOrCreate([
            'name' => 'SAIN IJAIN',
            'year' => 2025,
            'main_title' => 'The 8th International SAIN',
            'subtitle' => 'Symposium on Advanced Intelligent Informatics (SAIN) Internasional Journal of Advances in Intelligent Informatics (IJAIN)',
            'location' => 'Seoul, Korea (Hybrid)',
            'date_range' => '12–13 December 2025',
            'event_time' => '06:00:00',
            'register_link' => '/newacc',
            'submit_link' => '/login',
        ]);
        $event = Event::firstOrCreate([
            'name' => 'SAIN IJAIN',
            'year' => 2024,
            'main_title' => 'THE 12TH ICOICT',
            'subtitle' => 'International Conference on Information and Communication Technology',
            'location' => 'Bali (Hybrid)',
            'date_range' => '25–26 July 2024',
            'event_time' => '09:00:00',
            'register_link' => '/newacc',
            'submit_link' => '/login',
        ]);
    }
}