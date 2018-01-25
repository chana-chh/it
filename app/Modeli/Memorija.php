<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Memorija extends Model
{
    use SoftDeletes;
    protected $table = 'memorije';
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

    public function memorijaModel()
    {
        return $this->belongsTo('App\Modeli\MemorijaModel', 'memorija_model_id', 'id');
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
        $podaci = $this->memorijaModel->tipMemorije->naziv.", ".$this->memorijaModel->proizvodjac->naziv.", ".$this->memorijaModel->naziv." na ".$this->memorijaModel->brzina."MHz";
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
