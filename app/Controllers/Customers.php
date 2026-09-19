<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index(): string
    {
        $customers = [
            ['fullName' => 'Juan Dela Cruz',   'email' => 'juan.delacruz@example.com',   'phone' => '0917-111-2222'],
            ['fullName' => 'Maria Santos',     'email' => 'maria.santos@example.com',    'phone' => '0917-222-3333'],
            ['fullName' => 'Pedro Reyes',      'email' => 'pedro.reyes@example.com',     'phone' => '0917-333-4444'],
            ['fullName' => 'Ana Lim',          'email' => 'ana.lim@example.com',         'phone' => '0917-444-5555'],
            ['fullName' => 'Carlo Bautista',   'email' => 'carlo.bautista@example.com',  'phone' => '0917-555-6666'],
            ['fullName' => 'Grace Villanueva', 'email' => 'grace.villanueva@example.com','phone' => '0917-666-7777'],
        ];

        return view('customers/index', [
            'title'     => 'Customer Accounts · Corner Shop POS',
            'customers' => $customers,
        ]);
    }
}
