<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Zaposleni extends Model
{
    protected $table = 'zaposleni';
    public $timestamps = false;

    public function kancelarija()
    {
        return $this->belongsTo('App\Modeli\Kancelarija', 'kancelarija_id', 'id');
    }

    public function uprava()
    {
        return $this->belongsTo('App\Modeli\Uprava', 'uprava_id', 'id');
    }

    public function racunar()
    {
        return $this->hasMany('App\Modeli\Racunar', 'zaposleni_id', 'id');
    }

    public function mobilni()
    {
        return $this->hasMany('App\Modeli\Mobilni', 'zaposleni_id', 'id');
    }

    public function emailovi()
    {
        return $this->hasMany('App\Modeli\Email', 'zaposleni_id', 'id');
    }

    public function imePrezime()
    {
        return $this->ime . ' ' . $this->prezime;
    }
}
