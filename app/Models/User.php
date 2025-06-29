<?php

namespace App\Models;

use App\Enumeration\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\Shared\Models\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'organization_id'
    ];
//    public function booking(){
//        return $this->hasMany('App\Shared\Models\Booking');
//    }

    public function organisation(): BelongsTo
    {
        return $this->belongsTo('App\Shared\Models\Organisation');
    }


        /**
         * The attributes that should be hidden for serialization.
         *
         * @var list<string>
         */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRole::class,
        ];
    }
}
