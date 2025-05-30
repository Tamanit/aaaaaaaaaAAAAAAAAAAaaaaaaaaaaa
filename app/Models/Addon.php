<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    protected $table = 'addons';
    protected $fillable = [
        'name',
        'description',
        'price_list_id'
    ];
    public function priceList(){
        return $this->belongsTo(PriceList::class);
    }
}
