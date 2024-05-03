<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class QuestionsDropPreviousAddNewFK extends Migration
{
    public function up()
    {
        //
        $this->forge->dropForeignKey('Questions', 'Questions_user_id_foreign');

        $this->forge->addForeignKey('survey_id', 'Surveys', 'survey_id', 'CASCADE', 'CASCADE');

    }

    public function down()
    {
        //
        $this->forge->dropForeignKey('Questions', 'Questions_survey_id_foreign');

        $this->forge->addForeignKey('user_id', 'User', 'user_id', 'CASCADE', 'CASCADE');
    }
}
