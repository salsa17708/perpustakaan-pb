<?php

namespace App\Models;

// 1. TAMBAHKAN BARIS INI DI ATAS
use Laravel\Sanctum\HasApiTokens; // <--- PENTING: Import Library Sanctum

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    // 2. TAMBAHKAN 'HasApiTokens' DI DALAM SINI
    use HasApiTokens, HasFactory, Notifiable; // <--- PENTING: Pasang kemampuan token

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username', // Pastikan username ada
        'email',
        'password',
        'role',
        'nis',
        'address',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}