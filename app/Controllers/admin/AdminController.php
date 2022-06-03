<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User;

class AdminController extends BaseController
{
    public function __construct()
    {
        helper(array('session'));
    }

    public function index()
    {
        return view('admin/admin');
    }

    public function login()
    {
        $data = array();
        if (session()->has('message')) {
            $data['message'] = session('message');
        }
        return view('login_form', $data);
    }

    public function auth()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new User();
        $userData = $userModel->getByEmail($email);
        
        $hashPassword = $userData['password'];
    
        if (
            count($userData) > 0 &&
            password_verify($password, $hashPassword)
        ) {
            session()->set('isLoggedIn', true);
            session()->set('nome', $userData['username']);
            session()->set('role', $userData['role_id']);
            return redirect()->to(base_url('admin'));
        } else {
            session()->setFlashdata('msgError', 'Usuário ou Senha Invalidos!');
            return redirect()->to(base_url('login'));
        }
    }

    public function recoverPassword()
    {
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
}
