<?php

use Illuminate\Database\Seeder;

class NapajanjaModeli extends Seeder
{

    public function run()
    {
        DB::table('napajanja_modeli')->insert([
            'naziv' => 'nn',
            // 'snaga' => '500 GW', // nula
            'proizvodjac_id' => 1,
        ]);
    }

}
