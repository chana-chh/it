<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Mobilni extends Model
{
    protected $table = 'mobilni';
    public $timestamps = false;

    public function mobilni()
    {
    	return $this->belongsTo('App\Modeli\Zaposleni', 'zaposleni_id', 'id');
    }
}
