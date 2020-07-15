<?php

namespace App\Database\Migrations;

class Exams extends \CodeIgniter\Database\Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE,
            ],
            'code'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'scheduled_date'       => [
                'type'           => 'timestamp'
            ],
            'status'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'patient_amka'       => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => TRUE,
                'null' => TRUE,
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        
        $this->forge->addForeignKey('patient_amka', 'patients', 'amka', 'CASCADE', 'CASCADE');
        $this->forge->createTable('exams');
        
    }

    public function down()
    {
        $this->forge->dropTable('exams');
    }
}
