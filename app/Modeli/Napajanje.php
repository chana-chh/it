<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Napajanje extends Model
{
    use SoftDeletes;
    protected $table = 'napajanja';
    public $timestamps = false;
    protected $dates = [
        'deleted_at'
    ];

    public function vrstaUredjaja()
    {
        return $this->belongsTo('App\Modeli\VrstaUredjaja', 'vrsta_uredjaja_id', 'id');
    }

     public function reciklirano()
    {
        return $this->belongsTo('App\Modeli\Reciklaza', 'reciklirano_id', 'id');
    }

    public function napajanjeModel()
    {
        return $this->belongsTo('App\Modeli\NapajanjeModel', 'napajanje_model_id', 'id');
    }

    public function racunar()
    {
        return $this->belongsTo('App\Modeli\Racunar', 'racunar_id', 'id');
    }

    public function stavkaOtpremnice()
    {
        return $this->belongsTo('App\Modeli\OtpremnicaStavka', 'stavka_otpremnice_id', 'id');
    }

    public function scopeNeraspordjeni()
    {
        return $this->doesntHave('racunar');
    }

    public function dajModel()
    {   
        $podaci = $this->napajanjeModel->naziv.", ".$this->napajanjeModel->proizvodjac->naziv." - ".$this->napajanjeModel->snaga."W";
        return $podaci;
    }

        public function tip()
    {   
        return 2;
    }

}
