<?php

use Illuminate\Database\Seeder;

class MemorijaModel extends Seeder
{

    public function run()
    {
        DB::table('memorije_modeli')->insert([
            'proizvodjac_id' => 1,
            'tip_memorije_id' => 3,
            'brzina' => 1600,
            'kapacitet' => 1024,
            'ocena' => 3,
            'link' => 'https://google.com',
        ]);
        DB::table('memorije_modeli')->insert([
            'proizvodjac_id' => 2,
            'tip_memorije_id' => 3,
            'brzina' => 1600,
            'kapacitet' => 512,
            'ocena' => 2,
            'link' => 'https://google.com',
        ]);
        DB::table('memorije_modeli')->insert([
            'proizvodjac_id' => 1,
            'tip_memorije_id' => 4,
            'brzina' => 2133,
            'kapacitet' => 2048,
            'ocena' => 4,
            'link' => 'https://google.com',
        ]);
    }
}
