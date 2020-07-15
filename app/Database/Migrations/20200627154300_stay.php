<?php

namespace App\Database\Migrations;

class Stay extends \CodeIgniter\Database\Migration
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
            'patient_amka'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
            ],
            'start_datetime'     => [
                'type'           => 'timestamp',
                'default'        => 0,
            ],
            'end_datetime'       => [
                'type'           => 'timestamp',
                'default'        => 0,
            ],
            'exit_notes'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('patient_amka', 'patients', 'amka', 'CASCADE', 'CASCADE');
        $this->forge->createTable('stay');
    }

    public function down()
    {
        $this->forge->dropTable('stay');
    }
}
