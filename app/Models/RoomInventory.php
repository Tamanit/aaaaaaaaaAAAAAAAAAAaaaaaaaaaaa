<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomInventory extends Model
{
    public $timestamps = false;

    protected $table = 'room_inventories';

    protected $fillable = [
        'name',
    ];

    public static string $route = 'room-inventories';
}
