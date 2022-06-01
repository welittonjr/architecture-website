<?php

namespace App\Controllers\Install;

use App\Controllers\BaseController;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Database\Exceptions\DataException;

class InstallController extends BaseController
{
    public function __construct()
    {

        helper(array('form', 'file', 'url', 'session'));
    }

    public function index()
    {
        if (db_connect()->tableExists('users')) {
            return redirect()->to(base_url('register'));
        }

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
        $rules = [
            'hostname' => 'required',
            'database' => 'required',
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('install'))->withInput()->with('error', $this->validator);
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

                    $fileDatabase = FCPATH . '../' . 'app/Config/Database.php';
                    $fileContent  = file_get_contents($fileDatabase);

                    $patters = array();
                    $patters[0] = '/\'hostname\'\s=>\s\'localhost\'/';
                    $patters[1] = '/\'username\'\s=>\s\'{2}/';
                    $patters[2] = '/\'password\'\s=>\s\'{2}/';
                    $patters[3] = '/\'database\'\s=>\s\'{2}/';

                    $replaces = array();
                    $replaces[0] = '\'hostname\' => \'' . $this->request->getVar('hostname') . '\'';
                    $replaces[1] = '\'username\' => \'' . $this->request->getVar('username') . '\'';
                    $replaces[2] = '\'password\' => \'' . $this->request->getVar('password') . '\'';
                    $replaces[3] = '\'database\' => \'' . $this->request->getVar('database') . '\'';

                    file_put_contents($fileDatabase, preg_replace($patters, $replaces, $fileContent));

                    try {
                        $migrate = \Config\Services::migrations();
                        $migrate->latest();
                        $seeder = \Config\Database::seeder();
                        $seeder->call('RoleSeeder');
                    } catch (\Throwable $e) {
                        return redirect()->to(base_url('install'))->with('msgError', 'Não foi criar as tabelas do banco de dados');
                    }

                    return redirect()->to(base_url('register'));
                } else {
                    throw new DataException;
                }
            } catch (DatabaseException $e) {
                return redirect()->to(base_url('install'))->with('msgError', 'Erro ao estabelecer uma conexão com o banco de dados ');
            }
        }
    }
}
