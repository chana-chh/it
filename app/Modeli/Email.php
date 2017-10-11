<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'adrese_e_poste';
    public $timestamps = false;

    public function zaposleni()
    {
    	return $this->belongsTo('App\Modeli\Zaposleni', 'zaposleni_id', 'id');
    }
}
