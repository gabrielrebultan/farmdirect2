<?php

namespace App;

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
        'type','fname','middleinitial','lname', 'email','contactno', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongstoMany(Role::class,'role_users');
    }

    public function bid(){
        return $this->hasMany(Bid::class);
    }
    public function postedproduct(){
        return $this->hasMany(postedproduct::class);
    }
    public function lookingtobuy(){
        return $this->hasOne(lookingtobuy::class);
    }


}
