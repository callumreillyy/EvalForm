<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserResponseTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'response_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'survey_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'multiple_question_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'option_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
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
        $this->forge->addKey('response_id', TRUE);
        $this->forge->addForeignKey('user_id', 'User', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('survey_id', 'Surveys', 'survey_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('multiple_question_id', 'MultipleQuestion', 'multiple_question_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('option_id', 'Option', 'option_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('UserResponse');
    }

    public function down()
    {
        $this->forge->dropTable('UserResponse');
    }
}
