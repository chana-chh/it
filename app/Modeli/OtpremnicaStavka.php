<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class OtpremnicaStavka extends Model
{
    protected $table = 'otpremnice_stavke';
    public $timestamps = false;

    public function otpremnica()
    {
        return $this->belongsTo('App\Modeli\Otpremnica', 'otpremnica_id', 'id');
    }

    public function monitori()
    {
        return $this->hasMany('App\Modeli\Monitor', 'stavka_otpremnice_id', 'id');
    }

    public function stampaci()
    {
        return $this->hasMany('App\Modeli\Stampac', 'stavka_otpremnice_id', 'id');
    }

    public function skeneri()
    {
        return $this->hasMany('App\Modeli\Skener', 'stavka_otpremnice_id', 'id');
    }

    public function memorije()
    {
        return $this->hasMany('App\Modeli\Memorija', 'stavka_otpremnice_id', 'id');
    }

    public function procesori()
    {
        return $this->hasMany('App\Modeli\Procesor', 'stavka_otpremnice_id', 'id');
    }

    public function osnovnePloce()
    {
        return $this->hasMany('App\Modeli\OsnovnaPloca', 'stavka_otpremnice_id', 'id');
    }

    public function hddovi()
    {
        return $this->hasMany('App\Modeli\Hdd', 'stavka_otpremnice_id', 'id');
    }

    public function upsevi()
    {
        return $this->hasMany('App\Modeli\Ups', 'stavka_otpremnice_id', 'id');
    }

    public function napajanja()
    {
        return $this->hasMany('App\Modeli\Napajanje', 'stavka_otpremnice_id', 'id');
    }

    public function mrezniUredjaji()
    {
        return $this->hasMany('App\Modeli\MrezniUredjaj', 'stavka_otpremnice_id', 'id');
    }

    public function projektori()
    {
        return $this->hasMany('App\Modeli\Projektor', 'stavka_otpremnice_id', 'id');
    }

    public function grafickiAdapteri()
    {
        return $this->hasMany('App\Modeli\GrafickiAdapter', 'stavka_otpremnice_id', 'id');
    }

}
