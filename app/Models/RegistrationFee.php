<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistrationFee extends Model
{
    protected $fillable = [
        'category', 
        'usd_early_bird', 
        'usd_reguler', 
        'event_id',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
