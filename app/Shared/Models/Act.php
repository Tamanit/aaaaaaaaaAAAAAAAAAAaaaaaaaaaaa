<?php

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Act extends Model
{
    use SoftDeletes;

    protected $table = 'acts';
    protected $fillable = [
        'contract_id',
        'signed',
        'act_type_id',
    ];

    public function rent()
    {
        return $this->belongsTo(Rent::class);
    }

    public function bill()
    {
        return $this->hasOne('App\Shared\Models\Bill');
    }
    public function actRows(){
        return $this->hasMany('App\Shared\Models\ActRow');
    }
    public function req(): MorphMany
    {
        return $this->morphMany(Req::class, 'targetable');
    }
}
