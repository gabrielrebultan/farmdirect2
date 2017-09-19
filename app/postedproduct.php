<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class postedproduct extends Model
{
    public function bid(){
        return $this->hasMany(bid::class)->orderBy('price','DESC')->where('accepted',0);
    }
    public function acceptedBid(){
        return $this->hasMany(bid::class)->orderBy('price','DESC')->where('accepted',1);
    }
    // public function user(){
    //     return $this->belongsTo(user::class);
    // }
    

    
} 
