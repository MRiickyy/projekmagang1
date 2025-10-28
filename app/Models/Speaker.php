<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Speaker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'university',
        'image',
        'biodata',
        'speaker_type',
        'event_id',
    ];

    // Relasi ke deskripsi
    public function descriptions()
    {
        return $this->hasMany(DescriptionSpeaker::class, 'speaker_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}