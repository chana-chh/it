<?php

use Illuminate\Database\Seeder;

class StampaciModeli extends Seeder
{
    public function run()
    {
        DB::table('stampaci_modeli')->insert([
            'toner_id' => 1,
            'naziv' => 'stampac',
            'proizvodjac_id' => 4,
            'tip_stampaca_id' => 1,
            'link' => 'https://ark.intel.com/products/87356/Intel-Pentium-Processor-G3260-3M-Cache-3_30-GHz',
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
    }
}
