<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'admins_login';

    // Kolom yang bisa diisi
    protected $fillable = [
        'username',
        'password',
    ];

    // Kolom yang disembunyikan saat diambil
    protected $hidden = [
        'password',
    ];
}