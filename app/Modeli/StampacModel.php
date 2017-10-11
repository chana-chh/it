<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class StampacModel extends Model
{
    protected $table = 'stampaci_modeli';
    public $timestamps = false;

    public function proizvodjac()
    {
        return $this->belongsTo('App\Modeli\Proizvodjac', 'proizvodjac_id', 'id');
    }

    public function toner()
    {
        return $this->belongsTo('App\Modeli\Toner', 'toner_id', 'id');
    }

    public function tip()
    {
        return $this->belongsTo('App\Modeli\TipStampaca', 'tip_stampaca_id', 'id');
    }

    public function stampaci()
    {
        return $this->hasMany('App\Modeli\Stampac', 'stampac_model_id', 'id');
    }
}
