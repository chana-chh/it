<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Povezivanje extends Model
{
    protected $table = 's_povezivanje';
    public $timestamps = false;

    public function lokacija()
    {
        return $this->belongsTo('App\Modeli\Lokacija', 'lokacija_id', 'id');
    }

    public function proizvodjac()
    {
        return $this->belongsTo('App\Modeli\Proizvodjac', 'proizvodjac_id', 'id');
    }

}
