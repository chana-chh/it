<?php

use Illuminate\Database\Seeder;

class Lokacija extends Seeder
{

    public function run()
    {

        DB::table('s_lokacije')->insert([
            'naziv' => 'Skupština grada',
            'adresa_ulica' => 'Trg slobode',
            'adresa_broj' => '3',
        ]);

        DB::table('s_lokacije')->insert([
            'naziv' => 'Duvan promet',
            'adresa_ulica' => 'Branka Radičevića',
            'adresa_broj' => '11',
            'napomena' => 'GU za imovinu, Komunalna POLICIJA',
        ]);

        DB::table('s_lokacije')->insert([
            'naziv' => 'Varteks',
            'adresa_ulica' => 'Nikole Pašića',
            'adresa_broj' => '6/3',
            'napomena' => 'GU za upravljanje projektima, GU za urbanizam - OZAKONJENJE, Zaštita prava pacijenata',
        ]);

        DB::table('s_lokacije')->insert([
            'naziv' => 'Biznis inovativni centar',
            'adresa_ulica' => 'Trg Topolivaca',
            'adresa_broj' => '4',
            'napomena' => 'Odeljenje za vanredne situacije',
        ]);

        DB::table('s_lokacije')->insert([
            'naziv' => 'Cara Lazara',
            'adresa_ulica' => 'Cara Lazara',
            'adresa_broj' => '15',
            'napomena' => 'GU za vanprivredne delatnosti',
        ]);

        DB::table('s_lokacije')->insert([
            'naziv' => 'Crveni krst',
            'adresa_ulica' => 'Svetozara Markovića',
            'adresa_broj' => '6',
            'napomena' => 'Kancelarija zaštitnika gađenja',
        ]);

        DB::table('s_lokacije')->insert([
            'naziv' => 'Erdoglija - Ozakonjenje',
            'adresa_ulica' => 'Prvoslava Stojanovića',
            'adresa_broj' => '6',
            'napomena' => 'OZAKONJENJE',
        ]);

        DB::table('s_lokacije')->insert([
            'naziv' => 'Erdoglija - Povereništvo za izbeglice',
            'adresa_ulica' => 'Prvoslava Stojanovića',
            'adresa_broj' => 'nn',
            'napomena' => 'Povereništvo za izbeglice, Inkluzija Roma',
        ]);

        DB::table('s_lokacije')->insert([
            'naziv' => 'Svetlost',
            'adresa_ulica' => 'Branka Radičevića',
            'adresa_broj' => '9',
            'napomena' => 'Gradska poreska uprava',
        ]);
    }

}
