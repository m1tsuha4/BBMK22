<!DOCTYPE html>
<html lang="en">

<head>
    <!-- aseet sebelumnya -->

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/template/css/style.css"> -->
    <link href="<?= base_url(); ?>assets/tmp/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://anijs.github.io/lib/anicollection/anicollection.css" />
    <!--  -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets3/css/style.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets3/css/responsive.css" />
    <link rel="icon" href="<?= base_url(); ?>assets3/img/logo-icon.jpg" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <title>BBMK 2021</title>
</head>
<?php
$query = $this->db->query("SELECT * FROM ukm");
?>

<body>
    <!-- ===== NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>">
                <img src="<?= base_url(); ?>assets3/img/unand.png" alt="" width="40" height="40" />
            </a>
            <a class="navbar-brand" href="<?= base_url(); ?>">
                <img src="<?= base_url(); ?>assets3/img/bbmk.png" alt="" width="180" height="35" />
            </a>
            <!-- <a class="navbar-brand" href="<?= base_url(); ?>main20">
                <img src="<?= base_url() ?>/assets/img/logo-bbmk/logo.png" id="BBMK" alt="" width="180" height="35">
            </a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active active-link" href="<?= base_url() ?>">BBMK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active active-link" href="<?= base_url() ?>main/stat">Statistik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active active-link" href="<?= base_url() ?>main">BERANDA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url() ?>main/#alur">ALUR</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url() ?>main/#linimasa">LINIMASA</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> UKM </a>
                        <ul class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                            <?php
                            foreach ($query->result() as $ukm) {
                            ?>
                                <li><a class="dropdown-item" href="<?= base_url() ?>main/ukm/<?= $ukm->username ?>"><?= $ukm->nama ?> </a></li>
                            <?php
                            }
                            ?>
                            <!-- <li><a class="dropdown-item" href="ukm/ukm.html">Neo Telemetri</a></li>
                            <li><a class="dropdown-item" href="#">Unit Kegiatan Olahraga</a></li>
                            <li><a class="dropdown-item" href="#">Pengenalan Hukum dan Politik</a></li>
                            <li><a class="dropdown-item" href="#">Pandekar </a></li>
                            <li><a class="dropdown-item" href="#">PIKMAG </a></li>
                            <li><a class="dropdown-item" href="#">Unit Kegiatan Seni</a></li>
                            <li><a class="dropdown-item" href="#">UKM Penalaran</a></li>
                            <li><a class="dropdown-item" href="#">PIKA </a></li>
                            <li><a class="dropdown-item" href="#">Andalas Sinematografi </a></li>
                            <li><a class="dropdown-item" href="#">Resimen Mahasiswa</a></li>
                            <li><a class="dropdown-item" href="#">Pramuka Unand </a></li>
                            <li><a class="dropdown-item" href="#">HIPMI PT UNAND </a></li>
                            <li><a class="dropdown-item" href="#">FKI Rabbani </a></li>
                            <li><a class="dropdown-item" href="#">KOSBEMA UNAND </a></li>
                            <li><a class="dropdown-item" href="#">MAPALA UNAND </a></li>
                            <li><a class="dropdown-item" href="#">KOPMA Unand </a></li>
                            <li><a class="dropdown-item" href="#">AIESEC </a></li>
                            <li><a class="dropdown-item" href="#">KSR PMI Unit UNAND </a></li>
                            <li><a class="dropdown-item" href="#">Genta Andalas </a></li> -->
                        </ul>
                    </li>
                </ul>
                <!-- <a href="<?= base_url() ?>main/daftar">
                    <button class="btn btnNav-d" type="button">
                        Daftar
                    </button>
                </a> -->
                <a href="<?= base_url() ?>main/login">
                    <button class="btn ms-3 btnNav-m" type="button">
                        Masuk
                    </button>
                </a>
            </div>
        </div>
    </nav>
    <!-- ===== AKHIR NAVBAR ===== -->