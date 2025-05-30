<?php

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;

class BookingTime extends Model
{
    protected $table = 'booking_time';
    protected $fillable = [];
    public function priceList(){
        return $this->belongsTo('App\Shared\Models\PriceList');
    }
    public function tariff(){
        return $this->belongsTo('App\Shared\Models\Tariff');
    }
    public function rentUnit(){
        return $this->belongsTo('App\Shared\Models\RentUnit');
    }
}
