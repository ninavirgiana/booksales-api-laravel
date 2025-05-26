<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Perbaikan: Nama method yang benar adalah getJWTIdentifier (bukan getJWIdentifier)
    public function getJWTIdentifier()
    {
        return $this->getKey(); // Mengembalikan primary key user
    }

    public function getJWTCustomClaims()
    {
        return []; // Tambahkan custom claims jika diperlukan
    }
}