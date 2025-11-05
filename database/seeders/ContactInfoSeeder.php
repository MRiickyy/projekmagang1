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
                'event_id' => 1
            ],
            [
                'type' => 'email',
                'title' => 'Official Email Address',
                'value' => 'sain@ijain.org',
                'event_id' => 1
            ],
            [
                'type' => 'edas',
                'title' => 'EDAS Submission Link',
                'value' => 'https://edas.info/conference',
                'event_id' => 1
            ],
            [
                'type' => 'phone',
                'title' => 'Phone (WhatsApp)',
                'value' => '+62 8139 255 4050',
                'event_id' => 1
            ],
        ];

        foreach ($data as $item) {
            ContactInfo::create($item);
        }
    }
}