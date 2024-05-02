<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOptionsTable extends Migration
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
            'question_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'option' => [
                'type' => 'TEXT',
            ],
            // gpt prompt how to setup bool in mysql spark
            'selected' => [
                'type' => 'TINYINT',   // Use TINYINT to represent boolean
                'constraint' => 1,     // Limit the size to 1 digit, effectively making it boolean
                'default' => FALSE,    // Use FALSE or 0 as the default value
                'null' => FALSE        // Optional, depending on whether you want to allow NULL values
        ]
    ]);

        $this->forge->addKey('option_id', TRUE);
        $this->forge->addForeignKey('question_id', 'Questions', 'question_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Options');
    }

    public function down()
    {
        $this->forge->dropTable('Options');
    }
}
