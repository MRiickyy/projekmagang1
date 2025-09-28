<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistrationModel extends Model
{
    protected $table = 'registrations';
    protected $fillable = [
        'cta_title', 'cta_button', 'cta_link',
        'notes', 'conference_fee_include',
        'bank_name', 'account_name', 'virtual_account',
        'paypal_email', 'paypal_info',
        'registration_procedures'
    ];
}
