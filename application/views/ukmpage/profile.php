<?php
$query = $this->db->query("SELECT *FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'");
$data = $query->row();
?>


<!-- ===== PAGE CONTENT ===== -->
<img src="<?= base_url(); ?>/assets3/img/bg.png" alt="" class="bg-content">
<div class="container-fluid">
    <div class="col-md-6 offset-md-3 form-regis text-center edit-profile">
        <div class="">
            <form class="mt-4">
                <div class="d-flex justify-content-center">
                    <div class="profile-photo mt-3">
                        <img src="<?= base_url() ?>/assets/img/logo/<?= $data->logo ?>" alt="Profile Photo" width="200" class="rounded-circle img-thumbnail" />

                    </div>
                </div>
            </form>
        </div>
        <form action="" method="post">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <div class="form-floating mb-2 mt-3">
                <input disabled type="text" value="<?= $data->nama ?>" class="form-control" id="inputName" placeholder="Nama UKM" />
                <label for="inputNameofUKM" class="form-label form-label-edit">Nama UKM</label>
            </div>
            <div class="form-floating mb-2">
                <textarea name="deskripsi" style="height: 10rem;" class="form-control" placeholder="Masukkan deskripsi disini" id="floatingTextarea2" style="height: 100px"><?= $data->deskripsi ?></textarea>
                <label for="floatingTextarea2">Deskripsi</label>
            </div>
            <div class="form-floating mb-2">
                <input name="motto" type="text" value="<?= $data->motto ?>" class="form-control" id="inputMotto" placeholder="Motto" />
                <label for="inputMotto" class="form-label form-label-edit">Motto</label>
            </div>
            <!-- <div class="form-floating mb-2 mt-3">
                <input type="text" class="form-control" id="inputName" placeholder="Nama CP" />
                <label for="inputName" class="form-label form-label-edit">Nama Contact Person</label>
            </div> -->
            <!-- <div class="form-floating mb-2">
                <input type="number" class="form-control form-control-sm" id="floatingInput" placeholder="Nomer HP aktif/Whatsapp CP" />
                <label for="floatingInput" class="form-label form-label-edit">Nomer HP aktif/whatsapp CP</label>
            </div> -->
            <div class="form-floating mb-2">
                <textarea name="visi" class="form-control" placeholder="Masukkan Visi UKM disini" id="floatingTextarea2" style="height: 100px"><?= $data->visi ?></textarea>
                <label for="floatingTextarea2">Visi UKM</label>
            </div>
            <div class="form-floating mb-2 input-misi-ukm">
                <textarea name="misi" style="height: 18rem;" class="form-control" placeholder="Masukkan Misi UKM disini" id="floatingTextarea2" style="height: 100px"><?= $data->misi ?></textarea>
                <label for="floatingTextarea2">Misi UKM</label>
            </div>
            <!-- <div class="form-floating mb-2">
                <input type="text" class="form-control" id="inputMotto" placeholder="Website UKM" />
                <label for="inputWebsite" class="form-label form-label-edit">Website UKM</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="inputMotto" placeholder="Facebook" />
                <label for="inputWebsite" class="form-label form-label-edit">Facebook</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="inputMotto" placeholder="Instagram" />
                <label for="inputWebsite" class="form-label form-label-edit">Instagram</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="inputMotto" placeholder="Twitter" />
                <label for="inputWebsite" class="form-label form-label-edit">Twitter</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="inputMotto" placeholder="Email" />
                <label for="inputWebsite" class="form-label form-label-edit">Email</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="inputMotto" placeholder="Youtube" />
                <label for="inputWebsite" class="form-label form-label-edit">Youtube</label>
            </div> -->
            <div class="form-floating mb-2">
                <input disabled type="text" name="link" value="<?= $data->video ?>" class="form-control" id="inputMotto" placeholder="Link video profile" />
                <label for="inputWebsite" class="form-label form-label-edit">Link video profile</label>
            </div>
            <!-- <p class="mt-4">Dokumentasi Kegiatan BBMK Sebelumnya </p>
            <div class="row">
                <div class="col-4">
                    <div class="input-group">
                        <input type="file" class="form-control photo-upload" id="inputGroupFile01">
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <input type="file" class="form-control photo-upload" id="inputGroupFile01">
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <input type="file" class="form-control photo-upload" id="inputGroupFile01">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="input-group">
                        <input type="file" class="form-control photo-upload" id="inputGroupFile01">
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <input type="file" class="form-control photo-upload" id="inputGroupFile01">
                    </div>
                </div>
            </div> -->
            <!-- <div class="file-dok-bbmk">
                <p>*Format wajib berupa jpg atau png dan foto lanskap</p>
            </div> -->
            <div class="form-floating mb-2">
                <input type="text" name="syarat1" value="<?= $data->syarat1 ?>" class="form-control form-control-sm" id="floatingInput" placeholder="Kuota Peserta" />
                <label for="inputNameofUKM" class="form-label form-label-edit">Syarat Pendaftaran 1</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" name="syarat2" value="<?= $data->syarat2 ?>" class="form-control form-control-sm" id="floatingInput" placeholder="Kuota Peserta" />
                <label for="inputNameofUKM" class="form-label form-label-edit">Syarat Pendaftaran 2</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" name="syarat3" value="<?= $data->syarat3 ?>" class="form-control form-control-sm" id="floatingInput" placeholder="Kuota Peserta" />
                <label for="inputNameofUKM" class="form-label form-label-edit">Syarat Pendaftaran 3</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" name="syarat4" value="<?= $data->syarat4 ?>" class="form-control form-control-sm" id="floatingInput" placeholder="Kuota Peserta" />
                <label for="inputNameofUKM" class="form-label form-label-edit">Syarat Pendaftaran 4</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" name="syarat5" value="<?= $data->syarat5 ?>" class="form-control form-control-sm" id="floatingInput" placeholder="Kuota Peserta" />
                <label for="inputNameofUKM" class="form-label form-label-edit">Syarat Pendaftaran 5</label>
            </div>


            <div class="form-floating mb-2">
                <input disabled type="number" value="<?= $data->kuota ?>" name="kuota" class="form-control form-control-sm" id="floatingInput" placeholder="Kuota Peserta" />
                <label for="floatingInput" class="form-label form-label-edit">Kuota Peserta</label>
            </div>

            <button type="submit" name="kirim" class="btn btnForm btnForm-edit mt-5 mb-5"><a href="">Update</a></button>
        </form>
    </div>
</div>
</div>
<?php
if (@$status == "berhasil") {
    $this->alert->msg("success", "Berhasil", "Profile diperbaharui");
}
if (@$status == "gagal") {
    $this->alert->msg("error", "Oops...", "Gagal diperbaharui");
}
?>