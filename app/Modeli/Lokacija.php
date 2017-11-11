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

}
