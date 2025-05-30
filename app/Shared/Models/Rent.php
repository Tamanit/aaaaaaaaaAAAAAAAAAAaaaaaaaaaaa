<?php

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Rent extends Model
{
    protected $table = 'rents';
    protected $fillable = [
        'registration_date',
        'organization_id',
        'price_id',
        'number_of_places',
        'rent_at',
        'contract_id',
        'status'
    ];
    public function contract(){
        return $this->belongsTo('App\Shared\Models\Contract');
    }
    public function workplace(){
        return $this->hasMany('App\Shared\Models\Workplace');
    }
    public function organization(){
        return $this->belongsTo('App\Shared\Models\Organization');
    }
    public function price(){
        return $this->belongsTo('App\Shared\Models\Price');
    }
    public function req(): MorphMany
    {
        return $this->morphMany(Req::class, 'targetable');
    }
}
