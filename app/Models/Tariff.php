<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    protected $table = 'tariffs';
    protected $fillable = [];
    public function price(){
        return $this->hasMany('App\Models\Price');
    }
    public function bookingTime(){
        return $this->hasMany('App\Models\BookingTime');
    }
}
