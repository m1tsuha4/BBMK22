<?php
$xquery = $this->db->query("SELECT * FROM peserta WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
$row = $xquery->row();

$zquery = $this->db->query("SELECT * FROM ukm WHERE id = '" . $row->id_ukm . "'");
$row2 = $zquery->row(); ?>
<ul class="list-group">
    <li class="list-group-item" style="background-color: #C4AECD;">
        <h3 style="color: #3D005D">File Verifikasi</h3>
    </li>
    <li class="list-group-item">

        <p>Ukuran maksimal adalah 200Kb/file </p></br>


        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <div class="inputx">
                <label>File Verifikasi 1 : <?= $row2->syarat1 ?> </label>
                <input type="file" name="fileverif1" placeholder="Pilih file..." class="form-control">
            </div>
            <input type="submit" name="upload1" class="btn" style="background-color: #3D005D; color:white;" value="Upload File Verifikasi 1" style="margin-top: 50px">
        </form>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <div class="inputx">
                <label>File Verifikasi 2 : <?= $row2->syarat2 ?> </label>
                <input type="file" name="fileverif2" placeholder="Pilih file..." class="form-control">
            </div>
            <input type="submit" name="upload2" class="btn" style="background-color: #3D005D; color:white;" value="Upload File Verifikasi 2" style="margin-top: 50px">
        </form>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <div class="inputx">
                <label>File Verifikasi 3 : <?= $row2->syarat3 ?></label>
                <input type="file" name="fileverif3" placeholder="Pilih file..." class="form-control">
            </div>
            <input type="submit" name="upload3" class="btn" style="background-color: #3D005D; color:white;" value="Upload File Verifikasi 3" style="margin-top: 50px">
        </form>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <div class="inputx">
                <label>File Verifikasi 4 : <?= $row2->syarat4 ?></label>
                <input type="file" name="fileverif4" placeholder="Pilih file..." class="form-control">
            </div>
            <input type="submit" name="upload4" class="btn" style="background-color: #3D005D; color:white;" value="Upload File Verifikasi 4" style="margin-top: 50px">
        </form>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <div class="inputx">
                <label>File Verifikasi 5 : <?= $row2->syarat5 ?></label>
                <input type="file" name="fileverif5" placeholder="Pilih file..." class="form-control">
            </div>
            <input type="submit" name="upload5" class="btn" style="background-color: #3D005D; color:white;" value="Upload File Verifikasi 5" style="margin-top: 50px">
        </form>






        <!-- <div class="inputx">
            Keterangan : <button class="btn <?= $btnverif ?>" type="button"><?= $ket ?></button>
        </div> -->
        <?php


        if (isset($_POST["upload1"])) {

            $nama    =    $_FILES["fileverif1"]["name"];
            $ext     =     pathinfo($nama, PATHINFO_EXTENSION);
            $size    =     $_FILES["fileverif1"]["size"];
            $tmp     =     $_FILES["fileverif1"]["tmp_name"];

            $ukm = $row->id_ukm;
            $bp = $this->session->userdata("userBBMK19");
            if ($size <= 207200) {


                $namafile = "file1-" . $bp . "." . $ext;
                $update = $this->db->query("UPDATE peserta SET  fileverif1 = '$namafile' WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
                if ($update) {
                    $upload = move_uploaded_file($tmp, "assets/verif/file1/$ukm/$namafile");

                    $this->alert->pesan("success", "Berhasil...", "File Verifikasi 1 Berhasil Ditambahkan", 1, base_url("/main/home/file"));
                } else {
                    $this->alert->pesan("error", "Gagal...", base_url("/main/home/profile"));
                }
            } else {
                $this->alert->pesan("error", "Gagal...file terlalu besar", base_url("/main/home/profile"));
            }
        }

        if (isset($_POST["upload2"])) {

            $nama    =    $_FILES["fileverif2"]["name"];
            $ext     =     pathinfo($nama, PATHINFO_EXTENSION);
            $size    =     $_FILES["fileverif2"]["size"];
            $tmp     =     $_FILES["fileverif2"]["tmp_name"];

            $ukm = $row->id_ukm;
            $bp = $this->session->userdata("userBBMK19");
            if ($size <= 207200) {


                $namafile = "file2-" . $bp . "." . $ext;
                $update = $this->db->query("UPDATE peserta SET  fileverif2 = '$namafile' WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
                if ($update) {
                    $upload = move_uploaded_file($tmp, "assets/verif/file2/$ukm/$namafile");

                    $this->alert->pesan("success", "Berhasil...", "File Verifikasi 2 Berhasil Ditambahkan", 1, base_url("/main/home/file"));
                } else {
                    $this->alert->pesan("error", "Gagal...");
                }
            } else {
                $this->alert->pesan("error", "Gagal...file terlalu besar");
            }
        }

        if (isset($_POST["upload3"])) {

            $nama    =    $_FILES["fileverif3"]["name"];
            $ext     =     pathinfo($nama, PATHINFO_EXTENSION);
            $size    =     $_FILES["fileverif3"]["size"];
            $tmp     =     $_FILES["fileverif3"]["tmp_name"];

            $ukm = $row->id_ukm;
            $bp = $this->session->userdata("userBBMK19");
            if ($size <= 207200) {


                $namafile = "file3-" . $bp . "." . $ext;
                $update = $this->db->query("UPDATE peserta SET  fileverif3 = '$namafile' WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
                if ($update) {
                    $upload = move_uploaded_file($tmp, "assets/verif/file3/$ukm/$namafile");

                    $this->alert->pesan("success", "Berhasil...", "File Verifikasi 3 Berhasil Ditambahkan", 1, base_url("/main/home/file"));
                } else {
                    $this->alert->pesan("error", "Gagal...");
                }
            } else {
                $this->alert->pesan("error", "Gagal...file terlalu besar");
            }
        }

        if (isset($_POST["upload4"])) {

            $nama    =    $_FILES["fileverif4"]["name"];
            $ext     =     pathinfo($nama, PATHINFO_EXTENSION);
            $size    =     $_FILES["fileverif4"]["size"];
            $tmp     =     $_FILES["fileverif4"]["tmp_name"];

            $ukm = $row->id_ukm;
            $bp = $this->session->userdata("userBBMK19");
            if ($size <= 207200) {


                $namafile = "file4-" . $bp . "." . $ext;
                $update = $this->db->query("UPDATE peserta SET  fileverif4 = '$namafile' WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
                if ($update) {
                    $upload = move_uploaded_file($tmp, "assets/verif/file4/$ukm/$namafile");
                    $this->alert->pesan("success", "Berhasil...", "File Verifikasi 4 Berhasil Ditambahkan", 1, base_url("/main/home/file"));
                }
            } else {
                $this->alert->pesan("error", "Gagal...file terlalu besar");
            }
        }

        if (isset($_POST["upload5"])) {

            $nama    =    $_FILES["fileverif5"]["name"];
            $ext     =     pathinfo($nama, PATHINFO_EXTENSION);
            $size    =     $_FILES["fileverif5"]["size"];
            $tmp     =     $_FILES["fileverif5"]["tmp_name"];

            $ukm = $row->id_ukm;
            $bp = $this->session->userdata("userBBMK19");
            if ($size <= 207200) {


                $namafile = "file5-" . $bp . "." . $ext;
                $update = $this->db->query("UPDATE peserta SET  fileverif5 = '$namafile' WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
                if ($update) {
                    $upload = move_uploaded_file($tmp, "assets/verif/file5/$ukm/$namafile");
                    $this->alert->pesan("success", "Berhasil...", "File Verifikasi 5 Berhasil Ditambahkan", 1, base_url("/main/home/file"));
                } else {
                    $this->alert->pesan("error", "Gagal...");
                }
            } else {
                $this->alert->pesan("error", "Gagal...file terlalu besar");
            }
        }



        ?>
    </li>
    <li class="list-group-item" style="background-color: #C4AECD;">
        <h3 style="color: #3D005D">Cek Hasil Upload</h3>
    </li>
    <li class="list-group-item">
        <?php
        if ($row->fileverif1) {
        ?>
            <div class="inputxx">

                <a class="btn btn-info" href="<?= base_url() ?>admin/downloadfile/<?= $row->id ?>/<?= $row->id_ukm ?>/file1/<?= $row->fileverif1 ?>">Cek Hasil upload 1</a>
            </div></br>
        <?php
        }
        ?>
        <?php
        if ($row->fileverif2 == !"") {
        ?>
            <div class="inputxx">

                <a class="btn btn-info" href="<?= base_url() ?>admin/downloadfile/<?= $row->id ?>/<?= $row->id_ukm ?>/file2/<?= $row->fileverif2 ?>">Cek Hasil upload 2</a>
            </div></br>
        <?php
        }
        ?>
        <?php
        if ($row->fileverif3) {
        ?>
            <div class="inputxx">

                <a class="btn btn-info" href="<?= base_url() ?>admin/downloadfile/<?= $row->id ?>/<?= $row->id_ukm ?>/file3/<?= $row->fileverif3 ?>">Cek Hasil upload 3</a>
            </div></br>
        <?php
        }
        ?>
        <?php
        if ($row->fileverif4) {
        ?>
            <div class="inputxx">

                <a class="btn btn-info" href="<?= base_url() ?>admin/downloadfile/<?= $row->id ?>/<?= $row->id_ukm ?>/file4/<?= $row->fileverif4 ?>">Cek Hasil upload 4</a>
            </div></br>
        <?php
        }
        ?>
        <?php
        if ($row->fileverif5) {
        ?>
            <div class="inputxx">

                <a class="btn btn-info" href="<?= base_url() ?>admin/downloadfile/<?= $row->id ?>/<?= $row->id_ukm ?>/file5/<?= $row->fileverif5 ?>">Cek Hasil upload 5</a>
            </div></br>
        <?php
        }
        ?>
        <label><b> jika file verifikasi masih salah atau terdapat error, silakan upload kembali file yang benar</b></label>
    </li>
</ul>