<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Eloquent\EmployeeModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login', ['title' => 'Login']);        
    }

    public function login()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        $messages = [
            'username' => [
                'required' => 'Username is required',
            ],
            'password' => [
                'required' => 'Password is required',
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->auth($username, $password);

        if (!$user) {
            return redirect()->back()->withInput()->with('error', 'Invalid username or password');
        }

        session()->set('id', $user->id);
        return redirect('home');
    }

    public function logout()
    {
        session()->destroy();
        return redirect('login');
    }

    private function auth($username, $password)
    {
        $user = EmployeeModel::with('role')->where('code', $username)->first();
        if (!$user) {
            return false;
        }
        
        if (!password_verify($password, $user->password)) {
            return false;
        }

        return $user;
    }
}
