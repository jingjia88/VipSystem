<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    public function member()
    {
        return $this->hasOne('App\Member','id','user');
    }
}
