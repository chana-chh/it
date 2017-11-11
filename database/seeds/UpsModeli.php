<?php

use Illuminate\Database\Seeder;

class UpsModeli extends Seeder
{

    public function run()
    {
        DB::table('ups_modeli')->insert([
            'naziv' => 'nn',
            'kapacitet' => 'nn',
            'snaga' => 'nn',
            'tip_baterije_id' => 1,
            'broj_baterija' => 4,
            'proizvodjac_id' => 1,
        ]);
    }

}
