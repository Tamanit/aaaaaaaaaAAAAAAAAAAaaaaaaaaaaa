<?php

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use SoftDeletes;

    public function payments()
    {
        return $this->hasMany('App\Shared\Models\Payment');
    }
    public function act(){
        return $this->HasOne('App\Shared\Models\Act');
    }
}
