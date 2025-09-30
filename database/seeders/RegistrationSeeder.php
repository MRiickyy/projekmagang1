<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('registrations')->insert([
            'cta_title' => 'Please Register Here',
            'cta_button' => 'Registration Form',
            'cta_link' => '#',
            'notes' => "• Maximum number of pages for a normal paper is 6\n" .
                       "• To be eligible for the IEEE Member rate you must be an active IEEE Member\n" .
                       "• To be eligible for the student rate you must provide your student ID/Letter of proof",
            'conference_fee_include' => '• To be announced.',
            'bank_name' => 'Bank Negara Indonesia (PERSERO)',
            'account_name' => 'Telkom University – ICOICT 2025',
            'virtual_account' => '832106204020127',
            'paypal_email' => 'kangandrian@telkomuniversity.ac.id',
            'paypal_info' => "Transfer the full registration fee plus a 5% PayPal currency conversion fee.\n" .
                             "Ensure the fee is transferred under the registrant’s name; clearly stated on the payment slip.\n" .
                             "Include your paper ID information on the payment slip.",
            'registration_procedures' => "Complete the payment according to the method of your choice.\n" .
                                         "Register for the conference using the following link: https://iee.ucd.id/icoict2025\n" .
                                         "If registering at the IEEE member or student rate, attach a copy of your IEEE member card or student card/verification letter.\n" .
                                         "Ensure all required information and supporting documents (e.g., payment proof/slip) are included before submitting the form.",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
