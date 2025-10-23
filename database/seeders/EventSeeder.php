<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $event = Event::firstOrCreate([
            'name' => 'ICOICT',
            'year' => 2025,
        ]);
        $event = Event::firstOrCreate([
            'name' => 'ICOICT',
            'year' => 2024,
        ]);
    }
}
