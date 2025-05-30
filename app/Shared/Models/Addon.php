<?php

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    protected $table = 'addons';
    protected $fillable = [];
    public function priceList(){
        return $this->belongsTo(PriceList::class);
    }
}
