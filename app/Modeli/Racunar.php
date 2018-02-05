<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Racunar extends Model
{
    use SoftDeletes;
    protected $table = 'racunari';
    protected $appends = ['ocena'];
    public $timestamps = false;
        protected $dates = [
        'deleted_at'
    ];

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

    public function getOcenaAttribute()
    {
        
        $procesor_zbir = 0;
        $memorija_zbir = 0;
        $hdd_zbir = 0;
        $procesor_ocena = 0;
        $memorija_ocena = 0;
        $hdd_ocena = 0;
        $osnovnaPloca_ocena = 0;
        
        $kompletan = true;

        if ($this->osnovnaPloca) {
            $osnovnaPloca_ocena = $this->osnovnaPloca->osnovnaPlocaModel->ocena; 
        }else{
            $kompletan = false;
        }
        if (!$this->procesori->isEmpty()) {
            foreach ($this->procesori as $procesor) {
            $procesor_zbir += $procesor->procesorModel->ocena;
        }
            $procesor_ocena = $procesor_zbir / $this->procesori->count();
        }else{
            $kompletan = false;
        }
        if (!$this->memorije->isEmpty()) {
        foreach ($this->memorije as $memorija) {
           $memorija_zbir += $memorija->memorijaModel->ocena;
        }
        $memorija_ocena = $memorija_zbir / $this->memorije->count();
        }else{
            $kompletan = false;
        }
        if (!$this->hddovi->isEmpty()) {
        foreach ($this->hddovi as $hdd) {
           $hdd_zbir += $hdd->hddModel->ocena;
        }
        $hdd_ocena = $hdd_zbir / $this->hddovi->count();
        $kompletan = true;
        }else{
            $kompletan = false;
        }
        
        if ($kompletan == false) {
            $s = 0;
        }else{
            $s = ($procesor_ocena  + $memorija_ocena + $hdd_ocena + $osnovnaPloca_ocena);
        }
        

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

    public function tehnickiDetalji()
    {
            $iteracija = 0;
            $procesor_data = " ";

        foreach ($this->procesori as $procesor) {
            $iteracija += 1;
            $procesor_data .= $iteracija.". ".$procesor->procesorModel->naziv.", ". $procesor->procesorModel->proizvodjac->naziv .", ". $procesor->procesorModel->takt. " MHz; ";
        }   

            $iteracija = 0;
            $memorija_data = " ";

        foreach ($this->memorije as $memorija) {
            $iteracija += 1;
            $memorija_data .= $iteracija.". ".$memorija->memorijaModel->tipMemorije->naziv.", ". $memorija->memorijaModel->kapacitet." MB; ";
        }
        $ploca_data = " ";
        if($this->osnovnaPloca)
            {
                $ploca_data = $this->osnovnaPloca->osnovnaPlocaModel->cipset.", ".$this->osnovnaPloca->osnovnaPlocaModel->proizvodjac->naziv;
            }


        $podaci = "Procesori: ".$procesor_data." Memorija: ".$memorija_data." Osnovna ploča: ".$ploca_data; 
        
        return $podaci;
    }

    public function tip()
    {   
        return 1;
    }

      public function brojKvarova()
    {
        $broj = ServisKvar::where('vrsta_uredjaja_id', '=', $this->vrsta_uredjaja_id)->where('uredjaj_id', '=', $this->id)->count();
        return $broj;
    }

}
