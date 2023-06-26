<?php

namespace App\Controllers;

use App\Models\ModelAdmin;
use App\Models\ModelFasilitas;
use App\Models\ModelHome;
use App\Models\ModelOwner;
use App\Models\ModelPesanan;

class Owner extends BaseController
{

    private $ModelOwner, $ModelHome, $ModelFasilitas, $ModelPesanan, $ModelAdmin;

    public function __construct()
    {
        helper('form');
        $this->ModelOwner = new ModelOwner();
        $this->ModelHome = new ModelHome();
        $this->ModelFasilitas = new ModelFasilitas();
        $this->ModelPesanan = new ModelPesanan();
        $this->ModelAdmin = new ModelAdmin();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        if ($this->ModelHome->getPenyewa(session()->get('id')) == null) {
            return redirect()->to(base_url('/'));
        }
        $data = [
            'title'     => 'Dashboard Owner',
            'countFasilitas'    => $this->ModelFasilitas->totalFasilitas(),
            'countAllPengunjung' => $this->ModelFasilitas->totalAllView(),
            'countPesanan'  => $this->ModelFasilitas->totalPesanan(),
            'isi'       => 'owner/v_index'
        ];
        // echo '<pre>';
        // var_dump($data['countPesanan']);
        // echo '</pre>';
        // die();
        return view('layout/v_wrapper_admin', $data);
    }

