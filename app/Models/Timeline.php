<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    protected $fillable = [
        'round_number',
        'date',
        'title',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'year', 'event_id');
    }
}