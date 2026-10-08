<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{
    public function index(): string
    {
        $model = new UserModel();
        $users = $model->findAll();

        return view('users/index', [
            'title' => 'User Accounts',
            'users' => $users,
        ]);
    }

    public function new(): string
    {
        return view('users/new', ['title' => 'Add User']);
    }

    public function create()
    {
        $rules = [
            'username'  => 'required|alpha_numeric|min_length[4]|max_length[50]|is_unique[users.username]',
            'full_name' => 'required|min_length[3]|max_length[100]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        (new UserModel())->insert([
            'username'   => $this->request->getPost('username'),
            'full_name'  => $this->request->getPost('full_name'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/users')->with('success', 'User added.');
    }

    public function edit($id): string
    {
        $user = (new UserModel())->find($id);
        if (! $user) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('users/edit', [
            'title' => 'Edit User',
            'user'  => $user,
        ]);
    }

    public function update($id)
    {
        $model = new UserModel();
        $user  = $model->find($id);
        if (! $user) {
            throw PageNotFoundException::forPageNotFound();
        }

        // is_unique skips this user's own row
        $rules = [
            'username'  => "required|alpha_numeric|min_length[4]|max_length[50]|is_unique[users.username,id,{$id}]",
            'full_name' => 'required|min_length[3]|max_length[100]',
        ];

        // The avatar is optional: only validate it when a file was chosen
        $file    = $this->request->getFile('avatar');
        $hasFile = $file && $file->getError() !== UPLOAD_ERR_NO_FILE;

        if ($hasFile) {
            $rules['avatar'] = [
                'rules' => [
                    'uploaded[avatar]',
                    'is_image[avatar]',
                    'max_size[avatar,2048]', // 2MB (value is in KB)
                    'mime_in[avatar,image/jpeg,image/png]',
                    'ext_in[avatar,jpg,jpeg,png]',
                ],
            ];
        }

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
        ];

        if ($hasFile) {
            $uploadPath = FCPATH . 'uploads';
            if (! is_dir($uploadPath)) {
                mkdir($uploadPath, 0775, true);
            }

            // Random server-side name, never the user's filename
            $newName = $file->getRandomName();
            $file->move($uploadPath, $newName);

            // Display-ready 300x300 thumbnail (needs the PHP GD extension)
            service('image')
                ->withFile($uploadPath . '/' . $newName)
                ->fit(300, 300, 'center')
                ->save($uploadPath . '/' . $newName);

            // Remove the previous avatar file, if there was one
            if (! empty($user['avatar']) && is_file($uploadPath . '/' . $user['avatar'])) {
                unlink($uploadPath . '/' . $user['avatar']);
            }

            $data['avatar'] = $newName; // only the filename goes in the database
        }

        $model->update($id, $data);

        return redirect()->to('/users')->with('success', 'User updated.');
    }
}
