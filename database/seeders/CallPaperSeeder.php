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
            ['section' => 'intro_call','event_id' => 1],
            ['content' => 'The 2025 8th International Symposium on Advanced Intelligent Informatics (SAIN) is an international symposium that covers Intelligent Informatics scope that includes four (4) majors areas:'],
           
        );

        CallPaper::updateOrCreate(
            ['section' => 'call_for_papers', 'title' => '(1)', 'event_id' => 1],
            
            ['content' => json_encode([
                'Machine Learning and Soft Computing'
            ])],
           
        );

        CallPaper::updateOrCreate(
            ['section' => 'call_for_papers', 'title' => '(2)', 'event_id' => 1],
            
            ['content' => json_encode([
                'Data Mining & Big Data Analytics'
            ])],
           
        );

        CallPaper::updateOrCreate(
            ['section' => 'call_for_papers', 'title' => '(3)', 'event_id' => 1],
            
            ['content' => json_encode([
                'Computer Vision and Pattern Recognition'
            ])],
           
        );

        CallPaper::updateOrCreate(
            ['section' => 'call_for_papers', 'title' => '(4)', 'event_id' => 1],
            
            ['content' => json_encode([
                'Automated reasoning'
            ])],
           
        );

        // --- Submission Guidelines ---
        CallPaper::updateOrCreate(
            ['section' => 'submission_title', 'event_id' => 1],
            ['content' => 'SUBMISSION']
        );

        CallPaper::updateOrCreate(
            ['section' => 'submission_intro', 'event_id' => 1],
            ['content' => 'Before you proceed, carefully read the submission guidelines as follows:']
        );

        CallPaper::updateOrCreate(
            ['section' => 'submission_guidelines', 'event_id' => 1],
            ['content' => "The Paper Should be written in English.\n" .
                          "View the theme and scope topics.\n" .
                          "The length of the submitted paper is at least 12 pages and no more than 15 pages in A4 Paper size.\n" .
                          "The paper format is as follows:
                            - Paragraph: Single column, single spacing.
                            - Font: Times New Roman, 12pt.
                            - References: Any styles are allowed but must be formatted using any reference management tool e.g. Mendeley, Endnote, Zotero.
                            - The format for first submission is generic (for peer review only). Upon acceptance, authors will be notified on the final formatting according to the journal’s requirement.\n" .
                          "All review processes are blind peer reviews by a minimum of three reviewers.\n" .
                          "All review processes are single-blind peer reviews.\n" .
                          "Full paper must be submitted through sain@ijain.org or (https://cmt3.research.microsoft.com/User/Login?ReturnUrl=%2FSAIN2025%2FSubmission%2Findex) Microsoft Submission Management system.\n" .
                          "Please contact ijain@uad.ac.id and/or andri.pranolo.id@ieee.org for any questions.",
            ]
        );

        // --- Important Dates ---
        CallPaper::updateOrCreate(
            ['section' => 'important_dates', 'title' => 'Full paper submission deadline','event_id' => 1],
            ['content' => 'September 15, 2025'],
           
        );

        CallPaper::updateOrCreate(
            ['section' => 'important_dates', 'title' => 'Full paper acceptance notification','event_id' => 1],
            ['content' => 'September 30, 2025'],
           
        );

        // --- Join Section ---
        CallPaper::updateOrCreate(
            ['section' => 'join_section','event_id' => 1],
            ['content' => 'Share your insights and contribute'],
           
        );
    }
}