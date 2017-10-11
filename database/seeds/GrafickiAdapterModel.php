<?php

use Illuminate\Database\Seeder;

class GrafickiAdapterModel extends Seeder
{
    public function run()
    {
        DB::table('graficki_adapteri_modeli')->insert([
            'naziv' => 'Super extra vga',
            'cip' => 'Do jaja',
            'tip_memorije_id' => 1,
            'kapacitet_memorije' => 2048,
            'proizvodjac_id' => 1,
            'vga_slot_id' => 1,
            'link' => 'https://google.com',
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('graficki_adapteri_modeli')->insert([
            'naziv' => 'Super ultra vga',
            'cip' => 'Do zumanceta',
            'tip_memorije_id' => 2,
            'kapacitet_memorije' => 1024,
            'proizvodjac_id' => 2,
            'vga_slot_id' => 2,
            'link' => 'https://google.com',
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('graficki_adapteri_modeli')->insert([
            'naziv' => 'Super giga mega vga',
            'cip' => 'Do belanceta',
            'tip_memorije_id' => 1,
            'kapacitet_memorije' => 512,
            'proizvodjac_id' => 1,
            'vga_slot_id' => 1,
            'link' => 'https://google.com',
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
    }
}
