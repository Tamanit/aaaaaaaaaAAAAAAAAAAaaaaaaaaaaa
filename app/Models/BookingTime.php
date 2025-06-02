<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingTime extends Model
{
    protected $table = 'booking_time';
    protected $fillable = [];
    public function priceList(){
        return $this->belongsTo('App\Models\PriceList');
    }
    public function tariff(){
        return $this->belongsTo('App\Models\Tariff');
    }
    public function rentUnit(){
        return $this->belongsTo('App\Models\RentUnit');
    }
}
