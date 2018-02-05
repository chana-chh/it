<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    public $timestamps = false;

    public function users()
    {
        return $this->hasMany('App\Modeli\Korisnik', 'role_id', 'id');
    }

}
