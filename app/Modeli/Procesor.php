<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Procesor extends Model
{
    use SoftDeletes;

    protected $table = 'procesori';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

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

    public function ego(){

        return class_basename(get_class($this));
    }
}
