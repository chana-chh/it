<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrafickiAdapter extends Model
{
    use SoftDeletes;
    protected $table = 'graficki_adapteri';
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

    public function scopeNeraspordjeni()
    {
        return $this->doesntHave('racunar');
    }

        public function dajModel()
    {   
        $podaci = $this->grafickiAdapterModel->naziv.", ".$this->grafickiAdapterModel->proizvodjac->naziv." - ".$this->grafickiAdapterModel->cip." (memorija: ".$this->grafickiAdapterModel->tipMemorije->naziv.", ".$this->grafickiAdapterModel->kapacitet_memorije."MB)";
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
