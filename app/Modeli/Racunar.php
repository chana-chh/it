<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Racunar extends Model
{
    protected $table = 'racunari';
    public $timestamps = false;

    public function proizvodjac()
    {
        return $this->belongsTo('App\Modeli\Proizvodjac', 'proizvodjac_id', 'id');
    }

    public function kancelarija()
    {
        return $this->belongsTo('App\Modeli\Kancelarija', 'kancelarija_id', 'id');
    }

    public function zaposleni()
    {
        return $this->belongsTo('App\Modeli\Zaposleni', 'zaposleni_id', 'id');
    }

    public function nabavka()
    {
        return $this->belongsTo('App\Modeli\Nabavka', 'nabavka_id', 'id');
    }

    public function operativniSistem()
    {
        return $this->belongsTo('App\Modeli\OperativniSistem', 'os_id', 'id');
    }

    // odavde
    public function monitori()
	{
	    return $this->hasMany('App\Modeli\Monitor', 'racunar_id', 'id');
    }

    public function stampaci()
	{
	    return $this->hasMany('App\Modeli\Stampac', 'racunar_id', 'id');
    }

    public function skeneri()
	{
	    return $this->hasMany('App\Modeli\Skener', 'racunar_id', 'id');
    }

    public function osnovnaPloca()
	{
	    return $this->hasOne('App\Modeli\OsnovnaPloca', 'racunar_id', 'id');
    }
    
    public function memorije()
	{
		return $this->hasMany('App\Modeli\Memorija', 'racunar_id', 'id');
	}

	public function hddovi()
	{
		return $this->hasMany('App\Modeli\Hdd', 'racunar_id', 'id');
	}

	public function procesori()
	{
	    return $this->hasMany('App\Modeli\Procesor', 'racunar_id', 'id');
	}

	public function grafickiAdapteri()
	{
	    return $this->hasMany('App\Modeli\GrafickiAdapter', 'racunar_id', 'id');
    }

    public function napajanja()
	{
	    return $this->hasMany('App\Modeli\Napajanje', 'racunar_id', 'id');
    }
    
    public function servisi()
	{
	    return $this->hasMany('App\Modeli\Servis', 'racunar_id', 'id');
    }
    
    public function aplikacije()
    {
        return $this->belongsToMany('App\Modeli\Aplikacija', 'aplikacije_racunari', 'racunar_id', 'aplikacija_id');
    }

    public function scopeLaptopovi($query)
    {
        return $query->where('laptop', 1);
    }

    public function scopeServeri($query)
    {
        return $query->where('server', 1);
    }

    public function scopeBrendovi($query)
    {
        return $query->where('brend', 1);
    }
}
