<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class farmer extends Model
{
    public function product()
    {
        return $this->belongsToMany('App/product');
    }
}
