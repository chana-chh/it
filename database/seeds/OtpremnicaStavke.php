<?php

use Illuminate\Database\Seeder;

class OtpremnicaStavke extends Seeder
{

    public function run()
    {
        DB::table('otpremnice_stavke')->insert([
            'otpremnica_id' => 1,
            'naziv' => 'Hard diskovi',
            'kolicina' => 0,
            'jedinica_mere' => 1,
            'napomena' => 'Stari hard diskovi',
        ]);
        DB::table('otpremnice_stavke')->insert([
            'otpremnica_id' => 1,
            'naziv' => 'Memorija',
            'kolicina' => 0,
            'jedinica_mere' => 1,
            'napomena' => 'Stara memorija',
        ]);
        DB::table('otpremnice_stavke')->insert([
            'otpremnica_id' => 1,
            'naziv' => 'Osnovne Ploce',
            'kolicina' => 0,
            'jedinica_mere' => 1,
            'napomena' => 'Stare ploce',
        ]);
        DB::table('otpremnice_stavke')->insert([
            'otpremnica_id' => 1,
            'naziv' => 'VGA',
            'kolicina' => 0,
            'jedinica_mere' => 1,
            'napomena' => 'Stari VGA',
        ]);
        DB::table('otpremnice_stavke')->insert([
            'otpremnica_id' => 1,
            'naziv' => 'Monitori',
            'kolicina' => 0,
            'jedinica_mere' => 1,
            'napomena' => 'Stari Monitori',
        ]);
        DB::table('otpremnice_stavke')->insert([
            'otpremnica_id' => 1,
            'naziv' => 'Napajanja',
            'kolicina' => 0,
            'jedinica_mere' => 1,
            'napomena' => 'Stari Napajanja',
        ]);
        DB::table('otpremnice_stavke')->insert([
            'otpremnica_id' => 1,
            'naziv' => 'Stamapaci',
            'kolicina' => 0,
            'jedinica_mere' => 1,
            'napomena' => 'Stari Stamapaci',
        ]);
        DB::table('otpremnice_stavke')->insert([
            'otpremnica_id' => 1,
            'naziv' => 'UPS',
            'kolicina' => 0,
            'jedinica_mere' => 1,
            'napomena' => 'Stari UPS',
        ]);
        DB::table('otpremnice_stavke')->insert([
            'otpremnica_id' => 1,
            'naziv' => 'Projektori',
            'kolicina' => 0,
            'jedinica_mere' => 1,
            'napomena' => 'Stari Projektori',
        ]);
        DB::table('otpremnice_stavke')->insert([
            'otpremnica_id' => 1,
            'naziv' => 'CPU',
            'kolicina' => 0,
            'jedinica_mere' => 1,
            'napomena' => 'Stari CPU',
        ]);
        DB::table('otpremnice_stavke')->insert([
            'otpremnica_id' => 1,
            'naziv' => 'Skeneri',
            'kolicina' => 0,
            'jedinica_mere' => 1,
            'napomena' => 'Stari Skeneri',
        ]);
        DB::table('otpremnice_stavke')->insert([
            'otpremnica_id' => 1,
            'naziv' => 'Mrezni uredjaji',
            'kolicina' => 0,
            'jedinica_mere' => 1,
            'napomena' => 'Stari Mrezni uredjaji',
        ]);
        DB::table('otpremnice_stavke')->insert([
            'otpremnica_id' => 2,
            'naziv' => 'Hard disk',
            'kolicina' => 80,
            'jedinica_mere' => 1,
            'napomena' => 'hard diskov novi',
        ]);
        DB::table('otpremnice_stavke')->insert([
            'otpremnica_id' => 2,
            'naziv' => 'memorija',
            'kolicina' => 80,
            'jedinica_mere' => 1,
            'napomena' => 'Memorija nova',
        ]);
    }
}
