<?php

namespace App\Modeli;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Korisnik extends Authenticatable
{

    use Notifiable;
    protected $table = 'korisnici';
    protected $fillable = [
        'name', 'username', 'password', 'username'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Modeli\Role', 'role_id', 'id');
    }

    public function imaUlogu($role)
    {
        $role = (array) $role;
        return in_array($this->role->name, $role);
    }

}
