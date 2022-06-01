<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = array(
            array(
                'id' => '1',
                'name' => 'Admin',
                'description' => 'Admin',
            ),
            array(
                'id' => '2',
                'name' => 'Default',
                'description' => 'Default',
            )
        );

        $this->db->table('role')->insertBatch($data);
    }
}
