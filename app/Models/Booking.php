<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $fillable = [
        'rent_unit_id',
        'book_at',
        'book_until',
        'organization_id',
        'time_in_minutes'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function rentUnit(){
        return $this->belongsTo(RentUnit::class);
    }
    public function req(): MorphMany
    {
        return $this->morphMany(Req::class, 'targetable');
    }
}
