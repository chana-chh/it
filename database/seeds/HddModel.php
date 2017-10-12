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
            'ocena' => 3,
            'ssd' => 0,
            'link' => 'https://google.com',
        ]);
        DB::table('hdd_modeli')->insert([
            'proizvodjac_id' => 2,
            'povezivanje_id' => 1,
            'kapacitet' => 256,
            'ocena' => 2,
            'ssd' => 1,
            'link' => 'https://google.com',
        ]);
        DB::table('hdd_modeli')->insert([
            'proizvodjac_id' => 1,
            'povezivanje_id' => 2,
            'kapacitet' => 5000,
            'ocena' => 4,
            'ssd' => 0,
            'link' => 'https://google.com',
        ]);
    }
}
