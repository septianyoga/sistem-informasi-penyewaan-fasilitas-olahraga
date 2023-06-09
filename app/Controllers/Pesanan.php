<?php

namespace App\Controllers;

use App\Models\ModelFasilitas;
use App\Models\ModelHome;
use App\Models\ModelPesanan;

use App\Controllers\BaseController;

class Pesanan extends BaseController
{

    private $ModelFasilitas, $ModelHome, $ModelPesanan;

    public function __construct()
    {
        helper('form');
        $this->ModelFasilitas = new ModelFasilitas();
        $this->ModelHome = new ModelHome();
        $this->ModelPesanan = new ModelPesanan();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data = [
            'title'         => 'Pesanan',
            'penyewa'       => $this->ModelHome->getPenyewa(session()->get('id')),
            'belum'         => $this->ModelPesanan->getJumlah('Belum Dibayar'),
            'dibayar'       => $this->ModelPesanan->getJumlah('Dibayar'),
            'diverif'       => $this->ModelPesanan->getJumlah('Di Verifikasi'),
            'selesai'       => $this->ModelPesanan->getJumlah('Selesai'),
            'isi'           => 'home/pesanan/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function lihat($jenis)
    {
        if ($jenis == 'belum_bayar') {
            $data = [
                'title'         => 'Belum Dibayar',
                'penyewa'       => $this->ModelHome->getPenyewa(session()->get('id')),
                'data'          => $this->ModelPesanan
                    ->join('fasilitas', 'fasilitas.id_fasilitas = pesanan.id_fasilitas', 'right')
                    ->join('owner', 'owner.id_owner = fasilitas.id_owner')
                    ->where('pesanan.status_pesanan', 'Belum Dibayar')->findAll(),
                'isi'           => 'home/pesanan/v_lihat'
            ];
            // var_dump($data['data']);
            // die();
        } elseif ($jenis == 'menunggu_verifikasi') {
            $data = [
                'title'         => 'Menunggu Verifikasi',
                'penyewa'       => $this->ModelHome->getPenyewa(session()->get('id')),
                'data'          => $this->ModelPesanan
                    ->join('fasilitas', 'fasilitas.id_fasilitas = pesanan.id_fasilitas')
                    ->join('owner', 'owner.id_owner = fasilitas.id_owner')
                    ->where('pesanan.status_pesanan', 'Dibayar')->findAll(),
                'isi'           => 'home/pesanan/v_lihat'
            ];
        } else {
            $data = [
                'title'         => 'Terverifikasi',
                'penyewa'       => $this->ModelHome->getPenyewa(session()->get('id')),
                'data'          => $this->ModelPesanan
                    ->join('fasilitas', 'fasilitas.id_fasilitas = pesanan.id_fasilitas')
                    ->join('owner', 'owner.id_owner = fasilitas.id_owner')
                    ->where('pesanan.status_pesanan', 'Belum Dibayar')->findAll(),
                'isi'           => 'home/pesanan/v_lihat'
            ];
        }
        return view('layout/v_wrapper', $data);
    }

    public function lanjut_bayar($id)
    {
        $data = [
            'title'         => 'Lanjutkan Pembayaran',
            'penyewa'       => $this->ModelHome->getPenyewa(session()->get('id')),
            'data'          => $this->ModelPesanan
                ->join('fasilitas', 'fasilitas.id_fasilitas = pesanan.id_fasilitas')
                ->join('owner', 'owner.id_owner = fasilitas.id_owner')
                ->find($id),
            'isi'           => 'home/bayar/v_lanjut_bayar'
        ];
        return view('layout/v_wrapper', $data);
    }
}
