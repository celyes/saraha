<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable = ['body', 'ip'];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
