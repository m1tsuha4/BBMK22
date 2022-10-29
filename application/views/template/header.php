<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/template/css/style.css">
    <link href="<?= base_url(); ?>assets/tmp/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>


    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url(); ?>assets/logo/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url(); ?>assets/logo/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/logo/favicon-16x16.png">
    <link rel="manifest" href="<?= base_url(); ?>assets/logo/site.webmanifest">
    <link rel="mask-icon" href="<?= base_url(); ?>assets/logo/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    <!-- Plugin CSS -->
    <link href="<?= base_url(); ?>assets/tmp/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url(); ?>assets/tmp/css/creative.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/sweetalert2.min.css">
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/sweetalert2.min.js"></script>
    <title>BBMK 2021</title>
</head>

<?php
$query = $this->db->query("SELECT * FROM ukm");
?>

<body>
    <!-- Pembuka Navigasi -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light landing">
        <div class="container-fluid">
            <a class="navbar-brand nav-a" href="#">
                <img src="<?= base_url() ?>/assets/img/logo-bbmk/Unand.png" id="Unand">
                <img src="<?= base_url() ?>/assets/img/logo-bbmk/logo.png" id="BBMK">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav nav-ul">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>#about">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>#alur">ALUR</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>#savedate">TIMELINE</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="landingpage.html#ukm" role="button" aria-expanded="false">UKM</a>
                        <ul class="dropdown-menu">
                            <?php
                            foreach ($query->result() as $ukm) {
                            ?>
                                <li><a class="dropdown-item" href="<?= base_url() ?>main/ukm/<?= $ukm->username ?>"><?= $ukm->nama ?> </a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item" id="AC">
                        <a class="nav-link" href="<?= base_url() ?>#cekakun"">ACCOUNT CHECK</a>
                    </li>
                    <li class=" nav-item">
                            <a class="nav-link" href="<?= base_url() ?>main/login">LOGIN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Penutup Navigasi -->