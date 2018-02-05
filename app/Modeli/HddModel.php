<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class HddModel extends Model
{
    protected $table = 'hdd_modeli';
    public $timestamps = false;

    public function proizvodjac()
    {
        return $this->belongsTo('App\Modeli\Proizvodjac', 'proizvodjac_id', 'id');
    }

    public function povezivanje()
    {
        return $this->belongsTo('App\Modeli\HddPovezivanje', 'povezivanje_id', 'id');
    }

    public function hddovi()
    {
        return $this->hasMany('App\Modeli\Hdd', 'hdd_model_id', 'id');
    }
}
