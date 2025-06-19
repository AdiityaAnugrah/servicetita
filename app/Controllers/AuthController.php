<?php

namespace App\Controllers;

use App\Models\M_Auth_User;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login_page()
    {
        return view('auth/view_login');
    }

    public function register_page()
    {
        return view('auth/view_register');
    }

    public function login()
    {
        $session = session();
        $model = new M_Auth_User();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session->set([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'isLoggedIn' => true
                ]);
                return redirect()->to('/dashboard');
            } else {
                return redirect()->back()->with('error', 'Password salah!');
            }
        } else {
            return redirect()->back()->with('error', 'Email tidak ditemukan!');
        }
    }

    public function register()
    {
        helper(['form']);
        $rules = [
            'username' => 'required|min_length[3]|is_unique[auth_user.username]',
            'email'    => 'required|valid_email|is_unique[auth_user.email]',
            'password' => 'required|min_length[6]',
            'confirm'  => 'matches[password]'
        ];

        if (!$this->validate($rules)) {
            return view('auth/view_register', ['validation' => $this->validator]);
        }

        $model = new M_Auth_User();
        $data = [
            'username'   => $this->request->getPost('username'),
            'email'      => $this->request->getPost('email'),
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'nama_user'  => $this->request->getPost('username'),
            'status'     => 'aktif',
            'role'       => 'user'
        ];
        $model->save($data);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}