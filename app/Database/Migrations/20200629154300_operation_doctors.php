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
            'operation_id'       => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => TRUE,
            ],
            'doctor_amka'       => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => TRUE,
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        
        $this->forge->addForeignKey('operation_id', 'operations', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('doctor_amka', 'doctors', 'amka', 'CASCADE', 'CASCADE');
        $this->forge->createTable('operation_doctors');
    }

    public function down()
    {
        $this->forge->dropTable('operation_doctors');
    }
}
