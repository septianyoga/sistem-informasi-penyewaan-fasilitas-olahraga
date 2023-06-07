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
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'min_length' => '{field} minimal 6 huruf / angka.',
                    'alpha_numeric' => '{field} tidak boleh berisi karakter.'
                ],
            ],
        ];

        if ($this->validate($loginValidasi)) {
            $username_email = $this->request->getPost('username_email');
            $password = $this->request->getPost('password');

            // cek
            $cek = $this->ModelAuth->cekDataPenyewa($username_email, $password);
            if ($cek) {
                session()->set('log', true);
                session()->set('id', $cek['id_penyewa']);
                session()->set('nama', $cek['nama_penyewa']);
                session()->set('username', $cek['username']);
                session()->set('email', $cek['email']);
                session()->set('role', $cek['role']);

                session()->setFlashdata('login', 'Login Berhasil!');
                return redirect()->to(base_url('/'));
            } else {
                // jika tidak ditemukan
                //cek pada tabel admin
                $cekAdmin = $this->ModelAuth->cekDataAdmin($username_email, $password);
                if ($cekAdmin) {
                    session()->set('log', true);
                    session()->set('id', $cekAdmin['id_admin']);
                    session()->set('nama', $cekAdmin['nama']);
                    session()->set('username', $cekAdmin['username']);
                    session()->set('email', $cekAdmin['email']);
                    session()->set('role', $cekAdmin['role']);

                    session()->setFlashdata('login', 'Login Berhasil!');
                    return redirect()->to(base_url('admin'));
                }
                session()->setFlashdata('login', 'Login gagal!!! Username atau password salah.');
                return redirect()->to(base_url('login'))->withInput();
            }
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('login'))->withInput();
        }
        // cek
    }

    public function add()
    {
        $loginValidasi = [
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[penyewa.username]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'is_unique' => '{field} sudah terpakai. Silahkan gunakan yang lain!.'
                ],
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|is_unique[penyewa.email]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'is_unique' => '{field} sudah terpakai. Silahkan gunakan yang lain!.'
                ],
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'min_length' => '{field} minimal 6 huruf / angka.',
                ],
            ],
            'password_repeat' => [
                'label' => 'Password Repeat',
                'rules' => 'required|min_length[6]|matches[password]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'min_length' => '{field} minimal 6 huruf / angka.',
                    'matches' => '{field} tidak sama.'
                ],
            ],
        ];
        if ($this->validate($loginValidasi)) {
            $dataPost = [
                'nama_penyewa'  => $this->request->getPost('nama'),
                'username'      => $this->request->getPost('username'),
                'email'         => $this->request->getPost('email'),
                'password'      => $this->request->getPost('password'),
                'role'          => 'Penyewa',
            ];
            $angkaRand = rand(111111, 999999);

            // kirim email
            $email = \Config\Services::email();

            $fromEmail = 'info.himmipolsub@gmail.com';
            $email->setFrom($fromEmail);
            $emailUser = $this->request->getPost('email');
            $toFrom = $emailUser;
            $email->setTo($toFrom);
            $subject = 'Kode Verifikasi OTP SIPFOR';
            $email->setSubject($subject);
            $body = "
            <h3>Kode Verifikasi Email Anda Pada Website SIPFOR :</h3>
            <h1>$angkaRand</h1>
            ";
            $message = $body;
            $email->setMessage($message);
            $email->send();

            $data = [
                'title' => 'Verifikasi Email',
                'isi'   => 'auth/v_verif',
                'otp'   => $angkaRand,
                'data'  => $dataPost
            ];
            return view('layout/v_wrapper_auth', $data);
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('register'))->withInput();
        }
    }

    public function insertPenyewa()
    {
        $data = [
            'nama_penyewa'  => $this->request->getPost('nama_penyewa'),
            'username'      => $this->request->getPost('username'),
            'email'         => $this->request->getPost('email'),
            'password'      => $this->request->getPost('password'),
            'role'          => $this->request->getPost('role'),
        ];
        $this->ModelAuth->insertToPenyewa($data);
        session()->setFlashdata('regist', 'Register Berhasil. Silahkan Login!.');
        return redirect()->to(base_url('login'));
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('id');
        session()->remove('nama');
        session()->remove('username');
        session()->remove('email');
        session()->remove('role');

        session()->setFlashdata('logout', 'Logout Berhasil!');
        return redirect()->to(base_url('login'));
    }

    // public function logoutAdmin()
    // {
    //     session()->remove('log');
    //     session()->remove('id_admin');
    //     session()->remove('nama');
    //     session()->remove('username');
    //     session()->remove('email');
    //     session()->remove('role');

    //     session()->setFlashdata('logout', 'Logout Berhasil!');
    //     return redirect()->to(base_url('login'));
    // }
}
