<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder5 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'payment-list',
           'payment-create',
           'payment-edit',
           'payment-delete',
           'loan-list',
           'loan-create',
           'loan-edit',
           'loan-delete',
           'loan-repayment-list',
           'loan-repayment-create',
           'loan-repayment-edit',
           'loan-repayment-delete'
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
