<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class VrstaUredjaja extends Model
{
    protected $table = 's_vrste_uredjaja';
    public $timestamps = false;

    public function racunari()
    {
        return $this->hasMany('App\Modeli\Racunar', 'vrsta_uredjaja_id', 'id');
    }

    public function monitori()
    {
        return $this->hasMany('App\Modeli\Monitor', 'vrsta_uredjaja_id', 'id');
    }

    public function osnovnePloce()
    {
        return $this->hasMany('App\Modeli\OsnovnaPloca', 'vrsta_uredjaja_id', 'id');
    }

    public function procesori()
    {
        return $this->hasMany('App\Modeli\Procesor', 'vrsta_uredjaja_id', 'id');
    }

    public function grafickiAdapteri()
    {
        return $this->hasMany('App\Modeli\GrafickiAdapter', 'vrsta_uredjaja_id', 'id');
    }

    public function stampaci()
    {
        return $this->hasMany('App\Modeli\Stampac', 'vrsta_uredjaja_id', 'id');
    }

    public function skeneri()
    {
        return $this->hasMany('App\Modeli\Skener', 'vrsta_uredjaja_id', 'id');
    }

    public function memorije()
    {
        return $this->hasMany('App\Modeli\Mmeorija', 'vrsta_uredjaja_id', 'id');
    }

    public function hddovi()
    {
        return $this->hasMany('App\Modeli\Hdd', 'vrsta_uredjaja_id', 'id');
    }

    public function upsevi()
    {
        return $this->hasMany('App\Modeli\Ups', 'vrsta_uredjaja_id', 'id');
    }

    public function napajanja()
    {
        return $this->hasMany('App\Modeli\Napajanje', 'vrsta_uredjaja_id', 'id');
    }

    public function projektori()
    {
        return $this->hasMany('App\Modeli\Projektor', 'vrsta_uredjaja_id', 'id');
    }

    public function mrezniUredjaji()
    {
        return $this->hasMany('App\Modeli\MrezniUredjaj', 'vrsta_uredjaja_id', 'id');
    }

    public function servisi()
    {
        return $this->hasMany('App\Modeli\Servis', 'vrsta_uredjaja_id', 'id');
    }

    public function nabavke()
    {
        return $this->hasMany('App\Modeli\Nabavka', 'vrsta_uredjaja_id', 'id');
    }

}
