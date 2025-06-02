<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PriceList extends Model
{
    use SoftDeletes;
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
