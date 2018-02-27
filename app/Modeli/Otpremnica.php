<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Otpremnica extends Model
{
    protected $table = 'otpremnice';
    protected $appends = ['formatiran_datum'];
    public $timestamps = false;

    public function dobavljac()
    {
        return $this->belongsTo('App\Modeli\Dobavljac', 'dobavljac_id', 'id');
    }

    public function racun()
    {
        return $this->belongsTo('App\Modeli\Racun', 'racun_id', 'id');
    }

    public function slike()
    {
        return $this->hasMany('App\Modeli\OtpremnicaSlika', 'otpremnica_id', 'id');
    }

    public function stavke()
    {
        return $this->hasMany('App\Modeli\OtpremnicaStavka', 'otpremnica_id', 'id');
    }

    public function setDatumAttribute($value)
    {
        $this->attributes['datum'] = Carbon::parse($value)->format('Y-m-d');
    }

    function getFormatiranDatumAttribute() 
    {
        return Carbon::parse($this->datum)->format('d.m.Y');
    }

}
