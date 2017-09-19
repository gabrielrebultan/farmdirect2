<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lookingtobuy extends Model
{
    public function comment(){
        return $this->hasMany(comment::class);
    }
    public function user(){
        return $this->belongsTo(user::class);
    }
}
