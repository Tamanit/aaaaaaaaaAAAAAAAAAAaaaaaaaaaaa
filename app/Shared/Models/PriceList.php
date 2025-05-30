<?php

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;

class PriceList extends Model
{
    protected $table = 'price_lists';
    protected $fillable = [];
    public function price(){
        return $this->HasMany(Price::class);
    }
    public function addon(){
        return $this->HasMany(Addon::class);
    }
    public function bookingTime(){
        return $this->HasMany(BookingTime::class);
    }
}
