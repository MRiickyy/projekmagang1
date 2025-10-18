<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapLocation extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi mass-assignment
    protected $fillable = ['title', 'link'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_year', 'year');
    }
}