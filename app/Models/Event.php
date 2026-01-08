<?php

namespace App\Models;

use App\Models\AuthorInformation;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Event extends Model
{
    //
    protected $table = 'events';

    protected $fillable = [
        'event',
        'year',
        'name',
        'main_title',
        'highlight_text',
        'subtitle',
        'location',
        'date_range',
        'event_time',
        'register_link',
        'submit_link',
    ];

    public function authorInformations()
    {
        return $this->hasMany(AuthorInformation::class);
    }

    public function speakers()
    {
        return $this->hasMany(Speaker::class);
    }

    public function committees()
    {
        return $this->hasMany(Committee::class);
    }
    public function getStartDateTimeAttribute()
    {
        // Ambil tanggal pertama dari rentang, misal "20–21 November 2025"
        preg_match('/\d{1,2}/', $this->date_range, $match);
        $day = $match[0] ?? 1;

        // Ambil bulan dan tahun
        preg_match('/([A-Za-z]+)\s(\d{4})/', $this->date_range, $match2);
        $month = $match2[1] ?? 'January';
        $year = $match2[2] ?? '1970';

        // Gabungkan tanggal dan jam
        $dateTimeString = "{$day} {$month} {$year} {$this->event_time}";
        
        // Kembalikan objek Carbon (biar bisa dihitung di countdown)
        return Carbon::parse($dateTimeString);
    }
}