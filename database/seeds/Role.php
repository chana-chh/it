<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'admin',
            'level' => 100,
            'opis' => 'Administrator aplikacije - ima sva prava',
        ]);
        DB::table('roles')->insert([
            'name' => 'super-user',
            'level' => 200,
            'opis' => 'Korisnik sa pravom da menja podatke u aplikaciji',
        ]);
        DB::table('roles')->insert([
            'name' => 'user',
            'level' => 300,
            'opis' => 'Korisnik koji ima pravo da vrsi upite, pregleda izvestaje i podatke, ali ne i da ih menja',
        ]);

        // Neprijavljeni 'guest' mogu samo da pregledaju javne podatke i izvestaje
    }

}
