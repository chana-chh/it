<?php

use Illuminate\Database\Seeder;

class Email extends Seeder
{
    public function run()
    {
        DB::table('adrese_e_poste')->insert([
            'adresa' => 'chana@chana.org',
            'sluzbena' => 0, 'zaposleni_id' => 1,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been  the industry s standard dummy text ever since the 1500s, when an'
            ]);
        DB::table('adrese_e_poste')->insert([
            'adresa' => 'chana1@chana.org',
            'sluzbena' => 0,
            'zaposleni_id' => 2,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and   typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an'
            ]);
        DB::table('adrese_e_poste')->insert([
            'adresa' => 'chana2@chana.org',
            'sluzbena' => 0,
            'zaposleni_id' => 2,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an '
            ]);
        DB::table('adrese_e_poste')->insert([
            'adresa' => 'chana3@chana.org',
            'sluzbena' => 1,
            'zaposleni_id' => 2,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an '
            ]);
        DB::table('adrese_e_poste')->insert([
            'adresa' => 'chana4@chana.org',
            'sluzbena' => 0,
            'zaposleni_id' => 3,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an '
            ]);
        DB::table('adrese_e_poste')->insert([
            'adresa' => 'chana5@chana.org',
            'sluzbena' => 0,
            'zaposleni_id' => 4,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an '
            ]);
    }
}
