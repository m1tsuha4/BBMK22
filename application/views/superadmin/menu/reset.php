<?php
$query = $this->db->query("SELECT * FROM peserta WHERE nobp = $status");
$key = $query->row();

$xquery = $this->db->query("SELECT * FROM ukm WHERE id = $key->id_ukm");
$ukm = $xquery->row();

if ($key->foto == null) {
    $foto = "assets3/img/unand.png";
} else {
    $foto = "assets/img/profile peserta/" . $key->foto;
}; ?>
<!-- ===== PAGE CONTENT ===== -->
<!-- <img src="<?= base_url(); ?>assets3/img/bg.png" alt="" class="bg-content"> -->
<div class="container-fluid">
    <div class="col-md-6 offset-md-3 form-regis text-center edit-profile">
        <div class="">
            <form action="" method="post" enctype="multipart/form-data">
                <?php
                $csrf = array(
                    "name" => $this->security->get_csrf_token_name(),
                    "hash" => $this->security->get_csrf_hash()
                );
                ?>
                <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>">
                <div class="d-flex justify-content-center">
                    <div class="profile-photo mt-3">
                        <img src="<?= base_url(); ?><?= $foto ?>" alt="Profile Photo" width="200" class="rounded-circle img-thumbnail" />
                        <div class="input-group mb-2">
                            <input disabled type="file" name="foto" class="form-control photo-upload" id="inputGroupFile01" required>
                        </div>
                    </div>
                </div>
                <input type="submit" name="upload" value="Upload" class="btn btnForm btnForm-edit">
                <p>*Ukuran file tidak boleh lebih dari 200kb</p>
            </form>
        </div>
        <form action="" method="post" onsubmit="return confirm('Reset peserta ini ?')">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <div class="form-floating mb-2 mt-3">
                <input value="<?= $key->nama ?>" disabled type="text" class="form-control" id="inputName" placeholder="Nama Lengkap" required />
                <label for="inputName" class="form-label form-label-edit">Nama Lengkap</label>
            </div>
            <div class="form-floating mb-2">
                <input disabled value="<?= $key->nobp ?>" type="number" class="form-control form-control-sm" id="floatingInput" placeholder="NIM" required />
                <label for="floatingInput" class="form-label form-label-edit">NIM</label>
            </div>


            <div class="form-floating mb-2">
                <input disabled type="text" name="prestasi" value="<?= $key->hadir1 ?>" class="form-control" id="inputPrestasi" required />
                <label for="inputPrestasi" class="form-label form-label-edit">hadir 1</label>
            </div>

            <div class="form-floating mb-2">
                <input disabled type="text" name="prestasi" value="<?= $key->hadir2 ?>" class="form-control" id="inputPrestasi" required />
                <label for="inputPrestasi" class="form-label form-label-edit">hadir 2</label>
            </div>

            <div class="form-floating mb-2">
                <input disabled type="text" name="prestasi" value="<?= $key->hadir3  ?>" class="form-control" id="inputPrestasi" required />
                <label for="inputPrestasi" class="form-label form-label-edit">hadir 3</label>
            </div>

            <div class="form-floating mb-2">
                <input disabled type="text" name="prestasi" value="<?= $key->hadir4 ?>" class="form-control" id="inputPrestasi" required />
                <label for="inputPrestasi" class="form-label form-label-edit">hadir 4</label>
            </div>



            <div class="form-floating mb-2">
                <input disabled type="text" name="prestasi" value="<?= $key->fileverif1 ?>" class="form-control" id="inputPrestasi" required />
                <label for="inputPrestasi" class="form-label form-label-edit">File 1</label>
            </div>
            <div class="form-floating mb-2">
                <input disabled type="text" name="prestasi" value="<?= $key->fileverif2 ?>" class="form-control" id="inputPrestasi" required />
                <label for="inputPrestasi" class="form-label form-label-edit">File 2</label>
            </div>
            <div class="form-floating mb-2">
                <input disabled type="text" name="prestasi" value="<?= $key->fileverif3 ?>" class="form-control" id="inputPrestasi" required />
                <label for="inputPrestasi" class="form-label form-label-edit">File 3</label>
            </div>
            <div class="form-floating mb-2">
                <input disabled type="text" name="prestasi" value="<?= $key->fileverif4 ?>" class="form-control" id="inputPrestasi" required />
                <label for="inputPrestasi" class="form-label form-label-edit">File 4</label>
            </div>
            <div class="form-floating mb-2">
                <input disabled type="text" name="prestasi" value="<?= $key->fileverif5 ?>" class="form-control" id="inputPrestasi" required />
                <label for="inputPrestasi" class="form-label form-label-edit">File 5</label>
            </div>
            <div class="form-floating mb-2">
                <input disabled type="text" name="prestasi" value="<?= $ukm->nama ?>" class="form-control" id="inputPrestasi" required />
                <label for="inputPrestasi" class="form-label form-label-edit">UKM</label>
            </div>
            <div class="form-floating mb-2">
                <input disabled type="text" name="prestasi" value="<?= $key->kelulusan ?>" class="form-control" id="inputPrestasi" required />
                <label for="inputPrestasi" class="form-label form-label-edit">Status Kelulusan</label>
            </div>
            <div class="form-floating mb-2">
                <input type="number" name="tahun" value="<?= $key->tahun ?>" class="form-control" id="inputPrestasi" required />
                <label for="inputPrestasi" class="form-label form-label-edit">Tahun</label>
            </div>
            <input value="Reset" type="submit" name="Reset" class="btn btn-danger">
        </form>
    </div>
</div>
</div>
<?php
if (isset($_POST["Reset"])) {
    $tahun    =    $this->db->escape_str($this->input->input_stream("tahun", TRUE));
    $update = $this->db->query("UPDATE peserta SET kelulusan = '0',hadir1 = '0', hadir2='0',hadir3='0',hadir4 = '0',tahun='$tahun' WHERE id = '" . $key->id . "'");
    if ($update) {
        $this->alert->msg("success", "Berhasil...", "Verifikasi berhasil  ", 1);
    } else {
        $this->alert->msg("error", "Gagal...");
    }
}
?>