<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>/asset/img/logo.ico" />

    <link rel="stylesheet" href="<?= base_url() ?>/template/backend/html/assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/backend/html/assets/css/backend.css?v=1.0.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="<?= base_url() ?>/asset/js/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>/asset/css/sweetalert2.min.css">

    <!-- style custom -->
    <style>
        nav ul li a span {
            color: #e2f0e8 !important;
        }

        nav ul li span {
            color: #e2f0e8 !important;
        }

        nav ul li a i {
            color: #e2f0e8 !important;
        }

        .active a span {
            color: white !important;
        }

        .hijau-terang {
            color: #e2f0e8 !important;
        }

        .hijau {
            color: #08b4ac !important;
        }

        .btn-sm:hover {
            color: azure !important;
        }

        #loading-overlay {
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 9999;
        }

        .loader {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 16px solid #f3f3f3;
            border-top: 16px solid #3498db;
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="  ">
    <!-- <div id="loading">
        <div id="loading-center">
        </div>
    </div> -->
    <div id="loading-overlay">
        <div class="loader"></div>
    </div>