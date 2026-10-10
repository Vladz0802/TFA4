<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        // Already logged in? No need to see the login form
        if (session()->get('isLoggedIn') === true) {
            return redirect()->to('/customers');
        }

        return view('auth/login', ['title' => 'Log in · Corner Shop POS']);
    }

    public function attempt()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $username = trim((string) $this->request->getPost('username'));
        $password = (string) $this->request->getPost('password');

        $user = (new UserModel())->where('username', $username)->first();

        // Same message for "no such user" and "wrong password" so the form
        // does not reveal which usernames exist.
        if (! $user || empty($user['password']) || ! password_verify($password, $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
        }

        $session = session();
        $session->regenerate(true); // new session id after login (prevents session fixation)
        $session->set([
            'isLoggedIn' => true,
            'userId'     => $user['id'],
            'username'   => $user['username'],
            'full_name'  => $user['full_name'],
        ]);

        // Send them to the page they originally asked for, if any
        $intended = $session->get('intended_url');
        $session->remove('intended_url');

        return redirect()->to($intended ?: '/customers');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login?logged_out=1');
    }
}
