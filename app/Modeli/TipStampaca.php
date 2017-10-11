<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class TipStampaca extends Model
{
    protected $table = 's_tipovi_stampaca';
    public $timestamps = false;

    public function stampaciiModeli()
	{
		return $this->hasMany('App\Modeli\StampacModel', 'tip_stampaca_id', 'id');
    }
}
