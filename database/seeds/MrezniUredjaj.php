<?php

use Illuminate\Database\Seeder;

class MrezniUredjaj extends Seeder
{

    public function run()
    {
        DB::table('aktivna_mrezna_oprema')->insert([
            'naziv' => 'Neki vrhunski SWITCHoRouter',
            'broj_portova' => 24,
            'upravljiv' => 1,
            'inventarski_broj' => 'gb123x53',
            'kancelarija_id' => 35,
            'proizvodjac_id' => 14,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'stavka_otpremnice_id' => 12,
            'link' => 'https://google.com',
            'deleted_at' => null,
            'reciklirano' => 0,
            'nabavka_id' => 2,
        ]);
        DB::table('aktivna_mrezna_oprema')->insert([
            'naziv' => 'Neki usrani SWITCHoRouter',
            'broj_portova' => 12,
            'upravljiv' => 0,
            'inventarski_broj' => 'so112233',
            'kancelarija_id' => 11,
            'proizvodjac_id' => 9,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'stavka_otpremnice_id' => 12,
            'link' => 'https://google.com',
            'deleted_at' => null,
            'reciklirano' => 0,
            'nabavka_id' => null,
        ]);
    }
}
