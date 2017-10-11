<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Procesor extends Model
{
    protected $table = 'procesori';
    public $timestamps = false;

    public function procesorModel()
    {
        return $this->belongsTo('App\Modeli\ProcesorModel', 'procesor_model_id', 'id');
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
