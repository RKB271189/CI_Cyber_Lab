<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use Config\Services;

class AuthController extends BaseController
{
    public function login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $userModel = new User();
        $validation = Services::validation();
        $validation->setRules($userModel->getValidationRules(['only' => ['email', 'password']]));
        if (!$validation->run($this->request->getPost())) {
            $errors = $validation->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }
        $user = $userModel->where('email', $email)->first();
        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()->withInput()->with('errors', ['Invalid email or password']);
        }
        session()->set('user_id', $user['id']);
        return redirect('report');
    }
    public function logout()
    {
        session()->destroy();
        return redirect('/');
    }
}
