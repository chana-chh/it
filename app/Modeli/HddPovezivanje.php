<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class HddPovezivanje extends Model
{
    protected $table = 's_hdd_povezivanja';
    public $timestamps = false;

    public function hddoviModeli()
	{
		return $this->hasMany('App\Modeli\HddModel', 'povezivanje_id', 'id');
	}
}
