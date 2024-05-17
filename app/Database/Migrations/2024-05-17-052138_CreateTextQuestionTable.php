<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTextQuestionTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'text_question_id' => [
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
                'type' => 'TEXT',
            ],
            'number' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'response' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
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
        $this->forge->addKey('text_question_id', TRUE);
        $this->forge->addForeignKey('survey_id', 'Surveys', 'survey_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('TextQuestion');
    }

    public function down()
    {
        $this->forge->dropTable('TextQuestion');
    }
}
