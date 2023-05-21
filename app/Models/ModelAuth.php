<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{

    public function cekDataPenyewa($username_email, $password)
    {
        $cek = $this->db->table('penyewa')->where([
            'username' => $username_email,
            'password' => $password,
        ])->get()->getRowArray();
        if ($cek) {
            return $cek;
        } else {
            return $this->db->table('penyewa')->where([
                'email' => $username_email,
                'password' => $password,
            ])->get()->getRowArray();
        }
    }

    public function cekDataAdmin($username_email, $password)
    {
        $cek = $this->db->table('admin')->where([
            'username' => $username_email,
            'password' => $password,
        ])->get()->getRowArray();
        if ($cek) {
            return $cek;
        } else {
            return $this->db->table('admin')->where([
                'email' => $username_email,
                'password' => $password,
            ])->get()->getRowArray();
        }
    }

    public function insertToPenyewa($data)
    {
        $this->db->table('penyewa')->insert($data);
    }
}
