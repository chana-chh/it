<?php

use Illuminate\Database\Seeder;

class Racunari extends Seeder
{
    public function run()
    {
        DB::table('racunari')->insert([
            'laptop' => 0,
            'server' => 1,
            'brend' => 1,
            'proizvodjac_id' => 2,
            'inventarski_broj' => '17140',
            'erc_broj' => '370',
            'ime' => 'GU370',
            'zaposleni_id' => null,
            'kancelarija_id' => 4,
            'nabavka_id' => 1,
            'os_id' => 5,
            'link' => 'https://google.com',
            'deleted_at' => null,
            'reciklirano' => 0,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('racunari')->insert([
            'laptop' => 1,
            'server' => 0,
            'brend' => 1,
            'proizvodjac_id' => 4,
            'inventarski_broj' => '18140',
            'erc_broj' => '371',
            'ime' => 'GU371',
            'zaposleni_id' => 1,
            'kancelarija_id' => 1,
            'nabavka_id' => 1,
            'os_id' => 10,
            'link' => 'https://google.com',
            'deleted_at' => null,
            'reciklirano' => 0,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('racunari')->insert([
            'laptop' => 0,
            'server' => 0,
            'brend' => 0,
            'proizvodjac_id' => null,
            'inventarski_broj' => '07140',
            'erc_broj' => '372',
            'ime' => 'GU372',
            'zaposleni_id' => 2,
            'kancelarija_id' => 2,
            'nabavka_id' => 3,
            'os_id' => 10,
            'link' => 'https://google.com',
            'deleted_at' => null,
            'reciklirano' => 0,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
    }
}
