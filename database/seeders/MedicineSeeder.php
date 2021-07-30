<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meds = [
            'Synthroid (levothyroxine)',
            'Crestor (rosuvastatin)',
            'Ventolin HFA (albuterol)',
            'Nexium (esomeprazole)',
            'Advair Diskus (fluticasone)',
            'Lantus Solostar (insulin glargine)',
            'Vyvanse (lisdexamfetamine)',
            'Lyrica (pregabalin)',
            'Spiriva Handihaler (tiotropium)',
            'Januvia (sitagliptin)',
            'Humira (adalimumab)',
            'Abilify (aripiprazole)'
            ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('medicines')->truncate();

        foreach($meds as $med){
            DB::table('medicines')->insert([
                'name' => $med,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

    }
}
