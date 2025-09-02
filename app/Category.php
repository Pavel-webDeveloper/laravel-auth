<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $guarded = [];

    public function movies(){
        return $this->hasMany('App\Movie');
    }
}
