<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Soket extends Model
{
    protected $table = 's_soketi';
    public $timestamps = false;

    public function procesoriModeli()
	{
		return $this->hasMany('App\Modeli\ProcesorModel', 'socket_id', 'id');
	}

	public function osnovnePloceModeli()
	{
		return $this->hasMany('App\Modeli\OsnovnaPlocaModel', 'socket_id', 'id');
	}
}
