<?php

use Illuminate\Database\Seeder;

class Korisnici extends Seeder
{

    public function run()
    {
        DB::table('korisnici')->insert([
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => bcrypt('vir5373plus!'),
            'role_id' => 1
        ]);
        DB::table('korisnici')->insert([
            'name' => 'Centrala',
            'username' => 'centrala',
            'password' => bcrypt('centrala'),
            'role_id' => 2
        ]);
        DB::table('korisnici')->insert([
            'name' => 'Kadrovi',
            'username' => 'kadrovi',
            'password' => bcrypt('kadrovi'),
            'role_id' => 3
        ]);
        DB::table('korisnici')->insert([
            'name' => 'Korisnik',
            'username' => 'korisnik',
            'password' => bcrypt('korisnik'),
            'role_id' => 4
        ]);
    }

}
