<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    protected $table = 'tariffs';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'price_list_id',
    ];
    public function price(){
        return $this->hasMany('App\Models\Price');
    }
    public function bookingTime(){
        return $this->hasMany('App\Models\BookingTime');
    }
    public function rent(){
        return $this->hasMany('App\Models\Rent');
    }
}
