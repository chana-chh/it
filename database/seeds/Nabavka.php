<?php

use Illuminate\Database\Seeder;

class Nabavka extends Seeder
{

    public function run()
    {
        DB::table('nabavke')->insert([
            'dobavljac_id' => 1,
            'datum' => '1970-01-01',
        ]);
    }

}
