<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    protected $hidden = [
        'password'
        //  ,'remember_token',
    ];

    function tasks(){
        return $this->hasMany('App\Tasks');
    }

    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

}
