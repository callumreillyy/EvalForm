<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MakeQuestionsSurveyIdRefernceProperFK extends Migration
{
    public function up()
    {
        //
        $this->forge->addForeignKey('survey_id', 'Surveys', 'survey_id', 'CASCADE', 'CASCADE');

    }

    public function down()
    {
        //

        $this->forge->dropForeignKey('Questions', 'survey_id');
    }
}
