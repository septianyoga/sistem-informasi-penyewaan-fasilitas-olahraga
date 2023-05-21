<?php

namespace App\Controllers;

use App\Models\ModelAdmin;

class Admin extends BaseController
{

    private $ModelAdmin;

    public function __construct()
    {
        helper('form');
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin',
            'isi'   => 'admin/v_index'
        ];
        return view('layout/v_wrapper_admin', $data);
    }

    public function dataOwner()
    {
        $data = [
            'title' => 'Data Owner',
            'data'  => $this->ModelAdmin->getAllOwner(),
            'isi'   => 'admin/v_owner'
        ];
        return view('layout/v_wrapper_admin', $data);
    }

    public function dataPenyewa()
    {
        $data = [
            'title' => 'Data Penyewa',
            'data'  => $this->ModelAdmin->getAllPenyewa(),
            'isi'   => 'admin/v_penyewa'
        ];
        return view('layout/v_wrapper_admin', $data);
    }

    public function verifOwner()
    {
        $data = [
            'title' => 'Verifikasi Owner',
            'data'  => $this->ModelAdmin->getAllOwner(),
            'isi'   => 'admin/v_verifOwner'
        ];
        return view('layout/v_wrapper_admin', $data);
    }

    public function verified($id_owner)
    {
        $data = [
            'id_owner'  => $id_owner,
            'status'    => 'Verified'
        ];

        $this->ModelAdmin->verif($data);
        session()->setFlashdata('pesan', 'Verifikasi Berhasil!');
        return redirect()->to(base_url('admin/verifOwner'));
    }

    public function verifFasilitas()
    {
        $data = [
            'title' => 'Verifikasi Fasilitas',
            'data'  => $this->ModelAdmin->getAllFasilitasJoin(),
            'isi'   => 'admin/v_verifFasilitas'
        ];
        // dd($this->ModelAdmin->getAllFasilitasJoin());
        return view('layout/v_wrapper_admin', $data);
    }

    public function detailFasilitas($id_fasilitas)
    {
        // dd($this->ModelAdmin->getFoto($id_fasilitas));
        $data = [
            'title'     => 'Detail Fasilitas',
            'fasilitas' => $this->ModelAdmin->getFasilitasById($id_fasilitas),
            'dtPenyewa' => $this->ModelAdmin->getPenyewaByIdFasilitas($id_fasilitas),
            'foto'      => $this->ModelAdmin->getFoto($id_fasilitas),
            'isi'       => 'admin/v_detailFasilitas'
        ];
        return view('layout/v_wrapper_admin', $data);
    }

    public function fasilitasVerified($id)
    {
        $data = [
            'id_fasilitas'  => $id,
            'status'        => 'Tervalidasi'
        ];
        $this->ModelAdmin->ubahStatusFasilitas($data);
        session()->setFlashdata('pesan', 'Validasi Berhasil!');
        return redirect()->to(base_url('admin/verifFasilitas'));
    }

    public function showFasilitas()
    {
        $data = [
            'title' => 'Data Fasilitas',
            'data'  => $this->ModelAdmin->getAllFasilitasVerified(),
            'isi'   => 'admin/v_fasilitas'
        ];
        return view('layout/v_wrapper_admin', $data);
    }

    public function deleteOwner($id_owner)
    {
        $dataOwner = $this->ModelAdmin->getOwner($id_owner);
        $data = [
            'id_owner' => $id_owner
        ];

        $updateStatus = [
            'id_penyewa' => $dataOwner['id_penyewa'],
            'role' => 'Penyewa'
        ];

        $getDataFoto = $this->ModelAdmin->getFotoByIdOwner($id_owner);
        foreach ($getDataFoto as $foto) {
            unlink(ROOTPATH . 'public/foto_fasilitas/' . $foto['foto']);
        }
        $this->ModelAdmin->ubahStatus($updateStatus);
        $this->ModelAdmin->delOwner($data);
        session()->setFlashdata('pesan', 'Hapus Berhasil!');
        return redirect()->to(base_url('admin/owner'));
    }
}
