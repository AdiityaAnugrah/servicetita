<?php

namespace App\Controllers;

use App\Models\M_Auth_User;
use App\Models\M_Role;
use CodeIgniter\Controller;


class AuthController extends Controller
{

    public function login_page()
    {
        return view('auth/view_login');
    }

    
}
