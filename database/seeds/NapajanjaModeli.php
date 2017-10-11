<?php

use Illuminate\Database\Seeder;

class NapajanjaModeli extends Seeder
{

    public function run()
    {
        DB::table('napajanja_modeli')->insert([
            'naziv' => 'Neko nabudzeno napajanje',
            'snaga' => '500 GW',
            'proizvodjac_id' => 10,
            'link' => 'https://google.com',
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('napajanja_modeli')->insert([
            'naziv' => 'Jos neko nabudzenije napajanje',
            'snaga' => '20000 GW',
            'proizvodjac_id' => 11,
            'link' => 'https://google.com',
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
    }
}
