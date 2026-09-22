<?php

namespace App\Controllers;

use App\Models\UserModel;

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
}