<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'isi'   => 'home/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }
}
