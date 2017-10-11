<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Hdd extends Model
{
    protected $table = 'hdd';
    public $timestamps = false;

    public function procesorModel()
    {
        return $this->belongsTo('App\Modeli\HddModel', 'hdd_model_id', 'id');
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
