<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class ProcesorModel extends Model
{
    protected $table = 'procesori_modeli';
    public $timestamps = false;

    public function proizvodjac()
    {
        return $this->belongsTo('App\Modeli\Proizvodjac', 'proizvodjac_id', 'id');
    }

    public function soket()
    {
        return $this->belongsTo('App\Modeli\Soket', 'soket_id', 'id');
    }

    public function procesori()
    {
        return $this->hasMany('App\Modeli\Procesor', 'procesor_model_id', 'id');
    }
}
