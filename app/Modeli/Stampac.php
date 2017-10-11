<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Stampac extends Model
{
    protected $table = 'stampaci';
    public $timestamps = false;

    public function stampacModel()
    {
        return $this->belongsTo('App\Modeli\StampacModel', 'stampac_model_id', 'id');
    }

    public function racunar()
    {
        return $this->belongsTo('App\Modeli\Racunar', 'racunar_id', 'id');
    }

    public function stavkaOtpremnice()
    {
        return $this->belongsTo('App\Modeli\OtpremnicaStavka', 'stavka_otpremnice_id', 'id');
    }
}
