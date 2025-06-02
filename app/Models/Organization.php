<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = 'organizations';

    protected $fillable = [
        'full_name',
        'ur_address',
        'post_address',
        'bank',
        'inn',
        'kpp',
        'bank_account',
        'bank_corr_account',
        'bik',
        'okpo'
    ];
//    public function rent(){
//        return $this->hasMany('App\Shared\Models\Rent');
//    }
    public function user()
    {
        return $this->hasMany('App\Models\User');
    }

}
