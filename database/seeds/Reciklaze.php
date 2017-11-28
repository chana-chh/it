<?php

use Illuminate\Database\Seeder;

class Reciklaze extends Seeder
{

    public function run()
    {
        DB::table('reciklaza')->insert([
            'datum' => '2017-11-01',
            'napomena' => 'Prva reciklaža u istoriji uniZveruma'
        ]);
    }

}
