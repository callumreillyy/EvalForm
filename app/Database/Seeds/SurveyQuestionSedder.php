<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SurveyQuestionSedder extends Seeder
{
    public function run()
    {
        //Insert data into User table
        $user_data = [
            [
                'name' => 'User29 Lastname29',
                'email' => 'user29@example.com',
                'phone' => '123-456-2232',
                'created_at' => date('Y-m-d H:i:s')

            ],
        ];

        $userIds = []; 

        foreach ($user_data as $user) {
            $this->db->table('User')->insert($user);
            $userIds[] = $this->db->insertID();
        }
        
        $surveyIds = [];

        foreach ($userIds as $userId) {
            for($i = 0; $i <= 5; $i++) {
            // Insert survey data
                $this->db->table('Surveys')->insert([
                    'user_id' => $userId,
                    'title' => "Survey by $userId Title",
                    'description' => "Description of survey created by user $userId",
                    'respondants' => 0,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
                $surveyIds[] = $this->db->insertID();
            }
        }

        
        
        foreach ($surveyIds as $surveyId) {
            // Insert survey data
            $text_question_data = [
                [
                    'survey_id' => $surveyId,
                    'question' => "Some text question 1.",
                    'number' => 1,
                    'response' => 'placeholder text response',
                    'created_at' => date('Y-m-d H:i:s')
                ],
                [
                    'survey_id' => $surveyId,
                    'question' => "Some text question 2.",
                    'number' => 2,
                    'response' => 'placeholder text response',
                    'created_at' => date('Y-m-d H:i:s')
                ],
            ];
            $this->db->table('TextQuestion')->insertBatch($text_question_data);
        }

        foreach ($surveyIds as $surveyId) {
            // Insert survey data
            $multiple_question_data = [
                [
                    'survey_id' => $surveyId,
                    'question' => "Some multiple choice question 3.",
                    'number' => 3,
                    'created_at' => date('Y-m-d H:i:s')
                ],
                [
                    'survey_id' => $surveyId,
                    'question' => "Some multiple choice question 4.",
                    'number' => 4,
                    'created_at' => date('Y-m-d H:i:s')
                ],
            ];
            
            $this->db->table('MultipleQuestion')->insertBatch($multiple_question_data);
    
            // Retrieve the inserted question IDs
            $start_id = $this->db->insertID();
            $multiple_question_ids = range($start_id, $start_id + count($multiple_question_data) - 1);
    
            // Insert options for each question
            $options_data = [
                ['option_text' => 'Option 1'],
                ['option_text' => 'Option 2'],
                ['option_text' => 'Option 3'],
                ['option_text' => 'Option 4'],
            ];
    
            foreach ($multiple_question_ids as $question_id) {
                foreach ($options_data as $option) {
                    $option_data[] = [
                        'multiple_question_id' => $question_id,
                        'option_text' => $option['option_text'],
                        'created_at' => date('Y-m-d H:i:s')
                    ];
                }
            }
    
            $this->db->table('Option')->insertBatch($option_data);
            // Clear the $option_data array for the next set of questions
            $option_data = [];
        }
    } 
}