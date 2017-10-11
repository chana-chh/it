<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    protected $table = 'monitori';
    public $timestamps = false;

    public function monitorModel()
    {
        return $this->belongsTo('App\Modeli\MonitorModel', 'monitor_model_id', 'id');
    }

    public function racunar()
    {
        return $this->belongsTo('App\Modeli\Racunar', 'racunar_id', 'id');
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
}
