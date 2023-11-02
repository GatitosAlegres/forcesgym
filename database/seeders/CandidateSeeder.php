<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Candidate;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Candidate::create([
            'vacancy_id' => rand(1, 4),
            'gender_id' => 1,
            'journey_id' => rand(1, 2),
            'day_id' => rand(1, 4),
            'contract_duration_id' => rand(1, 5),
            'dni' => strval(rand(10000000, 99999999)),
            'firstname' => "Juan Carlos",
            'lastname' => "Perez Perez",
            'email' => strtolower("juancarlos") . '@gmail.com',
            'phone' => strval(rand(900000000, 999999999)),
            'address' => 'Av. Jiron Prado - Calle 1',
            'curriculum_url' => 'curriculum.pdf',
        ]);

        Candidate::create([
            'vacancy_id' => rand(1, 4),
            'gender_id' => 2,
            'journey_id' => rand(1, 2),
            'day_id' => rand(1, 4),
            'contract_duration_id' => rand(1, 5),
            'dni' => strval(rand(10000000, 99999999)),
            'firstname' => "Sofia Maria",
            'lastname' => "Barrios Espinoza",
            'email' => strtolower("sofiabarrios") . '@gmail.com',
            'phone' => strval(rand(900000000, 999999999)),
            'address' => 'Jr. Almagro 223',
            'curriculum_url' => 'curriculum.pdf',
        ]);
    }
}
