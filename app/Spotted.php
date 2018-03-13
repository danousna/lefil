<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spotted extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User', 'spotted_likes');
    }
}
