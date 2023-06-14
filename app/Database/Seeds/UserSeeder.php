<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'email'        => 'info@cyberlabs.tech',
                'password'     => password_hash('password', PASSWORD_DEFAULT),
                'created_date' => date('Y-m-d H:i:s'),
            ]
        ];

        // Insert the data into the 'users' table
        $this->db->table('users')->insertBatch($data);
    }
}
