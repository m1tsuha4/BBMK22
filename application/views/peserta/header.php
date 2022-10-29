<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard Peserta | BBMK 2021</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets3/img/logo-icon.jpg" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link href="<?= base_url(); ?>assets3/peserta/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets3/css/style.css" />
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end flex-nowrap d-inline-block sidebar-dashboard" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom sidebar-head-text">Dashboard peserta</div>
            <div class="list-group list-group-flush list-group-color">
                <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3" href="<?= base_url(); ?>main/"><i class="uil uil-estate icon-dashboard"></i>&emsp;Beranda</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3" href="<?= base_url(); ?>main/home/news"><i class="uil uil-diary-alt icon-dashboard"></i>&emsp;News</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3" href="<?= base_url(); ?>main/home/profile"><i class="uil uil-edit icon-dashboard"></i>&emsp;Edit Profile</a>
                <!-- <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3" href="pilih-ukm.html"><i class="uil uil-users-alt icon-dashboard"></i>&emsp;Pilih UKM</a> -->
                <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3" href="<?= base_url(); ?>main/home/syaratdaftar"><i class="uil uil-exclamation-triangle icon-dashboard"></i>&emsp;Syarat Daftar Ulang</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3" href="<?= base_url(); ?>main/home/statuspeserta"><i class="uil uil-inbox icon-dashboard"></i>&emsp;Status Peserta</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3 " href="<?= base_url(); ?>main/home/jadwal"><i class="uil uil-schedule icon-dashboard"></i>&emsp;Jadwal BBMK</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3" href="<?= base_url(); ?>main/home/materi"><i class="uil uil-diary-alt icon-dashboard"></i>&emsp;Materi BBMK</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3" href="<?= base_url(); ?>main/logout"><i class="uil uil-signin icon-dashboard"></i>&emsp;Keluar</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <?php
        $query = $this->db->query("SELECT * FROM peserta WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
        $key = $query->row();
        ?>
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light navbar-dashboard">
                <div class="container-fluid">
                    <button class="btn btn-dashboard" id="sidebarToggle"><i class="uil uil-schedule icon-navbar"></i>&ensp;Halaman Peserta BBMK</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $key->nama; ?></a>
                                <div class="dropdown-menu dropdown-menu-dash dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item dropdown-item-dash" href="<?= base_url(); ?>main/logout"><i class="uil uil-signin"></i>&ensp;Keluar</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>