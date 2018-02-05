<?php

use Illuminate\Database\Seeder;

class HddModel extends Seeder
{

    public function run()
    {
        DB::table('hdd_modeli')->insert([
            'proizvodjac_id' => 1,
            'povezivanje_id' => 1,
            'kapacitet' => 500,
            // 'ssd' => 0, // nije ssd
            'ocena' => 3,
        ]);
    }

}
