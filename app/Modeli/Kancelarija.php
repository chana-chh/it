<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Kancelarija extends Model
{
    protected $table = 's_kancelarije';
    public $timestamps = false;

    public function lokacija()
	{
	     return $this->belongsTo('App\Modeli\Lokacija', 'lokacija_id', 'id');
    }
    
    public function sprat()
	{
		return $this->belongsTo('App\Modeli\Sprat', 'sprat_id', 'id');
	}

    public function zaposleni()
	{
		return $this->hasMany('App\Modeli\Zaposleni', 'kancelarija_id', 'id');
	}

	public function racunari()
	{
		return $this->hasMany('App\Modeli\Racunar', 'kancelarija_id', 'id');
	}

	public function stampaci()
	{
		return $this->hasMany('App\Modeli\Stampac', 'kancelarija_id', 'id');
	}

	public function skeneri()
	{
		return $this->hasMany('App\Modeli\Skener', 'kancelarija_id', 'id');
	}

	public function monitori()
	{
		return $this->hasMany('App\Modeli\Monitor', 'kancelarija_id', 'id');
	}

	public function upsevi()
	{
		return $this->hasMany('App\Modeli\Ups', 'kancelarija_id', 'id');
    }
    
    public function mrezniUredjaji()
	{
		return $this->hasMany('App\Modeli\MrezniUredjaj', 'kancelarija_id', 'id');
    }
    
    public function projektori()
	{
		return $this->hasMany('App\Modeli\Projektor', 'kancelarija_id', 'id');
	}
	
	public function telefoni()
	{
		return $this->hasMany('App\Modeli\Telefon', 'kancelarija_id', 'id');
	}

	public function sviPodaci()
    {
        return $this->naziv . ', ' . $this->lokacija->naziv. ' - ' . $this->sprat->naziv;
    }
}
