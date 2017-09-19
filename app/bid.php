<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bid extends Model
{
    public function postedproduct(){
        return $this->belongsTo(postedproduct::class);
    }
    public function user(){
        return $this->belongsTo(user::class);
    }
}
