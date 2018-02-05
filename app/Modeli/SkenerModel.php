<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class SkenerModel extends Model
{
    protected $table = 'skeneri_modeli';
    public $timestamps = false;

    public function proizvodjac()
    {
        return $this->belongsTo('App\Modeli\Proizvodjac', 'proizvodjac_id', 'id');
    }

    public function skeneri()
    {
        return $this->hasMany('App\Modeli\Skener', 'skener_model_id', 'id');
    }
}
