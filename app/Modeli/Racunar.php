<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Racunar extends Model
{
    protected $table = 'racunari';
    public $timestamps = false;

    public function vrstaUredjaja()
    {
        return $this->belongsTo('App\Modeli\VrstaUredjaja', 'vrsta_uredjaja_id', 'id');
    }

     public function reciklirano()
    {
        return $this->belongsTo('App\Modeli\Reciklaza', 'reciklirano_id', 'id');
    }

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

    public function nabavkaStavka()
    {
        return $this->belongsTo('App\Modeli\NabavkaStavka', 'stavka_nabavke_id', 'id');
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
        return $this->hasOne('App\Modeli\OsnovnaPloca', 'id', 'ploca_id');
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

    public function upsevi()
    {
        return $this->hasMany('App\Modeli\Ups', 'racunar_id', 'id');
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

    public function ocena()
    {
        
        $procesor_zbir = 0;
        $memorija_zbir = 0;
        $hdd_zbir = 0;
        $procesor_ocena = 0;
        $memorija_ocena = 0;
        $hdd_ocena = 0;
        $osnovnaPloca_ocena = 0;

        if ($this->osnovnaPloca) {
            $osnovnaPloca_ocena = $this->osnovnaPloca->osnovnaPlocaModel->ocena;
        }
        if (!$this->procesori->isEmpty()) {
            foreach ($this->procesori as $procesor) {
            $procesor_zbir += $procesor->procesorModel->ocena;
        }
            $procesor_ocena = $procesor_zbir / $this->procesori->count();
        }
        if (!$this->memorije->isEmpty()) {
        foreach ($this->memorije as $memorija) {
           $memorija_zbir += $memorija->memorijaModel->ocena;
        }
        $memorija_ocena = $memorija_zbir / $this->memorije->count();
        }
        if (!$this->hddovi->isEmpty()) {
        foreach ($this->hddovi as $hdd) {
           $hdd_zbir += $hdd->hddModel->ocena;
        }
        $hdd_ocena = $hdd_zbir / $this->hddovi->count();
        }
        
        $s = ($procesor_ocena  + $memorija_ocena + $hdd_ocena + $osnovnaPloca_ocena);

        return $s;
    }

    public function garancija()
    {
        $u_garanciji = 0;

        $sada = Carbon::now()->startOfMonth();
        $datum_nabavke = Carbon::parse($this->nabavkaStavka->nabavka->datum);
        $razlika_meseci = $sada->diffInMonths($datum_nabavke);
        $u_garanciji = $this->nabavkaStavka->nabavka->garancija -  $razlika_meseci;
        
        return $u_garanciji;
    }

}
