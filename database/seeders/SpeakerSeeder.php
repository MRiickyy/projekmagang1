<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Speaker;
use App\Models\DescriptionSpeaker;

class SpeakerSeeder extends Seeder
{
    public function run(): void
    {
        // === SPEAKER 1 ===
        $aji = Speaker::firstOrCreate([
            'name' => 'Prof. Dr. Aji Prasetya Wibawa',
            'university' => 'Universitas Negeri Malang, Indonesia',
            'slug' => 'prof-dr-aji-prasetya-wibawa',
            'biodata' => 'Short biodata about Prof. Dr. Aji Prasetya Wibawa...',
            'speaker_type' => 'keynote',
            'event_id' => 1
        ]);

        $deskripsiAji = [
            [
                'title' => 'abstract',
                'content' => 'The role of AI in shaping future education systems...',
            ],
            [
                'title' => 'research focus',
                'content' => '1. Artificial Intelligence
                2. Data Mining
                3. Computational Intelligence',
            ],
        ];

        foreach ($deskripsiAji as $desc) {
            DescriptionSpeaker::firstOrCreate([
                'speaker_id' => $aji->id,
                'title' => $desc['title'],
                'content' => $desc['content'],
            ]);
        }

        // === SPEAKER 2 ===
        $ummi = Speaker::firstOrCreate([
            'name' => 'Assoc. Prof. Dr. Ummi Rabaah Hashim',
            'university' => 'UTeM Melaka, Malaysia',
            'slug' => 'assoc-prof-dr-ummi-rabaah-hashim',
            'biodata' => 'Short biodata about Assoc. Prof. Dr. Ummi Rabaah Hashim...',
            'speaker_type' => 'keynote',
            'event_id' => 1
        ]);

        $deskripsiUmmi = [
            [
                'title' => 'abstract',
                'content' => 'Future Directions of AI in Societal Impact Project ...',
            ],
            [
                'title' => 'research focus',
                'content' => '1. Human Computer Interaction (HCI)
                2. Artificial Intelligence (AI)
                3. Data Analytics and Machine Learning
                4. Vehicle System and Technology
                5. Internet of Things',
            ],
            [
                'title' => 'professional event',
                'content' => 'Invited speaker at The 5th Annual Global Congress of Knowledge Economy 2018 (Qingdao, China).',
            ],
            [
                'title' => 'training workshop',
                'content' => 'Delivered training programs for various organizations, including: JPWM, MCMC, Kementerian Pendidikan Malaysia, UPEN, etc.',
            ],
        ];

        foreach ($deskripsiUmmi as $desc) {
            DescriptionSpeaker::firstOrCreate([
                'speaker_id' => $ummi->id,
                'title' => $desc['title'],
                'content' => $desc['content'],
            ]);
        }
    }
}
