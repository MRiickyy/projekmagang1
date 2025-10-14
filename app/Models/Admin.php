<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    
    protected $table = 'admins_login';
    protected $fillable = ['username', 'password']; 
    protected $hidden = ['password'];

    
    protected $fillable = [
        'username',
        'password',
    ];

    
    protected $hidden = [
        'password',
    ];
}