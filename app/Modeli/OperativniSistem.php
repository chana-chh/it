<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class OperativniSistem extends Model
{
    protected $table = 'operativni_sistemi';
    public $timestamps = false;

    public function racunari()
    {
        return $this->hasMany('App\Modeli\Racunar', 'os_id', 'id');
    }

    public function serveri()
    {
        return $this->hasMany('App\Modeli\Server', 'os_id', 'id');
    }
}
