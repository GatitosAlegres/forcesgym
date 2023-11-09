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

        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);

        $this->call(VacancySeeder::class);

        $this->call(GenderSeeder::class);

        $this->call(DaySeeder::class);

        $this->call(ContractDurationSeeder::class);

        $this->call(MembershipTypeSeeder::class);

        $this->call(MembershipSeeder::class);

        $this->call(CategorySeeder::class);

        $this->call(ClassTypeSeeder::class);


        $this->call(SupplierSeeder::class);

        $this->call(ProductSeeder::class);

        //$this->call(TrainingClassSeeder::class);

        $this->call(EvaluationTypeSeeder::class);

        $this->call(JourneySeeder::class);

        $this->call(ProductRecordSheetSeeder::class);

        $this->call(PayrollTypeSeeder::class);

        $this->call(CandidateSeeder::class);

        $this->call(EmployeeSeeder::class);

        $this->call(EvaluationSeeder::class);

        $this->call(InvoiceSeeder::class);

        $this->call(RemisionGuideSeeder::class);

        $this->call(WarrantySeeder::class);

        $this->call(PurchaseSeeder::class);

        $this->call(CustomerSeeder::class);

        $this->call(SaleSeeder::class);

        $this->call(TrainingClassSeeder::class);

    }
}
