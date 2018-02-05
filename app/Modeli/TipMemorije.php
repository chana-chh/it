<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class TipMemorije extends Model
{
    protected $table = 's_tipovi_memorije';
    public $timestamps = false;

    public function grafickiAdapteriModeli()
	{
		return $this->hasMany('App\Modeli\GrafickiAdapterModel', 'tip_memorije_id', 'id');
    }
    
    public function memorijeModeli()
	{
		return $this->hasMany('App\Modeli\MemorijaModel', 'tip_memorije_id', 'id');
	}
}
