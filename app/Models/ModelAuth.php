<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{

    public function cekData($username_email, $password)
    {
        $cek = $this->db->table('user')->where([
            'username' => $username_email,
            'password' => $password,
        ])->get()->getRowArray();
        if ($cek) {
            return $cek;
        } else {
            return $this->db->table('user')->where([
                'email' => $username_email,
                'password' => $password,
            ])->get()->getRowArray();
        }
    }

    public function data_user($username, $password)
    {
        return $this->db->table('user')->where([
            'username' => $username,
            'password' => $password,
        ])->get()->getRowArray();
    }

    public function login_admin($username, $password)
    {
        return $this->db->table('user')->where([
            'username' => $username,
            'password' => $password,
        ])->get()->getRowArray();
    }

    public function login_sekretaris($username, $password)
    {
        return $this->db->table('user')->where([
            'username' => $username,
            'password' => $password,
        ])->get()->getRowArray();
    }

    public function login_bendahara($username, $password)
    {
        return $this->db->table('user')->where([
            'username' => $username,
            'password' => $password,
        ])->get()->getRowArray();
    }

    public function login_department($username, $password)
    {
        return $this->db->table('user')->where([
            'username' => $username,
            'password' => $password,
        ])->get()->getRowArray();
    }
}
