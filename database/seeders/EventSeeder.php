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
            'name' => 'ICOICT',
            'year' => 2025,
            'main_title' => 'THE 13TH ICOICT',
            'subtitle' => 'International Conference on Information and Communication Technology',
            'location' => 'Bandung (Hybrid)',
            'date_range' => '30–31 July 2025',
            'register_link' => '/newacc',
            'submit_link' => '/login',
        ]);
        $event = Event::firstOrCreate([
            'name' => 'ICOICT',
            'year' => 2024,
            'main_title' => 'THE 12TH ICOICT',
            'subtitle' => 'International Conference on Information and Communication Technology',
            'location' => 'Bali (Hybrid)',
            'date_range' => '25–26 July 2024',
            'register_link' => '/newacc',
            'submit_link' => '/login',
        ]);
    }
}