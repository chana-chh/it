<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class GrafickiAdapter extends Model
{
    protected $table = 'graficki_adapteri';
    public $timestamps = false;

    public function grafickiAdapterModel()
    {
        return $this->belongsTo('App\Modeli\GrafickiAdapterModel', 'graficki_adapter_model_id', 'id');
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
