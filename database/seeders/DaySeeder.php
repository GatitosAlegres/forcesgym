<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = [
            "Lunes - viernes: 6:30 am a 2:30 pm", 
            "Lunes - Viernes: 2:00 pm a 10:00 pm", 
            "Lunes - Viernes: 8:00 am a 12:00 pm",
            "Lunes - Viernes: 2:00 pm a 6:00 pm",

        ];

        foreach ($days as $day) {
            Day::create([
                'day' => $day,
            ]);
        }
    }
}
