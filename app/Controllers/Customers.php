<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index(): string
    {
        $customers = [
            ['full_name' => 'Juan Dela Cruz', 'email' => 'juan.delacruz@example.com', 'phone' => '0917 123 4567'],
            ['full_name' => 'Maria Santos', 'email' => 'maria.santos@example.com', 'phone' => '0918 234 5678'],
            ['full_name' => 'Andres Reyes', 'email' => 'andres.reyes@example.com', 'phone' => '0919 345 6789'],
            ['full_name' => 'Lea Bautista', 'email' => 'lea.bautista@example.com', 'phone' => '0920 456 7890'],
            ['full_name' => 'Sofia Navarro', 'email' => 'sofia.navarro@example.com', 'phone' => '0921 567 8901'],
        ];

        return view('customers/index', [
            'title' => 'Customer Accounts',
            'activePage' => 'customers',
            'customers' => $customers,
        ]);
    }
}
