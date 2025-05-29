<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActRow extends Model
{
    public function act(){
        return $this->belongsTo('App\Models\Act');
    }
}
