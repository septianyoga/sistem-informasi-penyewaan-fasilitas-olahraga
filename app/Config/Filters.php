<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'filteruser' => \App\Filters\FilterUser::class,
        'filterowner' => \App\Filters\FilterOwner::class,
        'filteradmin' => \App\Filters\FilterAdmin::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     */
    public array $globals = [
        'before' => [
            'filteruser' => [
                'except' => [
                    '/',
                    '/login',
                    '/cek_login',
                    '/register',
                    '/verifikasi',
                    '/daftarFasilitas',
                    '/add',
                    '/kategori',
                    '/kategori/*',
                    '/fasilitas/*',
                ]
            ],

        ],
        'after' => [
            'filteruser' => [
                'except' => [
                    '/',
                    '/pesanan',
                    '/pesanan/*',
                    '/daftarFasilitas',
                    '/daftar',
                    '/insertOwner',
                    '/addFasilitas',
                    '/kategori',
                    '/kategori/*',
                    '/fasilitas/*',
                    '/sewa/*',
                    '/detail_pemesanan',
                    '/metode_pembayaran/*',
                    '/bayar',
                    '/upload_pembayaran',
                ],
            ],
            'filterowner' => [
                'except' => [
                    '/',
                    '/pesanan',
                    '/pesanan/*',
                    '/owner',
                    '/owner/*',
                    '/daftarFasilitas',
                    '/daftar',
                    '/insertOwner',
                    '/addFasilitas',
                    '/fasilitasTambah',
                    '/kategori',
                    '/kategori/*',
                    '/fasilitas/*',
                    '/sewa/*',
                    '/detail_pemesanan',
                    '/metode_pembayaran/*',
                    '/bayar',
                    '/upload_pembayaran',
                ],
            ],
            'filteradmin' => [
                'except' => [
                    '/admin', '/admin/*',
                    'daftarFasilitas',
                ],
            ],
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don’t expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [];
}
