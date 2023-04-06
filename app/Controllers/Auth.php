<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{

    private $ModelAuth;

    public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth();
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
            'isi'   => 'auth/v_login'
        ];
        return view('layout/v_wrapper_auth', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Register',
            'isi'   => 'auth/v_register'
        ];
        return view('layout/v_wrapper_auth', $data);
    }

    public function cekLogin()
    {

        $loginValidasi = [
            'username_email' => [
                'label' => 'Username atau Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
        ];

        if ($this->validate($loginValidasi)) {
            $username_email = $this->request->getPost('username_email');
            $password = $this->request->getPost('password');

            // cek
            $cek = $this->ModelAuth->cekData($username_email, $password);
            if ($cek) {
                session()->set('log', true);
                session()->set('id_penyewa', $cek['id_penyewa']);
                session()->set('nama_penyewa', $cek['nama_penyewa']);
                session()->set('username', $cek['username']);
                session()->set('email', $cek['email']);
                session()->set('role', 'penyewa');

                session()->setFlashdata('login', 'Login Berhasil!');
                return redirect()->to(base_url('/'));
            } else {
                session()->setFlashdata('login', 'Login gagal!!! Username atau password salah.');
                return redirect()->to(base_url('login'));
            }
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('login'))->withInput();
        }
        // cek
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('id_penyewa');
        session()->remove('nama_penyewa');
        session()->remove('username');
        session()->remove('email');
        session()->remove('role');

        session()->setFlashdata('logout', 'Logout Berhasil!');
        return redirect()->to(base_url('login'));
    }
}
