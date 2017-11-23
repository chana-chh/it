<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Monitor extends Model
{
    use SoftDeletes;
    protected $table = 'monitori';
    public $timestamps = false;
    public $nazivModelaJednina = 'monitor';
    public $nazivModelaMnozina = 'monitori';
    public $vezaNaPogled = 'monitori';
    protected $dates = [
        'deleted_at'
    ];


    public function vrstaUredjaja()
    {
        return $this->belongsTo('App\Modeli\VrstaUredjaja', 'vrsta_uredjaja_id', 'id');
    }

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

     public function scopeNeraspordjeni()
    {
        return $this->doesntHave('racunar');
    }

}
