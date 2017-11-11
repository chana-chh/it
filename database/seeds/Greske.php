<?php

use Illuminate\Database\Seeder;

class Podesavanja extends Seeder
{

    public function run()
    {
        DB::table('greske')->insert([
            'greska' => 'Neka sitna grescica',
        ]);
    }

}
