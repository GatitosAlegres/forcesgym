<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Fee;

class FeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::where('fee', true)->get();

        foreach ($employees as $employee) {
            Fee::create([
                'employee_id' => $employee->id,
                'salary' => rand(400, 800), // Puedes ajustar esto según tus necesidades
                'date_start' => now(), // Puedes ajustar esto según tus necesidades
                'date_end' => now()->addMonths(6), // Puedes ajustar esto según tus necesidades
                'training' => rand(0, 1) === 1 ? true : false,
            ]);
        }
    }
}
