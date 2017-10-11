<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Dobavljac extends Model
{
    protected $table = 's_dobavljaci';
    public $timestamps = false;

    public function nabavka()
    {
        return $this->hasMany('App\Modeli\Nabavka', 'dobavljac_id', 'id');
    }

    public function otpremnica()
    {
        return $this->hasMany('App\Modeli\Otpremnica', 'dobavljac_id', 'id');
    }
}
