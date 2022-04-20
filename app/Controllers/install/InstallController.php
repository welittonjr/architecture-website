<?php

namespace App\Controllers\Install;

use App\Controllers\BaseController;

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
        }
        return view('install_form', $data);
    }

    public function it_started()
    {
        // Build our checks
        $data = array();

        // Check for writable folders
        $data['is_writeable']['root'] = is_writeable(FCPATH);
        $data['is_writeable']['config'] = is_writeable(FCPATH . 'app/Config/');
        $data['is_writeable']['uploads'] = is_writeable(FCPATH . 'uploads/');

        $rules = [
            'hostname' => 'required',
            'database' => 'required',
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $this->validator);
        } else {
           //setup the database config file
           $settings                   = array();
           $settings['hostname']       = $this->request->getVar('hostname');
           $settings['username']       = $this->request->getVar('username');
           $settings['password']       = $this->request->getVar('password');
           $settings['database']       = $this->request->getVar('database');             
           # $file_contents              = $this->request->getVar('templates/database', $settings, true);
        }
    }
}
