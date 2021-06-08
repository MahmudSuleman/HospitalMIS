<?php

namespace Database\Seeders;

use Carbon\Traits\Date;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EmployeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_types')->truncate();
        $types = ['system admin', 'doctor', 'nurse', 'cleaner', 'security'];

        foreach ($types as $type) {
            DB::table('employee_types')->insert([
                'name' => $type,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

    }
}
