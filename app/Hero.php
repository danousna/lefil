<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    public $timestamps = false;
    
    public function article() 
    {
        return $this->belongsTo('App\Article');
    }
}
