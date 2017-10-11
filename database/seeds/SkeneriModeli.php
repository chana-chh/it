<?php

use Illuminate\Database\Seeder;

class SkeneriModeli extends Seeder
{
    public function run()
    {
        DB::table('skeneri_modeli')->insert([
            'naziv' => 'skener',
            'proizvodjac_id' => 2,
            'format' => 'A0',
            'rezolucija' => '1200',
            'link' => 'https://ark.intel.com/products/87356/Intel-Pentium-Processor-G3260-3M-Cache-3_30-GHz',
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
    }
}
