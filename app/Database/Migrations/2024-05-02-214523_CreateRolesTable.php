<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRolesTable extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'role_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'user_role_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
        ]);

        $this->forge->addKey('role_id', TRUE);
        $this->forge->addForeignKey('user_role_id', 'UserRoles', 'user_role_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Roles');
    }

    public function down()
    {
        $this->forge->dropTable('Roles');
    }
}
