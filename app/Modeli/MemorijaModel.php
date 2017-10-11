<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class MemorijaModel extends Model
{
    protected $table = 'memorije_modeli';
    public $timestamps = false;

    public function proizvodjac()
    {
        return $this->belongsTo('App\Modeli\Proizvodjac', 'proizvodjac_id', 'id');
    }

    public function tipMemorije()
    {
        return $this->belongsTo('App\Modeli\TipMemorije', 'tip_memorije_id', 'id');
    }

    public function memorije()
    {
    	return $this->hasMany('App\Modeli\Memorija', 'memorija_model_id', 'id');
    }
}