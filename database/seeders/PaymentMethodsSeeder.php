<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentMethod;

class PaymentMethodsSeeder extends Seeder
{
    public function run(): void
    {
        // Virtual Account
        PaymentMethod::create([
            'method_name' => 'Bank Transfer',
            'bank_name' => 'xxxxxx',
            'account_name' => 'xxxxxx',
            'bank_number' => 'xxxxxx',
            'important_notes' => 'xxxxxx',
            'event_id' => 1
        ]);

        // PayPal
        PaymentMethod::create([
            'method_name' => 'PayPal',
            'paypal_email' => 'xxx@xxx',
            'additional_info' => "xxxxxx",
            'event_id' => 1
        ]);
    }
}
