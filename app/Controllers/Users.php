<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index(): string
    {
        $users = [
            ['username' => 'jcruz',     'fullName' => 'Juan Dela Cruz',   'role' => 'Cashier'],
            ['username' => 'msantos',   'fullName' => 'Maria Santos',     'role' => 'Store Manager'],
            ['username' => 'preyes',    'fullName' => 'Pedro Reyes',      'role' => 'Cashier'],
            ['username' => 'alim',      'fullName' => 'Ana Lim',          'role' => 'Administrator'],
            ['username' => 'cbautista', 'fullName' => 'Carlo Bautista',   'role' => 'Inventory Clerk'],
            ['username' => 'gvillan',   'fullName' => 'Grace Villanueva', 'role' => 'Cashier'],
        ];

        return view('users/index', [
            'title' => 'User Accounts · Corner Shop POS',
            'users' => $users,
        ]);
    }
}
