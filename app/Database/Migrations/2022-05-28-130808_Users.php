<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
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
                'constraint' => 20,
            ),
            'email' => array(
                'type' => 'varchar',
                'constraint' => 100,
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
        $this->forge->createTable('users', true);
    }

    public function down()
    {

        $this->forge->dropTable('users', true);
    }
}
