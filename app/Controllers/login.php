<?php

namespace App\Controllers;

use App\Models\M_akun;

class login extends BaseController
{
    protected $m_akun;
    public function __construct()
    {
        $this->m_akun = new M_akun();
    }
    public function index()
    {
        return view('/login');
    }
    public function auth()
    {
        $session = session();
        // $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        // dd($username, $password);

        $data = $this->m_akun->where('username', $username)->first();
        if ($data) {
            // dd($email, $password);
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'user_id'       => $data['id'],
                    'username'     => $data['username'],
                    'user_email'    => $data['email'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                print_r(json_encode(array('status' => true, 'msg' => 'berhasil login!')));
                // return redirect()->to('/home');
                // return view('/home');
            } else {
                print_r(json_encode(array('status' => false, 'msg' => 'password salah!')));
                // return view('/login');
            }
        } else {
            print_r(json_encode(array('status' => false, 'msg' => 'akun tidak di temukan!')));
            // return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
