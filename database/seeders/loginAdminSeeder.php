<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginAdminSeeder extends Seeder
{
  
    public function run(): void
    {
        if (DB::table('admins_login')->count() === 0) {
            DB::table('admins_login')->insert([
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

}