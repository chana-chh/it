<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Toner extends Model
{
    protected $table = 's_toneri';
    public $timestamps = false;

    public function stampaciModeli()
    {
        return $this->hasMany('App\Modeli\StampacModel', 'tip_tonera_id', 'id');
    }

}
