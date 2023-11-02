<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\EvaluationType;
use App\Models\MembershipType;
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

        $this->call(VacancySeeder::class);

        $this->call(GenderSeeder::class);

        $this->call(JourneySeeder::class);

        $this->call(DaySeeder::class);

        $this->call(ContractDurationSeeder::class);

        $this->call(CandidateSeeder::class);

        //$this->call(MembershipSeeder::class);

        $this->call(CategorySeeder::class);

        $this->call(ClassTypeSeeder::class);

        $this->call(MembershipTypeSeeder::class);

        $this->call(SupplierSeeder::class);

        $this->call(ProductSeeder::class);

        //$this->call(TrainingClassSeeder::class);

        $this->call(EvaluationTypeSeeder::class);


<<<<<<< HEAD
        $this->call(JourneySeeder::class);

        $this->call(ProductRecordSheetSeeder::class);
=======
        $this->call(PayrollTypeSeeder::class);

        $this->call(CandidateSeeder::class);

        $this->call(EmployeeSeeder::class);
>>>>>>> master
    }
}
