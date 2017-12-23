<?php

use Illuminate\Database\Seeder;

class Zaposleni extends Seeder
{

    public function run()
    {
        DB::beginTransaction();

        DB::table('zaposleni')->insert([
            'prezime' => 'Milojević',
            'ime' => 'Momčilo',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Rosić',
            'ime' => 'Zoran',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marić',
            'ime' => 'Momir',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Janjić',
            'ime' => 'Branislav',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jevtić',
            'ime' => 'Nikosava',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radivojević',
            'ime' => 'Slađana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrović',
            'ime' => 'Miroslava',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Miljojčić',
            'ime' => 'Žana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Kaltak',
            'ime' => 'Cvetanka',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Mihajlović',
            'ime' => 'Zoran',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Obradović',
            'ime' => 'Milan',
            'kancelarija_id' => 2,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milovanović',
            'ime' => 'Slađana',
            'kancelarija_id' => 2,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Rajović',
            'ime' => 'Predrag',
            'kancelarija_id' => 2,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Simović',
            'ime' => 'Milorad',
            'kancelarija_id' => 2,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Rakočević',
            'ime' => 'Radenko',
            'kancelarija_id' => 2,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Predojević',
            'ime' => 'Milovan',
            'kancelarija_id' => 2,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Knežević',
            'ime' => 'Nebojša',
            'kancelarija_id' => 2,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrović',
            'ime' => 'Veljko',
            'kancelarija_id' => 2,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Nešić',
            'ime' => 'Radašin',
            'kancelarija_id' => 2,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Todorović',
            'ime' => 'Dragan',
            'kancelarija_id' => 2,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Janićijević',
            'ime' => 'Radmila',
            'kancelarija_id' => 3,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Zorić',
            'ime' => 'Milka',
            'kancelarija_id' => 3,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Todorović',
            'ime' => 'Dragan',
            'kancelarija_id' => 3,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vesić',
            'ime' => 'Dragana',
            'kancelarija_id' => 3,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Riznić',
            'ime' => 'Mileva',
            'kancelarija_id' => 3,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Eftović',
            'ime' => 'Vesna',
            'kancelarija_id' => 3,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đorđević',
            'ime' => 'Milena',
            'kancelarija_id' => 3,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Brkić',
            'ime' => 'Milašin',
            'kancelarija_id' => 3,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Pavlović',
            'ime' => 'Slavica',
            'kancelarija_id' => 3,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Rvović',
            'ime' => 'Svetlana',
            'kancelarija_id' => 3,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Beara',
            'ime' => 'Mirjana',
            'kancelarija_id' => 4,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Antonijević',
            'ime' => 'Slavenka',
            'kancelarija_id' => 4,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Kuzmanović',
            'ime' => 'Zoran',
            'kancelarija_id' => 4,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Nestorović',
            'ime' => 'Radojica',
            'kancelarija_id' => 4,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Živanović',
            'ime' => 'Radovanka',
            'kancelarija_id' => 4,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Nikitović',
            'ime' => 'Slavica',
            'kancelarija_id' => 4,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Cvetković',
            'ime' => 'Evica',
            'kancelarija_id' => 4,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stojanović',
            'ime' => 'Hadži-milan',
            'kancelarija_id' => 4,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stanković',
            'ime' => 'Milica',
            'kancelarija_id' => 4,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jovanović',
            'ime' => 'Olga',
            'kancelarija_id' => 4,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Živković',
            'ime' => 'Predrag',
            'kancelarija_id' => 5,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jović',
            'ime' => 'Verica',
            'kancelarija_id' => 5,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Aksentijević',
            'ime' => 'Sretina',
            'kancelarija_id' => 5,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Alempijević',
            'ime' => 'Ratko',
            'kancelarija_id' => 5,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Davinić',
            'ime' => 'Delinka',
            'kancelarija_id' => 5,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Živković',
            'ime' => 'Zoran',
            'kancelarija_id' => 5,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Gajić',
            'ime' => 'Vesna',
            'kancelarija_id' => 5,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milosavljević',
            'ime' => 'Milivoje',
            'kancelarija_id' => 5,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jovanović',
            'ime' => 'Milena',
            'kancelarija_id' => 5,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stefanović',
            'ime' => 'Andreja',
            'kancelarija_id' => 5,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marković',
            'ime' => 'Miloš',
            'kancelarija_id' => 6,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Janković',
            'ime' => 'Saša',
            'kancelarija_id' => 6,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Bratković',
            'ime' => 'Predrag',
            'kancelarija_id' => 6,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Živadinović',
            'ime' => 'Milan',
            'kancelarija_id' => 6,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Pavlović-Đapa',
            'ime' => 'Gordana',
            'kancelarija_id' => 6,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Svičević',
            'ime' => 'Marija',
            'kancelarija_id' => 6,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Lučić',
            'ime' => 'Ljiljana',
            'kancelarija_id' => 6,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ilić',
            'ime' => 'Julka',
            'kancelarija_id' => 6,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vuković',
            'ime' => 'Vesna',
            'kancelarija_id' => 6,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đulčić',
            'ime' => 'Zora',
            'kancelarija_id' => 6,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Dragojlović',
            'ime' => 'Katarina',
            'kancelarija_id' => 7,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Kesić',
            'ime' => 'Gordana',
            'kancelarija_id' => 7,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Bogdanović',
            'ime' => 'Sreten',
            'kancelarija_id' => 7,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Gajić',
            'ime' => 'Vesna',
            'kancelarija_id' => 7,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Hem-Božilović',
            'ime' => 'Snežana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Bašić',
            'ime' => 'Dragana',
            'kancelarija_id' => 7,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrović',
            'ime' => 'Zoran',
            'kancelarija_id' => 7,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Lazarević-Sarić',
            'ime' => 'LJiljana',
            'kancelarija_id' => 7,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đurđević',
            'ime' => 'Dragica',
            'kancelarija_id' => 7,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vujović',
            'ime' => 'Zdravka',
            'kancelarija_id' => 7,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Obradović',
            'ime' => 'Zoran',
            'kancelarija_id' => 7,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Tanasković',
            'ime' => 'Zoran',
            'kancelarija_id' => 8,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milanović',
            'ime' => 'Predrag',
            'kancelarija_id' => 8,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Obradović',
            'ime' => 'Slavica',
            'kancelarija_id' => 8,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Divac',
            'ime' => 'Bojana',
            'kancelarija_id' => 8,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stefanović',
            'ime' => 'Slobodan',
            'kancelarija_id' => 8,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Šapić',
            'ime' => 'Verica',
            'kancelarija_id' => 8,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Veličković',
            'ime' => 'Marija',
            'kancelarija_id' => 8,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jevtić',
            'ime' => 'Ljiljana',
            'kancelarija_id' => 8,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Erić',
            'ime' => 'Karolina',
            'kancelarija_id' => 8,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jovanović',
            'ime' => 'Gordana',
            'kancelarija_id' => 8,
            'uprava_id' => 2,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Miletić',
            'ime' => 'Vesna',
            'kancelarija_id' => 9,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Dimitrijević',
            'ime' => 'Vesna',
            'kancelarija_id' => 9,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milenković',
            'ime' => 'Svetlana',
            'kancelarija_id' => 9,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Bojović',
            'ime' => 'Jelena',
            'kancelarija_id' => 9,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Bojović',
            'ime' => 'Snežana',
            'kancelarija_id' => 9,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Davidović',
            'ime' => 'Zoran',
            'kancelarija_id' => 9,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jakovljević',
            'ime' => 'Nevenka',
            'kancelarija_id' => 9,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radojević',
            'ime' => 'Zoran',
            'kancelarija_id' => 9,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Nešković',
            'ime' => 'Slavica',
            'kancelarija_id' => 9,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stanišić',
            'ime' => 'Vesna',
            'kancelarija_id' => 9,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stevanović',
            'ime' => 'Vesna',
            'kancelarija_id' => 10,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ćurčić',
            'ime' => 'Zora',
            'kancelarija_id' => 10,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Rihterović',
            'ime' => 'Jasmina',
            'kancelarija_id' => 10,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radovanović',
            'ime' => 'Zorica',
            'kancelarija_id' => 10,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Katušić',
            'ime' => 'Biljana',
            'kancelarija_id' => 10,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Brkić',
            'ime' => 'Dragan',
            'kancelarija_id' => 10,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Tanasijević',
            'ime' => 'Svetlana',
            'kancelarija_id' => 10,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Aleksić',
            'ime' => 'Goran',
            'kancelarija_id' => 10,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radović',
            'ime' => 'Jelisaveta',
            'kancelarija_id' => 10,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Nikolić',
            'ime' => 'Milijana',
            'kancelarija_id' => 10,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jakovljević',
            'ime' => 'Svetlana',
            'kancelarija_id' => 11,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petronijević',
            'ime' => 'Svetlana',
            'kancelarija_id' => 11,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Tasić',
            'ime' => 'Nikola',
            'kancelarija_id' => 11,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Šamanović',
            'ime' => 'Slavica',
            'kancelarija_id' => 11,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stevanović',
            'ime' => 'Milija',
            'kancelarija_id' => 11,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Bogdanović',
            'ime' => 'Snežana',
            'kancelarija_id' => 11,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Nenadović',
            'ime' => 'Snežana',
            'kancelarija_id' => 11,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marković',
            'ime' => 'Saša',
            'kancelarija_id' => 11,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marinković',
            'ime' => 'Gordana',
            'kancelarija_id' => 11,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Šećić',
            'ime' => 'Edi',
            'kancelarija_id' => 11,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stojanović',
            'ime' => 'Radoslav',
            'kancelarija_id' => 12,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stepović',
            'ime' => 'Slavica',
            'kancelarija_id' => 12,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Josić',
            'ime' => 'Radoje',
            'kancelarija_id' => 12,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Spasenić',
            'ime' => 'Tomislav',
            'kancelarija_id' => 12,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Nedeljković',
            'ime' => 'Radojica',
            'kancelarija_id' => 12,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Andrić',
            'ime' => 'Dragica',
            'kancelarija_id' => 12,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Obradović',
            'ime' => 'Nebojša',
            'kancelarija_id' => 12,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Furtula',
            'ime' => 'Svetlana',
            'kancelarija_id' => 12,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Tođeraš',
            'ime' => 'Jasmina',
            'kancelarija_id' => 12,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Miloradović',
            'ime' => 'Gordana',
            'kancelarija_id' => 12,
            'uprava_id' => 3,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Drobnjaković',
            'ime' => 'Sofija',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Spasić',
            'ime' => 'Jasmina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Tanasković',
            'ime' => 'Tatjana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milentijević',
            'ime' => 'Bojan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Matić',
            'ime' => 'LJiljana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Mladenović',
            'ime' => 'Milosav',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Mojsilović',
            'ime' => 'Danijela',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ćosić',
            'ime' => 'Dobrila',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stanojević',
            'ime' => 'LJiljana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Pajović',
            'ime' => 'Vesna',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Momčilović',
            'ime' => 'Snežana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milutinović',
            'ime' => 'Miroljub',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Todorović',
            'ime' => 'Mirjana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đinđić',
            'ime' => 'Slavica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Tasić',
            'ime' => 'Gordana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đoković',
            'ime' => 'Jasmina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Todorović',
            'ime' => 'Svešana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Čimburović',
            'ime' => 'Gordana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ristović',
            'ime' => 'Slavica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radević',
            'ime' => 'Stanko',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Čanić',
            'ime' => 'Nenad',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stević',
            'ime' => 'Milovan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Sekulić',
            'ime' => 'LJiljana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jovović',
            'ime' => 'Mila',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đurđević',
            'ime' => 'Snežana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marković',
            'ime' => 'Vesna',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stevanović',
            'ime' => 'Nataša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Arsenijević',
            'ime' => 'Dragana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stoiljković',
            'ime' => 'Ivica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Pejović',
            'ime' => 'Mirjana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrović',
            'ime' => 'Biljana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Miloradović',
            'ime' => 'Danijela',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Živadinović',
            'ime' => 'Zorica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marinković',
            'ime' => 'Gordana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vukašinović',
            'ime' => 'Elizabeta',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Sekulić-Milojević',
            'ime' => 'Vesna',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Mihajlović',
            'ime' => 'Snežana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stević',
            'ime' => 'Slađana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Lazović',
            'ime' => 'Svetlana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Josić',
            'ime' => 'Katarina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jolić',
            'ime' => 'Rada',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radovanović',
            'ime' => 'Ilija',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stefanović',
            'ime' => 'Božana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Matić',
            'ime' => 'Zoran',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Pešić',
            'ime' => 'Dragana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Šoškić',
            'ime' => 'Ivana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Sretenović',
            'ime' => 'Dragan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Čalija',
            'ime' => 'Dragana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Kostadinović',
            'ime' => 'Zoran',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jelesijević',
            'ime' => 'Gordana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Novosel',
            'ime' => 'Biljana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milojević',
            'ime' => 'Zoran',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jovanović',
            'ime' => 'Danijela',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ranković',
            'ime' => 'Mirjana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Matijašević',
            'ime' => 'Dejan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vidanović',
            'ime' => 'Boban',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Tašović',
            'ime' => 'Goran',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radojković',
            'ime' => 'Nataša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Janković',
            'ime' => 'Vesna',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stojković',
            'ime' => 'Slavoljub',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jovović',
            'ime' => 'Zoran',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Savić',
            'ime' => 'Vesna',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Slavujac',
            'ime' => 'Snežana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Koković',
            'ime' => 'Danijela',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milić',
            'ime' => 'Ljiljana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Nikolić',
            'ime' => 'Saša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Gajović-Marković',
            'ime' => 'Mirjana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Tomić',
            'ime' => 'Gordana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Lazarević',
            'ime' => 'Danijela',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Savić',
            'ime' => 'Verko',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Živković',
            'ime' => 'Goran',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đaković',
            'ime' => 'Dragana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrović',
            'ime' => 'Rodoljub',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrović',
            'ime' => 'Dejan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Brkić',
            'ime' => 'LJiljana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Blagojević',
            'ime' => 'Biljana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marković',
            'ime' => 'Olivera',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Čaušević',
            'ime' => 'Zoran',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Dudić',
            'ime' => 'Vlado',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Leković',
            'ime' => 'Vesna',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milić',
            'ime' => 'Nebojša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milenković',
            'ime' => 'Gordana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Maksimović',
            'ime' => 'Bojan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stanić',
            'ime' => 'Bojana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đurđević',
            'ime' => 'Anđelka',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ristić',
            'ime' => 'Vladan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vuković',
            'ime' => 'Nikola',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Savić',
            'ime' => 'Gordana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milašinović',
            'ime' => 'Svetlana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Mladićević',
            'ime' => 'Vojislav',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marinković',
            'ime' => 'Dragan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marinković-Gabarić',
            'ime' => 'Mirjana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Paunović',
            'ime' => 'Miroslav',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Leković',
            'ime' => 'Milomirka',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Gajović',
            'ime' => 'Miroslav',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Drobnjak',
            'ime' => 'Danijela',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stojanović',
            'ime' => 'Smiljana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vulović',
            'ime' => 'Radosav',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Drobnjak',
            'ime' => 'Darko',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Janković',
            'ime' => 'Ivana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jovanović',
            'ime' => 'Nadežda',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Pešić-radosavljević',
            'ime' => 'Nataša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Krstić',
            'ime' => 'Milica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Janić',
            'ime' => 'Suzana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milovuk',
            'ime' => 'Nenad',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milivojević',
            'ime' => 'Miroslav',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jelenković',
            'ime' => 'Jelena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Tomašević',
            'ime' => 'Predrag',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milenković',
            'ime' => 'Dušan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Kaličanin',
            'ime' => 'Aleksandar',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Arsenijević',
            'ime' => 'Miloš',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radivojević',
            'ime' => 'Milan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Šarović',
            'ime' => 'Mitar',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đorđević',
            'ime' => 'Marija',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đurđević',
            'ime' => 'Jasmina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Durutović',
            'ime' => 'Jadranka',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Mrkalj',
            'ime' => 'Dragana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milosavljević',
            'ime' => 'Miloje',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Bogdanovski',
            'ime' => 'Zoran',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Preković',
            'ime' => 'LJubica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Savković',
            'ime' => 'Zorica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Babović',
            'ime' => 'Dragan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stanišić',
            'ime' => 'Sonja',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radojević',
            'ime' => 'Slavoljub',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đoković-Pejčić',
            'ime' => 'Nataša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vujić',
            'ime' => 'Zoran',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Andrić',
            'ime' => 'Mirjana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milanović',
            'ime' => 'Miona',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Pavlović',
            'ime' => 'Suzana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Preković',
            'ime' => 'Dragan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milićević',
            'ime' => 'Saša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jakšić',
            'ime' => 'Jagoš',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Lomović',
            'ime' => 'Slobodan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Grbović',
            'ime' => 'Svetlana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radaković',
            'ime' => 'Slađana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ivanović-Popadić',
            'ime' => 'Snežana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Kićanović',
            'ime' => 'Jelena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Bugarčić',
            'ime' => 'Nataša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Urošević',
            'ime' => 'Marija',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrović',
            'ime' => 'Zoran',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Domanović',
            'ime' => 'Aleksandar',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Dedić',
            'ime' => 'Jelica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Krstić',
            'ime' => 'Dejan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Tucaković',
            'ime' => 'Vesna',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Kuhinković',
            'ime' => 'Nataša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stojisavljević',
            'ime' => 'Marija',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radović',
            'ime' => 'Rajko',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Veličković',
            'ime' => 'Radmila',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Kostić',
            'ime' => 'Anica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Tešović',
            'ime' => 'Milena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Miljković',
            'ime' => 'Zlatko',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marković',
            'ime' => 'Milica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ćalić',
            'ime' => 'Bogdan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stikić',
            'ime' => 'Aleksandar',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radojević',
            'ime' => 'Ana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marković',
            'ime' => 'Gordana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrović',
            'ime' => 'Mišel',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Konatar',
            'ime' => 'Nebojša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Todorović',
            'ime' => 'Bojan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Antonijević',
            'ime' => 'Ivana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrović',
            'ime' => 'Tamara',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Matijašević',
            'ime' => 'Danijela',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đurđević',
            'ime' => 'Slavica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Čolić',
            'ime' => 'Živomir',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrović',
            'ime' => 'Novica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ranđelović',
            'ime' => 'Dragica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radosavljević',
            'ime' => 'Jelena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Matić-Pavlović',
            'ime' => 'Aleksandra',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Tomašević',
            'ime' => 'Jasna',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Živković',
            'ime' => 'Marina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jontulović',
            'ime' => 'Irena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Bojović',
            'ime' => 'Danijela',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Mirković',
            'ime' => 'Slobodan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Janković',
            'ime' => 'Ana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ristić',
            'ime' => 'Jelena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Nikolić',
            'ime' => 'Marija',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milić',
            'ime' => 'Marina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Mihajlović',
            'ime' => 'Ivana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ilić',
            'ime' => 'Katarina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Kokić',
            'ime' => 'Mirjana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đerovski',
            'ime' => 'Vladan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ristić',
            'ime' => 'Vesna',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Dugalić',
            'ime' => 'Danica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Mihajlović',
            'ime' => 'Mirjana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Janković-Škrbić',
            'ime' => 'Gordana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Zorić',
            'ime' => 'Andrijana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đukić',
            'ime' => 'Slađana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Tomić',
            'ime' => 'Dejan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Mihailova',
            'ime' => 'Slavica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Kokerić',
            'ime' => 'Saša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ristić',
            'ime' => 'Jovan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Todorović',
            'ime' => 'Radica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milosavljević',
            'ime' => 'Vesna',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Delibašić',
            'ime' => 'Dejan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Andrejević',
            'ime' => 'Nebojša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Bećarević',
            'ime' => 'Jasmina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marinković',
            'ime' => 'LJiljana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Tucaković',
            'ime' => 'Milutin',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Kalušević',
            'ime' => 'Mila',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Veličković',
            'ime' => 'Jadranka',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Nektarijević',
            'ime' => 'Sandra',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milojević',
            'ime' => 'Jasna',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milošević',
            'ime' => 'Katarina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milutinović',
            'ime' => 'Milorad',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stojanović',
            'ime' => 'Vladan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vasiljević',
            'ime' => 'Ana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marković',
            'ime' => 'Mirjana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Aksentijević',
            'ime' => 'Dragan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Pavlović',
            'ime' => 'Slađana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Krsmanović',
            'ime' => 'Jugoslav',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marković',
            'ime' => 'Nebojša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrović',
            'ime' => 'Javorka',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Krstović',
            'ime' => 'Aleksandar',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jovanović',
            'ime' => 'Milica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Žunić',
            'ime' => 'Dušanka',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milić',
            'ime' => 'Zlatko',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Dimitrijević',
            'ime' => 'Jasna',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ignjatović',
            'ime' => 'Mihailo',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vasiljević',
            'ime' => 'Sanja',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Miletić',
            'ime' => 'Nikola',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Srećković',
            'ime' => 'Bojana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Sterđević',
            'ime' => 'Nikola',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đorđević',
            'ime' => 'Gordana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Mrdak',
            'ime' => 'Daliborka',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrićević',
            'ime' => 'LJiljana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radosavljević',
            'ime' => 'Sandra',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ćupić-Lazarević',
            'ime' => 'Ivana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Dumbelović',
            'ime' => 'Jelena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Simović',
            'ime' => 'Nevena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Riznić',
            'ime' => 'Dejan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Kočović',
            'ime' => 'Nadica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Mirčetić',
            'ime' => 'Bratislav',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Janković',
            'ime' => 'Radiša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radovanović',
            'ime' => 'Vesna',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Alempijević',
            'ime' => 'Mirjana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrović',
            'ime' => 'Svetlana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jakovljević',
            'ime' => 'Gordana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrović',
            'ime' => 'Zorica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ivanović',
            'ime' => 'Katarina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radovanović',
            'ime' => 'Rade',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Zdravković',
            'ime' => 'Zoran',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Nidžović',
            'ime' => 'Aleksandar',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Lazarević',
            'ime' => 'Ivan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Simović',
            'ime' => 'Tina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Komatović-Andonović',
            'ime' => 'Ana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Filipović',
            'ime' => 'Bojan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đorđević',
            'ime' => 'Duško',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Tijanić',
            'ime' => 'Aleksandra',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Mijailović',
            'ime' => 'Saša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Josifović',
            'ime' => 'Danijela',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ranđelović',
            'ime' => 'Verica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jevđić-Stanarčić',
            'ime' => 'Mirjana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đoković',
            'ime' => 'Dragan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milentijević',
            'ime' => 'Saša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milošević',
            'ime' => 'Miloš',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đorić',
            'ime' => 'Zorica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Glišić',
            'ime' => 'Miloš',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jagličić',
            'ime' => 'Božidarka',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrović',
            'ime' => 'Goran',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrović',
            'ime' => 'Dragana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Tomić',
            'ime' => 'Biljana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marić',
            'ime' => 'Predrag',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radojković',
            'ime' => 'Sanja',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jelesijević',
            'ime' => 'Nenad',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radosavljević',
            'ime' => 'LJiljana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Dumić',
            'ime' => 'Nikola',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Savić',
            'ime' => 'Maja',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marić',
            'ime' => 'Vladimir',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Pantić',
            'ime' => 'Predrag',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Leković',
            'ime' => 'Veljko',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Simeunović-Đorđević',
            'ime' => 'Svetlana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jovanović',
            'ime' => 'Tatjana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Konatar',
            'ime' => 'Jasmina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radovanović',
            'ime' => 'Zvezdana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Iskrenović',
            'ime' => 'Dejan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Kašiković',
            'ime' => 'Vladana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Živković',
            'ime' => 'Danica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Veljanović',
            'ime' => 'Ivana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Kuzmanović',
            'ime' => 'Vanja',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Iskrenov-Aleksić',
            'ime' => 'Ružica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ćirković',
            'ime' => 'Slađana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Novaković',
            'ime' => 'Dragana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Miljojković',
            'ime' => 'Radomir',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jekić',
            'ime' => 'Marija',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Pajović',
            'ime' => 'Žikica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Simonović',
            'ime' => 'Radoje',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stefanović',
            'ime' => 'Tatjana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milinković',
            'ime' => 'Marija',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jovanović',
            'ime' => 'Danica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radovanović',
            'ime' => 'Dragoš',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milićević',
            'ime' => 'Predrag',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Veselinović',
            'ime' => 'Nataša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Veinović',
            'ime' => 'Jelena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ćirović-holender',
            'ime' => 'Mirjana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đošić',
            'ime' => 'Milanka',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stanković',
            'ime' => 'Zorica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stepović',
            'ime' => 'Nada',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Živanović',
            'ime' => 'Marija',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ranković',
            'ime' => 'Maja',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stanković',
            'ime' => 'Goran',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Lazarević',
            'ime' => 'Svetomir',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vujnović',
            'ime' => 'Svetlana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Janić',
            'ime' => 'Milina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Antić',
            'ime' => 'Tamara',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milićević',
            'ime' => 'Zorica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milojević',
            'ime' => 'Irena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stojanović',
            'ime' => 'Sanja',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vujičić',
            'ime' => 'Slađana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ristović',
            'ime' => 'Vera',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Timotijević',
            'ime' => 'Jelena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Bundalo',
            'ime' => 'Dragana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stamatović',
            'ime' => 'Mirjana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đorđević',
            'ime' => 'Nenad',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Savić',
            'ime' => 'Ana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vuksanović',
            'ime' => 'Dragoslav',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stevanović',
            'ime' => 'Biljana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stojanović',
            'ime' => 'Predrag',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radenković',
            'ime' => 'Jelena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Tanasković',
            'ime' => 'Irena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milanović',
            'ime' => 'Vojislav',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Živković',
            'ime' => 'Aca',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Živanović',
            'ime' => 'Zvonko',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Rašković',
            'ime' => 'Marko',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marković',
            'ime' => 'Gordana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Krsmanović',
            'ime' => 'Zoran',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Velečković',
            'ime' => 'Aleksandra',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milićević',
            'ime' => 'LJiljana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Lukić',
            'ime' => 'Snežana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Pavlović',
            'ime' => 'Danijela',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Živadinović',
            'ime' => 'Marija',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jovanović',
            'ime' => 'Jelena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Srejić',
            'ime' => 'Milanka',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Simović',
            'ime' => 'Slobodanka',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Blažić',
            'ime' => 'Snežana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Parezanović',
            'ime' => 'Svetlana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Janković',
            'ime' => 'Vladan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Savić-Jovanović',
            'ime' => 'Aleksandra',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Mladenović',
            'ime' => 'Aleksandra',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Čomagić-Popović',
            'ime' => 'Danijela',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Nikolić',
            'ime' => 'Dragana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Babić',
            'ime' => 'Tamara',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Nestorović',
            'ime' => 'Svetlana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Hadžić',
            'ime' => 'Biljana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Pantović',
            'ime' => 'Ivica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrović',
            'ime' => 'Mario',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milošević',
            'ime' => 'Matović  Marija',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stanisavljević',
            'ime' => 'Danijela',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Antonijević',
            'ime' => 'Jelena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Kalajdžić',
            'ime' => 'Slađana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radosavljević',
            'ime' => 'Predrag',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Filipović',
            'ime' => 'Gordana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Bućan',
            'ime' => 'Katarina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrić',
            'ime' => 'Dalibor',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Matić',
            'ime' => 'Nebojša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đekić',
            'ime' => 'Vladimir',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Paunović',
            'ime' => 'Đorđe',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marjanović',
            'ime' => 'Zorica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đekić',
            'ime' => 'Boško',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Grujić',
            'ime' => 'Katarina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Cvijetić',
            'ime' => 'Miro',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Mijatović',
            'ime' => 'Dragana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radosavčević',
            'ime' => 'Olga',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Pršić',
            'ime' => 'LJiljana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jevtić',
            'ime' => 'Danijela',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vasojević',
            'ime' => 'Olivera',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milošević',
            'ime' => 'Danijela',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Kimpanov',
            'ime' => 'Ana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milićević',
            'ime' => 'Đorđe',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Nešić-šarić',
            'ime' => 'Sanja',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Srejić',
            'ime' => 'Jelena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stojanović',
            'ime' => 'Dejan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Popović',
            'ime' => 'Ivan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Kuzmanović',
            'ime' => 'Jovan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Paunović',
            'ime' => 'Nikola',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Simonović',
            'ime' => 'Ana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Kovačević',
            'ime' => 'Ivan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Palčić',
            'ime' => 'Slađana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Mitrović',
            'ime' => 'Dragan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Obradović',
            'ime' => 'Predrag',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Zdravković',
            'ime' => 'Miloš',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ranković',
            'ime' => 'Predrag',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radenković',
            'ime' => 'Nenad',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Pavlović-Kocuvan',
            'ime' => 'Nataša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marković',
            'ime' => 'Saša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radojević',
            'ime' => 'Katarina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Paunović',
            'ime' => 'Mirjana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Sotirov-Stefanović',
            'ime' => 'Danijela',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Pavlović',
            'ime' => 'Zoran',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đurović',
            'ime' => 'Milostiva',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Rosić',
            'ime' => 'Katarina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Brkić',
            'ime' => 'Marijana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milanović',
            'ime' => 'Marijana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Fajht',
            'ime' => 'Vanja',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Janković',
            'ime' => 'Gordana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milovanović',
            'ime' => 'Bratislav',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Lazović',
            'ime' => 'Gordana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Banković',
            'ime' => 'Sandra',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vukašinović',
            'ime' => 'Marija',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Lekić',
            'ime' => 'Žarko',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Trajkovski',
            'ime' => 'Dubravka',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stanojević',
            'ime' => 'Sanja',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Obrović',
            'ime' => 'Milan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Filipović',
            'ime' => 'Radmila',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vranić',
            'ime' => 'Vojin',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Grebović',
            'ime' => 'Darko',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Aničić',
            'ime' => 'Dušan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vukić',
            'ime' => 'Nikola',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stojanović',
            'ime' => 'Gordana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marković',
            'ime' => 'Katarina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Lazić',
            'ime' => 'Ivan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stojilović',
            'ime' => 'Jovan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Otašević',
            'ime' => 'Marija',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Anastasijević',
            'ime' => 'Ivan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Tanasijević',
            'ime' => 'Bojana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Prokić',
            'ime' => 'Danijela',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jovanović',
            'ime' => 'Tamara',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đoković',
            'ime' => 'Marija',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrović',
            'ime' => 'Srđan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marković',
            'ime' => 'Dejan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radivojević',
            'ime' => 'Miloš',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Aksić',
            'ime' => 'Jelena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marinković',
            'ime' => 'Milica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Gobeljić',
            'ime' => 'Ivana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Pavlović',
            'ime' => 'Bojan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Damnjanović',
            'ime' => 'Marija',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milovanović',
            'ime' => 'Jasmina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Trifunović',
            'ime' => 'Marija',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vračar',
            'ime' => 'Miletić Bojana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrić',
            'ime' => 'Ana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ribarić',
            'ime' => 'Nikola',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đurić',
            'ime' => 'Danijela',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đokanović',
            'ime' => 'Bojan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stanković',
            'ime' => 'Jelena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Arsenijević',
            'ime' => 'Katarina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vujić',
            'ime' => 'Slađana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Samardžić',
            'ime' => 'Aleksandra',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Glišović',
            'ime' => 'Marija',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milosavljević',
            'ime' => 'Ana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Bujaković',
            'ime' => 'Dragana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ilić',
            'ime' => 'Andreja',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stanković',
            'ime' => 'Nikola',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Todorović',
            'ime' => 'Vladimir',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Matković',
            'ime' => 'Nataša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Nenadović',
            'ime' => 'Radica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stojadinović',
            'ime' => 'Vesna',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrović',
            'ime' => 'Aleksandar',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marković',
            'ime' => 'Dragana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jovanović',
            'ime' => 'Nataša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jeremić-ilić',
            'ime' => 'Nela',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milenković',
            'ime' => 'Nikola',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Šušić',
            'ime' => 'Dragana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milošević',
            'ime' => 'Milan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Kijanović',
            'ime' => 'Bojan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Pavlović',
            'ime' => 'Milan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milenković',
            'ime' => 'Saša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đurić',
            'ime' => 'Slobodan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Gobeljić',
            'ime' => 'Zvonko',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Pejović',
            'ime' => 'Ivana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ilić',
            'ime' => 'Biljana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Gajić',
            'ime' => 'Jelena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radojičić',
            'ime' => 'Jelena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vuković',
            'ime' => 'Valentina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Aleksić',
            'ime' => 'Katarina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Korica',
            'ime' => 'Milan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Pejović',
            'ime' => 'Vladimir',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milosavljević',
            'ime' => 'Đorđe',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milenković',
            'ime' => 'Aleksandar',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ristić',
            'ime' => 'Veronika',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vujsić',
            'ime' => 'Srđan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Cvetković',
            'ime' => 'Bojan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Gorgievski',
            'ime' => 'Zlatko',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Gicić-Milojević',
            'ime' => 'Marijana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Nikolić',
            'ime' => 'Dušan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marjanović',
            'ime' => 'Zoran',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Kitonjić',
            'ime' => 'Marko',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stojanović',
            'ime' => 'Olivera',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Sokolović',
            'ime' => 'Ana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đukić',
            'ime' => 'Milija',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đokić',
            'ime' => 'Snežana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marjanović-Končar',
            'ime' => 'Milena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Filipović',
            'ime' => 'Sanja',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đokić',
            'ime' => 'Boris',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milojković',
            'ime' => 'Mirjana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vučković',
            'ime' => 'Nikola',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marinković',
            'ime' => 'Ana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Bošković',
            'ime' => 'Mirjana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Janković',
            'ime' => 'Bojan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Lazić',
            'ime' => 'Biljana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Mirkov',
            'ime' => 'Nenad',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Simović',
            'ime' => 'Biljana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stefanović',
            'ime' => 'Vanja',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jevtović',
            'ime' => 'Gordana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Todorović',
            'ime' => 'Ivana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Obradović-stanić',
            'ime' => 'Ivana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Tomić',
            'ime' => 'Danka',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Rajačić',
            'ime' => 'Zvezdana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrović',
            'ime' => 'Lela',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Aćimović',
            'ime' => 'Jagoda',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đorđević',
            'ime' => 'Tomislav',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radojević',
            'ime' => 'Tamara',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jakšić',
            'ime' => 'Veselin',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Samailović',
            'ime' => 'Suzana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ivanić',
            'ime' => 'Goran',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Obradović',
            'ime' => 'Isidora',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milojević',
            'ime' => 'Suzana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Nikolić',
            'ime' => 'Mirela',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ilić',
            'ime' => 'Vanja',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Zorić',
            'ime' => 'Slavica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Soković',
            'ime' => 'Saša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radenković',
            'ime' => 'Saša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Gudžulić',
            'ime' => 'Marina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Stevanović',
            'ime' => 'Mladen',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jovanović',
            'ime' => 'Zorica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Bošković-Simić',
            'ime' => 'Dragana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Veljković',
            'ime' => 'Andra',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ristić',
            'ime' => 'Katarina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Urošević',
            'ime' => 'Nikola',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Maksimović',
            'ime' => 'Vladimir',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Prokić',
            'ime' => 'Zoran',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Nikolić',
            'ime' => 'Radomir',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radisavljević',
            'ime' => 'Slađana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Damnjanović',
            'ime' => 'Gordana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Župljanić',
            'ime' => 'Dušan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Nešić',
            'ime' => 'Dejan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Markov-Mrdaković',
            'ime' => 'Brankica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ratković',
            'ime' => 'Milijana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Miljojković',
            'ime' => 'Anđela',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đoković',
            'ime' => 'Zorica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radisavljević',
            'ime' => 'Nataša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ćurić',
            'ime' => 'Vesna',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radojković',
            'ime' => 'Snežana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milošević',
            'ime' => 'Aleksandar',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrović',
            'ime' => 'Nataša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marković',
            'ime' => 'Vladimir',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vuković-Živanović',
            'ime' => 'Tanja',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Leković',
            'ime' => 'Marija',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Janićijević',
            'ime' => 'Nataša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Prodanović',
            'ime' => 'Katarina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Luković',
            'ime' => 'Ana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vuković',
            'ime' => 'Veljko',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ivanović',
            'ime' => 'Momčilo',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Grebović',
            'ime' => 'Dragan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Popadić',
            'ime' => 'Milena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Srejović',
            'ime' => 'Milan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Nenković',
            'ime' => 'Aleksandar',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ćupić',
            'ime' => 'Dušica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Kesić',
            'ime' => 'Sonja',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petronijević',
            'ime' => 'Branko',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jokić',
            'ime' => 'Miroslav',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milosavljević',
            'ime' => 'Verica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vićentijević',
            'ime' => 'Ana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Matić',
            'ime' => 'Milena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Perović',
            'ime' => 'Sanja',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Miljković',
            'ime' => 'Aleksandar',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Pršić',
            'ime' => 'Nenad',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Bosić',
            'ime' => 'Vladisav',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Krljar-Rančić',
            'ime' => 'Ana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Srejović',
            'ime' => 'Božidar',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Simić',
            'ime' => 'Snežana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Rafailović',
            'ime' => 'Dragana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ilić',
            'ime' => 'Miodrag',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrašinović',
            'ime' => 'Miroslav',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Nikezić',
            'ime' => 'Stefan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jovičić',
            'ime' => 'Jelena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Kočović',
            'ime' => 'Marija',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Petrović',
            'ime' => 'Milica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Rakić',
            'ime' => 'Đorđe',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milojević',
            'ime' => 'Marija',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Živić',
            'ime' => 'Danijela',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Delević',
            'ime' => 'Dragana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Murati',
            'ime' => 'Tijana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Đorđević',
            'ime' => 'Stefan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Šćepanović',
            'ime' => 'Nešo',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Radivojević',
            'ime' => 'Predrag',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Marković',
            'ime' => 'Srđan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Pavlović',
            'ime' => 'Miloš',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Ilić',
            'ime' => 'Aleksandar',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Miljković',
            'ime' => 'Miljko',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Erić',
            'ime' => 'Nataša',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Dimitrijević',
            'ime' => 'Bojan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Miljković',
            'ime' => 'Katarina',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vukosavljević',
            'ime' => 'Slavica',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Kandić',
            'ime' => 'Ana',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Jakovljević',
            'ime' => 'Andrea',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Rakić-Jevtić',
            'ime' => 'Marija',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Vukićević',
            'ime' => 'Marko',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Milojević',
            'ime' => 'Dušan',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => 'Simić',
            'ime' => 'Milena',
            'kancelarija_id' => 1,
            'uprava_id' => 1,
        ]);

        DB::commit();
    }

}
