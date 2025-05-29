<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = 'organizations';
    protected $fillable = [];
    public function rent(){
        return $this->hasMany('App\Models\Rent');
    }
    public function user(){
        return $this->hasMany('App\Models\User');
    }

}
