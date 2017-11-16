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
        return $this->vrstaUredjaja->uredjaji();
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
