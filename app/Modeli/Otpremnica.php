<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Otpremnica extends Model
{
    protected $table = 'otpremnice';
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
}
