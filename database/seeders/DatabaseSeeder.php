<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        $this->call(PermissionSeeder::class);

        $this->call(UserSeeder::class);



        $this->call(CategorySeeder::class);
        $this->call(VacanteSeeder::class);


        $this->call(TipoEvaluacionSeeder::class);

        $this->call(TipoPagoSeeder::class);

        $this->call(TipoClasesSeeder::class);
        $this->call(TipoDeMembresiaSeeder::class);

        $this->call(SupplierSeeder::class);

        $this->call(ProductSeeder::class);

        $this->call(CurriculumSeeder::class);

        $this->call(EntrevistaSeeder::class);
        $this->call(ClasesEntrenamientoSeeder::class);
    }
}
