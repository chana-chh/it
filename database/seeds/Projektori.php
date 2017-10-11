<?php

use Illuminate\Database\Seeder;

class Projektori extends Seeder
{

    public function run()
    {
        DB::table('projektori')->insert([
            'naziv' => 'projektor G3260',
            'tip_lampe' => 'DLP',
            'rezolucija' => 'ogromna',
            'kontrast' => 'skroz',
            'inventarski_broj' => 'kg11111',
            'kancelarija_id' => 2,
            'proizvodjac_id' => 6,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'stavka_otpremnice_id' => 9,
            'link' => 'https://ark.intel.com/products/87356/Intel-Pentium-Processor-G3260-3M-Cache-3_30-GHz',
            'deleted_at' => null,
            'reciklirano' => 0,
            'nabavka_id' => 2,
        ]);
    }
}
