<?php

use Illuminate\Database\Seeder;

class OtpremnicaStavke extends Seeder
{

    public function run()
    {
        DB::table('otpremnice_stavke')->insert([
            'otpremnica_id' => 1,
            'naziv' => 'MBD',
            'kolicina' => 0,
            'jedinica_mere' => 1,
            'vrsta_uredjaja_id' => 6,
        ]);
        DB::table('otpremnice_stavke')->insert([
            'otpremnica_id' => 1,
            'naziv' => 'CPU',
            'kolicina' => 0,
            'jedinica_mere' => 1,
            'vrsta_uredjaja_id' => 7,
        ]);
        DB::table('otpremnice_stavke')->insert([
            'otpremnica_id' => 1,
            'naziv' => 'VGA',
            'kolicina' => 0,
            'jedinica_mere' => 1,
            'vrsta_uredjaja_id' => 8,
        ]);
        DB::table('otpremnice_stavke')->insert([
            'otpremnica_id' => 1,
            'naziv' => 'RAM',
            'kolicina' => 0,
            'jedinica_mere' => 1,
            'vrsta_uredjaja_id' => 9,
        ]);
        DB::table('otpremnice_stavke')->insert([
            'otpremnica_id' => 1,
            'naziv' => 'HDD',
            'kolicina' => 0,
            'jedinica_mere' => 1,
            'vrsta_uredjaja_id' => 10,
        ]);
        DB::table('otpremnice_stavke')->insert([
            'otpremnica_id' => 1,
            'naziv' => 'Napajanje',
            'kolicina' => 0,
            'jedinica_mere' => 1,
            'vrsta_uredjaja_id' => 11,
        ]);
    }

}
