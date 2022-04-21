<?php

namespace App\Controllers\Install;

use App\Controllers\BaseController;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Database\Exceptions\DataException;

class InstallController extends BaseController
{
    public function __construct()
    {
        // Call helpers
        helper(array('form', 'file', 'url', 'session'));
    }

    public function index()
    {
        $data = array();
        if (session()->has('error')) {
            $data['error'] = session('error');
        } else if (session()->has('msgError')) {
            $data['msgError'] = session('msgError');
        }
        return view('install_form', $data);
    }

    public function it_started()
    {
        $data = array();

        $data['is_writeable']['root'] = is_writeable(FCPATH . '../');
        $data['is_writeable']['config'] = is_writeable(FCPATH . '../' . 'app/Config/');
        $data['is_writeable']['uploads'] = is_writeable(FCPATH . '../' . 'uploads/');

        $rules = [
            'hostname' => 'required',
            'database' => 'required',
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $this->validator);
        } else {
            $dsn = "MySQLi://{$this->request->getVar('username')}";
            $dsn .= ":{$this->request->getVar('password')}";
            $dsn .= "@{$this->request->getVar('hostname')}";
            $dsn .= ":3306";
            $dsn .= "/{$this->request->getVar('database')}";
            $dsn .= "?charset=utf8&DBCollat=utf8_general_ci";

            $custom['DSN'] = $dsn;

            try {
                $db = db_connect($custom);
                $db->query("SELECT 1 + 1 AS sum");

                if (is_resource($db->connID) || is_object($db->connID)) {
                    $settings = array();
                    $settings['hostname']       = $this->request->getVar('hostname');
                    $settings['username']       = $this->request->getVar('username');
                    $settings['password']       = $this->request->getVar('password');
                    $settings['database']       = $this->request->getVar('database');
                    $file_contents              = file_get_contents(FCPATH . '../' . 'app/Config/Database.php');

                    var_dump($file_contents);
                    
                } else {
                    throw new DataException;
                }
            } catch (DatabaseException $e) {
                return redirect()->back()->with('msgError', 'Erro ao estabelecer uma conexão com o banco de dados ');
            }
        }
    }
}
