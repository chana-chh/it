<?php

use Illuminate\Database\Seeder;

class Toneri extends Seeder
{

    public function run()
    {
        DB::table('s_toneri')->insert([
            'naziv' => 'Tip baterije 1',
            'kapacitet' => 'veliki',
            'napon' => 'trese',
            'dimenzije' => 'X x Y x Z',
            'modeli_baterija' => 'baterija1, baterija2, baterija3',
        ]);
    }

}
