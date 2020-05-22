<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_user extends Model
{

    public function users()
    {
        return $this
            ->belongsToMany('App\Users')
            ->withTimestamps();
    }
}
