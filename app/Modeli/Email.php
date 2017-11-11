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

    public function setLozinka($value)
    {
        $this->attributes['lozinka'] = Crypt::encryptString($value);
    }

    public function getLozinka($value)
    {
        return Crypt::decryptString($value);
    }

}
