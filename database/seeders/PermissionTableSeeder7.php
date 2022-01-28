<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder6 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'debit_note-list',
           'debit_note-create',
           'debit_note-edit',
           'debit_note-delete',
		   'credit_note-list',
           'credit_note-create',
           'credit_note-edit',
           'credit_note-delete',
		   'employees-list',
           'employees-create',
           'employees-edit',
           'employees-delete',
          
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
