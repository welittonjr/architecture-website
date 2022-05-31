<?php

namespace App\Controllers\Register;

use App\Controllers\BaseController;
use App\Models\Users;

class RegisterController extends BaseController
{
    private $usersModel;

    public function __construct()
    {
        // Call helpers
        helper(array('form', 'session'));
        $this->usersModel = new Users();
    }

    public function index()
    {
        if (!db_connect()->tableExists('users')) {
            return redirect()->to(base_url('install'));
        }
        $result = $this->usersModel->get()->getResult();
        if (count($result) > 0) {
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
                'email' => 'trim|required|valid_email|max_length[128]|is_unique[users.email]',
                'username' => 'trim|required|is_unique[users.username]',
                'password' => 'required|min_length[6]',
                'cpassword' => 'required|matches[password]'
            ];

            if (!$this->validate($rules)) {
                return redirect()->to(base_url('register'))->withInput()->with('error', $this->validator);
            }

            $this->usersModel->save([
                'name' => $this->request->getVar('name'),
                'username' => $this->request->getVar('username'),
                'password' => sha1($this->request->getVar('password')),
                'email' => $this->request->getVar('email')
            ]);

            return redirect()->to(base_url('login'));
        }
    }
}
