<?php

namespace App\Database\Migrations;

class Patients extends \CodeIgniter\Database\Migration
{

    public function up()
    {
        $this->forge->addField([
            'amka'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => TRUE,
                'auto_increment' => FALSE
            ],
            'first_name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'last_name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'year_of_birth' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => TRUE,
                'auto_increment' => FALSE
            ],
            'allergies'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '65535',
            ],
            'medical_history'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '65535',
            ],
            'medication'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '65535',
            ],
        ]);
        $this->forge->addKey('amka', TRUE);
        $this->forge->createTable('patients');
    }

    public function down()
    {
        $this->forge->dropTable('patients');
    }
}
