<?php

use Illuminate\Database\Seeder;

class OsnovnaPlocaModel extends Seeder
{

    public function run()
    {
        DB::table('osnovne_ploce_modeli')->insert([
            'naziv' => 'H110M-R',
            'cipset' => 'Intel H110',
            'tip_memorije_id' => 4,
            'proizvodjac_id' => 1,
            'soket_id' => 2,
            'usb_tri' => 1,
            'integrisana_grafika' => 1,
            'link' => 'https://www.asus.com/rs/Motherboards/H110M-C/',
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('osnovne_ploce_modeli')->insert([
            'naziv' => 'H110M-C',
            'cipset' => 'Intel H110',
            'tip_memorije_id' => 4,
            'proizvodjac_id' => 1,
            'soket_id' => 2,
            'usb_tri' => 1,
            'integrisana_grafika' => 1,
            'link' => 'https://www.asus.com/rs/Motherboards/H110M-C/',
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('osnovne_ploce_modeli')->insert([
            'naziv' => 'H110M-Si',
            'cipset' => 'Intel H110',
            'tip_memorije_id' => 4,
            'proizvodjac_id' => 1,
            'soket_id' => 2,
            'usb_tri' => 1,
            'integrisana_grafika' => 1,
            'link' => 'https://www.asus.com/rs/Motherboards/H110M-C/',
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
    }
}
