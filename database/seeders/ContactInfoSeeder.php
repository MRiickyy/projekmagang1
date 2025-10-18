<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactInfo;

class ContactInfoSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'type' => 'website',
                'title' => 'Conference Website',
                'value' => 'https://conference-website.com',
                'event_year' => 2025
            ],
            [
                'type' => 'email',
                'title' => 'Official Email Address',
                'value' => 'conference@email.com',
                'event_year' => 2025
            ],
            [
                'type' => 'edas',
                'title' => 'EDAS Submission Link',
                'value' => 'https://edas.info/conference',
                'event_year' => 2025
            ],
            [
                'type' => 'phone',
                'title' => 'Phone (WhatsApp)',
                'value' => '+62 812 3456 7890',
                'event_year' => 2025
            ],
        ];

        foreach ($data as $item) {
            ContactInfo::create($item);
        }
    }
}