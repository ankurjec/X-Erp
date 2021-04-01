<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder3 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'expense-list',
           'expense-create',
           'expense-edit',
           'expense-delete',
           'project-list',
           'project-create',
           'project-edit',
           'project-delete'
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
