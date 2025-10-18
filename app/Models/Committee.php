<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'university',
        'country',
        'type',
        'event_year',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_year', 'year');
    }
}
