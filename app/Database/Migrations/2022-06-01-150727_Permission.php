<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Permission extends Migration
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
            ),
            'created_at' => array(
                'type' => 'datetime'
            ),
            'updated_at' => array(
                'type' => 'datetime'
            )
        ));

        $this->forge->addKey('id', true);
        $this->forge->createTable('permission', true);
    }

    public function down()
    {
        $this->forge->dropTable('permission', true);
    }
}
