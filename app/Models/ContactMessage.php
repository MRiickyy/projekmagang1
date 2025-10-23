<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'message']; 
    
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'year');
    }
}