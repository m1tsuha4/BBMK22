<?php
$query = $this->db->query("SELECT * FROM ukm");
?>

<div class="container mt-5">
    <div class="row" style="margin-top:100px">

        <div class="btn-group">
            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius:0; background-color:#A7978A; color:white">
                Pengumuman Peserta
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= base_url(); ?>main/stat/pengumuman/1">Peserta Lulus</a></li>
                <li><a class="dropdown-item" href="<?= base_url(); ?>main/stat/pengumuman/2">Peserta Tidak Lulus</a></li>
                <li><a class="dropdown-item" href="<?= base_url(); ?>main/stat/pengumuman/0">Peserta Belum Lulus</a></li>
            </ul>
            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius:0; background-color:#A7978A; color:white">
                Statistik Peserta
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= base_url(); ?>main/stat/tahun">Peserta Tahun Ke Tahun</a></li>
                <li><a class="dropdown-item" href="<?= base_url(); ?>main/stat/fakultas">Fakultas</a></li>

            </ul>
            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius:0; background-color:#A7978A; color:white">
                Statistik UKM
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= base_url(); ?>main/stat/ukmpage">Secara Umum</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <?php
                foreach ($query->result() as $ukm) {
                ?>
                    <li><a class="dropdown-item" href="<?= base_url() ?>main/stat/ukm/<?= $ukm->username ?>"><?= $ukm->nama ?> </a></li>
                <?php
                }
                ?>
            </ul>

        </div>


    </div>