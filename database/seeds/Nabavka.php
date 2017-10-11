<?php

use Illuminate\Database\Seeder;

class Nabavka extends Seeder
{

    public function run()
    {
        DB::table('nabavke')->insert([
            'dobavljac_id' => 4,
            'datum' => '2010-05-28',
            'garancija' => 24,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('nabavke')->insert([
            'dobavljac_id' => 3,
            'datum' => '2015-06-11',
            'garancija' => 12,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('nabavke')->insert([
            'dobavljac_id' => 8,
            'datum' => '2017-02-14',
            'garancija' => 24,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
    }
}
