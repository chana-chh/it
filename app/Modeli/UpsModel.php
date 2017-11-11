<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class UpsModel extends Model
{
    protected $table = 'ups_modeli';
    public $timestamps = false;

    public function proizvodjac()
    {
        return $this->belongsTo('App\Modeli\Proizvodjac', 'proizvodjac_id', 'id');
    }

    public function tipBaterije()
    {
        return $this->belongsTo('App\Modeli\TipBaterije', 'tip_baterije_id', 'id');
    }

    public function upsevi()
    {
        return $this->hasMany('App\Modeli\Ups', 'ups_model_id', 'id');
    }

}
