<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    public function users()
    {
        # code...
        return $this->belongsToMany('App\User');
    }
}