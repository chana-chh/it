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
    }

}
