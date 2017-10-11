<?php

use Illuminate\Database\Seeder;

class RacuniSlike extends Seeder
{
    public function run()
    {
        DB::table('racuni_slike')->insert([
            'racun_id' => 1,
            'src' => 'https://cdn.thinglink.me/api/image/645162879728746498/230/230/thumbnail',
        ]);
        DB::table('racuni_slike')->insert([
            'racun_id' => 2,
            'src' => 'http://www.navidiku.rs/firme/upload/Slanina.jpg',
        ]);
        DB::table('racuni_slike')->insert([
            'racun_id' => 2,
            'src' => 'https://splavpicerijapingvin.com/wp-content/uploads/2017/06/salate-kupus-salata-600x530.jpg',
        ]);
    }
}
