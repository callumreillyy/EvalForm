<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifySurveyIdInQuestions extends Migration
{
    public function up()
    {
        // Drop the existing 'survey_id' column
        $this->forge->dropColumn('Questions', 'survey_id');

        // Add a new 'survey_id' column with a foreign key constraint
        $this->forge->addColumn('Questions', [
            'survey_id INT UNSIGNED NOT NULL',
            'CONSTRAINT fk_survey_id FOREIGN KEY (survey_id) REFERENCES Surveys(survey_id) ON DELETE CASCADE'
        ]);
    }

    public function down()
    {
        // Drop the newly added 'survey_id' column with the foreign key
        $this->forge->dropColumn('Questions', 'survey_id');

        $this->forge->addColumn('Questions', [
            'survey_id INT UNSIGNED NOT NULL'
        ]);
    }
}

