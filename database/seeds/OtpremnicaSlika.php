<?php

use Illuminate\Database\Seeder;

class OtpremnicaSlika extends Seeder
{

    public function run()
    {
        DB::table('otpremnice_slike')->insert([
            'otpremnica_id' => 1,
            'src' => '',
        ]);
    }

}
