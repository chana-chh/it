<?php

use Illuminate\Database\Seeder;

class MemorijaModel extends Seeder
{

    public function run()
    {
        DB::table('memorije_modeli')->insert([
            'proizvodjac_id' => 1,
            'tip_memorije_id' => 1,
            'brzina' => 1600,
            'kapacitet' => 1024,
            'ocena' => 3,
        ]);
    }

}
