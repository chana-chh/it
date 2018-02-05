<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Modeli\ServisKvar;

class Procesor extends Model
{

    use SoftDeletes;
    protected $table = 'procesori';
    protected $dates = [
        'deleted_at'];
    public $timestamps = false;

    public function vrstaUredjaja()
    {
        return $this->belongsTo('App\Modeli\VrstaUredjaja', 'vrsta_uredjaja_id', 'id');
    }

     public function reciklirano()
    {
        return $this->belongsTo('App\Modeli\Reciklaza', 'reciklirano_id', 'id');
    }

    public function procesorModel()
    {
        return $this->belongsTo('App\Modeli\ProcesorModel', 'procesor_model_id', 'id');
    }

    public function racunar()
    {
        return $this->belongsTo('App\Modeli\Racunar', 'racunar_id', 'id');
    }

    public function stavkaOtpremnice()
    {
        return $this->belongsTo('App\Modeli\OtpremnicaStavka', 'stavka_otpremnice_id', 'id');
    }

    public function scopeNeraspordjeni()
    {
        return $this->doesntHave('racunar');
    }

    public function dajModel()
    {   
        $podaci = $this->procesorModel->proizvodjac->naziv.", ".$this->procesorModel->naziv." na ".$this->procesorModel->takt."MHz";
        return $podaci;
    }

    public function tip()
    {   
        return 2;
    }

    public function brojKvarova()
    {
        $broj = ServisKvar::where('vrsta_uredjaja_id', '=', $this->vrsta_uredjaja_id)->where('uredjaj_id', '=', $this->id)->count();
        return $broj;
    }

    public $naziv_modela_jednina = "Procesor";
    public $naziv_modela_mnozina = "Procesori";

}
