<?php

namespace App\Controllers\Register;

use App\Controllers\BaseController;
use App\Models\User;

class RegisterController extends BaseController
{
    private $usersModel;

    public function __construct()
    {
        // Call helpers
        helper(array('form', 'session'));
        $this->usersModel = new User();
    }

    public function index()
    {
        if (!db_connect()->tableExists('user')) {
            return redirect()->to(base_url('install'));
        }

        $result = $this->usersModel->where('role_id', 1)->first();

        if (isset($result)) {
            return redirect()->to(base_url('login'));
        }

        $data = array();
        if (session()->has('error')) {
            $data['error'] = session('error');
        }

        return view('register_form');
    }

    public function save()
    {
        if (implode($this->request->getServer(['REQUEST_METHOD'])) === 'POST') {
            $rules = [
                'name' => 'required',
                'email' => 'trim|required|valid_email|max_length[128]|is_unique[user.email]',
                'username' => 'trim|required|is_unique[user.username]',
                'password' => 'required|min_length[6]',
                'cpassword' => 'required|matches[password]'
            ];

            if (!$this->validate($rules)) {
                return redirect()->to(base_url('register'))->withInput()->with('error', $this->validator);
            }

            $this->usersModel->save([
                'name' => $this->request->getVar('name'),
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'email' => $this->request->getVar('email'),
                'role_id' => 1
            ]);

            return redirect()->to(base_url('login'));
        }
    }
}
