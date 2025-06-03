<?php

namespace App\Models;

use App\Enumeration\RoomStatus;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public $timestamps = false;

    protected $table = 'room';

    protected $fillable = [
        'name',
        'description',
        'status',
        'inventory',
        'img',
        'img_alt'
    ];

    protected $casts = [
        'status' => RoomStatus::class,
    ];
}
