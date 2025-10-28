<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    protected $fillable = [
        'round_number',
        'date',
        'title',
        'event_id',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}