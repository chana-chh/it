<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Servis extends Model
{
    protected $table = 'servis';
    public $timestamps = false;

    public function zaposleni()
    {
        return $this->belongsTo('App\Modeli\Zaposleni', 'zaposleni_id', 'id');
    }

    public function kancelarija()
    {
        return $this->belongsTo('App\Modeli\Kancelarija', 'kancelarija_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App\Modeli\Status', 'status_id', 'id');
    }

    public function vrstaUredjaja()
    {
        return $this->belongsTo('App\Modeli\VrstaUredjaja', 'vrsta_uredjaja_id', 'id');
    }

}
