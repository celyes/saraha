<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    //
    public function country(){
        return $this->hasMany('App\User');
    }
}
