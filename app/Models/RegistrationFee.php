<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistrationFee extends Model
{
    protected $fillable = [
        'category', 
        'usd_physical', 
        'idr_physical',
        'usd_online', 
        'idr_online',
        'event_id',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'year');
    }
}
