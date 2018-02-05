<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class OtpremnicaSlika extends Model
{
    protected $table = 'otpremnice_slike';
    public $timestamps = false;

    public function otpremnica()
    {
    	return $this->belongsTo('App\Modeli\Otpremnica', 'otpremnica_id', 'id');
    }
}
