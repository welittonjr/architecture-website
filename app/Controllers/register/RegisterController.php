<?php

namespace App\Controllers\Register;

use App\Controllers\BaseController;

class RegisterController extends BaseController
{
    public function __construct()
    {
        // Call helpers
        helper(array('form'));
    }

    public function index()
    {   
        return view('register_form');
    }
}