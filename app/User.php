<?php

namespace App;
use App\orders;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone_number','last_name','first_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getNames(){
        return $this->first_name." ".$this->last_name;
    }



    public function isAdmin(){
        return $this->admin;
    }
    public function orders(){
        return $this->hasMany('App\Orders');
    }
}
