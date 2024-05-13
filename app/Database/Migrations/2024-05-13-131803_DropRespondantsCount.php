<?php

use CodeIgniter\Database\Migration;

class RenameRespondantsCountFromSurveysTable extends Migration
{
    public function up()
    {
        // Renaming the 'respondants_count' column to 'respondants' in the 'Surveys' table
        $fields = [
            'respondants' => [
                'type' => 'INT',
                'unsigned' => TRUE
            ]
        ];
        $this->forge->dropColumn('Surveys', 'respondants_count');
        $this->forge->addColumn('Surveys', $fields);
    }

    public function down()
    {
        // Renaming the 'respondants' column back to 'respondants_count' in the 'Surveys' table
        $fields = [
            'respondants_count' => [
                'type' => 'INT',
                'unsigned' => TRUE
            ]
        ];
        $this->forge->addColumn('Surveys', 'respondants_count');
        $this->forge->dropColumn('Surveys', $fields);
    }
}

