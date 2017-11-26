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

    public function kancelarija()
    {
        return $this->belongsTo('App\Modeli\Kancelarija', 'kancelarija_id', 'id');
    }

}
