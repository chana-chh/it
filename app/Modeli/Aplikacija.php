<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Aplikacija extends Model
{
    protected $table = 'aplikacije';
    public $timestamps = false;

    public function proizvodjac()
    {
        return $this->belongsTo('App\Modeli\Proizvodjac', 'proizvodjac_id', 'id');
    }

    public function racunari()
    {
        return $this->belongsToMany('App\Modeli\Racunar', 'aplikacije_racunari', 'aplikacija_id', 'racunar_id');
    }
}
