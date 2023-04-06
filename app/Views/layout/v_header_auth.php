<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?> | SIPFOR</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>/asset/img/logo.ico" />

    <link rel="stylesheet" href="<?= base_url() ?>/template/backend/html/assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/backend/html/assets/css/backend.css?v=1.0.0">
    <style>
        .hijau {
            color: #08b4ac !important;
        }

        input {
            border-color: #08b4ac !important;
        }

        button {
            background-color: #08b4ac !important;
            border-color: #08b4ac !important;
        }

        button:hover {
            background-color: #07695d !important;
        }
    </style>
    <!-- sweet alerts -->
    <script src="<?= base_url() ?>/asset/js/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>/asset/css/sweetalert2.min.css">
</head>

<body class=" ">
    <?php
    if (session()->getFlashdata('login')) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Email, Username, atau Password salah',
                footer: '<a href="">Lupa password?</a>'
            })
        </script>
    <?php }
    if (session()->getFlashdata('logout')) { ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Logout Berhasil!'
            })
        </script>
    <?php } ?>