<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <?php
            $query = $this->db->query("SELECT * FROM ukm WHERE username = '$id'");
            $data = $query->row(); ?>
            <ul class="list-group">
                <li class="list-group-item bg-light">
                    <h3 class="text-danger">Edit Data UKM <?= $data->nama; ?></h3>
                </li>
                <li class="list-group-item">
                    <form action="" method="post" onsubmit="return confirm('Reset password UKM ini ?')">
                        <?php
                        $xss = array(
                            "name" => $this->security->get_csrf_token_name(),
                            "hash" => $this->security->get_csrf_hash()
                        ); ?>
                        <input type="hidden" name="<?= $xss['name']; ?>" value="<?= $xss['hash']; ?>">
                        <input type="hidden" name="id" value="<?= $data->id; ?>">
                        <input type="submit" name="reset" class="btn btn-danger" value="Reset Password">
                    </form>
                    <?php
                    if (@$reset == "gagal") {
                        $this->alert->pesan("error", "Gagal mereset password");
                    } else if (@$reset == "berhasil") {
                        $this->alert->pesan("success", "Berhasil", "Password berhasil direset");
                    } ?>
                </li>
                <li class="list-group-item">
                    <form action="" method="post">
                        <?php
                        $csrf = array(
                            "name" => $this->security->get_csrf_token_name(),
                            "hash" => $this->security->get_csrf_hash()
                        ); ?>
                        <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>">
                        <input type="hidden" name="id" value="<?= $data->id; ?>">
                        <div class="inputx">
                            <label>Nama : </label>
                            <input type="text" name="nama" placeholder="Nama baru..." value="<?= $data->nama; ?>">
                        </div>
                        <div class="inputx">
                            <label>Jargon :</label>
                            <input type="text" name="motto" placeholder="Jargon baru..." value="<?= $data->motto; ?>">
                        </div>
                        <div class="inputx">
                            <label>Deskripsi : <font class="text-danger"><small><i>(Tekan Shift + Enter untuk baris baru)</i></small></font></label>
                            <textarea name="deskripsi" placeholder="Deskripsi baru..."><?= $data->deskripsi; ?></textarea>
                        </div>
                        <div class="inputx">
                            <label>Kuota :</label>
                            <input type="number" name="kuota" placeholder="Kuota baru..." value="<?= $data->kuota; ?>">
                        </div>
                        <div class="inputx">
                            <label>Visi : <font class="text-danger"><small><i>(Tekan Shift + Enter untuk baris baru)</i></small></font></label>
                            <input type="text" name="visi" placeholder="Visi baru..." value="<?= $data->visi; ?>">
                        </div>
                        <div class="inputx">
                            <label>Misi : <font class="text-danger"><small><i>(Tekan Shift + Enter untuk baris baru)</i></small></font></label>
                            <input type="text" name="misi" placeholder="Misi baru..." value="<?= $data->misi; ?>">
                        </div>

                        <div class="inputx">
                            <label>Link Youtube :</label>
                            <input type="text" name="linkyt" placeholder="Username baru..." value="<?= $data->video; ?>">
                        </div>
                        <div class="inputx">
                            <label>Timeline 1 :</label>
                            <input type="text" name="tm1" placeholder="Username baru..." value="<?= $data->timeline1; ?>">
                        </div>
                        <div class="inputx">
                            <label>Timeline 2 :</label>
                            <input type="text" name="tm2" placeholder="Username baru..." value="<?= $data->timeline2; ?>">
                        </div>
                        <div class="inputx">
                            <label>Timeline 3 :</label>
                            <input type="text" name="tm3" placeholder="Username baru..." value="<?= $data->timeline3; ?>">
                        </div>
                        <div class="inputx">
                            <label>Timeline 4 :</label>
                            <input type="text" name="tm4" placeholder="Username baru..." value="<?= $data->timeline4; ?>">
                        </div>
                        <div class="inputx">
                            <label>Syarat 1 :</label>
                            <input type="text" name="syarat1" placeholder="Username baru..." value="<?= $data->syarat1; ?>">
                        </div>
                        <div class="inputx">
                            <label>Syarat 2 :</label>
                            <input type="text" name="syarat2" placeholder="Username baru..." value="<?= $data->syarat2; ?>">
                        </div>
                        <div class="inputx">
                            <label>Syarat 3 :</label>
                            <input type="text" name="syarat3" placeholder="Username baru..." value="<?= $data->syarat3; ?>">
                        </div>
                        <div class="inputx">
                            <label>Syarat 4 :</label>
                            <input type="text" name="syarat4" placeholder="Username baru..." value="<?= $data->syarat4; ?>">
                        </div>
                        <div class="inputx">
                            <label>Syarat 5 :</label>
                            <input type="text" name="syarat5" placeholder="Username baru..." value="<?= $data->syarat5; ?>">
                        </div>
                        <input type="submit" style="margin-top: 50px" name="edit" class="btn btn-warning" value="Edit UKM">
                    </form>

                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" name="ided" value="<?= $data->id; ?>">
                        <div class="inputx">
                            <label>File Gambar 1</label>
                            <input type="file" name="gambar1" placeholder="Pilih file..." class="form-control">
                        </div>
                        <div class="inputx">
                            <label>File Gambar 2</label>
                            <input type="file" name="gambar2" placeholder="Pilih file..." class="form-control">
                        </div>
                        <div class="inputx">
                            <label>File Gambar 3</label>
                            <input type="file" name="gambar3" placeholder="Pilih file..." class="form-control">
                        </div>
                        <div class="inputx">
                            <label>File Gambar 4</label>
                            <input type="file" name="gambar4" placeholder="Pilih file..." class="form-control">
                        </div>
                        <div class="inputx">
                            <label>File Gambar 5</label>
                            <input type="file" name="gambar5" placeholder="Pilih file..." class="form-control">
                        </div>
                        <input type="submit" name="uploadgambar" class="btn" style="background-color: #3D005D; color:white;" value="Upload File Verif" style="margin-top: 50px">

                    </form>

                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" name="ided" value="<?= $data->id; ?>">
                        <div class="inputx">
                            <label>Logo</label>
                            <input type="file" name="logo" placeholder="Pilih file..." class="form-control">
                        </div>

                        <input type="submit" name="uploadlogo" class="btn" style="background-color: #3D005D; color:white;" value="Upload File Verif" style="margin-top: 50px">

                    </form>
                    <?php
                    if (@$edit == "gagal") {
                        $this->alert->pesan("error", "Oops..", "Gagal mengedit data UKM");
                    } else if (@$edit == "berhasil") {
                        $this->alert->pesan("success", "Berhasil..", "Berhasil mengedit data UKM");
                    } ?>
                </li>
            </ul>
        </div>
    </section>
</div>