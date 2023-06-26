<?php

namespace App\Controllers;

use App\Models\ModelAdmin;
use App\Models\ModelFasilitas;

class Admin extends BaseController
{

    private $ModelAdmin, $ModelFasilitas;

    public function __construct()
    {
        helper('form');
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelFasilitas = new ModelFasilitas();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin',
            'totalOwner'    =>  $this->ModelAdmin->countOwner(),
            'totalPenyewa'    =>  $this->ModelAdmin->countPenyewa(),
            'validOwner'    =>  $this->ModelAdmin->validOwner(),
            'validFasilitas'    =>  $this->ModelAdmin->validFasilitas(),
            'isi'   => 'admin/v_index'
        ];
        // var_dump($data['totalOwner']);
        // die();
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

    public function verified($id_owner)
    {
        $data = [
            'id_owner'  => $id_owner,
            'status'    => 'Verified'
        ];

        $owner = $this->ModelAdmin->getOwner($id_owner);

        $email = \Config\Services::email();

        $fromEmail = 'ssc.sipfor@gmail.com';

        $email->setFrom($fromEmail);
        $emailUser = $owner['email'];
        $toFrom = $emailUser;
        $email->setTo($toFrom);
        $subject = 'Verifikasi Owner';
        $email->setSubject($subject);
        $body = "
            <h3>Akun anda telah berhasil di verifikasi. Silahkan kelola lebih lanjut</h3>
            <p>
            <a href='" . base_url('owner/fasilitas') . "'>Link disini</a>
            </p>
            ";
        $message = $body;
        $email->setMessage($message);
        $email->send();

        $this->ModelAdmin->verif($data);
        session()->setFlashdata('pesan', 'Verifikasi Berhasil!');
        return redirect()->to(base_url('admin/owner'));
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
        $owner = $this->ModelAdmin->getFasilitasById($id);

        $emailOwner = $this->ModelAdmin->getOwner($owner['id_owner']);

        $email = \Config\Services::email();

        $fromEmail = 'ssc.sipfor@gmail.com';

        $email->setFrom($fromEmail);
        $emailUser = $emailOwner['email'];
        $toFrom = $emailUser;
        $email->setTo($toFrom);
        $subject = 'Verifikasi Fasilitas';
        $email->setSubject($subject);
        $body = "
            <h3>Fasilitas anda telah berhasil di verifikasi. Silahkan kelola lebih lanjut</h3>
            <p>
            <a href='" . base_url('owner/fasilitas') . "'>Link disini</a>
            </p>
            ";
        $message = $body;
        $email->setMessage($message);
        $email->send();
        $this->ModelAdmin->ubahStatusFasilitas($data);
        session()->setFlashdata('pesan', 'Validasi Berhasil!');
        return redirect()->to(base_url('admin/fasilitas'));
    }

    public function showFasilitas()
    {
        $data = [
            'title' => 'Data Fasilitas',
            'data'  => $this->ModelAdmin->getAllFasilitasVerified(),
            'fasilitas'  => $this->ModelAdmin->getAllFasilitasJoin(),
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
        if ($getDataFoto != null) {
            foreach ($getDataFoto as $foto) {
                unlink(ROOTPATH . 'public/foto_fasilitas/' . $foto['foto']);
            }
        }
        $this->ModelAdmin->ubahStatus($updateStatus);
        $this->ModelAdmin->delOwner($data);
        session()->setFlashdata('pesan', 'Hapus Berhasil!');
        return redirect()->to(base_url('admin/owner'));
    }

    public function hapusPenyewa($id)
    {
        $data = [
            'id_penyewa' => $id,
            'status_aktif' => 'Non Aktif'
        ];
        $this->ModelAdmin->db->table('penyewa')->where('id_penyewa', $id)->update($data);
        session()->setFlashdata('pesan', 'Non Aktif Berhasil!');
        return redirect()->to(base_url('admin/penyewa'));
    }

    public function nonAktifOwner($id)
    {
        $data = [
            'id_owner' => $id,
            'status' => 'Non Aktif'
        ];
        $this->ModelAdmin->db->table('owner')->where('id_owner', $id)->update($data);
        session()->setFlashdata('pesan', 'Non Aktif Berhasil!');
        return redirect()->to(base_url('admin/owner'));
    }

    public function aktifOwner($id)
    {
        $data = [
            'id_owner' => $id,
            'status' => 'Verified'
        ];
        $this->ModelAdmin->db->table('owner')->where('id_owner', $id)->update($data);
        session()->setFlashdata('pesan', 'Berhasil Mengaktifkan Kembali Owner!');
        return redirect()->to(base_url('admin/owner'));
    }

    public function nonAktifFasilitas($id)
    {
        $data = [
            'id_fasilitas' => $id,
            'status' => 'Non Aktif'
        ];
        $this->ModelFasilitas->nonAktifFasilitas($data);
        session()->setFlashdata('pesan', 'Non Aktif Berhasil!');
        return redirect()->to(base_url('admin/fasilitas'));
    }

    public function aktifFasilitas($id)
    {
        $data = [
            'id_fasilitas' => $id,
            'status' => 'Tervalidasi'
        ];
        $this->ModelFasilitas->nonAktifFasilitas($data);
        session()->setFlashdata('pesan', 'Berhasil Mengaktifkan Kembali Fasilitas!');
        return redirect()->to(base_url('admin/fasilitas'));
    }

    public function aktifPenyewa($id)
    {
        $data = [
            'id_penyewa' => $id,
            'status_aktif' => 'Aktif'
        ];
        $this->ModelAdmin->db->table('penyewa')->where('id_penyewa', $id)->update($data);
        session()->setFlashdata('pesan', 'Berhasil Mengaktifkan Kembali Penyewa!');
        return redirect()->to(base_url('admin/penyewa'));
    }
}
