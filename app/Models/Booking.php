<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Booking extends Model
{
    public $timestamps = false;

    protected $table = 'bookings';
    protected $fillable = [
        'room_id',
        'time_slots',
        'date',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rentUnit()
    {
        return $this->belongsTo(RentUnit::class);
    }

    public function req(): MorphMany
    {
        return $this->morphMany(Req::class, 'targetable');
    }
}
