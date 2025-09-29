<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CallPaper;

class CallPaperSeeder extends Seeder
{
    public function run(): void
    {
        // --- Call for Papers ---
        CallPaper::updateOrCreate(
            ['section' => 'call_for_papers', 'title' => 'Artificial Intelligence & Machine Learning'],
            ['content' => json_encode([
                'Learning Algorithms & Methods',
                'Explainable AI',
                'Computer Vision',
                'Natural Language Processing',
                'AI in Healthcare',
                'AI in Education'
            ])]
        );

        CallPaper::updateOrCreate(
            ['section' => 'call_for_papers', 'title' => 'Data Science and Its Implementation'],
            ['content' => json_encode([
                'Big Data Analytics',
                'Statistical Methods',
                'Text Mining',
                'Recommender Systems',
                'Business Intelligence',
                'Computational Statistics'
            ])]
        );

        CallPaper::updateOrCreate(
            ['section' => 'call_for_papers', 'title' => 'IoT System and Infrastructure'],
            ['content' => json_encode([
                'IoT Architectures',
                'IoT Security',
                'IoT Scalability',
                'Cloud Computing',
                'Edge and Fog Computing',
                'Smart Infrastructure',
                'Industry 4.0 IoT',
                'Environmental IoT',
                'Connected Systems',
            ])]
        );

        CallPaper::updateOrCreate(
            ['section' => 'call_for_papers', 'title' => 'Information Technology Applications'],
            ['content' => json_encode([
                'IT in Smart Cities; Cybersecurity',
                'Software Development',
                'Interactive Systems',
                'IT in e-Learning',
                'IT Business Analytics',
                'Emerging IT Tech',
            ])]
        );

        // --- Submission Guidelines ---
        CallPaper::updateOrCreate(
            ['section' => 'submission_guidelines'],
            ['content' => 'All papers must be original, a technical-type paper, not published or under consideration elsewhere, and conform to the specified IEEE format. Selected papers will undergo a rigorous peer-review process...']
        );

        // --- Important Dates ---
        CallPaper::updateOrCreate(
            ['section' => 'important_dates', 'title' => 'Paper Submission Deadline'],
            ['content' => 'April 15, 2025']
        );

        CallPaper::updateOrCreate(
            ['section' => 'important_dates', 'title' => 'Notification of Acceptance'],
            ['content' => 'May 15, 2025']
        );

        CallPaper::updateOrCreate(
            ['section' => 'important_dates', 'title' => 'Camera-Ready Paper Deadline'],
            ['content' => 'June 30, 2025']
        );

        // --- Join Section ---
        CallPaper::updateOrCreate(
            ['section' => 'join_section'],
            ['content' => 'Share your insights and contribute to advancing knowledge in AI, IoT, and Data Science Technologies.']
        );
    }
}