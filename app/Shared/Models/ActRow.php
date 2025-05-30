<?php

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;

class ActRow extends Model
{
    public function act(){
        return $this->belongsTo('App\Shared\Models\Act');
    }
}
