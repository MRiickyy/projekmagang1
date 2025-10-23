<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallPaper extends Model
{
    protected $fillable = ['section', 'title', 'content', 'event_id'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}