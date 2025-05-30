<?php

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;

class RentUnitType extends Model
{

    public $fillable =[
        'name',
        'description',

    ];
    public function rentUnits()
    {
        return $this->hasMany(RentUnit::class);
    }
}
