<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class variety extends Model
{

    protected $table='varieties';

    public function farmproduct(){
       return $this->belongsTo(Farmproduct::class);
    }
}
