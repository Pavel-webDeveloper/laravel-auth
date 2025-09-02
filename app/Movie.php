<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded = [];

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
