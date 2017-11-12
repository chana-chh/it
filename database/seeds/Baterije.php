<?php

use Illuminate\Database\Seeder;

class Baterije extends Seeder
{

    public function run()
    {
        DB::table('s_baterije')->insert([
            'naziv' => 'Tip baterije 1',
            'kapacitet' => 'veliki',
            'napon' => 'trese',
            'dimenzije' => 'X x Y x Z',
            'modeli_baterija' => 'baterija1, baterija2, baterija3',
        ]);
    }

}
