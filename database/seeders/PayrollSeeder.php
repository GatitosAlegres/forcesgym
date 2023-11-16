<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Payroll;

class PayrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::where('payroll', true)->get();

        foreach ($employees as $employee) {
            Payroll::create([
                'employee_id' => $employee->id,
                'salary' => rand(1025, 3100), // Puedes ajustar esto según tus necesidades
                'date_start' => now(), // Puedes ajustar esto según tus necesidades
                'date_end' => now()->addMonths(6), // Puedes ajustar esto según tus necesidades
            ]);
        }
    }
}
