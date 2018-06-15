<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Lokacija extends Model
{
    protected $table = 's_lokacije';
    public $timestamps = false;

    public function kancelarije()
    {
        return $this->hasMany('App\Modeli\Kancelarija', 'lokacija_id', 'id');
    }

     public function povezivanja()
    {
        return $this->hasMany('App\Modeli\Povezivanje', 'lokacija_id', 'id');
    }

}
