<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\EvaluationType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(ShieldSeeder::class);

        //$this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);

        $this->call(CandidatoSeeder::class);

        //$this->call(MembresiasSeeder::class);

        $this->call(CategorySeeder::class);

        $this->call(VacancySeeder::class);

        $this->call(TipoClasesSeeder::class);

        $this->call(TipoDeMembresiaSeeder::class);

        $this->call(SupplierSeeder::class);

        $this->call(ProductSeeder::class);

        $this->call(ClasesEntrenamientoSeeder::class);
    
        $this->call(GenderSeeder::class);

        $this->call(EvaluationTypeSeeder::class);

        $this->call(DaySeeder::class);

        $this->call(JourneySeeder::class);
    }
}
