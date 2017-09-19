<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role_users extends Model
{
    protected $fillable = [
        'user_id','role_id',
    ];

     public function user(){
        return $this->belongstoMany(User::class,'role_users');
    }

}
