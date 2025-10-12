<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorInformation extends Model
{
    use HasFactory;

    protected $table = 'author_informations';

    protected $fillable = [
        'section',
        'content',
    ];
}
