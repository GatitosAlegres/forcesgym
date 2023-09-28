<?php

namespace Database\Seeders;

use App\Models\User;
use BezhanSalleh\FilamentShield\Facades\FilamentShield;
use BezhanSalleh\FilamentShield\Support\Utils;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create filament admin user from .env
        $super_admin = User::create([
            'name' => env('FILAMENT_ADMIN_NAME'),
            'email' => env('FILAMENT_ADMIN_EMAIL'),
            'password' => bcrypt(env('FILAMENT_ADMIN_PASSWORD')),
        ]);

        $super_admin->assignRole(Utils::getSuperAdminName());

        if (Utils::isFilamentUserRoleEnabled()) {

            if (Utils::getRoleModel()::whereName(Utils::getFilamentUserRoleName())->doesntExist()) {

                FilamentShield::createRole(isSuperAdmin: false);
            }

            $super_admin->assignRole(Utils::getFilamentUserRoleName());
        }
    }
}
