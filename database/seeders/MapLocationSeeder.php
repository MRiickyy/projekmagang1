<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MapLocation;

class MapLocationSeeder extends Seeder
{
    public function run(): void
    {
        MapLocation::create([
            'title' => 'Bandung Office',
            'link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63363.17630783987!2d107.5731166!3d-6.9034443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7d2e5c4e2df%3A0x301e8f1fc28da30!2sBandung%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1700000000000',
        ]);
    }
}