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

    public function upsovi()
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

    public function uredjaji()
    {
        if (!$this->monitori->isEmpty()) {
            return $this->monitori();
        } elseif (!$this->procesori->isEmpty()) {
            return $this->procesori();
        } elseif (!$this->stampaci->isEmpty()) {
            return $this->stampaci();
        } elseif (!$this->skeneri->isEmpty()) {
            return $this->skeneri();
        } elseif (!$this->upsovi->isEmpty()) {
            return $this->upsovi();
        } elseif (!$this->memorije->isEmpty()) {
            return $this->memorije();
        } elseif (!$this->osnovnePloce->isEmpty()) {
            return $this->osnovnePloce();
        } elseif (!$this->hddovi->isEmpty()) {
            return $this->hddovi();
        } elseif (!$this->napajanja->isEmpty()) {
            return $this->napajanja();
        } elseif (!$this->mrezniUredjaji->isEmpty()) {
            return $this->mrezniUredjaji();
        } elseif (!$this->projektori->isEmpty()) {
            return $this->projektori();
        } else {
            return null;
        }
    }

    public function vrstaUredjaja()
    {
        /*
         * Pod uslovom da nema dva uredjaja
         * razlicitog tipa na istoj stavci otpremnice
         */
        if (!$this->monitori->isEmpty() || !$this->stampaci->isEmpty() || !$this->skeneri->isEmpty() || !$this->upsovi->isEmpty()) {
            return 1;
        };
        if (!$this->memorije->isEmpty() || !$this->osnovnePloce->isEmpty() || !$this->hddovi->isEmpty() || !$this->napajanja->isEmpty() || !$this->procesori->isEmpty()) {
            return 2;
        };
        if (!$this->mrezniUredjaji->isEmpty()) {
            return 3;
        };
        if (!$this->projektori->isEmpty()) {
            return 4;
        };
        return 0;
    }

}
