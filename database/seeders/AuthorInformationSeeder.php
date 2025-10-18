<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorInformationSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'section' => 'cta_text',
                'content' => 'Authors are requested to utilize the provided presentation format.',
                'event_year' => 2025
            ],
            [
                'section' => 'cta_button',
                'content' => 'Download Slide Format',
                'event_year' => 2025
            ],
            [
                'section' => 'cta_link',
                'content' => '#',
                'event_year' => 2025
            ],
            [
                'section' => 'intro_paragraph',
                'content' => 'Prospective authors are invited to submit full papers with maximum of 6 pages (including tables, figures and references) in standard IEEE double-column format; Extra fee for more pages. Our conference focuses on showcasing original research, including completed studies or substantial work in progress.',
                'event_year' => 2025
            ],
            [
                'section' => 'submission_link',
                'content' => 'https://edas.info/newPaper.php?c=33220',
                'event_year' => 2025
            ],
            [
                'section' => 'selection_process',
                'content' => "All paper submissions will be checked for formatting and originality. Due to IEEE policy, papers with high similarity score may not be accepted by the conference. Similarity threshold for review manuscript is 30%. The final version must have a similarity index below 20%. In addition, AI writing score also be checked as consideration.

All submitted papers are subjected to a peer review process by 2-3 reviewers. Decision of a paper acceptance is based on the average score and the comments given by the reviewers. The accepted papers must be revised according to the reviewers’ comments and suggestions before submitted as the camera-ready version. All accepted and presented papers will be submitted for inclusion into the IEEE Xplore subject to meeting IEEE’s scope and quality requirements.",
                'event_year' => 2025
            ],
            [
                'section' => 'preparation_of_contributions',
                'content' => "The manuscript template can be downloaded from: 
https://www.ieee.org/conferences/publishing/templates.html

**The manuscript of Camera-Ready paper in Ms. Word or Zipped LaTex format (A4 size) is also needed as supplementary material at the Registration stage.

Note: Please note that as we use a double-blind review process, authors’ names and affiliations should not be written on the manuscript when it is submitted. This is necessary to ensure fairness in the reviewing process.",
                'event_year' => 2025
            ],
            [
                'section' => 'non_presented_policy',
                'content' => 'The committee reserves the right to exclude a paper from distribution after the conference if the paper is not presented at the conference.',
                'event_year' => 2025
            ],
        ];

        foreach ($data as $item) {
            DB::table('author_informations')->updateOrInsert(
                ['section' => $item['section'], 'event_year' => $item['event_year']],
                ['content' => $item['content'], 'updated_at' => now(), 
                'created_at' => now()]
            );
        }
    }
}