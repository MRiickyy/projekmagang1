<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistrationModel extends Model
{
    protected $table = 'registrations';
    protected $fillable = [
        'cta_title', 'cta_button', 'cta_link',
        'notes', 'conference_fee_include',
        'registration_procedures'
    ];
}
