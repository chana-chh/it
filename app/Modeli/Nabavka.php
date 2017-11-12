<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nabavka extends Model
{

    use SoftDeletes;
    protected $table = 'nabavke';
    public $timestamps = false;
    protected $dates = [
        'deleted_at'
    ];

    public function dobavljac()
    {
        return $this->belongsTo('App\Modeli\Dobavljac', 'dobavljac_id', 'id');
    }

    public function stavke()
    {
        return $this->hasMany('App\Modeli\NabavkaStavka', 'nabavka_id', 'id');
    }

}
