<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    use HasFactory;

    protected $table = 'home_contents';

    protected $fillable = [
        'section',
        'content',
        'event_id',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'year');
    }
}