<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class NabavkaStavka extends Model
{
    protected $table = 'nabavke_stavke';
    public $timestamps = false;

    public function nabavka()
    {
        return $this->belongsTo('App\Modeli\Nabavka', 'nabavka_id', 'id');
    }

    public function racunari()
    {
        return $this->hasMany('App\Modeli\Racunar', 'stavka_nabavke_id', 'id');
    }

    public function monitori()
    {
        return $this->hasMany('App\Modeli\Monitor', 'stavka_nabavke_id', 'id');
    }

    public function stampaci()
    {
        return $this->hasMany('App\Modeli\Stampac', 'stavka_nabavke_id', 'id');
    }

    public function skeneri()
    {
        return $this->hasMany('App\Modeli\Skener', 'stavka_nabavke_id', 'id');
    }

    public function upsevi()
    {
        return $this->hasMany('App\Modeli\Ups', 'stavka_nabavke_id', 'id');
    }

    public function projektori()
    {
        return $this->hasMany('App\Modeli\Projektor', 'stavka_nabavke_id', 'id');
    }

    public function mrezniUredjaji()
    {
        return $this->hasMany('App\Modeli\MrezniUredjaj', 'stavka_nabavke_id', 'id');
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
