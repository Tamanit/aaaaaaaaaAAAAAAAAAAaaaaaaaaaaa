<?php

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = 'organizations';
    protected $fillable = [];
    public function rent(){
        return $this->hasMany('App\Shared\Models\Rent');
    }
    public function user(){
        return $this->hasMany('App\Shared\Models\User');
    }

}
