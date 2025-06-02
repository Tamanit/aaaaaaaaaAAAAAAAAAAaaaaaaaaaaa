<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class RentUnit extends Model
{
    use SoftDeletes;
    public $fillable = [
        'code',
        'type_id'
    ];
    public function type()
    {
        return $this->belongsTo(RentUnitType::class, 'type_id');
    }
    public function bookingTime(){
        return $this->hasMany(BookingTime::class);
    }
    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
    public function actRows(){
        return $this->hasMany(ActRow::class);
    }
    public function workplace(){
        return $this->belongsToMany(Workplace::class, 'workplace_rent_unit', 'unit_id', 'workplace_id');
    }
    public function req(): MorphMany
    {
        return $this->morphMany(Req::class, 'targetable');
    }
}
