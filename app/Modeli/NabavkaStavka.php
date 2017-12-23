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

    public function vrstaUredjaja()
    {
        return $this->belongsTo('App\Modeli\VrstaUredjaja', 'vrsta_uredjaja_id', 'id');
    }

    public function uredjaji()
    {
        $id = $this->vrstaUredjaja->id;
        switch ($id) {
            case 1: return $this->racunari;
            case 2: return $this->monitori;
            case 3: return $this->stampaci;
            case 4: return $this->skeneri;
            case 5: return $this->upsevi;
            case 12: return $this->projektori;
            case 13: return $this->mrezniUredjaji;
            default : return null;
        }
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

}
