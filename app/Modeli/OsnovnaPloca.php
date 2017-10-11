<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class OsnovnaPloca extends Model
{
    protected $table = 'osnovne_ploce';
    public $timestamps = false;

    public function osnovnaPlocaModel()
    {
        return $this->belongsTo('App\Modeli\OsnovnaPlocaModel', 'osnovna_ploca_model_id', 'id');
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
