<?php

namespace Database\Seeders;

use App\Models\RemisionGuide;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RemisionGuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RemisionGuide::factory([
            'according' => true,
        ])
            ->count(50)
            ->create();
    }
}
