<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContractDuration;

class ContractDurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contractDurations = ['3 meses', '6 meses', '1 año', '2 años', 'Indefinido'];

        foreach ($contractDurations as $contractDuration) {
            ContractDuration::create([
                'name' => $contractDuration,
            ]);
        }
    }
}
