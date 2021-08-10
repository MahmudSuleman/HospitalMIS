<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seed gender
//        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('genders')->truncate();

        $genders = ['male', 'female'];

        foreach ($genders as $gender) {
            DB::table('genders')->insert([
                'name' => $gender,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
