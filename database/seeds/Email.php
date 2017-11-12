<?php

use Illuminate\Database\Seeder;

class Email extends Seeder
{

    public function run()
    {
        DB::table('adrese_e_poste')->insert([
            'adresa' => 'chana@chana.org',
            'sluzbena' => 0,
            'zaposleni_id' => 1,
            'lozinka' => '123456',
        ]);
        DB::table('adrese_e_poste')->insert([
            'adresa' => 'chana1@kg.org.rs',
            // 'sluzbena' => 1, // jeste sluzbeni email
            'zaposleni_id' => 1,
            'lozinka' => 'password',
        ]);
    }

}
