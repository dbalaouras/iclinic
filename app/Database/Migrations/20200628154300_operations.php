<?php

namespace App\Database\Migrations;

class Operations extends \CodeIgniter\Database\Migration
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
            ],
            'lead_doctor_amka'       => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => TRUE
            ],
            'result'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        
        $this->forge->addForeignKey('patient_amka', 'patients', 'amka', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('lead_doctor_amka', 'doctors', 'amka', 'CASCADE', 'CASCADE');
        $this->forge->createTable('operations');
        
    }

    public function down()
    {
        $this->forge->dropTable('operations');
    }
}
