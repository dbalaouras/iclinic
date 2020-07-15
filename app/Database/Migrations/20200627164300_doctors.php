<?php

namespace App\Database\Migrations;

class Doctors extends \CodeIgniter\Database\Migration
{

    public function up()
    {
        $this->forge->addField([
            'amka'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
                'auto_increment' => FALSE
            ],
            'first_name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'last_name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'year_of_birth' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => TRUE,
                'auto_increment' => FALSE
            ],
            'speciality'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '65535',
            ],
        ]);
        $this->forge->addKey('amka', TRUE);
        $this->forge->createTable('doctors');
    }

    public function down()
    {
        $this->forge->dropTable('doctors');
    }
}
