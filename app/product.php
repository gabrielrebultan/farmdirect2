<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function farmer()
    {
        return $this->belongsToMany('App/farmer');
    }
}
