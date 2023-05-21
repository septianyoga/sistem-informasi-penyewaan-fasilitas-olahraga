<?php

namespace App\Controllers;

use App\Models\ModelHome;

class Home extends BaseController
{
    private $ModelHome;

    public function __construct()
    {
        $this->ModelHome = new ModelHome();
    }

    public function index()
    {
        // dd(session()->get('role'));
        $data = [
            'title' => 'Home',
            'penyewa' => $this->ModelHome->getPenyewa(session()->get('id')),
            'isi'   => 'home/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }
}
