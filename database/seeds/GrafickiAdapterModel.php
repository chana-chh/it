<?php

use Illuminate\Database\Seeder;

class GrafickiAdapterModel extends Seeder
{

    public function run()
    {
        DB::table('graficki_adapteri_modeli')->insert([
            'naziv' => 'nn',
            'cip' => 'nn',
            'tip_memorije_id' => 1,
            'kapacitet_memorije' => 128,
            'proizvodjac_id' => 1,
            'vga_slot_id' => 1,
        ]);
    }

}
