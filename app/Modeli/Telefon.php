<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Telefon extends Model
{
    protected $table = 'telefoni';
    public $timestamps = false;

    public function kancelarija()
    {
    	return $this->belongsTo('App\Modeli\Kancelarija', 'kancelarija_id', 'id');
    }
}
