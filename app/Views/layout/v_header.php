<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>/asset/img/logo.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/slicknav.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/gijgo.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/animated-headline.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/slick.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url('template/frontend/') ?>assets/css/style.css">

    <!-- aos -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- hijau primary background-color: #08b4ac !important; -->
    <!-- hijau btn #07847e; -->
    <!-- hijau a hover  #07695d-->

    <!-- sweet alerts -->
    <script src="<?= base_url() ?>/asset/js/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>/asset/css/sweetalert2.min.css">

    <style>
        .swal2-container .swal2-popup .nice-select {
            display: none;
        }

        @media (min-width: 991px) {
            #login {
                display: none !important;
            }
        }
    </style>

</head>

<body>

    <?php if (session()->getFlashdata('login')) { ?>
        <script>
            // alerttt();
            // alert('login berhasil')
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
                title: '<?= session()->getFlashdata('login') ?>'
            })
            // Swal.fire('Any fool can use a computer')
        </script>
    <?php } ?>