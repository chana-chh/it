<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Reciklaza extends Model
{
    protected $table = 'reciklaza';
    public $timestamps = false;
 
    public function racunari()
    {
        return $this->hasMany('App\Modeli\Racunar', 'reciklirano_id', 'id');
    }

    public function monitori()
    {
        return $this->hasMany('App\Modeli\Monitor', 'reciklirano_id', 'id');
    }

    public function stampaci()
    {
        return $this->hasMany('App\Modeli\Stampac', 'reciklirano_id', 'id');
    }

    public function skeneri()
    {
        return $this->hasMany('App\Modeli\Skener', 'reciklirano_id', 'id');
    }

    public function upsevi()
    {
        return $this->hasMany('App\Modeli\Ups', 'reciklirano_id', 'id');
    }

    public function projektori()
    {
        return $this->hasMany('App\Modeli\Projektor', 'reciklirano_id', 'id');
    }

    public function mrezniUredjaji()
    {
        return $this->hasMany('App\Modeli\MrezniUredjaj', 'reciklirano_id', 'id');
    }

    public function memorije()
    {
        return $this->hasMany('App\Modeli\Memorija', 'reciklirano_id', 'id');
    }

    public function procesori()
    {
        return $this->hasMany('App\Modeli\Procesor', 'reciklirano_id', 'id');
    }

    public function osnovnePloce()
    {
        return $this->hasMany('App\Modeli\OsnovnaPloca', 'reciklirano_id', 'id');
    }

    public function hddovi()
    {
        return $this->hasMany('App\Modeli\Hdd', 'reciklirano_id', 'id');
    }

    public function napajanja()
    {
        return $this->hasMany('App\Modeli\Napajanje', 'reciklirano_id', 'id');
    }

    public function grafickiAdapteri()
    {
        return $this->hasMany('App\Modeli\GrafickiAdapter', 'reciklirano_id', 'id');
    }
}
