<?php

use Illuminate\Database\Seeder;

class MonitorModel extends Seeder
{

    public function run()
    {
        DB::table('monitori_modeli')->insert([
            'naziv' => '22mp58vq-P',
            'proizvodjac_id' => 4,
            'dijagonala_id' => 7,
            'link' => 'https://google.com',
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('monitori_modeli')->insert([
            'naziv' => 'sm450',
            'proizvodjac_id' => 8,
            'dijagonala_id' => 7,
            'link' => 'https://google.com',
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('monitori_modeli')->insert([
            'naziv' => 'P2250x',
            'proizvodjac_id' => 15,
            'dijagonala_id' => 8,
            'link' => 'https://google.com',
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
    }
}