    public function daftar()
    {
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $alamat = $this->request->getPost('alamat');
        // $lokasi = $this->request->getPost('lokasi');
        $no_telp = $this->request->getPost('no_telp');
        $jenis_rek = $this->request->getPost('jenis_rek');
        $no_rek = $this->request->getPost('no_rek');
        $no_dana_shopee = $this->request->getPost('no_dana_shopee');


        $validasi = [
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            // 'lokasi' => [
            //     'label' => 'Lokasi',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} wajib diisi.'
            //     ],
            // ],
            'no_telp' => [
                'label' => 'Nomor Telepon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
        ];
        if ($this->validate($validasi)) {
            // update role
            $data = [
                'id_penyewa' => session()->get('id'),
                'nama_penyewa' => $nama,
                'email' => $email,
                'role' => 'Owner',
            ];
            $this->ModelOwner->updateToOwner($data);

            // insert to owner
            $dataOwner = [
                'id_penyewa'        => session()->get('id'),
                'no_telp'           => $no_telp,
                'alamat'            => $alamat,
                // 'lokasi'            => $lokasi,
                'jenis_rek'         => $jenis_rek,
                'no_rek'            => $no_rek,
                'no_dana_shopee'    => $no_dana_shopee,
            ];
            $this->ModelOwner->insertToOwner($dataOwner);

            session()->setFlashdata('pesan', 'Data Berhasil Disimpan!');
            return redirect()->to(base_url('/daftarFasilitas'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('daftar'))->withInput();
        }
    }

    public function showFasilitas()
    {
        if ($this->ModelHome->getPenyewa(session()->get('id')) == null) {
            return redirect()->to(base_url('/'));
        }
        $data = [
            'title'     => 'Fasilitas Owner',
            'data'      => $this->ModelOwner->getAllFasilitas(session()->get('id')),
            'kategori'  => $this->ModelOwner->getKategori(),
            'isi'       => 'owner/fasilitas/v_fasilitas'
        ];
        return view('layout/v_wrapper_admin', $data);
    }

    public function tambahFasilitas()
    {
        $nama_fasilitas = $this->request->getPost('nama_fasilitas');
        $keterangan = $this->request->getPost('keterangan');
        $harga = $this->request->getPost('harga');
        $hargaper = $this->request->getPost('hargaper');
        $alamat = $this->request->getPost('alamat');
        $koordinat = $this->request->getPost('koordinat');
        $id_kategori = $this->request->getPost('kategori');
        $foto = $this->request->getFiles();


        $validasi = [
            'nama_fasilitas' => [
                'label' => 'Nama Fasilitas',
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
                'rules' => 'uploaded[foto]|max_size[foto,5120]|mime_in[foto,image/png,image/jpg,image/jpeg]',
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
                'nama_fasilitas'    => $nama_fasilitas,
                'keterangan'        => $keterangan,
                'id_kategori'       => $id_kategori,
                'harga'             => $harga,
                'alamat'            => $alamat,
                'koordinat'         => $koordinat,
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
                $dataupdate = [
                    'id_fasilitas' => $getLastIdFasilitas,
                    'thumnail' => $nama,
                ];
                if ($key == 0) {
                    $this->ModelFasilitas->updateFotoFasilitas($dataupdate);
                }
                $this->ModelFasilitas->insertFoto($datafoto);
                $img->move(ROOTPATH . 'public/foto_fasilitas', $nama);
            }

            session()->setFlashdata('pesan', 'Data Berhasil Disimpan!');
            return redirect()->to(base_url('owner/fasilitas'));
        } else {
            //jika tidak valid
            // dd('tes');
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('owner/fasilitas'))->withInput();
        }
    }

    public function detailFasilitas($id_fasilitas)
    {
        if ($this->ModelHome->getPenyewa(session()->get('id')) == null) {
            return redirect()->to(base_url('/'));
        }
        $data = [
            'title'     => 'Detail Fasilitas',
            'fasilitas' => $this->ModelAdmin->getFasilitasById($id_fasilitas),
            'dtPenyewa' => $this->ModelAdmin->getPenyewaByIdFasilitas($id_fasilitas),
            'foto'      => $this->ModelAdmin->getFoto($id_fasilitas),
            'isi'       => 'owner/fasilitas/v_detailFasilitas'
        ];
        return view('layout/v_wrapper_admin', $data);
    }

    public function deleteFasilitas($id_fasilitas)
    {
        $data = [
            'id_fasilitas' => $id_fasilitas
        ];

        $foto = $this->ModelOwner->getAllFoto($id_fasilitas);
        foreach ($foto as $key => $img) {
            unlink(ROOTPATH . 'public/foto_fasilitas/' . $img['foto']);
            $this->ModelOwner->deleteFoto($img['id_foto']);
        }

        $this->ModelOwner->delFasilitas($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('owner/fasilitas'));
    }

    public function editFasilitas($id)
    {
        if ($this->ModelHome->getPenyewa(session()->get('id')) == null) {
            return redirect()->to(base_url('/'));
        }
        $data = [
            'title'     => 'Edit Fasilitas',
            'fasilitas' => $this->ModelOwner->getFasilitasById($id),
            'kategori'  => $this->ModelOwner->getKategori(),
            'isi'       => 'owner/fasilitas/v_editFasilitas'
        ];
        return view('layout/v_wrapper_admin', $data);
    }

    public function prosesEditFasilitas()
    {
        $id_fasilitas = $this->request->getPost('id_fasilitas');
        $nama_fasilitas = $this->request->getPost('nama_fasilitas');
        $keterangan = $this->request->getPost('keterangan');
        $harga = $this->request->getPost('harga');
        $hargaper = $this->request->getPost('hargaper');
        $id_kategori = $this->request->getPost('kategori');
        $foto = $this->request->getFiles();


        $validasi = [
            'nama_fasilitas' => [
                'label' => 'Nama Fasilitas',
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
                'rules' => 'max_size[foto,5120]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => '{field} Maksimal Ukurannya 1 MB',
                    'mime_in' => 'Format {field} Wajib PNG/JPG/JPEG',
                ],
            ],
        ];

        if ($this->validate($validasi)) {
            // jika valid
            // dd($foto['foto']->isValid());
            $error = 1;
            foreach ($this->request->getFileMultiple('foto') as $img) {
                if ($img->isValid()) {
                    $error = 0;
                }
            }

            if ($error == 0) {
                // hapus foto lama
                $fotolama = $this->ModelOwner->getAllFoto($id_fasilitas);
                foreach ($fotolama as $key => $img) {
                    unlink(ROOTPATH . 'public/foto_fasilitas/' . $img['foto']);
                    $this->ModelOwner->deleteFoto($img['id_foto']);
                }
                // insert foto baru
                $data = [
                    'id_fasilitas'      => $id_fasilitas,
                    'nama_fasilitas'    => $nama_fasilitas,
                    'keterangan'        => $keterangan,
                    'id_kategori'       => $id_kategori,
                    'harga'             => $harga,
                    'hargaper'          => $hargaper,
                ];

                // dd($foto['foto']);
                $this->ModelOwner->updateFasilitas($data);
                foreach ($foto['foto'] as $key => $img) {
                    $nama = $img->getRandomName();
                    $datafoto = [
                        'id_fasilitas' => $id_fasilitas,
                        'foto' => $nama,
                    ];
                    $this->ModelFasilitas->insertFoto($datafoto);
                    $img->move(ROOTPATH . 'public/foto_fasilitas', $nama);
                }
            } else {

                $data = [
                    'id_fasilitas'      => $id_fasilitas,
                    'nama_fasilitas'    => $nama_fasilitas,
                    'keterangan'        => $keterangan,
                    'id_kategori'       => $id_kategori,
                    'harga'             => $harga,
                    'hargaper'          => $hargaper,
                ];

                $this->ModelOwner->updateFasilitas($data);
            }

            session()->setFlashdata('pesan', 'Data Berhasil Disimpan!');
            return redirect()->to(base_url('owner/fasilitas'));
        } else {
            //jika tidak valid
            // dd('tes');
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('owner/fasilitas'))->withInput();
        }
    }

    public function pesanan()
    {
        $owner = $this->ModelOwner->getOwner();
        $data = [
            'title'     => 'Pesanan',
            'data'      => $this->ModelPesanan->join('fasilitas', 'fasilitas.id_fasilitas = pesanan.id_fasilitas')
                ->join('penyewa', 'penyewa.id_penyewa = pesanan.id_penyewa')
                ->where('id_owner', $owner['id_owner'])->findAll(),
            'isi'       => 'owner/pesanan/v_pesanan'
        ];
        return view('layout/v_wrapper_admin', $data);
    }

    public function detail_pesanan($id)
    {
        $data = [
            'title'         => 'Detail Pesanan',
            'data'          => $this->ModelPesanan->join('penyewa', 'penyewa.id_penyewa = pesanan.id_penyewa')
                ->join('fasilitas', 'fasilitas.id_fasilitas = pesanan.id_fasilitas')
                ->find($id),
            'isi'           => 'owner/pesanan/v_detailPesanan'
        ];
        return view('layout/v_wrapper_admin', $data);
    }

    public function approv_pesanan($id)
    {
        $data = [
            'id_pesanan'    => $id,
            'status_pesanan' => 'Diapprov'
        ];
        $this->ModelPesanan->update($id, $data);
        session()->setFlashdata('pesan', 'Berhasil Melakukan Approv Pesanan!');
        return redirect()->to(base_url('owner/pesanan'));
    }

    public function tolak_pesanan()
    {
        $validasi = [
            'alasan' => [
                'label' => 'Alasan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
        ];

        if ($this->validate($validasi)) {
            $data = [
                'alasan_tolak' => $this->request->getPost('alasan'),
                'status_pesanan' => 'Ditolak'
            ];
            $this->ModelPesanan->update($this->request->getPost('id_pesanan'), $data);
            session()->setFlashdata('pesan', 'Berhasil Menolak Pesanan!');
            return redirect()->to(base_url('owner/pesanan'));
        } else {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput();
        }
    }

    public function laporan()
    {
        $owner = $this->ModelOwner->getOwner();
        $data = [
            'title'     => 'Laporan Pesanan',
            'data'      => $this->ModelPesanan->join('fasilitas', 'fasilitas.id_fasilitas = pesanan.id_fasilitas')
                ->join('penyewa', 'penyewa.id_penyewa = pesanan.id_penyewa')
                ->where('id_owner', $owner['id_owner'])->findAll(),
            'isi'       => 'owner/laporan/v_laporan'
        ];
        return view('layout/v_wrapper_admin', $data);
    }

    public function fasilitas_detail($id_owner)
    {
        $owner = $this->ModelOwner->getNama();
        $data = [
            'title' => "Fasilitas ",
            'penyewa' => $this->ModelHome->getPenyewa(session()->get('id')),
            'data'  => $this->ModelOwner->getOwnerFasilitas($id_owner),
            'isi'   => 'home/owner/v_fasilitas_owner'
        ];
        return view('layout/v_wrapper', $data);
    }
}
