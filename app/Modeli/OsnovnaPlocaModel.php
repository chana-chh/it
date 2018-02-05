<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class OsnovnaPlocaModel extends Model
{
    protected $table = 'osnovne_ploce_modeli';
    public $timestamps = false;

    public function proizvodjac()
    {
        return $this->belongsTo('App\Modeli\Proizvodjac', 'proizvodjac_id', 'id');
    }

    public function soket()
    {
        return $this->belongsTo('App\Modeli\Soket', 'soket_id', 'id');
    }

    public function tipMemorije()
    {
        return $this->belongsTo('App\Modeli\TipMemorije', 'tip_memorije_id', 'id');
    }

    public function osnovnePloce()
    {
        return $this->hasMany('App\Modeli\OsnovnaPloca', 'osnovna_ploca_model_id', 'id');
    }
}
