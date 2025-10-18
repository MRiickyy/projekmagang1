<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            EventSeeder::class,
            SpeakerSeeder::class,
            CommitteeSeeder::class,
            TimelineSeeder::class,
            // ContactInfoSeeder::class,
            HomeContentSeeder::class,
            // MapLocationSeeder::class,
            AuthorInformationSeeder::class,
            // RegistrationSeeder::class,
            // RegistrationFeeSeeder::class,
            // PaymentMethodsSeeder::class,
            CallPaperSeeder::class,
            // LoginAdminSeeder::class,
            // tambahkan seeder lain di sini
        ]);

        // User::factory()->create([
        //     'name' => 'icoict2025',
        //     'email' => 'icoict@gmail.com',
        //     'password' => bcrypt('icoict2025'),
        // ]);
    }
}