<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOptionTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'option_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'multiple_question_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'option_text' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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
        $this->forge->addKey('option_id', TRUE);
        $this->forge->addForeignKey('multiple_question_id', 'MultipleQuestion', 'multiple_question_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Option');
    }

    public function down()
    {
        $this->forge->dropTable('Option');
    }
}
