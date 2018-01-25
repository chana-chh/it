<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hdd extends Model
{
    use SoftDeletes;
    protected $table = 'hdd';
    public $timestamps = false;
    public $nazivModelaJednina = 'HDD';
    public $nazivModelaMnozina = 'HDD-ovi';
    public $vezaNaPogled = 'hdd';
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

    public function hddModel()
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

    public function scopeNeraspordjeni()
    {
        return $this->doesntHave('racunar');
    }

    public function dajModel()
    {   
        $podaci = $this->hddModel->proizvodjac->naziv." - ".$this->hddModel->kapacitet."GB";
        return $podaci;
    }
    public function tip()
    {   
        return 2;
    }

      public function brojKvarova()
    {
        $broj = ServisKvar::where('vrsta_uredjaja_id', '=', $this->vrsta_uredjaja_id)->where('uredjaj_id', '=', $this->id)->count();
        return $broj;
    }

}
