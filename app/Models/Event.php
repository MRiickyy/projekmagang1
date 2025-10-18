<?php

namespace App\Models;

use App\Models\AuthorInformation;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
     protected $table = 'events';

    protected $fillable = [
        'event',
        'year',
    ];

    public function authorInformations()
    {
        return $this->hasMany(AuthorInformation::class, 'event_year');
    }
}
