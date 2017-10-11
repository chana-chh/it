<?php

use Illuminate\Database\Seeder;

class Racuni extends Seeder
{
    public function run()
    {
        DB::table('racuni')->insert([
            'broj' => '01-2017 racun',
            'datum' => '2017-01-04',
            'iznos' => 10000,
            'pdv' => 2000,
            'ukupno' => 12000,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'ugovor_id' => 1,
        ]);
        DB::table('racuni')->insert([
            'broj' => '02-2017 racun',
            'datum' => '2017-03-04',
            'iznos' => 1000,
            'pdv' => 200,
            'ukupno' => 1200,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'ugovor_id' => 1,
        ]);
        DB::table('racuni')->insert([
            'broj' => '03-2017 racun',
            'datum' => '2017-04-04',
            'iznos' => 500000,
            'pdv' => 100000,
            'ukupno' => 600000,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'ugovor_id' => 1,
        ]);
    }
}
