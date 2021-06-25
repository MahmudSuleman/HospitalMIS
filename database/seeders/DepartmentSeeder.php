<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seed department
DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('departments')->truncate();

        $departments = ['opd', 'surgery', 'lab', 'pharmacy'];

        foreach ($departments as $department) {

            DB::table('departments')->insert([
                'name' => $department,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        Model::reguard();
    }
}
