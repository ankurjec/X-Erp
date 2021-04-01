<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'vendor-list',
           'vendor-create',
           'vendor-edit',
           'vendor-delete',
           'customer-list',
           'customer-create',
           'customer-edit',
           'customer-delete'
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
