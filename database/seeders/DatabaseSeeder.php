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
            DepartmentSeeder::class,
            EmployeeTypeSeeder::class,
            EmployeeSeeder::class,
            UserRolesSeeder::class,
            UsersSeeder::class,
            GenderSeeder::class,
            MedicineSeeder::class,
        ]);
    }
}
