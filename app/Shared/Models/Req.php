<?php

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Req extends Model
{
    protected $table = 'reqs';
    protected $fillable = [];
    public function user(){
        return $this->belongsTo('App\Shared\Models\User');
    }
    public function targetable(): MorphTo
    {
        return $this->morphTo();
    }
}
