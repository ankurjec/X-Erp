<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CreateAdminUserSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(PermissionTableSeeder2::class);
        $this->call(PermissionTableSeeder3::class);
        $this->call(PermissionTableSeeder4::class);
        $this->call(PermissionTableSeeder5::class);
        $this->call(PermissionTableSeeder6::class);
        $this->call(PermissionTableSeeder7::class);

    }
}
