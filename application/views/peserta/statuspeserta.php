<?php
$query = $this->db->query("SELECT * FROM peserta WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
$key = $query->row();
$msg = "";

if ($key->stat_reg == 1) {
    $status1 = "Sudah Diverifikasi";
    $btnreg = "bg-success";
    $msg = "Selamat Anda sudah diverifikasi";
} else if ($key->stat_reg == 2) {
    $status1 = "Tidak Diverifikasi";
    $btnreg = "bg-danger";
    $msg = "Lengkapi profile dan syarat pendaftaran segera";
} else {
    $status1 = "Belum diverifikasi";
    $btnreg = "bg-warning";
    $msg = "Akun Anda akan dicek segera";
}

if ($key->kelulusan == 1) {
    $status2 = "Lulus";
    $btnlulus = "bg-success";
} else if ($key->kelulusan == 2) {
    $status2 = "Tidak Lulus";
    $btnlulus = "bg-danger";
} else {
    $status2 = "Belum diisi";
    $btnlulus = "bg-danger";
}


$hadirhari1 = "Tidak Hadir";
$hadirhari2 = "Tidak Hadir";

$hadirhari3 = "Tidak Hadir";

$hadirhari4 = "Tidak Hadir";


if ($key->hadir1 == "1") {
    $hadirhari1 = "Hadir";
}
if ($key->hadir2 == "1") {
    $hadirhari2 = "Hadir";
}
if ($key->hadir3 == "1") {
    $hadirhari3 = "Hadir";
}
if ($key->hadir4 == "1") {
    $hadirhari4 = "Hadir";
}



if ($key->fakultas != '0') {

    $jquery = $this->db->query("SELECT * FROM jurusan WHERE id = '$key->jurusan'");
    $jurusanque = $jquery->row();
    $lquery = $this->db->query("SELECT * FROM fakultas WHERE id = '$key->fakultas'");
    $fakultasque = $lquery->row();
    $jurusan = $jurusanque->nama;
    $fakultas = $fakultasque->fakultas;
} else {
    $jurusan = "Belum ada";
    $fakultas = "Belum ada";
}

$mquery = $this->db->query("SELECT * FROM ukm WHERE id = '$key->id_ukm'");
$ukmque = $mquery->row();

if ($key->foto == null) {
    $foto = "assets3/img/unand.png";
} else {
    $foto = "assets/img/profile peserta/" . $key->foto;
}; ?>

<!-- ===== PAGE CONTENT ===== -->
<img src="<?= base_url(); ?>assets3/img/bg.png" alt="" class="bg-content" />
<div class="container-fluid">
    <div class="col-md-6 offset-md-3 text-center mb-5">
        <div class="">
            <div class="d-flex justify-content-center">
                <div class="profile-photo mt-5">
                    <img src="<?= base_url(); ?><?= $foto ?>" alt="Profile Photo" width="200" class="rounded-circle img-thumbnail" />
                </div>
            </div>
            <hr />
            <table class="tabel-status">
                <tr>
                    <td>Nama</td>
                    <td>&emsp; : &emsp;<?= $key->nama; ?></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>&emsp; : &emsp;<?= $key->nobp; ?></td>
                </tr>
                <tr>
                    <td>Fakultas</td>
                    <td>&emsp; : &emsp;<?= $fakultas ?></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>&emsp; : &emsp; <?= $jurusan ?></td>
                </tr>
                <tr>
                    <td>UKM yang dipilih</td>
                    <td>&emsp; : &emsp; <?= $ukmque->nama ?></td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>&emsp; : &emsp;<?= $key->tmp_lahir; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>&emsp; : &emsp;<?= $key->tgl_lahir; ?></td>
                </tr>
                <tr>
                    <td>Hobi</td>
                    <td>&emsp; : &emsp;<?= $key->hobi; ?></td>
                </tr>
                <tr>
                    <td>Motto</td>
                    <td>&emsp; : &emsp;<?= $key->motto; ?></td>
                </tr>
                <tr>
                    <td>No. HP</td>
                    <td>&emsp; : &emsp;<?= $key->hp; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>&emsp; : &emsp;<?= $key->alamat; ?></td>
                </tr>
                <tr>
                    <td>Prestasi</td>
                    <td>&emsp; : &emsp;<?= $key->prestasi; ?></td>
                </tr>
                <tr>
                    <td>Status Verifikasi</td>
                    <td>&emsp; : &emsp; <span class="badge <?= $btnreg ?>"><?= $status1 ?></span></td>

                </tr>
                <tr>
                    <td>Note</td>
                    <td>&emsp; : &emsp;<?= $msg ?></td>
                </tr>

                <?php

                if ($ukmque->timeline1) {
                ?>
                    <tr>
                        <td>Kehadiran 1</td>
                        <td>&emsp; : &emsp; <?= $hadirhari1 ?></td>
                    </tr>
                <?php
                } ?>
                <?php
                if ($ukmque->timeline2) {
                ?>
                    <tr>
                        <td>Kehadiran 2</td>
                        <td>&emsp; : &emsp; <?= $hadirhari2 ?></td>
                    </tr>
                <?php
                }
                ?>
                <?php
                if ($ukmque->timeline3) {
                ?>
                    <tr>
                        <td>Kehadiran 3</td>
                        <td>&emsp; : &emsp; <?= $hadirhari3 ?></td>
                    </tr>
                <?php
                }
                ?>
                <?php
                if ($ukmque->timeline4) {
                ?>
                    <tr>
                        <td>Kehadiran 4</td>
                        <td>&emsp; : &emsp; <?= $hadirhari4 ?></td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td>Kelulusan</td>
                    <td>&emsp; : &emsp; <span class="badge  <?= $btnlulus ?>"><?= $status2 ?></span></td>
                </tr>
                <?php

                if ($key->sertifikat) {
                ?>
                    <tr>
                        <td>Download Sertifikat</td>
                        <td>&emsp; : &emsp; <a href="<?= base_url() ?>main/downloadsertif/<?= $key->id ?>/<?= $key->id_ukm ?>/<?= $key->sertifikat ?>">
                                <span class="badge bg-success">Download</span>
                            </a></td>
                    </tr>
                <?php
                }
                ?>


            </table>
        </div>
    </div>
</div>
</div>
</div>