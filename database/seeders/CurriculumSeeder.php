<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurriculumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $c1 = \App\Models\Curriculum::create([
            'user_id' => 2,
            'link' => 'drive.google.com/curriculum1',
            'fecha' => '2023-07-023',
        ]);

        $c2= \App\Models\Curriculum::create([
            'user_id' => 3,
            'link' => 'drive.google.com/curriculum2',
            'fecha' => '2023-07-023',
        ]);
    }
}
