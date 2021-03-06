<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Email extends Model
{
    protected $table = 'adrese_e_poste';
    public $timestamps = false;

    public function zaposleni()
    {
        return $this->belongsTo('App\Modeli\Zaposleni', 'zaposleni_id', 'id');
    }

    public function setLozinkaAttribute($value)
    {
        if ($value === null) {
            $this->attributes['lozinka'] = null;
        }else{
            $this->attributes['lozinka'] = Crypt::encryptString($value);
        }  
    }

    public function getLozinkaAttribute($value)
    {
        if ($value) {
           return Crypt::decryptString($value);
        }
        return "Nije uneta lozinka";
    }
}
