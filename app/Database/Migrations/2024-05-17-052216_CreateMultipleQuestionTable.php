<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMultipleQuestionTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'multiple_question_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'survey_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'question' => [
                'type' => 'text',
            ],
            'number' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => TRUE,
                'default' => NULL
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => TRUE,
                'default' => NULL,
                'on update' => 'CURRENT_TIMESTAMP' // Note: This is supported in MySQL 5.6.5 or newer
            ]
        ]);
        $this->forge->addKey('multiple_question_id', TRUE);
        $this->forge->addForeignKey('survey_id', 'Surveys', 'survey_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('MultipleQuestion');
    }

    public function down()
    {
        $this->forge->dropTable('MultipleQuestion');
    }
}
