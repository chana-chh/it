<?php

use Illuminate\Database\Seeder;

class TabelaKorisniciSeeder extends Seeder
{
    public function run()
    {
        DB::table('korisnici')->insert([
            'name' => 'Nenad Čanić',
            'username' => 'admin',
            'password' => bcrypt('čaša'),
            'level' => 0]);
        DB::table('korisnici')->insert([
            'name' => 'Stanislav Jakovljević',
            'username' => 'korisnik',
            'password' => bcrypt('user'),
            'level' => 10]);
    }
}
