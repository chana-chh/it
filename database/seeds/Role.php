<?php

use Illuminate\Database\Seeder;

class Role extends Seeder
{

    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'admin',
            'level' => 100,
            'opis' => 'Administrator aplikacije - ima sva prava',
        ]);
        DB::table('roles')->insert([
            'name' => 'centrala',
            'level' => 200,
            'opis' => 'Korisnik sa pravom da menja podatke o telefonskim brojevima zaposlenih',
        ]);
        DB::table('roles')->insert([
            'name' => 'kadrovi',
            'level' => 300,
            'opis' => 'Korisnik sa pravom da menja podatke o zaposlenima',
        ]);
        DB::table('roles')->insert([
            'name' => 'korisnik',
            'level' => 400,
            'opis' => 'Korisnik koji ima pravo da vrsi upite, pregleda izvestaje i podatke, ali ne i da ih menja',
        ]);
    }

}
