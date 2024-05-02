<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFeedbackDetailsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'details_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'option_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'question_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'feedback_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'feedback_text' => [
                'type' => 'TEXT'
            ]
        ]);

        $this->forge->addKey('details_id', TRUE);
        $this->forge->addForeignKey('option_id', 'Options', 'option_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('question_id', 'Questions', 'question_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('feedback_id', 'Feedback', 'feedback_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('FeedbackDetails');
    }

    public function down()
    {
        $this->forge->dropTable('FeedbackDetails');
    }
}
