<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RenameColumnUserIdToSurveyId extends Migration
{
    public function up()
    {
        // Change column 'user_id' to 'survey_id'
        $fields = [
            'user_id' => [
                'name' => 'survey_id',
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
        ];
        $this->forge->modifyColumn('Questions', $fields);
    }

    public function down()
    {
        // Revert changes by renaming 'survey_id' back to 'user_id'
        $fields = [
            'survey_id' => [
                'name' => 'user_id',
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
        ];
        $this->forge->modifyColumn('Questions', $fields);
    }
}

