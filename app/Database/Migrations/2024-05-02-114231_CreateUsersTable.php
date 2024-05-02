<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
public function up()
    {
        // Define the User table
        $this->forge->addField([
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'default' => 'active',
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
        
        $this->forge->addKey('user_id', TRUE); // Set user_id as primary key
        $this->forge->createTable('User'); // Create the User table
    }

    public function down()
    {
        // Drop the User table if needed
        $this->forge->dropTable('User');
    }
}
