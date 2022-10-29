<?php
$query = $this->db->query("SELECT * FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'");
$data = $query->row(); ?>
<!-- ===== PAGE CONTENT ===== -->
<img src="<?= base_url(); ?>/assets3/img/bg.png" alt="" class="bg-content">
<div class="container-fluid">
    <div class="row mt-5 text-center materi-head">
        <h2>MATERI BBMK UKM NEO TELEMETRI</h2>
    </div>
    <div class="col-md-6 offset-md-3 form-regis text-center edit-profile">
        <div class="row row-cols-1 row-cols-md-2 g-4  content-materi">
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="col">
                    <div class="card card-materi">
                        <img src="<?= base_url(); ?>/assets3/img/ppt-logo.png" class="card-img-top" alt="Upload Materi BBMK">
                        <div class="card-body">
                            <h5 class="card-title">Upload materi</h5>
                            <form action="" method="">
                                <div class="form-floating mb-2">
                                    <input type="text" name="namafile" class="form-control" id="inputMotto" placeholder="nama file" />
                                    <label for="inputWebsite" class="form-label form-label-edit">Nama File</label>
                                </div>
                                <div class="input-group mb-2">
                                    <input type="file" name="filemateri" class="form-control photo-upload" id="inputGroupFile01">
                                </div>
                                <button type="submit" name="upload1" class="btn btnForm btnForm-edit btn-materi">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-5 text-center materi-head">
        <h2>File sudah diupload</h2>
    </div>
    <div class="col-md-6 offset-md-3 form-regis text-center edit-profile">
        <div class="row row-cols-1 row-cols-md-2 g-4  content-materi">
            <?php
            $mquery = $this->db->query("SELECT * FROM filemateri WHERE id_ukm = '$data->id'");
            foreach ($mquery->result() as $key) {
            ?>
                <div class="col">
                    <div class="card card-materi">
                        <img src="<?= base_url(); ?>/assets3/img/ppt-logo.png" class="card-img-top" alt="Upload Materi BBMK">
                        <div class="card-body">
                            <h5 class="card-title"><?= $key->namafile ?></h5>
                            <a href="<?= base_url() ?>main/downloadfile/<?= $data->id ?>/<?= $key->id ?>"><button class="btn">Download</button></a>
                            <form method="post" onsubmit="return confirm('Hapus file ini ?')">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <button type="submit" name="hapus<?= $key->id ?>" class="btn btnForm btnForm-edit btn-materi mt-4">Hapus</button>
                            </form>

                        </div>
                    </div>
                </div>
            <?php
                if (isset($_POST["hapus" . $key->id])) {
                    $delete = $this->db->query("DELETE FROM filemateri WHERE id = '" . $key->id . "'");
                    if ($delete) {
                        $this->alert->pesan("success", "Materi berhasil dihapus", "", 1, base_url("/admin/materi"));
                    } else {
                        $this->alert->pesan("error", "Gagal");
                    }
                }
            }
            ?>
            </form>
        </div>

        <?php

        if (isset($_POST["upload1"])) {
            $namafiles =    $_POST["namafile"];

            $nama    =    $_FILES["filemateri"]["name"];
            $ext     =     pathinfo($nama, PATHINFO_EXTENSION);
            $size    =     $_FILES["filemateri"]["size"];
            $tmp     =     $_FILES["filemateri"]["tmp_name"];

            // if ($ext == "jpg" or $ext == "JPG" or $ext == "png" or $ext == "PNG") {
            if (($size <= 2007200) and ($size != 0)) {
                $idukm = $data->id;
                $letakfile = $namafiles . '-' . $idukm . '.' . $ext;
                $kirim = $this->db->query("INSERT INTO filemateri(id_ukm, namafile, letakfile) VALUES('$idukm', '$namafiles', '$letakfile')");

                if ($kirim) {
                    $upload = move_uploaded_file($tmp, "assets/filemateri/$idukm/$letakfile");
                    $this->alert->pesan("success", "Materi berhasil diupload", "", 1, base_url("/admin/materi"));
                } else {
                    $this->alert->pesan("error", "Gagal...");
                }
            } else {
                $this->alert->pesan("error", "Gagal File melebihi 2 Mb atau tidak ada...");
            }
        }
        // }



        if (@$update == "berhasil") {
            $this->alert->pesan("success", "Berhasil...", "Dokumentasi tersimpan");
        } else if (@$update == "gagal") {
            $this->alert->pesan("error", "Oops...", "Gagal disimpan");
        } ?>