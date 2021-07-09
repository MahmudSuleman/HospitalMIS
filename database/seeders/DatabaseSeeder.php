<?php

namespace Database\Seeders;

use App\Models\Gender;
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
        // \App\Models\User::factory(10)->create();
        $this->call([
            EmployeeTypeSeeder::class,
            EmployeeSeeder::class,
            UsersSeeder::class,
            UserRolesSeeder::class,
            DepartmentSeeder::class,
            GenderSeeder::class,
        ]);
    }
}
