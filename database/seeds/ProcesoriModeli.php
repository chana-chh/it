<?php

use Illuminate\Database\Seeder;

class ProcesoriModeli extends Seeder
{

    public function run()
    {
        DB::table('procesori_modeli')->insert([
            'naziv' => 'G4400',
            'proizvodjac_id' => 2,
            'soket_id' => 2,
            'takt' => 3300,
            'kes' => 3,
            'broj_jezgara' => 2,
            'broj_niti' => 2,
            'link' => 'https://ark.intel.com/products/88179/Intel-Pentium-Processor-G4400-3M-Cache-3_30-GHz',
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('procesori_modeli')->insert([
            'naziv' => 'G3260',
            'proizvodjac_id' => 2,
            'soket_id' => 1,
            'takt' => 3300,
            'kes' => 3,
            'broj_jezgara' => 2,
            'broj_niti' => 2,
            'link' => 'https://ark.intel.com/products/87356/Intel-Pentium-Processor-G3260-3M-Cache-3_30-GHz',
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
    }
}
