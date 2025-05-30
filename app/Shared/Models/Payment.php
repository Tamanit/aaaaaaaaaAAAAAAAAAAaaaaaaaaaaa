<?php

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
}
