<?php

namespace Database\Seeders;

use App\Models\Committee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommitteeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $committee = Committee::firstOrCreate([
            'name' => 'Fadiya',
            'role' => 'Chair',
            'university' => 'Ahmad Dahlan University',
            'country' => 'Indonesia',
            'type' => 'steering',
            'event_id' => 1
        ]);
    }
}
