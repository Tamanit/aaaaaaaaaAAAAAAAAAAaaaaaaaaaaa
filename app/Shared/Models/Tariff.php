<?php

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    protected $table = 'tariffs';
    protected $fillable = [];
    public function price(){
        return $this->hasMany('App\Shared\Models\Price');
    }
    public function bookingTime(){
        return $this->hasMany('App\Shared\Models\BookingTime');
    }
}
