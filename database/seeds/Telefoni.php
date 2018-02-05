<?php

use Illuminate\Database\Seeder;

class Telefoni extends Seeder
{

    public function run()
    {

        DB::table('telefoni')->insert([
            'broj' => '034 306 285',
            'vrsta' => 2,
            'kancelarija_id' => 1,
        ]);
    }

}
