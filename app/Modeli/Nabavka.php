<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Nabavka extends Model
{
    protected $table = 'nabavke';
    public $timestamps = false;

    public function dobavljac()
    {
        return $this->belongsTo('App\Modeli\Dobavljac', 'dobavljac_id', 'id');
    }

    public function stavke()
    {
        return $this->hasMany('App\Modeli\NabavkaStavka', 'nabavka_id', 'id');
    }

}
