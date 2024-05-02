<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateQRCodesTable extends Migration
{
    public function up()
    {
        // Define the User table
        $this->forge->addField([
            'QR_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'url' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ]
        ]);
        $this->forge->addKey('QR_id', TRUE);
        $this->forge->addForeignKey('user_id', 'User', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('QR_codes');
    }

    public function down()
    {
        // Drop the User table if needed
        $this->forge->dropTable('QR_codes');
    }
}
