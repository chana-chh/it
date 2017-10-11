<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Nabavka extends Model
{
    protected $table = 'nabavke';
    public $timestamps = false;

    public function dobavljac()
    {
        return $this->belongsTo('App\Modeli\Dobavljac', 'dobavljac_id', 'id');
    }

    public function racunari()
    {
        return $this->hasMany('App\Modeli\Racunar', 'nabavka_id', 'id');
    }

    public function monitori()
    {
        return $this->hasMany('App\Modeli\Monitor', 'nabavka_id', 'id');
    }

    public function stampaci()
    {
        return $this->hasMany('App\Modeli\Stampac', 'nabavka_id', 'id');
    }

    public function skeneri()
    {
        return $this->hasMany('App\Modeli\Skener', 'nabavka_id', 'id');
    }

    public function upsevi()
    {
        return $this->hasMany('App\Modeli\Ups', 'nabavka_id', 'id');
    }

    public function projektori()
    {
        return $this->hasMany('App\Modeli\Projektor', 'nabavka_id', 'id');
    }

    public function mrezniUredjaji()
    {
        return $this->hasMany('App\Modeli\MrezniUredjaj', 'nabavka_id', 'id');
    }
}
