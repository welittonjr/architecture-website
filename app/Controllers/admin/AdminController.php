<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

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
}
