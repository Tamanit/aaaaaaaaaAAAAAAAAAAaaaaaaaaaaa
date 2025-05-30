<?php

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;

class Workplace extends Model
{
    public function rent(){
        return $this->belongsTo(Rent::class);
    }
    public function rentUnit(){
        return $this->belongsToMany(RentUnit::class, 'workplace_rent_unit', 'workplace_id', 'rent_unit_id');
    }
}
