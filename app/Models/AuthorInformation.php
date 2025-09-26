<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthorInformation extends Model
{
    protected $table = 'author_informations';
    protected $fillable = [
        'title',
        'cta_text',
        'cta_button',
        'cta_link',
        'intro_paragraph',
        'submission_link',
        'selection_process',
        'preparation_of_contributions',
        'non_presented_policy',
    ];
}
