<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'prices';
    protected $fillable = [];
    public function tariff(){
        return $this->belongsTo(Tariff::class);
    }
    public function priceList(){
        return $this->belongsTo(PriceList::class);
    }
    public function rent(){
        return $this->hasMany(Rent::class);
    }
}
