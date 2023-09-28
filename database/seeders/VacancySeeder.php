<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vacancy;

class VacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vacancies = ['Personal de limpieza', 'Entrenador', 'Nutricionista', 'Recepcionista'];

        foreach ($vacancies as $vacancy) {
            Vacancy::create([
                'name' => $vacancy,
            ]);
        }
    }
}
