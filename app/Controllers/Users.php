<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index(): string
    {
        $users = [
            ['username' => 'admin01', 'full_name' => 'Maria Santos', 'role' => 'Administrator'],
            ['username' => 'cashier01', 'full_name' => 'Paolo Garcia', 'role' => 'Cashier'],
            ['username' => 'cashier02', 'full_name' => 'Nina Flores', 'role' => 'Cashier'],
            ['username' => 'manager01', 'full_name' => 'Carlos Mendoza', 'role' => 'Store Manager'],
            ['username' => 'inventory01', 'full_name' => 'Ana Villanueva', 'role' => 'Inventory Clerk'],
        ];

        return view('users/index', [
            'title' => 'User Accounts',
            'activePage' => 'users',
            'users' => $users,
        ]);
    }
}
