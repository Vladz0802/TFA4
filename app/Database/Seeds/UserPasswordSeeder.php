<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Gives every existing user without a password the default demo password.
 *
 * Use this if you already have the TFA3 database:
 *   1. ALTER TABLE users ADD COLUMN password VARCHAR(255) NULL;
 *   2. php spark db:seed UserPasswordSeeder
 *
 * Default password: Staff@123  (change it after logging in)
 */
class UserPasswordSeeder extends Seeder
{
    public function run(): void
    {
        $users = $this->db->table('users')
            ->select('id')
            ->groupStart()
                ->where('password', null)
                ->orWhere('password', '')
            ->groupEnd()
            ->get()
            ->getResultArray();

        foreach ($users as $user) {
            $this->db->table('users')
                ->where('id', $user['id'])
                ->update(['password' => password_hash('Staff@123', PASSWORD_DEFAULT)]);
        }
    }
}
