<?php

namespace Servicio;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Jenssegers\Mongodb\Auth\User as Authenticatable;

 use Illuminate\Auth\Authenticatable as AuthenticableTrait;
// use Jenssegers\Mongodb\Auth\User as Authenticatable; 


class User extends Authenticatable 
{
    use Notifiable;
    use AuthenticableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','restaurantID'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function feedbacks(){
        return  $this->hasMany('Servicio\Feedback');
    }
    public function AnonynousFeedbacks(){
        return  $this->hasMany('Servicio\Anonymouse');
    }

}
