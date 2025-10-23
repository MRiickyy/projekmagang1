<?php

namespace Database\Seeders;

use App\Models\Speaker;
use Illuminate\Database\Seeder;
use App\Models\DescriptionSpeaker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert Speaker
        $speaker = Speaker::firstOrCreate([
            'name' => 'Assoc. Prof. Ts. Dr. Afizan Azman',
            'university' => 'Multimedia University, Malaysia',
            'slug' => 'assoc-prof-ts-dr-afizan-azman',
            'biodata' => 'Short biodata about Afizan Azman...',
            'speaker_type' => 'keynote',
            'event_id' => 1
        ]);

        // Insert Deskripsi Speaker
        $deskripsi = [
            [
                'title' => 'abstract',
                'content' => 'Future Directions of AI in Societal Impact Project ...',
            ],
            [
                'title' => 'research_focus',
                'content' => '1. Human Computer Interaction (HCI)
                2. Artificial Intelligence (AI)
                3. Data Analytics and Machine Learning
                4. Vehicle System and Technology
                5. Internet of Things',
            ],
            [
                'title' => 'professional_event',
                'content' => 'Invited speaker at The 5th Annual Global Congress of Knowledge Economy 2018 (Qingdao, China).',
            ],
            [
                'title' => 'training_workshop',
                'content' => 'Delivered training programs for various organizations, including: JPWM, MCMC, Kementerian Pendidikan Malaysia, UPEN, etc.',
            ],
        ];

        foreach ($deskripsi as $desc) {
            DescriptionSpeaker::create([
                'speaker_id' => $speaker->id,
                'title'       => $desc['title'],
                'content'    => $desc['content'],
            ]);
        }
    }
}
