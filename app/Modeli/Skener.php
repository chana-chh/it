<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skener extends Model
{

    use SoftDeletes;
    protected $table = 'skeneri';
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

    public function skenerModel()
    {
        return $this->belongsTo('App\Modeli\SkenerModel', 'skener_model_id', 'id');
    }

    public function racunar()
    {
        return $this->belongsTo('App\Modeli\Racunar', 'racunar_id', 'id');
    }

    public function stavkaOtpremnice()
    {
        return $this->belongsTo('App\Modeli\OtpremnicaStavka', 'stavka_otpremnice_id', 'id');
    }

    public function nabavkaStavka()
    {
        return $this->belongsTo('App\Modeli\NabavkaStavka', 'stavka_nabavke_id', 'id');
    }

    public function kancelarija()
    {
        return $this->belongsTo('App\Modeli\Kancelarija', 'kancelarija_id', 'id');
    }

    public function scopeNeraspordjeni()
    {
        return $this->doesntHave('racunar');
    }

    public function tip()
    {   
        return 1;
    }

    public function brojKvarova()
    {
        $broj = ServisKvar::where('vrsta_uredjaja_id', '=', $this->vrsta_uredjaja_id)->where('uredjaj_id', '=', $this->id)->count();
        return $broj;
    }

}
