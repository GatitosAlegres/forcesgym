<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use BezhanSalleh\FilamentShield\Support\Utils;
class ShieldSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $rolesWithPermissions = '[{"name":"super_admin","guard_name":"web","permissions":["view_assistance","view_any_assistance","create_assistance","update_assistance","restore_assistance","restore_any_assistance","replicate_assistance","reorder_assistance","delete_assistance","delete_any_assistance","force_delete_assistance","force_delete_any_assistance","view_assistance::detail","view_any_assistance::detail","create_assistance::detail","update_assistance::detail","restore_assistance::detail","restore_any_assistance::detail","replicate_assistance::detail","reorder_assistance::detail","delete_assistance::detail","delete_any_assistance::detail","force_delete_assistance::detail","force_delete_any_assistance::detail","view_candidate","view_any_candidate","create_candidate","update_candidate","restore_candidate","restore_any_candidate","replicate_candidate","reorder_candidate","delete_candidate","delete_any_candidate","force_delete_candidate","force_delete_any_candidate","view_category","view_any_category","create_category","update_category","restore_category","restore_any_category","replicate_category","reorder_category","delete_category","delete_any_category","force_delete_category","force_delete_any_category","view_class::type","view_any_class::type","create_class::type","update_class::type","restore_class::type","restore_any_class::type","replicate_class::type","reorder_class::type","delete_class::type","delete_any_class::type","force_delete_class::type","force_delete_any_class::type","view_credit::note","view_any_credit::note","create_credit::note","update_credit::note","restore_credit::note","restore_any_credit::note","replicate_credit::note","reorder_credit::note","delete_credit::note","delete_any_credit::note","force_delete_credit::note","force_delete_any_credit::note","view_customer","view_any_customer","create_customer","update_customer","restore_customer","restore_any_customer","replicate_customer","reorder_customer","delete_customer","delete_any_customer","force_delete_customer","force_delete_any_customer","view_discount","view_any_discount","create_discount","update_discount","restore_discount","restore_any_discount","replicate_discount","reorder_discount","delete_discount","delete_any_discount","force_delete_discount","force_delete_any_discount","view_employee","view_any_employee","create_employee","update_employee","restore_employee","restore_any_employee","replicate_employee","reorder_employee","delete_employee","delete_any_employee","force_delete_employee","force_delete_any_employee","view_evaluation","view_any_evaluation","create_evaluation","update_evaluation","restore_evaluation","restore_any_evaluation","replicate_evaluation","reorder_evaluation","delete_evaluation","delete_any_evaluation","force_delete_evaluation","force_delete_any_evaluation","view_evaluation::detail","view_any_evaluation::detail","create_evaluation::detail","update_evaluation::detail","restore_evaluation::detail","restore_any_evaluation::detail","replicate_evaluation::detail","reorder_evaluation::detail","delete_evaluation::detail","delete_any_evaluation::detail","force_delete_evaluation::detail","force_delete_any_evaluation::detail","view_event","view_any_event","create_event","update_event","restore_event","restore_any_event","replicate_event","reorder_event","delete_event","delete_any_event","force_delete_event","force_delete_any_event","view_fee","view_any_fee","create_fee","update_fee","restore_fee","restore_any_fee","replicate_fee","reorder_fee","delete_fee","delete_any_fee","force_delete_fee","force_delete_any_fee","view_interview","view_any_interview","create_interview","update_interview","restore_interview","restore_any_interview","replicate_interview","reorder_interview","delete_interview","delete_any_interview","force_delete_interview","force_delete_any_interview","view_invoice","view_any_invoice","create_invoice","update_invoice","restore_invoice","restore_any_invoice","replicate_invoice","reorder_invoice","delete_invoice","delete_any_invoice","force_delete_invoice","force_delete_any_invoice","view_kardex","view_any_kardex","create_kardex","update_kardex","restore_kardex","restore_any_kardex","replicate_kardex","reorder_kardex","delete_kardex","delete_any_kardex","force_delete_kardex","force_delete_any_kardex","view_membership","view_any_membership","create_membership","update_membership","restore_membership","restore_any_membership","replicate_membership","reorder_membership","delete_membership","delete_any_membership","force_delete_membership","force_delete_any_membership","view_offer","view_any_offer","create_offer","update_offer","restore_offer","restore_any_offer","replicate_offer","reorder_offer","delete_offer","delete_any_offer","force_delete_offer","force_delete_any_offer","view_partner","view_any_partner","create_partner","update_partner","restore_partner","restore_any_partner","replicate_partner","reorder_partner","delete_partner","delete_any_partner","force_delete_partner","force_delete_any_partner","view_payroll","view_any_payroll","create_payroll","update_payroll","restore_payroll","restore_any_payroll","replicate_payroll","reorder_payroll","delete_payroll","delete_any_payroll","force_delete_payroll","force_delete_any_payroll","view_payroll::detail","view_any_payroll::detail","create_payroll::detail","update_payroll::detail","restore_payroll::detail","restore_any_payroll::detail","replicate_payroll::detail","reorder_payroll::detail","delete_payroll::detail","delete_any_payroll::detail","force_delete_payroll::detail","force_delete_any_payroll::detail","view_product","view_any_product","create_product","update_product","restore_product","restore_any_product","replicate_product","reorder_product","delete_product","delete_any_product","force_delete_product","force_delete_any_product","view_product::record::sheet","view_any_product::record::sheet","create_product::record::sheet","update_product::record::sheet","restore_product::record::sheet","restore_any_product::record::sheet","replicate_product::record::sheet","reorder_product::record::sheet","delete_product::record::sheet","delete_any_product::record::sheet","force_delete_product::record::sheet","force_delete_any_product::record::sheet","view_purchase","view_any_purchase","create_purchase","update_purchase","restore_purchase","restore_any_purchase","replicate_purchase","reorder_purchase","delete_purchase","delete_any_purchase","force_delete_purchase","force_delete_any_purchase","view_remision::guide","view_any_remision::guide","create_remision::guide","update_remision::guide","restore_remision::guide","restore_any_remision::guide","replicate_remision::guide","reorder_remision::guide","delete_remision::guide","delete_any_remision::guide","force_delete_remision::guide","force_delete_any_remision::guide","view_role","view_any_role","create_role","update_role","delete_role","delete_any_role","view_sale","view_any_sale","create_sale","update_sale","restore_sale","restore_any_sale","replicate_sale","reorder_sale","delete_sale","delete_any_sale","force_delete_sale","force_delete_any_sale","view_sale::detail","view_any_sale::detail","create_sale::detail","update_sale::detail","restore_sale::detail","restore_any_sale::detail","replicate_sale::detail","reorder_sale::detail","delete_sale::detail","delete_any_sale::detail","force_delete_sale::detail","force_delete_any_sale::detail","view_supplier","view_any_supplier","create_supplier","update_supplier","restore_supplier","restore_any_supplier","replicate_supplier","reorder_supplier","delete_supplier","delete_any_supplier","force_delete_supplier","force_delete_any_supplier","view_training::class","view_any_training::class","create_training::class","update_training::class","restore_training::class","restore_any_training::class","replicate_training::class","reorder_training::class","delete_training::class","delete_any_training::class","force_delete_training::class","force_delete_any_training::class","view_user","view_any_user","create_user","update_user","restore_user","restore_any_user","replicate_user","reorder_user","delete_user","delete_any_user","force_delete_user","force_delete_any_user","view_vacancy","view_any_vacancy","create_vacancy","update_vacancy","restore_vacancy","restore_any_vacancy","replicate_vacancy","reorder_vacancy","delete_vacancy","delete_any_vacancy","force_delete_vacancy","force_delete_any_vacancy","view_warranty","view_any_warranty","create_warranty","update_warranty","restore_warranty","restore_any_warranty","replicate_warranty","reorder_warranty","delete_warranty","delete_any_warranty","force_delete_warranty","force_delete_any_warranty","page_Timex","widget_StatsOverview","widget_ProductsStockChart","widget_SalesChart","widget_VacantCandidateChart","widget_ConversionRateKPIChart","widget_TotalSalesKPIChart","widget_GrossProfitMarginKPIChart"]},{"name":"filament_user","guard_name":"web","permissions":[]}]';
        $directPermissions = '[]';

        static::makeRolesWithPermissions($rolesWithPermissions);
        static::makeDirectPermissions($directPermissions);

        $this->command->info('Shield Seeding Completed.');
    }

    protected static function makeRolesWithPermissions(string $rolesWithPermissions): void
    {
        if (! blank($rolePlusPermissions = json_decode($rolesWithPermissions,true))) {

            foreach ($rolePlusPermissions as $rolePlusPermission) {
                $role = Utils::getRoleModel()::firstOrCreate([
                    'name' => $rolePlusPermission['name'],
                    'guard_name' => $rolePlusPermission['guard_name']
                ]);

                if (! blank($rolePlusPermission['permissions'])) {

                    $permissionModels = collect();

                    collect($rolePlusPermission['permissions'])
                        ->each(function ($permission) use($permissionModels) {
                            $permissionModels->push(Utils::getPermissionModel()::firstOrCreate([
                                'name' => $permission,
                                'guard_name' => 'web'
                            ]));
                        });
                    $role->syncPermissions($permissionModels);

                }
            }
        }
    }

    public static function makeDirectPermissions(string $directPermissions): void
    {
        if (! blank($permissions = json_decode($directPermissions,true))) {

            foreach($permissions as $permission) {

                if (Utils::getPermissionModel()::whereName($permission)->doesntExist()) {
                    Utils::getPermissionModel()::create([
                        'name' => $permission['name'],
                        'guard_name' => $permission['guard_name'],
                    ]);
                }
            }
        }
    }
}
