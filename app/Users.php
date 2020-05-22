<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public function role()
    {
        return $this->belongsToMany('App\Role_user')->withTimestamps();
    }
}
