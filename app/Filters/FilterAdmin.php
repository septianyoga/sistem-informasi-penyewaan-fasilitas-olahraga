<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if (session()->get('role') == '') {
            session()->setFlashdata('pesan', 'Anda belum login. Silahkan login terlebih dahulu!!');
            return redirect()->to(base_url('login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        // if (session()->get('role') == 'Penyewa') {
        //     return redirect()->to(base_url('/'));
        // }
        if (session()->get('role') == 'Admin') {
            return redirect()->to(base_url('/admin'));
        }
    }
}
