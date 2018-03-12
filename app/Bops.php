<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bops extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User', 'bops_likes');
    }
}
