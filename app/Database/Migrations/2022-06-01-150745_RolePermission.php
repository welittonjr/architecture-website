<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RolePermission extends Migration
{
    public function up()
    {
        $this->forge->addField(array(
            'role_id' => array(
                'type' => 'int',
                'constraint' => 10,
                'unsigned'   => true
            ),
            'permission_id' => array(
                'type' => 'int',
                'constraint' => 10,
                'unsigned'   => true
            ),
            'created_at' => array(
                'type' => 'datetime'
            ),
            'updated_at' => array(
                'type' => 'datetime'
            )
        ));

        $this->forge->addForeignKey('role_id', 'role', 'id');
        $this->forge->addForeignKey('permission_id', 'permission', 'id');
        $this->forge->createTable('role_permission', true);
    }

    public function down()
    {
        $this->forge->dropTable('role_permission', true);
    }
}
