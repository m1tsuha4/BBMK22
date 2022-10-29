<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard UKM | BBMK 2021</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets3/img/logo-icon.jpg" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link href="<?= base_url(); ?>assets3/ukm/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets3/css/style.css" />

</head>
<?php
$query = $this->db->query("SELECT nama, logo, kuota, total FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'");
$data = $query->row();
?>

<body>
    <div class="d-flex " id="wrapper">
        <!-- Sidebar-->
        <div class="border-end flex-nowrap d-inline-block sidebar-dashboard" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom sidebar-head-text">Dashboard UKM</div>
            <div class="list-group list-group-flush list-group-color">
                <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3" href="<?= base_url(); ?>"><i class="uil uil-estate icon-dashboard"></i>&emsp;Beranda</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3" href="<?= base_url(); ?>admin/profile"><i class="uil uil-edit icon-dashboard"></i>&emsp;Edit Profile</a>
                <!-- <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3" href="jadwal-admin.html"><i class="uil uil-schedule icon-dashboard"></i>&emsp;Jadwal BBMK</a> -->
                <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3" href="<?= base_url(); ?>admin/notif"><i class="uil uil-chat-info icon-dashboard"></i>&emsp;Pemberitahuan</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3" href="<?= base_url(); ?>admin/statistik"><i class="uil uil-user-exclamation icon-dashboard"></i>&emsp;Statistik BBMK</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3" href="<?= base_url(); ?>admin/peserta"><i class="uil uil-users-alt icon-dashboard"></i>&emsp;Semua Peserta BBMK</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3" href="<?= base_url(); ?>admin/peserta/verifikasi"><i class="uil uil-user-check icon-dashboard"></i>&emsp;Peserta Sudah Diverifikasi</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3" href="<?= base_url(); ?>admin/peserta/belumdiverifikasi"><i class="uil uil-user-minus icon-dashboard"></i>&emsp;Peserta Belum Diverifikasi</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3" href="<?= base_url(); ?>admin/peserta/tidakdiverifikasi"><i class="uil uil-user-times icon-dashboard"></i>&emsp;Peserta Tidak Diverifikasi</a>
                <!-- <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3" href="<?= base_url(); ?>admin/verifikasi"><i class="uil uil-comment-check icon-dashboard"></i>&emsp;Verifikasi Peserta</a> -->
                <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3" href="<?= base_url(); ?>admin/kehadiran"><i class="uil uil-user-exclamation icon-dashboard"></i>&emsp;Kehadiran BBMK</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3" href="<?= base_url(); ?>admin/daftarhadir"><i class="uil uil-user-exclamation icon-dashboard"></i>&emsp;Daftar Kehadiran BBMK</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3" href="<?= base_url(); ?>admin/materi"><i class="uil uil-diary-alt icon-dashboard"></i>&emsp;Materi BBMK</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3" href="<?= base_url(); ?>admin/kelulusanpeserta"><i class="uil uil-user-check icon-dashboard"></i>&emsp;Kelulusan Peserta</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3" href="<?= base_url(); ?>admin/sertifikat"><i class="uil uil-files-landscapes-alt icon-dashboard"></i>&emsp; Sertifikat Peserta</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-2 ps-3" href="<?= base_url(); ?>admin/logout"><i class="uil uil-signin icon-dashboard"></i>&emsp;Keluar</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light navbar-dashboard">
                <div class="container-fluid">
                    <button class="btn btn-dashboard" id="sidebarToggle"><i class="uil uil-chat-info icon-navbar"></i>&ensp; Menu UKM</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $data->nama; ?></a>
                                <div class="dropdown-menu dropdown-menu-dash" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item dropdown-item-dash" href="<?= base_url(); ?>admin/logout"><i class="uil uil-signin"></i>&ensp;Keluar</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>