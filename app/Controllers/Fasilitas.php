<?php

namespace App\Controllers;

use App\Models\ModelFasilitas;
use App\Models\ModelHome;

class Fasilitas extends BaseController
{

    private $ModelFasilitas, $ModelHome;

    public function __construct()
    {
        helper('form');
        $this->ModelFasilitas = new ModelFasilitas();
        $this->ModelHome = new ModelHome();
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
            'isi'   => 'auth/v_login'
        ];
        return view('layout/v_wrapper_auth', $data);
    }

    public function daftarOwner()
    {
        $penyewa = $this->ModelFasilitas->cekRolePenyewa(session()->get('id'));
        $dataOwner = null;
        $dataFasilitas = null;
        if ($penyewa['role'] == 'Owner') {
            $dataOwner = $this->ModelFasilitas->getOwner($penyewa['id_penyewa']);
            $dataFasilitas = $this->ModelFasilitas->getFasilitas($dataOwner['id_owner']);
        }

        // dd($dataOwner);

        $data = [
            'title'         => 'Daftar Fasilitas',
            'cekPenyewa'    => $penyewa,
            'dataOwner'     => $dataOwner,
            'dataFasilitas' => $dataFasilitas,
            'penyewa' => $this->ModelHome->getPenyewa(session()->get('id')),
            'isi'           => 'fasilitas/v_daftar'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function daftarFasilitas()
    {
        // get fasilitas pertama
        $idOwner = $this->ModelFasilitas->getOwner(session()->get('id'));
        $fasilitas = null;
        $foto = null;
        if ($idOwner != null) {
            $fasilitas = $this->ModelFasilitas->getFasilitas($idOwner['id_owner']);
            if ($fasilitas != null) {
                $foto = $this->ModelFasilitas->getFoto($fasilitas['id_fasilitas']);
            }
        } else {
            session()->setFlashdata('pesanerror', 'Anda harus mengisi data owner terlbih dahulu!');
            return redirect()->to(base_url('daftar'));
        }

        // merubah role session
        session()->set('role', 'Owner');

        $data = [
            'title'         => 'Daftar Fasilitas',
            'cekPenyewa'    => $this->ModelFasilitas->cekRolePenyewa(session()->get('id')),
            'dataOwner'     => $this->ModelFasilitas->getOwner(session()->get('id')),
            'kategori'      => $this->ModelFasilitas->getKategori(),
            'fasilitas'     => $fasilitas,
            'penyewa' => $this->ModelHome->getPenyewa(session()->get('id')),
            'foto'          => $foto,
            'isi'           => 'fasilitas/v_daftar2'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function addFasilitas()
    {
        $nama = $this->request->getPost('nama');
        $keterangan = $this->request->getPost('keterangan');
        $harga = $this->request->getPost('harga');
        $hargaper = $this->request->getPost('hargaper');
        $id_kategori = $this->request->getPost('kategori');
        $foto = $this->request->getFiles();


        $validasi = [
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'keterangan' => [
                'label' => 'Keterangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'harga' => [
                'label' => 'Harga',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'hargaper' => [
                'label' => 'Harga Per',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} wajib diisi.',
                    'max_size' => '{field} Maksimal Ukurannya 1 MB',
                    'mime_in' => 'Format {field} Wajib PNG/JPG/JPEG',
                ],
            ],
        ];

        if ($this->validate($validasi)) {
            // jika valid
            $dataOwner = $this->ModelFasilitas->getOwner(session()->get('id'));
            $getLastIdFasilitas = $this->ModelFasilitas->getLastId();

            $data = [
                'id_fasilitas'      => $getLastIdFasilitas,
                'nama_fasilitas'    => $nama,
                'keterangan'        => $keterangan,
                'id_kategori'       => $id_kategori,
                'harga'             => $harga,
                'hargaper'          => $hargaper,
                'id_owner'          => $dataOwner['id_owner'],
                'status'            => 'Belum Tervalidasi',
            ];

            // dd($foto['foto']);
            $this->ModelFasilitas->insertFasilitas($data);
            foreach ($foto['foto'] as $key => $img) {
                $nama = $img->getRandomName();
                $datafoto = [
                    'id_fasilitas' => $getLastIdFasilitas,
                    'foto' => $nama,
                ];
                $this->ModelFasilitas->insertFoto($datafoto);
                $img->move(ROOTPATH . 'public/foto_fasilitas', $nama);
            }

            session()->setFlashdata('pesan', 'Data Berhasil Disimpan!');
            return redirect()->to(base_url('daftarFasilitas'));
        } else {
            //jika tidak valid
            // dd('tes');
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('daftarFasilitas'))->withInput();
        }
    }
}
