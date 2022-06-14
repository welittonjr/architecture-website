<?php

namespace App\Controllers;

use App\Models\User;
use App\Controllers\BaseController;

class AdminController extends BaseController
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();

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

        $userData = $this->user->getByEmail($email);

        $hashPassword = $userData['password'];

        if (
            count($userData) > 0 &&
            password_verify($password, $hashPassword)
        ) {
            session()->set('isLoggedIn', true);
            session()->set('name', $userData['username']);
            session()->set('role', $userData['role_id']);
            return redirect()->to(base_url('admin'));
        } else {
            session()->setFlashdata('msgError', 'Usuário ou Senha Invalidos!');
            return redirect()->to(base_url('login'));
        }
    }

    public function forgotPassword()
    {
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => '{field} field required',
                        'valid_email' => 'Valid {field} required'
                    ]
                ]
            ];
            if ($this->validate($rules)) {
                $email = $this->request->getPost('email', FILTER_SANITIZE_EMAIL);
                $returnedData = $this->user->checkEmail($email);
                if (!empty($returnedData)) {
                    $token = md5(bin2hex(random_bytes(64)));
                    if ($this->user->newPassResetToken($returnedData['id'], $token)) {
                        $to = $email;
                        $subject = 'Redefinição de Senha';
                        $message = 'Olá ' . ucfirst($returnedData['username']) . '<br><br>'
                            . 'Sua solicitação de redefinição de senha foi recebida. Por favor'
                            . ' clique no link abaixo para redefinir sua senha.<br><br>'
                            . '<a href="' . base_url('/login/reset-password/token_' . $token)  . '" target="_blank"> Clique no link </a><br><br>'
                            . 'Obrigado';

                        $serviceEmail = \config\Services::email();
                        $serviceEmail->setTo($to);
                        $serviceEmail->setFrom('suporte@mayanaarq.com.br', 'Suporte');
                        $serviceEmail->setSubject($subject);
                        $serviceEmail->setMessage($message);

                        if ($serviceEmail->send()) {
                            session()->setFlashdata('msgSuccess', 'Link de redefinição de senha enviado para o seu E-mail!');
                            return redirect()->to(base_url('login/forgot-password'));
                        } else {
                            session()->setFlashdata('msgError', 'Não foi possível enviar o E-mail de redefinição de senha!');
                            return redirect()->to(base_url('login/forgot-password'));
                        }
                    } else {
                        session()->setFlashdata('msgError', 'Desculpe! Impossível enviar o E-mail. Tente novamente mais tarde!');
                        return redirect()->to(base_url('login/forgot-password'));
                    }
                } else {
                    session()->setFlashdata('msgError', 'O E-mail não existe3!');
                    return redirect()->to(base_url('login/forgot-password'));
                }
            } else {
                return redirect()
                    ->to(current_url())
                    ->withInput()->with('error', $this->validator);
            }
        }

        return view('forgot_password_form');
    }

    public function resetPassword($token = null)
    {
        $data["token"] = $token;
        if (!empty($this->user->checkPassResetToken($token))) {
            if ($this->request->getMethod() == 'post') {
                $rules = [
                    'password' => [
                        'label' => 'Password',
                        'rules' => 'required|min_length[6]|max_length[16]',
                    ],
                    'cpassword' => [
                        'label' => 'Confirm Password',
                        'rules' => 'required|matches[password]'
                    ]
                ];
                if ($this->validate($rules)) {
                    $pwd = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
                    if ($this->user->updatePassword($token, $pwd)) {
                        session()->setFlashdata('msgSuccess', 'Password updated successfully, Login now');
                        return redirect()->to(base_url('login'));
                    } else {
                        session()->setFlashdata('msgError', 'Unable to update Password. Try again');
                        return redirect()->to(base_url(current_url()));
                    }
                } else {
                    return redirect()
                        ->to(current_url())
                        ->withInput()->with('error', $this->validator);
                }
            }
        } else {
            return view('invalid_page');
        }

        return view('recover_password_form', $data);
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
}
