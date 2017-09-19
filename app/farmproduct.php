<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class farmproduct extends Model
{
    public function variety(){
        return $this->hasMany(Variety::class);
    }

    

}
