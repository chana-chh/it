<?php

use Illuminate\Database\Seeder;

class Racuni extends Seeder
{

    public function run()
    {
        DB::table('racuni')->insert([
            'broj' => 'Stara oprema',
            'datum' => '1970-01-04',
            'ugovor_id' => 1,
        ]);
    }

}
