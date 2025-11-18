<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterSection extends Model
{
    protected $fillable = ['title', 'subtitle', 'items'];

    protected $casts = [
        'items' => 'array',
        'subtitle' => 'array',
        'visitors' => 'array',
    ];
}