<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    private UserModel $users;

    public function __construct()
    {
        $this->users = new UserModel();
    }

    public function login(): string|ResponseInterface
    {
        if (service('session')->get('is_logged_in') === true) {
            return redirect()->to(site_url('/'));
        }

        return view('auth/login', [
            'title' => 'Log in',
            'activePage' => 'login',
        ]);
    }

    public function authenticate(): ResponseInterface
    {
        $rules = [
            'username' => 'required|max_length[50]',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->to(site_url('login'))->with('error', 'Username and password are required.');
        }

        $username = trim((string) $this->request->getPost('username'));
        $password = (string) $this->request->getPost('password');
        $user = $this->users->where('username', $username)->first();

        if ($user === null || ! is_string($user['password'] ?? null) || ! password_verify($password, $user['password'])) {
            return redirect()->to(site_url('login'))->with('error', 'Invalid username or password.');
        }

        $session = service('session');
        $session->regenerate(true);
        $session->set([
            'is_logged_in' => true,
            'user_id' => (int) $user['id'],
            'username' => $user['username'],
            'full_name' => $user['full_name'],
        ]);

        return redirect()->to(site_url('/'));
    }

    public function logout(): ResponseInterface
    {
        $session = service('session');
        $session->remove(['is_logged_in', 'user_id', 'username', 'full_name']);
        $session->regenerate(true);

        return redirect()->to(site_url('login'))->with('success', 'You have been logged out.');
    }
}
