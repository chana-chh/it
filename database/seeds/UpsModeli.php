<?php

use Illuminate\Database\Seeder;

class UpsModeli extends Seeder
{

    public function run()
    {
        DB::table('ups_modeli')->insert([
            'naziv' => 'powerups 4000',
            'kapacitet' => '1200 VA',
            'snaga' => '2000 W',
            'baterija' => 'MHB MS 12-12 Olovna',
            'baterija_kapacitet' => '12Ah',
            'baterija_napon' => '12 V',
            'baterija_dimenzije' => '151 x 98 x 94 mm',
            'broj_baterija' => 4,
            'proizvodjac_id' => 7,
            'link' => 'https://ark.intel.com/products/87356/Intel-Pentium-Processor-G3260-3M-Cache-3_30-GHz',
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
    }
}
