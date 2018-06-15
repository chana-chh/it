<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Proizvodjac extends Model
{
    protected $table = 's_proizvodjaci';
    public $timestamps = false;

    public function procesoriModeli()
	{
		return $this->hasMany('App\Modeli\ProcesorModel', 'proizvodjac_id', 'id');
	}

    public function grafickiAdapteriModeli()
	{
		return $this->hasMany('App\Modeli\GrafickiAdapterModel', 'proizvodjac_id', 'id');
	}

    public function osnovnePloceModeli()
	{
		return $this->hasMany('App\Modeli\OsnovnaPlocaModel', 'proizvodjac_id', 'id');
	}

    public function hddoviModeli()
	{
		return $this->hasMany('App\Modeli\HddModel', 'proizvodjac_id', 'id');
	}

    public function skeneriModeli()
	{
		return $this->hasMany('App\Modeli\SkenerModel', 'proizvodjac_id', 'id');
	}

	public function stampaciModeli()
	{
		return $this->hasMany('App\Modeli\StampacModel', 'proizvodjac_id', 'id');
	}

	public function memorijeModeli()
	{
		return $this->hasMany('App\Modeli\MemorijaModel', 'proizvodjac_id', 'id');
	}

	public function monitoriModeli()
	{
		return $this->hasMany('App\Modeli\MonitorModel', 'proizvodjac_id', 'id');
	}

	public function upseviModeli()
	{
		return $this->hasMany('App\Modeli\UpsModel', 'proizvodjac_id', 'id');
    }

    public function napajanjaModeli()
	{
		return $this->hasMany('App\Modeli\NapajanjeModel', 'proizvodjac_id', 'id');
    }

    public function mrezniUredjaji()
	{
		return $this->hasMany('App\Modeli\MrezniUredjaj', 'proizvodjac_id', 'id');
    }

    public function projektori()
	{
		return $this->hasMany('App\Modeli\Projektor', 'proizvodjac_id', 'id');
	}

	public function povezivanja()
	{
		return $this->hasMany('App\Modeli\Projektor', 'proizvodjac_id', 'id');
	}
}
