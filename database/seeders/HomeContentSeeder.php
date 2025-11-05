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
            ['section' => 'banner_text', 'content' => 'Driving a Sustainable Future with AI, IoT, and Data Science Technologies', 'event_id' => 1],

            // Welcome section
            ['section' => 'welcome_title', 'content' => 'Welcome to ICoICT 2025!', 'event_id' => 1],
            ['section' => 'welcome_text', 'content' => 'We are thrilled to invite you to the International Conference on Information and Communication Technology (ICoICT) 2025...', 'event_id' => 1],
            ['section' => 'welcome_tracks_intro', 'content' => 'We welcome submissions of technical paper in the following tracks (but not limited to):', 'event_id' => 1],
            ['section' => 'welcome_tracks', 'content' => 'Artificial Intelligence and Machine Learning<br>Data Science and Its Implementations<br>IoT System and Infrastructure<br>Information Technology Applications', 'event_id' => 1],
            ['section' => 'welcome_tracks_footer', 'content' => 'Accepted and presented papers will be submitted for inclusion into the IEEE Xplore subject to meeting IEEE’s scope and quality requirements.', 'event_id' => 1],
            ['section' => 'welcome_prev_title', 'content' => 'Papers from the previous ICoICT 2013 until 2024 have been published in IEEE Xplore and indexed in Scopus:', 'event_id' => 1],
            ['section' => 'welcome_isbn_title', 'content' => 'With ISBN Information:', 'event_id' => 1],
            ['section' => 'welcome_isbn_text', 'content' => 'Electronic ISBN: 978-1-6654-0447-1<br>USB ISBN: 978-1-6654-0446-4', 'event_id' => 1],

            // ICoICT links Section
            ['section' => 'icoict_link_2013', 'content' => 'https://ieeexplore.ieee.org/xpl/mostRecentIssue.jsp?punumber=123456', 'event_id' => 1],
            ['section' => 'icoict_link_2014', 'content' => 'https://ieeexplore.ieee.org/xpl/mostRecentIssue.jsp?punumber=234567', 'event_id' => 1],
            ['section' => 'icoict_link_2015', 'content' => 'https://ieeexplore.ieee.org/xpl/mostRecentIssue.jsp?punumber=345678', 'event_id' => 1],
            ['section' => 'icoict_link_2016', 'content' => 'http://ieeexplore.ieee.org/xpl/mostRecentIssue.jsp?punumber=7565234', 'event_id' => 1],
            ['section' => 'icoict_link_2017', 'content' => 'http://ieeexplore.ieee.org/xpl/mostRecentIssue.jsp?punumber=8054654', 'event_id' => 1],
            ['section' => 'icoict_link_2018', 'content' => 'https://ieeexplore.ieee.org/xpl/mostRecentIssue.jsp?punumber=8509820', 'event_id' => 1],
            ['section' => 'icoict_link_2019', 'content' => 'https://ieeexplore.ieee.org/xpl/conhome/8825728/proceeding', 'event_id' => 1],
            ['section' => 'icoict_link_2020', 'content' => 'https://ieeexplore.ieee.org/xpl/conhome/9162155/proceeding', 'event_id' => 1],
            ['section' => 'icoict_link_2021', 'content' => 'https://ieeexplore.ieee.org/xpl/conhome/9527366/proceeding', 'event_id' => 1],
            ['section' => 'icoict_link_2022', 'content' => 'https://ieeexplore.ieee.org/xpl/conhome/9914624/proceeding', 'event_id' => 1],
            ['section' => 'icoict_link_2023', 'content' => 'https://ieeexplore.ieee.org/xpl/conhome/10262402/proceeding', 'event_id' => 1],
            ['section' => 'icoict_link_2024', 'content' => 'https://ieeexplore.ieee.org/xpl/conhome/10697981/proceeding', 'event_id' => 1],

            // Speaker Section
            ['section' => 'speakers_keynote_title', 'content' => 'KEYNOTE SPEAKERS', 'event_id' => 1],
            ['section' => 'speakers_keynote_text', 'content' => 'Distinguished experts are invited to deliver a speech...', 'event_id' => 1],
            ['section' => 'speakers_tutorial_title', 'content' => 'TUTORIAL SPEAKERS', 'event_id' => 1],
            ['section' => 'speakers_tutorial_text', 'content' => 'Renowned subject-matter experts are invited...', 'event_id' => 1],
        ];

        foreach ($data as $item) {
            HomeContent::create($item);
        }
    }
}