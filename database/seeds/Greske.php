<?php

use Illuminate\Database\Seeder;

class Greske extends Seeder
{

    public function run()
    {
        DB::table('greske')->insert([
            'greska' => 'Neka sitna grescica',
        ]);
    }

}
