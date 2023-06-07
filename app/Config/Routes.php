<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/kategori/(:any)', 'Kategori::index/$1');

$routes->get('/pesanan', 'Pesanan::index');

$routes->get('/daftar', 'Fasilitas::daftarOwner');
$routes->get('/daftarFasilitas', 'Fasilitas::daftarFasilitas');
$routes->post('/addFasilitas', 'Fasilitas::addFasilitas');

$routes->get('/login', 'Auth::index');
$routes->get('/logout', 'Auth::logout');
$routes->get('/register', 'Auth::register');
$routes->post('/cek_login', 'Auth::cekLogin');
$routes->post('/verifikasi', 'Auth::add');
$routes->post('/add', 'Auth::insertPenyewa');

$routes->get('/admin', 'Admin::index');
$routes->get('/admin/owner', 'Admin::dataOwner');
$routes->get('/admin/owner/(:num)', 'Admin::deleteOwner/$1');
$routes->get('/admin/penyewa', 'Admin::dataPenyewa');
$routes->get('/admin/penyewa/(:num)', 'Admin::hapusPenyewa/$1');
$routes->get('/admin/verifOwner', 'Admin::verifOwner');
$routes->get('/admin/verifOwner/(:num)', 'Admin::verified/$1');
$routes->get('/admin/verifFasilitas', 'Admin::verifFasilitas');
$routes->get('/admin/verifFasilitas/(:num)', 'Admin::detailFasilitas/$1');
$routes->get('/admin/verifFasilitas/verif/(:num)', 'Admin::fasilitasVerified/$1');
$routes->get('/admin/fasilitas', 'Admin::showFasilitas');

$routes->get('/owner', 'Owner::index');
$routes->get('/owner/fasilitas', 'Owner::showFasilitas');
$routes->get('/owner/fasilitas/(:num)', 'Owner::deleteFasilitas/$1');
$routes->get('/owner/fasilitas/edit/(:num)', 'Owner::editFasilitas/$1');
$routes->post('/owner/fasilitas/edit', 'Owner::prosesEditFasilitas');
$routes->post('/insertOwner', 'Owner::daftar');
$routes->post('/fasilitasTambah', 'Owner::tambahFasilitas');

$routes->get('/fasilitas/(:num)', 'Fasilitas::detail/$1');

$routes->get('/sewa/(:num)', 'Fasilitas::sewa/$1');
$routes->post('/sewa/booking', 'Fasilitas::booking');
$routes->post('/detail_pemesanan', 'Fasilitas::detail_pemesanan');
$routes->get('/metode_pembayaran/(:num)', 'Fasilitas::metode_p/$1');
$routes->post('/bayar', 'Fasilitas::bayar');
$routes->post('/upload_pembayaran', 'Fasilitas::upload_bayar');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
