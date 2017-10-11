<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Ups extends Model
{
    protected $table = 'ups';
    public $timestamps = false;

    public function upsModel()
    {
        return $this->belongsTo('App\Modeli\UpsModel', 'ups_model_id', 'id');
    }

    public function nabavka()
    {
        return $this->belongsTo('App\Modeli\Nabavka', 'nabavka_id', 'id');
    }

    public function stavkaOtpremnice()
    {
        return $this->belongsTo('App\Modeli\OtpremnicaStavka', 'stavka_otpremnice_id', 'id');
    }

    public function kancelarija()
    {
        return $this->belongsTo('App\Modeli\Kancelarija', 'kancelarija_id', 'id');
    }
}
