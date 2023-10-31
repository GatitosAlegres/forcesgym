<?php

namespace Database\Seeders;

use App\Models\PayrollType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PayrollTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payrolls = ['CTS', 'Gratificación', 'Vacaciones', 'Utilidades', 'Asignación familiar'];

        foreach ($payrolls as $payroll) {
            PayrollType::create([
                'name' => $payroll,
            ]);
        }
    }
}
