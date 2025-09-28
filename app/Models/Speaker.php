<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'seminar_id',
        'name',
        'slug',
        'university',
        'image',
        'biodata',
        'full_biodata',
        'speaker_type',
    ];

}
