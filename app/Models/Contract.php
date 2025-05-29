<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use SoftDeletes;
    protected $table = 'contracts';
    protected $fillable = [
        'contract_num',
        '1c_contract_num',
    ];
    public function act(){
        return $this->HasMany('App\Models\Act');
    }
    public function rent(){
        return $this->HasMany('App\Models\Rent');
    }
    public function req(): MorphMany
    {
        return $this->morphMany(Req::class, 'targetable');
    }
}
