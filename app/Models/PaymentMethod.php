<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $table = 'payment_methods';

    protected $fillable = [
        'method_name',
        'bank_name',
        'account_name',
        'virtual_account_number',
        'paypal_email',
        'additional_info',
        'important_notes',
        'event_year',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_year', 'year');
    }
}
