<?php

use Illuminate\Database\Seeder;

class Telefoni extends Seeder
{

    public function run()
    {
        DB::table('telefoni')->insert([
            'broj' => '03432314',
            'vrsta' => 2,
            'kancelarija_id' => 1,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('telefoni')->insert([
            'broj' => '03423314',
            'vrsta' => 1,
            'kancelarija_id' => 22,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('telefoni')->insert([
            'broj' => '03415314',
            'vrsta' => 3,
            'kancelarija_id' => 39,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
    }
}
