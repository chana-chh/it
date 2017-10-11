<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;
use Exception;

class Podesavanje extends Model
{
    protected $table = 'podesavanja';
    public $timestamps = false;

    public function get($kljuc)
    {
        try
        {
            return $this->find($kljuc)->vrednost;
        }
        catch (Exception $e)
        {
            return null;
        }
    }
}
