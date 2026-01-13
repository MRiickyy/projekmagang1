<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrationSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'section' => 'title_link',
                'content' => 'Please Register Here',
                'event_id' => 1
            ],
            [
                'section' => 'button_link',
                'content' => 'Registration Form',
                'event_id' => 1
            ],
            [
                'section' => 'link',
                'content' => 'https://docs.google.com/forms/d/e/1FAIpQLSdVchPrm1JybVSr8RrPAdqGR74Gva3kg02xEvPvJ317ZP4HBg/viewform',
                'event_id' => 1
            ],
            [
                'section' => 'notes',
                'content' => "The Payment is non-refundable.\n" .
                             "Payment must be made in Full Amount (PayPal, or Bank Transfer should add a 6% transfer fee ).",
                'event_id' => 1
            ],
            [
                'section' => 'registration_fee_include',
                'content' => "Journal Publication Fee\n" .
                             "Access to all sessions in SAIN’24, including Plenary Sessions, Conference Track Presentations.",
                'event_id' => 1
            ],
            [
                'section' => 'registration_procedures',
                'content' => "xxxxxx\n" .
                             "xxxxxx\n" .
                             "xxxxxx",
                'event_id' => 1
            ],
        ];

        foreach ($data as $item) {
            DB::table('registrations')->updateOrInsert(
                ['section' => $item['section'], 'event_id' => $item['event_id']],
                [
                    'content' => $item['content'],
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }
    }
}
