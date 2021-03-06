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

    public function nabavkeStavke()
    {
        return $this->hasMany('App\Modeli\NabavkaStavka', 'vrsta_uredjaja_id', 'id');
    }

    /**
     * OVO NE RADI BRE
     * Treba da bude u modelu gde se koristi
     * Vidi Model NabavkaStavka metod uredjaji()
     * 
     * @return type
     */
    public function uredjaji()
    {
        switch ($this->id) {
            case 1: return $this->racunari;
            case 2: return $this->monitori;
            case 3: return $this->stampaci;
            case 4: return $this->skeneri;
            case 5: return $this->upsevi;
            case 6: return $this->osnovnePloce;
            case 7: return $this->procesori;
            case 8: return $this->grafickiAdapteri;
            case 9: return $this->memorije;
            case 10: return $this->hddovi;
            case 11: return $this->napajanja;
            case 12: return $this->projektori;
            case 13: return $this->mrezniUredjaji;
            default : return null;
        }
    }

}
