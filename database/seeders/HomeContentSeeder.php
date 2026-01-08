<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomeContent;
use Illuminate\Support\Facades\DB;

class HomeContentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('home_contents')->truncate();

        $data = [
            [
                'section' => 'banner_image',
                'content' => 'logoAscee.png',
                'event_id' => 1
            ],

            [
                'section' => 'banner_logo',
                'content' => 'logoSain.png',
                'event_id' => 1
            ],

            ['section' => 'banner_text', 
             'content' => 'Symposium on Advanced Intelligent Informatics (SAIN) Internasional Journal of Advances in Intelligent Informatics (IJAIN)', 
             'event_id' => 1
            ],

            // callpaper section
            ['section' => 'intro_home', 
             'content' => 'The 2025 8th International Symposium on Advanced Intelligent Informatics (SAIN) is an international symposium that covers Intelligent Informatics scope that includes four (4) majors areas, 1) Machine Learning and Soft Computing, 2) Data Mining & Big Data Analytics, 3) Computer Vision and Pattern Recognition, and 4) Automated reasoning. SAIN 2025 will be held Hybrid Virtually and Offline in Seoul, Korea, on December 12-13, 2025, and hosted in Seoul-Korea. Association for Scientific Computing Electronics and Engineering (ASCEE) hosts this conference and is jointly organized with International Journal of Advances in Intelligent Informatics; Universitas Negeri Malang,  Universitas Mulawarman, Universitas Muslim Indonesia, Universitas Pembangunan Nasional Veteran Yogyakarta.',
             'event_id' => 1
            ],

            // previous conferences section
            ['section' => 'prev_conf_title', 
             'content' => 'PREVIOUS CONFERENCES',
             'event_id' => 1
            ],

            ['section' => 'previous_conference', 
             'content' => "The 2018 1st International Symposium on Advanced Intelligent Informatics (SAIN), Yogyakarta – Indonesia, August 29-30, 2018, http://sain.ijain.org/2018/, Published in IEEE Xplore (indexed by SCOPUS, EI Compendex, Web of Science/Clarivate Analytics, etc.) – https://ieeexplore.ieee.org/xpl/conhome/8671676/proceeding\n" .
                          "The 2019 2nd International Symposium on Advanced Intelligent Informatics (SAIN), Fukuoka – Japan, September 2-4, 2019 – http://sain.ijain.org/2019/, Published in SCOPUS Elsevier indexed journal.",
             'event_id' => 1
            ],

            // scope section
            ['section' => 'scope_title', 
             'content' => 'SCOPE',
             'event_id' => 1
            ],

            ['section' => 'scope_intro', 
             'content' => 'SAIN’24 invites original articles within the whole spectrum of intelligent informatics, which includes, but is not limited to:',
             'event_id' => 1
            ],

            ['section' => 'scope_list', 
             'content' => "Machine Learning & Soft Computing: Artificial Immune Systems, Ant Colony; Bioinformatics, Biologically Inspired Intelligence; Chaos Theory and intelligent control systems; Computational Paradigms and complexity; Deep learning; Evolutionary Computing; Fault detection, fault analysis, and diagnostics; Fuzzy Computing; Hybrid Methods & Computing; Immunological Computing; Memetic computing; Morphic Computing; Neuro Computing; Particle Swarm; Probabilistic Computing; Rough Sets and granular computing; Soft computing in P2P, Grid, Cloud and Internet Computing Technologies; Support Vector Machines; Wavelet.\n" .
                          "Data Mining & Big Data Analytics: Business Analytics; Big data infrastructure and visualization; Cloud computing; Data characteristics and complexities; Data and knowledge creation, discovery, processing, modeling, mapping, search, interopera­bility, exchange, integration, and visualization; Data mining; Intelligent databases, indexing, and query processing; social analytics, and text analytics; Information retrieval and extraction; Ontologies and the Semantic Web; Privacy and security in Big Data; Large-scale optimization; Scalable computing and high-performance computing for big data; Statistical and mathematical techniques; Ubiquitous, grid and high-performance computing; Web and mobile Intelligence.",
             'event_id' => 1
            ],

            // publications section
            ['section' => 'publications_title', 
             'content' => 'PUBLICATIONS',
             'event_id' => 1
            ],

            ['section' => 'publications_intro', 
             'content' => 'All accepted and presented papers will be published in one of the following journals:',
             'event_id' => 1
            ],

            ['section' => 'publications_list', 
             'content' => "International Journal of Advances in Intelligent Informatics (Q3, SCOPUS Indexed).\n" .
                          "International Journal on Advanced Science, Engineering and Information Technology(Q3 SCOPUS Indexed journal).\n" .
                          "or other SCOPUS/Web of SCience indexed journals.",
             'event_id' => 1
            ],

            // editors section
            ['section' => 'editors_title', 
             'content' => 'EDITORS',
             'event_id' => 1
            ],

            ['section' => 'editors', 
             'content' => "Andri Pranolo (Universitas Ahmad Dahlan, Indonesia)\n" .
                          "Rafal Drezewski (AGH University of Science and Technology, Poland)\n" .
                          "Shi-Jinn Horng (National Taiwan University Sains & Technology (NTUST), Taiwan)\n" .
                          "Huynh Thi Thanh Binh (Hanoi University of Science and Technology (HUST)), Vietnam)\n" .
                          "Aji Prasetya Wibawa (Universitas Negeri Malang, Indoensia)\n" .
                          "Haviluddin (Universitas Mulawarman, Indonesia)",
             'event_id' => 1
            ],
        ];

        foreach ($data as $item) {
            HomeContent::create($item);
        }
    }
}