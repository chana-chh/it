<?php

use Illuminate\Database\Seeder;

class Napajanje extends Seeder
{

    public function run()
    {
        DB::table('napajanja')->insert([
            'vrsta_uredjaja_id' => 11,
            'serijski_broj' => 'nn',
            'napajanje_model_id' => 1,
            'racunar_id' => 1,
        ]);
    }

}
