<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DescriptionSpeaker extends Model
{
    protected $table = 'description_speakers';

    protected $fillable = [
        'speaker_id',
        'title',   // contoh: abstract, research_focus, dll
        'content',
    ];

    public function speaker()
    {
        return $this->belongsTo(Speaker::class, 'speaker_id', 'id');
    }
}
