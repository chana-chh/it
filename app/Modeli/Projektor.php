<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Projektor extends Model
{
    protected $table = 'projektori';
    public $timestamps = false;

    public function vrstaUredjaja()
    {
        return $this->belongsTo('App\Modeli\VrstaUredjaja', 'vrsta_uredjaja_id', 'id');
    }

    public function proizvodjac()
    {
        return $this->belongsTo('App\Modeli\Proizvodjac', 'proizvodjac_id', 'id');
    }

    public function projektorModel()
    {
        return $this->belongsTo('App\Modeli\ProjektorModel', 'projektor_model_id', 'id');
    }

    public function kancelarija()
    {
        return $this->belongsTo('App\Modeli\Kancelarija', 'kancelarija_id', 'id');
    }

    public function stavkaOtpremnice()
    {
        return $this->belongsTo('App\Modeli\OtpremnicaStavka', 'stavka_otpremnice_id', 'id');
    }

    public function nabavka()
    {
        return $this->belongsTo('App\Modeli\Nabavka', 'nabavka_id', 'id');
    }

    public function povezivanja()
    {
        return $this->belongsToMany('App\Modeli\MonitorPovezivanje', 'projektor_povezivanje', 'projektor_id', 'povezivanje_id');
    }

}
