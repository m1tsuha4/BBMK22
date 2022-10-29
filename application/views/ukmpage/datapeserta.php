<?php
$query = $this->db->query("SELECT * FROM peserta  WHERE id = '$pid'");
$key = $query->row();

$status1 = "Belum diisi";
$status2 = "Belum diisi";
$status3 = "Belum diisi";

if ($key->stat_reg == 1) {
    $status1 = "Sudah Diverifikasi";
    $btnreg = "bg-success";
} else if ($key->stat_reg == 2) {
    $status1 = "Tidak Lulus";
    $btnreg = "bg-danger";
} else {
    $status1 = "Belum diverifikasi";
    $btnreg = "bg-danger";
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
                    <td>Kelulusan</td>
                    <td>&emsp; : &emsp; <span class="badge <?= $btnlulus ?>"><?= $status2 ?></span></td>
                </tr>
                <?php if ($key->fileverif1 != null) { ?>
                    <tr>
                        <td><?= $ukmque->syarat1 ?></td>
                        <td> <a href="<?= base_url() ?>admin/downloadfile/<?= $key->id ?>/<?= $key->id_ukm ?>/file1/<?= $key->fileverif1 ?>">
                                <span class="badge bg-success">Download File 1</span>
                            </a></td>
                    </tr>
                <?php
                }
                ?>
                <?php if ($key->fileverif2) { ?>
                    <tr>
                        <td><?= $ukmque->syarat2 ?></td>
                        <td> <a href="<?= base_url() ?>admin/downloadfile/<?= $key->id ?>/<?= $key->id_ukm ?>/file2/<?= $key->fileverif2 ?>">
                                <span class="badge bg-success">Download File 2</span>
                            </a></td>
                    </tr>
                <?php
                }
                ?>
                <?php if ($key->fileverif3) { ?>
                    <tr>
                        <td><?= $ukmque->syarat3 ?></td>
                        <td> <a href="<?= base_url() ?>admin/downloadfile/<?= $key->id ?>/<?= $key->id_ukm ?>/file3/<?= $key->fileverif3 ?>">
                                <span class="badge bg-success">Download File 3</span>
                            </a></td>
                    </tr>
                <?php
                }
                ?>
                <?php if ($key->fileverif4) { ?>
                    <tr>
                        <td><?= $ukmque->syarat4 ?></td>
                        <td> <a href="<?= base_url() ?>admin/downloadfile/<?= $key->id ?>/<?= $key->id_ukm ?>/file4/<?= $key->fileverif4 ?>">
                                <span class="badge bg-success">Download File 4</span>
                            </a></td>
                    </tr>
                <?php
                }
                ?>
                <?php if ($key->fileverif5) { ?>
                    <tr>
                        <td><?= $ukmque->syarat5 ?></td>
                        <td> <a href="<?= base_url() ?>admin/downloadfile/<?= $key->id ?>/<?= $key->id_ukm ?>/file5/<?= $key->fileverif5 ?>">
                                <span class="badge bg-success">Download File 5</span>
                            </a></td>
                    </tr>
                <?php
                }
                ?>
                <?php if ($key->sertifikat) { ?>
                    <tr>
                        <td>Download Sertifikat</td>
                        <td> <a href="<?= base_url() ?>admin/downloadsertif/<?= $key->id ?>/<?= $key->id_ukm ?>/<?= $key->sertifikat ?>">
                                <span class="badge bg-success">Sertifikat</span>
                            </a></td>
                    </tr>
                <?php
                }
                ?>


            </table>
            <div class="row mt-4">
                <h4>Upload Sertifikat Peserta </h4>
            </div>
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="input-group">
                    <input type="file" name="sertifikat" class="form-control photo-upload" id="inputGroupFile01">
                    <input type="submit" name="sertif" value="Upload" class="btn btnForm btnForm-edit">
                </div>
            </form>
            <?php
            if (isset($_POST["sertif"])) {
                $namafiles =    "Sertifikat-" . $key->nobp;

                $nama    =    $_FILES["sertifikat"]["name"];
                $ext     =     pathinfo($nama, PATHINFO_EXTENSION);
                $size    =     $_FILES["sertifikat"]["size"];
                $tmp     =     $_FILES["sertifikat"]["tmp_name"];

                // if ($ext == "jpg" or $ext == "JPG" or $ext == "png" or $ext == "PNG") {
                if (($size <= 2007200) and ($size != 0)) {
                    $idukm = $key->id_ukm;
                    $letakfile = $namafiles . '-' . $idukm . '.' . $ext;
                    $update = $this->db->query("UPDATE peserta SET sertifikat = '$letakfile'  WHERE nobp = '" . $key->nobp . "'");

                    if ($update) {
                        $upload = move_uploaded_file($tmp, "assets/file-sertifikat/$idukm/$letakfile");
                        $this->alert->pesan("success", "Materi berhasil diupload", "", 1, base_url("/admin/sertifikat"));
                    } else {
                        $this->alert->pesan("error", "Gagal...");
                    }
                } else {
                    $this->alert->pesan("error", "Gagal File melebihi 2 Mb atau tidak ada...");
                }
            }
            ?>
        </div>
    </div>
</div>
</div>
</div>