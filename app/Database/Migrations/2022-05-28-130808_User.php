<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField(array(
            'id' => array(
                'type' => 'int',
                'unique' => true,
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true
            ),
            'name' => array(
                'type' => 'varchar',
                'constraint' => 200,
            ),
            'username' => array(
                'type' => 'varchar',
                'constraint' => 20,
            ),
            'password' => array(
                'type' => 'varchar',
                'constraint' => 100,
            ),
            'email' => array(
                'type' => 'varchar',
                'unique' => true,
                'constraint' => 100,
            ),
            'role_id' => array(
                'type' => 'int',
                'constraint' => 10,
                'unsigned'   => true
            ),
            'pass_reset_token' => array(
                'type' => 'varchar',
                'constraint' => 100,
            ),
            'pass_reset_status' => array(
                'type' => 'tinyint',
                'constraint' => 1,
            ),
            'status' => array(
                'type' => 'tinyint',
                'constraint' => 1,
                'default' => 1,
            ),
            'created_at' => array(
                'type' => 'datetime'
            ),
            'updated_at' => array(
                'type' => 'datetime'
            )
        ));

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('role_id', 'role', 'id');
        $this->forge->createTable('user', true);
    }

    public function down()
    {
        $this->forge->dropForeignKey('user', 'user_role_id_foreign');
        $this->forge->dropTable('user', true);
    }
}
