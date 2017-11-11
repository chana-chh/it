<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class TipBaterije extends Model
{
    protected $table = 's_baterije';
    public $timestamps = false;

    public function upseviModeli()
    {
        return $this->hasMany('App\Modeli\UpsModel', 'tip_baterije_id', 'id');
    }

}
