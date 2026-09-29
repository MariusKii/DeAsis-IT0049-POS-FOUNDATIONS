<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\Files\UploadedFile;

class Users extends BaseController
{
    private UserModel $users;

    public function __construct()
    {
        $this->users = new UserModel();
    }

    public function index(): string
    {
        return view('users/accounts', ['title' => 'User Accounts', 'activePage' => 'users', 'users' => $this->users->orderBy('full_name', 'ASC')->findAll()]);
    }

    public function new(): string
    {
        return view('users/form', ['title' => 'Add User', 'activePage' => 'users', 'user' => null, 'formAction' => site_url('users/create'), 'formTitle' => 'Add User', 'submitLabel' => 'Create User']);
    }

    public function create()
    {
        if (! $this->validate(['username' => 'required|max_length[50]|is_unique[users.username]', 'full_name' => 'required|max_length[100]', 'email' => 'required|valid_email|max_length[100]'])) {
            return redirect()->back()->withInput();
        }
        $this->users->insert(['username' => trim((string) $this->request->getPost('username')), 'full_name' => trim((string) $this->request->getPost('full_name')), 'email' => trim((string) $this->request->getPost('email')), 'created_at' => date('Y-m-d H:i:s')]);
        return redirect()->to(site_url('users'))->with('success', 'User created successfully.');
    }

    public function edit(int $id): string
    {
        $user = $this->users->find($id);
        if ($user === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('User not found.');
        }
        return view('users/form', ['title' => 'Edit User', 'activePage' => 'users', 'user' => $user, 'formAction' => site_url('users/update/' . $id), 'formTitle' => 'Edit User', 'submitLabel' => 'Save Changes']);
    }

    public function update(int $id)
    {
        $user = $this->users->find($id);
        if ($user === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('User not found.');
        }
        $rules = ['username' => 'required|max_length[50]|is_unique[users.username,id,' . $id . ']', 'full_name' => 'required|max_length[100]', 'email' => 'required|valid_email|max_length[100]'];
        $file = $this->request->getFile('avatar');
        if ($file instanceof UploadedFile && $file->getError() !== UPLOAD_ERR_NO_FILE) {
            $rules['avatar'] = 'is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]';
        }
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }
        $data = ['username' => trim((string) $this->request->getPost('username')), 'full_name' => trim((string) $this->request->getPost('full_name')), 'email' => trim((string) $this->request->getPost('email'))];
        $oldAvatar = $user['avatar'] ?? null;
        $newAvatar = $this->storeAvatar($file);
        if ($newAvatar !== null) {
            $data['avatar'] = $newAvatar;
        }
        $this->users->update($id, $data);
        if ($newAvatar !== null && $oldAvatar !== null) {
            $oldPath = FCPATH . 'uploads/avatars/' . basename($oldAvatar);
            if (is_file($oldPath)) {
                unlink($oldPath);
            }
        }
        return redirect()->to(site_url('users'))->with('success', 'User updated successfully.');
    }

    private function storeAvatar(?UploadedFile $file): ?string
    {
        if (! $file instanceof UploadedFile || $file->getError() === UPLOAD_ERR_NO_FILE || ! $file->isValid()) {
            return null;
        }
        $directory = FCPATH . 'uploads/avatars';
        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }
        $extension = strtolower($file->getExtension());
        $filename = bin2hex(random_bytes(16)) . '.' . ($extension === 'jpeg' ? 'jpg' : $extension);
        service('image')->withFile($file->getTempName())->resize(256, 256, true, 'width')->save($directory . DIRECTORY_SEPARATOR . $filename);
        return $filename;
    }
}
