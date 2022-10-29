 <?php
    $xquery = $this->db->query("SELECT * FROM peserta WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
    $row = $xquery->row();

    $zquery = $this->db->query("SELECT * FROM ukm WHERE id = '" . $row->id_ukm . "'");
    $row2 = $zquery->row();


    $syarat1 = "Tidak ada (Kosongkan)";
    $syarat2 = "Tidak ada (Kosongkan)";
    $syarat3 = "Tidak ada (Kosongkan)";
    $syarat4 = "Tidak ada (Kosongkan)";
    $syarat5 = "Tidak ada (Kosongkan)";

    $btn1 = "disabled";

    $btn2 = "disabled";

    $btn3 = "disabled";

    $btn4 = "disabled";

    $btn5 = "disabled";

    $value1 = "Upload File 1";
    $value2 = "Upload File 2";
    $value3 = "Upload File 3";
    $value4 = "Upload File 4";
    $value5 = "Upload File 5";

    if ($row2->syarat1 != null) {
        $syarat1 = $row2->syarat1;
        $btn1 = "";
    }
    if ($row2->syarat2 != null) {
        $syarat2 = $row2->syarat2;
        $btn2 = "";
    }
    if ($row2->syarat3 != null) {
        $syarat3 = $row2->syarat3;
        $btn3 = "";
    }
    if ($row2->syarat4 != null) {
        $syarat4 = $row2->syarat4;
        $btn4 = "";
    }
    if ($row2->syarat5 != null) {
        $syarat5 = $row2->syarat5;
        $btn5 = "";
    }

    if ($row->fileverif1 != null) {
        $btn1 = "enabled";
        $value1 = "Upload Kembali";
    }
    if ($row->fileverif2 != null) {
        $btn2 = "enabled";
        $value2 = "Upload Kembali";
    }
    if ($row->fileverif3 != null) {
        $btn3 = "enabled";
        $value3 = "Upload Kembali";
    }
    if ($row->fileverif4 != null) {
        $btn4 = "enabled";
        $value4 = "Upload Kembali";
    }
    if ($row->fileverif5 != null) {
        $btn5 = "enabled";
        $value5 = "Upload Kembali";
    }




    ?>




 <!-- ===== PAGE CONTENT ===== -->

 <div class="container-fluid">
     <form action="" method="post" enctype="multipart/form-data">
         <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
         <div class="row">
             <div class="col mt-4 ms-4 syarat-peserta">
                 <h3>File Verifikasi 1 : <?= $syarat1 ?></h3>
                 <div class="col-4">
                     <div class="input-group mt-4 mb-3">
                         <input type="file" name="fileverif1" class="form-control" id="inputGroupFile01">
                     </div>
                     <input <?= $btn1; ?> name="upload1" value="<?= $value1; ?>" type="submit" class="btn btnForm btnForm-edit mt-5">
                     <p>*Ukuran file tidak boleh lebih dari 200kb</p>
                     <?php
                        if ($row->fileverif1 != null) { ?>
                         <a href="<?= base_url() ?>admin/downloadfile/<?= $row->id ?>/<?= $row->id_ukm ?>/file1/<?= $row->fileverif1 ?>">
                             <span class="badge bg-success">Download File 1</span>
                         </a>
                     <?php }
                        ?>
                 </div>
             </div>
         </div>
     </form>
     <form action="" method="post" enctype="multipart/form-data">
         <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
         <div class="row">
             <div class="col mt-4 ms-4 syarat-peserta">
                 <h3>File Verifikasi 2 : <?= $syarat2 ?> </h3>
                 <div class="col-4">
                     <div class="input-group mt-4 mb-3">
                         <input type="file" name="fileverif2" class="form-control" id="inputGroupFile01">
                     </div>
                     <input name="upload2" <?= $btn2; ?> value="<?= $value2; ?>" type="submit" class="btn btnForm btnForm-edit mt-5">
                     <p>*Ukuran file tidak boleh lebih dari 200kb</p>
                     <?php
                        if ($row->fileverif2 != null) { ?>
                         <a href="<?= base_url() ?>admin/downloadfile/<?= $row->id ?>/<?= $row->id_ukm ?>/file2/<?= $row->fileverif2 ?>">
                             <span class="badge bg-success">Download File 2</span>
                         </a>
                     <?php }
                        ?>
                 </div>
             </div>
         </div>
     </form>
     <form action="" method="post" enctype="multipart/form-data">
         <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
         <div class="row">
             <div class="col mt-4 ms-4 syarat-peserta">
                 <h3>File Verifikasi 3 : <?= $syarat3 ?> </h3>
                 <div class="col-4">
                     <div class="input-group mt-4 mb-3">
                         <input type="file" name="fileverif3" class="form-control" id="inputGroupFile01">
                     </div>
                     <input <?= $btn3; ?> name="upload3" value="<?= $value3; ?>" type="submit" class="btn btnForm btnForm-edit mt-5">
                     <p>*Ukuran file tidak boleh lebih dari 200kb</p>
                     <?php
                        if ($row->fileverif3 != null) { ?>
                         <a href="<?= base_url() ?>admin/downloadfile/<?= $row->id ?>/<?= $row->id_ukm ?>/file3/<?= $row->fileverif3 ?>">
                             <span class="badge bg-success">Download File 3</span>
                         </a>
                     <?php }
                        ?>
                 </div>
             </div>
         </div>
     </form>
     <form action="" method="post" enctype="multipart/form-data">
         <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
         <div class="row">
             <div class="col mt-4 ms-4 syarat-peserta">
                 <h3>File Verifikasi 4 : <?= $syarat4 ?> </h3>
                 <div class="col-4">
                     <div class="input-group mt-4 mb-3">
                         <input type="file" name="fileverif4" class="form-control" id="inputGroupFile01">
                     </div>
                     <input <?= $btn4; ?> name="upload4" value="<?= $value4; ?>" type="submit" class="btn btnForm btnForm-edit mt-5">
                     <p>*Ukuran file tidak boleh lebih dari 200kb</p>
                     <?php
                        if ($row->fileverif4 != null) { ?>
                         <a href="<?= base_url() ?>admin/downloadfile/<?= $row->id ?>/<?= $row->id_ukm ?>/file4/<?= $row->fileverif4 ?>">
                             <span class="badge bg-success">Download File 4</span>
                         </a>
                     <?php }
                        ?>
                 </div>
             </div>
         </div>
     </form>
     <form action="" method="post" enctype="multipart/form-data">
         <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
         <div class="row">
             <div class="col mt-4 ms-4 syarat-peserta">
                 <h3>File Verifikasi 5 : <?= $syarat5 ?> </h3>
                 <div class="col-4">
                     <div class="input-group mt-4 mb-3">
                         <input type="file" name="fileverif5" class="form-control" id="inputGroupFile01">
                     </div>
                     <input <?= $btn5; ?> name="upload5" value="<?= $value5; ?>" type="submit" class="btn btnForm btnForm-edit mt-5 mb-5">
                     <p>*Ukuran file tidak boleh lebih dari 200kb</p>
                     <?php
                        if ($row->fileverif5 != null) { ?>
                         <a href="<?= base_url() ?>admin/downloadfile/<?= $row->id ?>/<?= $row->id_ukm ?>/file5/<?= $row->fileverif5 ?>">
                             <span class="badge bg-success">Download File 5</span>
                         </a>
                     <?php }
                        ?>
                 </div>
             </div>
         </div>
     </form>



 </div>
 <?php


    if (isset($_POST["upload1"])) {

        $nama    =    $_FILES["fileverif1"]["name"];
        $ext     =     pathinfo($nama, PATHINFO_EXTENSION);
        $size    =     $_FILES["fileverif1"]["size"];
        $tmp     =     $_FILES["fileverif1"]["tmp_name"];

        $ukm = $row->id_ukm;
        $bp = $this->session->userdata("userBBMK19");
        if (($size <= 207200) and ($size != 0)) {


            $namafile = "file1-" . $bp . "." . $ext;
            $update = $this->db->query("UPDATE peserta SET  fileverif1 = '$namafile' WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
            if ($update) {
                $upload = move_uploaded_file($tmp, "assets/verif/file1/$ukm/$namafile");

                $this->alert->msg("success", "Berhasil...", "File Verifikasi 1 Berhasil Ditambahkan", 1, base_url("/main/home/syaratdaftar"));
            } else {
                $this->alert->msg("error", "Gagal...", base_url("/main/home/profile"));
            }
        } else {
            $this->alert->msg("error", "Gagal...file terlalu besar atau tidak ada ");
        }
    }

    if (isset($_POST["upload2"])) {

        $nama    =    $_FILES["fileverif2"]["name"];
        $ext     =     pathinfo($nama, PATHINFO_EXTENSION);
        $size    =     $_FILES["fileverif2"]["size"];
        $tmp     =     $_FILES["fileverif2"]["tmp_name"];

        $ukm = $row->id_ukm;
        $bp = $this->session->userdata("userBBMK19");
        if (($size <= 207200) and ($size != 0)) {


            $namafile = "file2-" . $bp . "." . $ext;
            $update = $this->db->query("UPDATE peserta SET  fileverif2 = '$namafile' WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
            if ($update) {
                $upload = move_uploaded_file($tmp, "assets/verif/file2/$ukm/$namafile");

                $this->alert->msg("success", "Berhasil...", "File Verifikasi 2 Berhasil Ditambahkan", 1, base_url("/main/home/syaratdaftar"));
            } else {
                $this->alert->msg("error", "Gagal...");
            }
        } else {
            $this->alert->msg("error", "Gagal...file terlalu besar atau tidak ada ");
        }
    }

    if (isset($_POST["upload3"])) {

        $nama    =    $_FILES["fileverif3"]["name"];
        $ext     =     pathinfo($nama, PATHINFO_EXTENSION);
        $size    =     $_FILES["fileverif3"]["size"];
        $tmp     =     $_FILES["fileverif3"]["tmp_name"];

        $ukm = $row->id_ukm;
        $bp = $this->session->userdata("userBBMK19");
        if (($size <= 207200) and ($size != 0)) {


            $namafile = "file3-" . $bp . "." . $ext;
            $update = $this->db->query("UPDATE peserta SET  fileverif3 = '$namafile' WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
            if ($update) {
                $upload = move_uploaded_file($tmp, "assets/verif/file3/$ukm/$namafile");

                $this->alert->msg("success", "Berhasil...", "File Verifikasi 3 Berhasil Ditambahkan", 1, base_url("/main/home/syaratdaftar"));
            } else {
                $this->alert->msg("error", "Gagal...");
            }
        } else {
            $this->alert->msg("error", "Gagal...file terlalu besar atau tidak ada ");
        }
    }

    if (isset($_POST["upload4"])) {

        $nama    =    $_FILES["fileverif4"]["name"];
        $ext     =     pathinfo($nama, PATHINFO_EXTENSION);
        $size    =     $_FILES["fileverif4"]["size"];
        $tmp     =     $_FILES["fileverif4"]["tmp_name"];

        $ukm = $row->id_ukm;
        $bp = $this->session->userdata("userBBMK19");
        if (($size <= 207200) and ($size != 0)) {


            $namafile = "file4-" . $bp . "." . $ext;
            $update = $this->db->query("UPDATE peserta SET  fileverif4 = '$namafile' WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
            if ($update) {
                $upload = move_uploaded_file($tmp, "assets/verif/file4/$ukm/$namafile");
                $this->alert->msg("success", "Berhasil...", "File Verifikasi 4 Berhasil Ditambahkan", 1, base_url("/main/home/syaratdaftar"));
            }
        } else {
            $this->alert->msg("error", "Gagal...file terlalu besar atau tidak ada ");
        }
    }

    if (isset($_POST["upload5"])) {

        $nama    =    $_FILES["fileverif5"]["name"];
        $ext     =     pathinfo($nama, PATHINFO_EXTENSION);
        $size    =     $_FILES["fileverif5"]["size"];
        $tmp     =     $_FILES["fileverif5"]["tmp_name"];

        $ukm = $row->id_ukm;
        $bp = $this->session->userdata("userBBMK19");
        if (($size <= 207200) and ($size != 0)) {


            $namafile = "file5-" . $bp . "." . $ext;
            $update = $this->db->query("UPDATE peserta SET  fileverif5 = '$namafile' WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
            if ($update) {
                $upload = move_uploaded_file($tmp, "assets/verif/file5/$ukm/$namafile");
                $this->alert->msg("success", "Berhasil...", "File Verifikasi 5 Berhasil Ditambahkan", 1, base_url("/main/home/syaratdaftar"));
            } else {
                $this->alert->msg("error", "Gagal...");
            }
        } else {
            $this->alert->msg("error", "Gagal...file terlalu besar atau tidak ada ");
        }
    }



    ?>