<?php

use Illuminate\Database\Seeder;

class OsnovnaPlocaModel extends Seeder
{

    public function run()
    {
        DB::table('osnovne_ploce_modeli')->insert([
            'naziv' => 'nn',
            'cipset' => 'Intel H110',
            'tip_memorije_id' => 1,
            'proizvodjac_id' => 1,
            'soket_id' => 1,
            'usb_tri' => 1, // ima USB 3.0
            // 'integrisana_grafika' => 1, // ima intregrusu
            'ocena' => 3,
        ]);
    }

}
