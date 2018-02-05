<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Uprava extends Model
{
    protected $table = 's_uprave';
    public $timestamps = false;

    public function zaposleni()
    {
        return $this->hasMany('App\Modeli\Zaposleni', 'uprava_id', 'id');
    }
}
