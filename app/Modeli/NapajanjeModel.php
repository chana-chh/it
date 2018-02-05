<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class NapajanjeModel extends Model
{
    protected $table = 'napajanja_modeli';
    public $timestamps = false;

    public function proizvodjac()
    {
        return $this->belongsTo('App\Modeli\Proizvodjac', 'proizvodjac_id', 'id');
    }

    public function napajanja()
    {
        return $this->hasMany('App\Modeli\Napajanje', 'napajanje_model_id', 'id');
    }
}
