<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $guarded = [];
    
    public function movies(){
        return $this->belongsToMany('App\Movie');
    }
}
