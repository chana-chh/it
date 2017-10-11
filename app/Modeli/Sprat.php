<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Sprat extends Model
{
    protected $table = 's_spratovi';
    public $timestamps = false;

    public function kancelarije()
    {
    	return $this->hasMany('App\Modeli\Kancelarija', 'sprat_id', 'id');
    }
}
