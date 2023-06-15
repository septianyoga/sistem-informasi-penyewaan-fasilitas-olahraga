<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelHome;

class Kategori extends BaseController
{
    private $ModelHome;

    public function __construct()
    {
        $this->ModelHome = new ModelHome();
    }

    public function index($kategori)
    {

        $data = [
            'title' => "Kategori",
            'data'  => $this->ModelHome->getAllFasilitasWithKategori($kategori),
            'penyewa' => $this->ModelHome->getPenyewa(session()->get('id')),
            'kategori' => $kategori,
            'isi'   => 'home/kategori/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function search()
    {
        $data = [
            'title' => "Kategori",
            'data'  => $this->ModelHome->searchFasilitas($this->request->getVar('kategori'), $this->request->getVar('kecamatan')),
            'penyewa' => $this->ModelHome->getPenyewa(session()->get('id')),
            'kategori' => $this->request->getVar('kategori'),
            'isi'   => 'home/kategori/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }
}
