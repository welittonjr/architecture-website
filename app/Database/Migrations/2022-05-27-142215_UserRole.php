<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserRole extends Migration
{
    public function up()
    {
        $this->forge->addField(array(
            'id' => array(
                'type' => 'int',
                'constraint' => 9,
                'unsigned' => true,
                'auto_increment' => true
            ),
            'name' => array(
                'type' => 'varchar',
                'constraint' => 50
            ),
            'description' => array(
                'type' => 'text',
            )
        ));

        $this->forge->addKey('id', true);
        $this->forge->createTable('user_role', true);
    }

    public function down()
    {
        $this->forge->dropTable('user_role', true);
    }
}
