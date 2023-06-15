<?php

namespace App\Controllers;

use App\Models\ModelOwner;
use App\Models\ModelHome;
// use GuzzleHttp\Guzzle\Client;

class Home extends BaseController
{
    private $ModelHome, $ModelOwner;

    public function __construct()
    {
        $this->ModelHome = new ModelHome();
        $this->ModelOwner = new ModelOwner();
    }

    public function index()
    {
        // dd(session()->get('role'));
        $data = [
            'title'     => 'Home',
            'penyewa'   => $this->ModelHome->getPenyewa(session()->get('id')),
            'lokasi'    => $this->ModelOwner->getLokasi(),
            'isi'       => 'home/v_index'
        ];
        // $client = new \GuzzleHttp\Client();
        // $response = $client->request('GET', 'https://www.emsifa.com/api-wilayah-indonesia/api/districts/3213.json');

        // echo '<pre>';
        // var_dump($data['lokasi']);
        // echo '</pre>';
        // die();
        // // Menampilkan respons dari API
        // var_dump($response->getBody());
        return view('layout/v_wrapper', $data);
        // return view('../../public/template/frontend/index');
    }
}
