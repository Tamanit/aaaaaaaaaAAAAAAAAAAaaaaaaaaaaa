<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentUnitType extends Model
{

    public $timestamps = false;

    public $fillable =[
        'name',
        'description',
        'img',
        'ing_alt'

    ];
    public function rentUnits()
    {
        return $this->hasMany(RentUnit::class);
    }
}
