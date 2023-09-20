<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create filament admin user from .env
        $admin = \App\Models\User::create([
            'name' => env('FILAMENT_ADMIN_NAME'),
            'email' => env('FILAMENT_ADMIN_EMAIL'),
            'password' => bcrypt(env('FILAMENT_ADMIN_PASSWORD')),
        ]);

        // Assign admin role to admin user
        $admin->assignRole('admin');

        $this->call(CandidatoSeeder::class);
    }
}
