<?php

use Illuminate\Database\Seeder;

class OtpremnicaSlika extends Seeder
{

    public function run()
    {
        DB::table('otpremnice_slike')->insert([
            'otpremnica_id' => 1,
            'src' => 'https://cdn.thinglink.me/api/image/645162879728746498/230/230/thumbnail',
        ]);
        DB::table('otpremnice_slike')->insert([
            'otpremnica_id' => 2,
            'src' => 'http://www.navidiku.rs/firme/upload/Slanina.jpg',
        ]);
    }
}
