<?php

namespace App\Controllers\Install;

use App\Controllers\BaseController;

class InstallController extends BaseController
{
    public function __construct()
    {
        // Call helpers
        helper(array('form', 'file', 'url'));
    }

    public function index()
    {
        // Build our checks
        $data = array();
        // Destroy All Session
        $session = session();
        $session->destroy();
        // Check for writable folders
        $data['is_writeable']['root'] = is_writeable(FCPATH);
        $data['is_writeable']['config'] = is_writeable(FCPATH . 'app/Config/');
        $data['is_writeable']['uploads'] = is_writeable(FCPATH . 'uploads/');

        $validation =  $this->validate([
            'hostname' => 'required',
            'database' => 'required',
            'username' => 'required',
            'password' => 'required',
            'prefix'   => 'required'
        ]);

        if (!$validation) {
            // errors
            return view('install_form');
            // return redirect()->back()->withInput();
        } else {
            return view('install_form');
        }
    }
}
