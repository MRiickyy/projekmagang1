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
            'method_name' => 'Virtual Account',
            'bank_name' => 'Bank Negara Indonesia (PERSERO)',
            'account_name' => 'Telkom University – ICOICT 2025',
            'virtual_account_number' => '832106204020127',
            'important_notes' => 'Please include your paper ID information on the payment slip.'
        ]);

        // PayPal
        PaymentMethod::create([
            'method_name' => 'PayPal',
            'paypal_email' => 'kangandrian@telkomuniversity.ac.id',
            'additional_info' => "Transfer the full registration fee plus a 5% PayPal currency conversion fee. Ensure the fee is transferred under the registrant’s name, clearly stated on the payment slip. Include your paper ID information on the payment slip."
        ]);
    }
}
