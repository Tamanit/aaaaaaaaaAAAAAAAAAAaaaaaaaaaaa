<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use SoftDeletes;


    public function payments()
    {
        return $this->hasMany('App\Models\Payment');
    }
    public function act(){
        return $this->HasOne('App\Models\Act');
    }
}
