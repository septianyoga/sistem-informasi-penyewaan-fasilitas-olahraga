<?php

namespace App\Controllers;

use App\Models\ModelAdmin;
use App\Models\ModelFasilitas;
use App\Models\ModelHome;
use App\Models\ModelPesanan;

class Fasilitas extends BaseController
{

    private $ModelFasilitas, $ModelHome, $ModelPesanan, $ModelAdmin;

    public function __construct()
    {
        helper('form');
        $this->ModelFasilitas = new ModelFasilitas();
        $this->ModelHome = new ModelHome();
        $this->ModelPesanan = new ModelPesanan();
        $this->ModelAdmin = new ModelAdmin();

        date_default_timezone_set('Asia/Jakarta');
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
                // cek status fasilitas apakah sudah di verif
                if ($fasilitas['status'] == 'Tervalidasi') {
                    return redirect()->to(base_url('owner'));
                }
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
        $alamat = $this->request->getPost('alamat');
        $koordinat = $this->request->getPost('koordinat');
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
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'koordinat' => [
                'label' => 'Koordinat',
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
                'alamat'            => $alamat,
                'koordinat'         => $koordinat,
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
            $email = \Config\Services::email();

            $fromEmail = 'ssc.sipfor@gmail.com';

            $email->setFrom($fromEmail);
            $emailUser = $this->ModelAdmin->getEmailAdmin();
            $toFrom = $emailUser['email'];
            $email->setTo($toFrom);
            $subject = 'Verifikasi Owner dan Fasilitas Baru';
            $email->setSubject($subject);
            $body = "
            <h3>Ada Pendaftaran Owner dan Fasilitas yang harus kamu validasi</h3>
            <p>
            <a href='" . base_url('admin/owner') . "'>Link disini</a>
            </p>
            ";
            $message = $body;
            $email->setMessage($message);
            $email->send();
            session()->setFlashdata('pesan', 'Data Berhasil Disimpan!');
            return redirect()->to(base_url('daftarFasilitas'));
        } else {
            //jika tidak valid
            // dd('tes');
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('daftarFasilitas'))->withInput();
        }
    }

    public function detail($id)
    {
        $this->ModelFasilitas->viewer($id);
        $data = [
            'title'         => 'Detail',
            'penyewa'       => $this->ModelHome->getPenyewa(session()->get('id')),
            'fasilitas'     => $this->ModelFasilitas->getFasilitasById($id),
            'foto'          => $this->ModelFasilitas->getFoto($id),
            'isi'           => 'home/detail/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function sewa($id_fasilitas)
    {
        $fasilitas = $this->ModelFasilitas->getFasilitasById($id_fasilitas);
        if ($fasilitas['hargaper'] == 'Jam') {
            $data = [
                'title'         => 'Sewa',
                'penyewa'       => $this->ModelHome->getPenyewa(session()->get('id')),
                'fasilitas'     => $this->ModelFasilitas->getFasilitasById($id_fasilitas),
                'foto'          => $this->ModelFasilitas->getFoto($id_fasilitas),
                'pesanan'       => $this->ModelPesanan->join('fasilitas', 'fasilitas.id_fasilitas = pesanan.id_fasilitas')->where([
                    'hargaper' => 'Jam',
                    'pesanan.id_fasilitas' => $id_fasilitas,
                    // 'date_expired <' => date('Y-m-d H:i:s')
                ])->findAll(),
                'isi'           => 'home/detail/v_pesan_perjam'
            ];
        } else {
            $data = [
                'title'         => 'Sewa',
                'penyewa'       => $this->ModelHome->getPenyewa(session()->get('id')),
                'fasilitas'     => $this->ModelFasilitas->getFasilitasById($id_fasilitas),
                'foto'          => $this->ModelFasilitas->getFoto($id_fasilitas),
                'pesanan'       => $this->ModelPesanan->join('fasilitas', 'fasilitas.id_fasilitas = pesanan.id_fasilitas')->where([
                    'hargaper' => 'Hari',
                    'pesanan.id_fasilitas' => $id_fasilitas,
                    // 'pesanan.date_expired <' => date('Y-m-d H:i:s')
                ])->findAll(),
                'isi'           => 'home/detail/v_pesan_perhari'
            ];
            // var_dump($data['pesanan']);
            // echo '<pre>';
            // var_dump($data['pesanan']);
            // echo '</pre>';
            // if ($data['pesanan']['date_expired'] < date('Y-m-d H:i:s')) {
            //     echo $data['pesanan']['date_expired'];
            // }
            // die();
        }
        // dd($data['pesanan']);
        return view('layout/v_wrapper', $data);
    }

    public function booking()
    {
        $data = [
            'id_penyewa'    => $this->request->getPost('id_penyewa'),
            'id_fasilitas'  => $this->request->getPost('id_fasilitas'),
            'tanggal'       => $this->request->getPost('tanggal'),
            'nominal'       => $this->request->getPost('nominal'),
        ];
        $this->ModelPesanan->insert($data);
        $data_terakhir = $this->ModelPesanan->orderBy('id_pesanan', 'DESC')->first();
        echo $data_terakhir['id_pesanan'];
    }

    public function detail_pemesanan()
    {
        // echo '<pre>';
        // var_dump($this->request->getPost());
        // echo '</pre>';
        // die();
        $cek = $this->ModelPesanan->join('fasilitas', 'fasilitas.id_fasilitas = pesanan.id_fasilitas')->where([
            'hargaper' => 'Hari',
            // 'date_expired >' => date('Y-m-d H:i:s'),
            'tanggal'    => $this->request->getPost('tanggal') . ' 00:00:00',
        ])->get()->getRowArray();
        if ($cek) {
            if ($cek['status_pesanan'] == 'Diapprov') {
                session()->setFlashdata('pesanerror', 'Maaf tanggal ini sudah dibooking!');
                return redirect()->to(base_url('sewa/' . $this->request->getPost('id_fasilitas')));
            } elseif ($cek['date_expired'] > date('Y-m-d H:i:s')) {
                session()->setFlashdata('pesanerror', 'Maaf tanggal ini sudah dibooking!');
                return redirect()->to(base_url('sewa/' . $this->request->getPost('id_fasilitas')));
            }
        }
        $fasilitas = $this->ModelFasilitas->getFasilitasById($this->request->getPost('id_fasilitas'));
        $data = [
            'title'         => 'Detail Pembayaran',
            'penyewa'       => $this->ModelHome->getPenyewa(session()->get('id')),
            'data'          => $this->request->getPost(),
            'fasilitas'     => $fasilitas,
            'isi'           => 'home/detail/v_detail_pemesanan'
        ];
        // dd($data['data']);
        return view('layout/v_wrapper', $data);
    }

    public function bayar()
    {

        $jamawal = 2;
        $jamskarang = strtotime(date('Y-m-d H:i:s'));
        $jamtambah = strtotime("+$jamawal hours", $jamskarang);
        $jamhasil = date('Y-m-d H:i:s', $jamtambah);
        // insert
        $cek = $this->ModelPesanan->where('tanggal', $this->request->getPost('tanggal'))->get()->getRowArray();
        // echo '<pre>';
        // var_dump($cek);
        // echo '</pre>';
        // die();
        if ($cek) {
            if ($cek['date_expired'] < date('Y-m-d H:i:s')) {

                $datapesanan = [
                    'id_penyewa' => $this->request->getPost('id_penyewa'),
                    'id_fasilitas' => $this->request->getPost('id_fasilitas'),
                    'tanggal' => $this->request->getPost('tanggal'),
                    'nominal' => $this->request->getPost('nominal'),
                    'status_pesanan' => $this->request->getPost('status_pesanan'),
                    'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),
                    'date_expired' => $jamhasil,
                ];
                $this->ModelPesanan->insert($datapesanan);
            }
        } else {
            $datapesanan = [
                'id_penyewa' => $this->request->getPost('id_penyewa'),
                'id_fasilitas' => $this->request->getPost('id_fasilitas'),
                'tanggal' => $this->request->getPost('tanggal'),
                'nominal' => $this->request->getPost('nominal'),
                'status_pesanan' => $this->request->getPost('status_pesanan'),
                'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),
                'date_expired' => $jamhasil,
            ];
            $this->ModelPesanan->insert($datapesanan);
        }
        $last_data = $this->ModelPesanan->orderBy('id_pesanan', 'DESC')->limit(1)->get()->getRowArray();
        $owner = $this->ModelFasilitas->getFasilitasById($last_data['id_fasilitas']);
        if ($this->request->getPost('metode_pembayaran') == 'Non Tunai') {
            $data = [
                'title'         => 'Selesaikan Pembayaran',
                'penyewa'       => $this->ModelHome->getPenyewa(session()->get('id')),
                'data'          => $last_data,
                'owner'         => $owner,
                'isi'           => 'home/bayar/v_bayar'
            ];
            return view('layout/v_wrapper', $data);
        }

        session()->setFlashdata('pesan', 'Pesanan Anda Berhasil Dibuat!');
        return redirect()->to(base_url('pesanan'));
    }

    public function upload_bayar()
    {
        $bukti_pembayaran = $this->request->getFile('bukti_pembayaran');
        $nama_baru = $bukti_pembayaran->getRandomName();
        $bukti_pembayaran->move(ROOTPATH . 'public/bukti_pembayaran', $nama_baru);
        $data = [
            'id_pesanan' => $this->request->getPost('id_pesanan'),
            'bukti_pembayaran' => $nama_baru,
            'status_pesanan'        => 'Dibayar'
        ];
        $this->ModelPesanan->update($this->request->getPost('id_pesanan'), $data);
        session()->setFlashdata('pesan', 'Pembayaran Berhasil Diupload!');
        return redirect()->to(base_url('pesanan'));
    }

    public function metode_p($id)
    {
        // $data = [
        //     'title'         => 'Metode Pembayaran',
        //     'penyewa'       => $this->ModelHome->getPenyewa(session()->get('id')),
        //     'fasilitas'     => $this->ModelFasilitas->getFasilitasById($id),
        //     'foto'          => $this->ModelFasilitas->getFoto($id),
        //     'isi'           => 'home/metode_pembayaran/v_metode'
        // ];
        // return view('layout/v_wrapper', $data);
    }
}
