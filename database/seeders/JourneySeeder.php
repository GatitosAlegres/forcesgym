<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Journey;

class JourneySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $journeys = ['Mañana', 'Tarde', 'Noche'];

        foreach ($journeys as $journey) {
            Journey::create([
                'name' => $journey,
            ]);
        }
    }
}
