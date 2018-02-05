<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class RacunSlika extends Model
{
    protected $table = 'racuni_slike';
    public $timestamps = false;

    public function racun(){
    	return $this->belongsTo('App\Modeli\Racun', 'racun_id', 'id');
    }
}
