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
                'section' => 'cta_title',
                'content' => 'Please Register Here',
                'event_id' => 1
            ],
            [
                'section' => 'cta_button',
                'content' => 'Registration Form',
                'event_id' => 1
            ],
            [
                'section' => 'cta_link',
                'content' => '#',
                'event_id' => 1
            ],
            [
                'section' => 'notes',
                'content' => "Maximum number of pages for a normal paper is 6\n" .
                             "To be eligible for the IEEE Member rate you must be an active IEEE Member\n" .
                             "To be eligible for the student rate you must provide your student ID/Letter of proof",
                'event_id' => 1
            ],
            [
                'section' => 'conference_fee_include',
                'content' => 'To be announced.',
                'event_id' => 1
            ],
            [
                'section' => 'registration_procedures',
                'content' => "Complete the payment according to the method of your choice.\n" .
                             "Register for the conference using the following link: https://iee.ucd.id/icoict2025\n" .
                             "If registering at the IEEE member or student rate, attach a copy of your IEEE member card or student card/verification letter.\n" .
                             "Ensure all required information and supporting documents (e.g., payment proof/slip) are included before submitting the form.",
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
