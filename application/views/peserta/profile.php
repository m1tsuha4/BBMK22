<?php
$query = $this->db->query("SELECT * FROM peserta WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
$key = $query->row();

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
                            <input type="file" name="foto" class="form-control photo-upload" id="inputGroupFile01" required>
                        </div>
                    </div>
                </div>
                <input type="submit" name="upload" value="Upload" class="btn btnForm btnForm-edit">
                <p>*Ukuran file tidak boleh lebih dari 200kb</p>
            </form>
        </div>
        <form action="" method="post">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <div class="form-floating mb-2 mt-3">
                <input value="<?= $key->nama ?>" disabled type="text" class="form-control" id="inputName" placeholder="Nama Lengkap" required />
                <label for="inputName" class="form-label form-label-edit">Nama Lengkap</label>
            </div>
            <div class="form-floating mb-2">
                <input disabled value="<?= $key->nobp ?>" type="number" class="form-control form-control-sm" id="floatingInput" placeholder="NIM" required />
                <label for="floatingInput" class="form-label form-label-edit">NIM</label>
            </div>
            <div class="form-floating mb-2 option-menu">
                <select class="form-select form-control " name="jk" id="floatingSelect" aria-label="Floating label select example" required>
                    <option disabled>Pilih Jenis Kelamin</option>
                    <option <?php if ($key->jk == "Laki-Laki") {
                                echo "selected";
                            } ?> value="Laki-Laki">Laki - Laki</option>
                    <option <?php if ($key->jk == "Perempuan") {
                                echo "selected";
                            } ?> value="Perempuan">Perempuan</option>
                </select>
                <label for="floatingSelect">Jenis Kelamin</label>
            </div>
            <div class="form-floating mb-2 option-menu">
                <select value="<?= $key->agama ?>" class="form-select form-control " name="agama" id="floatingSelect" aria-label="Floating label select example" required>
                    <option disabled>Pilih agama</option>
                    <option <?php if ($key->agama == "Islam") {
                                echo "selected";
                            } ?> value="Islam">Islam</option>
                    <option <?php if ($key->agama == "Kristen Protestan") {
                                echo "selected";
                            } ?> value="Kristen Protestan">Kristen Protestan</option>
                    <option <?php if ($key->agama == "Kristen Katolik") {
                                echo "selected";
                            } ?> value="Kristen Katolik">Kristen Katolik</option>
                    <option <?php if ($key->agama == "Hindu") {
                                echo "selected";
                            } ?> value="Hindu">Hindu</option>
                    <option <?php if ($key->agama == "Buddha") {
                                echo "selected";
                            } ?> value="Buddha">Buddha</option>
                    <option <?php if ($key->agama == "Khonghucu") {
                                echo "selected";
                            } ?> value="Khonghucu">Khonghucu</option>
                </select>
                <label for="floatingSelect">Agama</label>
            </div>
            <div class="form-floating mb-2 option-menu">
                <select class="form-select form-control " name="fakultas" id="floatingSelect" aria-label="Floating label select example" required>
                    <option disabled>Pilih Fakultas</option>
                    <?php
                    $jquery = $this->db->query("SELECT * FROM fakultas");
                    foreach ($jquery->result() as $j) { ?>
                        <option value="<?= $j->id; ?>" <?php if ($key->fakultas == $j->id) {
                                                            echo "selected";
                                                        } ?>><?= $j->fakultas; ?></option>
                    <?php
                    } ?>



                </select>
                <label for="floatingSelect">Fakultas</label>
            </div>
            <div class="form-floating mb-2">
                <select class="form-select form-control" name="jurusan" id="floatingSelect" aria-label="Floating label select example" required>
                    <option disabled selected>Pilih Jurusan</option>
                    <?php
                    $kquery = $this->db->query("SELECT * FROM jurusan");
                    foreach ($kquery->result() as $j) { ?>
                        <option value="<?= $j->id; ?>" <?php if ($key->jurusan == $j->id) {
                                                            echo "selected";
                                                        } ?>><?= $j->nama; ?></option>
                    <?php
                    } ?>


                </select>
                <label for="floatingSelect">Jurusan</label>
            </div>
            <div class="form-floating mb-2">
                <input value="<?= $key->tmp_lahir ?>" type="text" name="tmp_lahir" class="form-control" id="inputTempat" placeholder="Tempat Lahir" required />
                <label for="inputTempat" class="form-label form-label-edit">Tempat Lahir</label>
            </div>
            <div class="form-floating mb-2">
                <input type="date" value="<?= $key->tgl_lahir ?>" name="tgl_lahir" class="form-control form-control-sm" id="floatingInput" placeholder="Tanggal Lahir" required />
                <label for="floatingInput" class="form-label form-label-edit">Tanggal Lahir</label>
            </div>

            <div class="form-floating mb-2">
                <input type="text" value="<?= $key->hobi ?>" name="hobi" class="form-control" id="inputHobi" placeholder="Hobi" required />
                <label for="inputHobi" class="form-label form-label-edit">Hobi</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" value="<?= $key->motto ?>" name="motto" class="form-control" id="inputMotto" placeholder="Motto" required />
                <label for="inputMotto" class="form-label form-label-edit">Motto</label>
            </div>
            <div class="form-floating mb-2">
                <input type="number" value="<?= $key->hp ?>" name="nohp" class="form-control form-control-sm" id="floatingInput" placeholder="No. HP" required />
                <label for="floatingInput" class="form-label form-label-edit">No. HP</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" name="alamat" value="<?= $key->alamat ?>" class="form-control" id="inputAlamat" placeholder="Alamat" required />
                <label for="inputAlamat" class="form-label form-label-edit">Alamat</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" name="cita2" value="<?= $key->cita2 ?>" class="form-control" id="inputAlamat" placeholder="Cita - cita" required />
                <label for="inputAlamat" class="form-label form-label-edit">Cita - cita </label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" name="sma" value="<?= $key->sma ?>" class="form-control" id="inputAlamat" placeholder="SMA" required />
                <label for="inputAlamat" class="form-label form-label-edit">SMA</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" name="skill" value="<?= $key->skill ?>" class="form-control" id="inputAlamat" placeholder="Skill" required />
                <label for="inputAlamat" class="form-label form-label-edit">Skill</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" name="prestasi" value="<?= $key->prestasi ?>" class="form-control" id="inputPrestasi" placeholder="Prestasi" required />
                <label for="inputPrestasi" class="form-label form-label-edit">Prestasi</label>
            </div>
            <input value="Update" type="submit" name="update" class="btn btnForm btnForm-edit mt-5 mb-5">
        </form>
    </div>
</div>
</div>

<?php
if (isset($_POST["update"])) {
    $jk    =    $this->db->escape_str($this->input->input_stream("jk", TRUE));
    $tmp_lahir    =    $this->db->escape_str($this->input->input_stream("tmp_lahir", TRUE));
    $tgl_lahir    =    $this->db->escape_str($this->input->input_stream("tgl_lahir", TRUE));
    $agama    =    $this->db->escape_str($this->input->input_stream("agama", TRUE));
    $sma    =    $this->db->escape_str($this->input->input_stream("sma", TRUE));
    $alamat    =    $this->db->escape_str($this->input->input_stream("alamat", TRUE));
    $hp    =    $this->db->escape_str($this->input->input_stream("nohp", TRUE));
    $hobi    =    $this->db->escape_str($this->input->input_stream("hobi", TRUE));
    $prestasi    =    $this->db->escape_str($this->input->input_stream("prestasi", TRUE));
    $skill    =    $this->db->escape_str($this->input->input_stream("skill", TRUE));
    $motto    =    $this->db->escape_str($this->input->input_stream("motto", TRUE));
    $jurusanpeserta    =    $this->db->escape_str($this->input->input_stream("jurusan", TRUE));
    $fakultaspeserta    =    $this->db->escape_str($this->input->input_stream("fakultas", TRUE));
    $cita2    =    $this->db->escape_str($this->input->input_stream("cita2", TRUE));
    $update = $this->db->query("UPDATE peserta SET jk = '$jk', tmp_lahir = '$tmp_lahir', tgl_lahir = '$tgl_lahir', agama = '$agama', sma = '$sma', alamat = '$alamat', hp = '$hp', hobi = '$hobi', prestasi = '$prestasi', skill = '$skill', motto = '$motto', jurusan = '$jurusanpeserta', fakultas = '$fakultaspeserta', cita2 = '$cita2'   WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
    if ($update) {
        $this->alert->msg("success", "Berhasil...", "Data ditambahkan", 1, base_url("/main/home/statuspeserta"));
    } else {
        $this->alert->msg("error", "Gagal...");
    }
}
?>
<?php
if (isset($_POST["upload"])) {
    $nama = $_FILES["foto"]["name"];
    $ext  = pathinfo($nama, PATHINFO_EXTENSION);
    $tmp  = $_FILES["foto"]["tmp_name"];
    $size = $_FILES["foto"]["size"];
    $bp   = $this->session->userdata("userBBMK19");

    if ($ext == "jpg" or $ext == "JPG" or $ext == "png" or $ext == "PNG") {
        if ($size <= 307200) {
            if ($ext == "jpg" or $ext == "JPG") {
                $nama_baru = $bp . ".jpg";
            } else {
                $nama_baru = $bp . ".png";
            }
            $insert = $this->db->query("UPDATE peserta SET foto = '$nama_baru' WHERE nobp = '$bp'");
            if ($insert) {
                $upload = move_uploaded_file($tmp, "assets/img/profile peserta/$nama_baru");
                if ($upload) {
                    $this->alert->msg("success", "Berhasil...", "Foto ditambahkan", 1, base_url("/main/home/profile"));
                } else {
                    $this->alert->msg("error", "Oops...", "Gagal mengupload foto...");
                }
            } else {
                $this->alert->msg("error", "Oops...", "Gagal mengupdate database...");
            }
        } else {
            $this->alert->msg("error", "Oops...", "Ukuran file maximal hanya 300kb");
        }
    } else {
        $this->alert->msg("error", "Oops...", "Format foto harus jpg atau png");
    }
} ?>