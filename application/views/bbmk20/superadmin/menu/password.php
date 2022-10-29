<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <?php
            $query = $this->db->query("SELECT * FROM superadmin WHERE username = '" . $this->session->userdata("superadmin") . "'");
            $data = $query->row(); ?>
            <ul class="list-group">
                <li class="list-group-item bg-light">
                    <h3 class="text-danger">Setting UKM</h3>
                </li>
                <li class="list-group-item">
                    <form action="" method="post" style="margin-bottom: 10px; border-bottom: 1px solid grey">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">Username</div>
                                <div class="col-md-6">
                                    <input type="text" disabled="disabled" value="<?= $data->username; ?>" class="form-control">
                                    <font class="text-danger"><i><small>(Hanya dapat diubah 1 kali)</small></i></font>
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" name="ubahUsername" class="btn btn-warning" value="Ubah" disabled="disabled">
                                </div>
                            </div>
                        </div>
                    </form>

                    <form action="" method="post" style="margin-bottom: 10px; border-bottom: 1px solid grey">
                        <?php
                        $csrf = array(
                            "name" => $this->security->get_csrf_token_name(),
                            "hash" => $this->security->get_csrf_hash()
                        ); ?>
                        <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">Password</div>
                                <div class="col-md-6">
                                    <input type="password" placeholder="Password lama..." class="form-control" name="password1">
                                    <input type="password" placeholder="Password baru..." class="form-control" name="password2">
                                    <input type="password" placeholder="Ulangi password baru..." class="form-control" name="password3">
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" name="ubahPassword" class="btn btn-primary" value="Ubah">
                                </div>
                                <?php
                                if (@$password == "salah") {
                                    $this->alert->pesan("error", "Oops..", "Password salah...");
                                } else if (@$password == "beda") {
                                    $this->alert->pesan("error", "Oops..", "Kedua password harus sama..");
                                } else if (@$password == "gagal") {
                                    $this->alert->pesan("error", "Oops..", "Gagal mengubah password..");
                                } else if (@$password == "kosong") {
                                    $this->alert->pesan("error", "Oops..", "Password tidak boleh kosong..");
                                } else if (@$password == "berhasil") {
                                    $this->alert->pesan("success", "Password berhasil diganti", "Silahkan login kembali", 1, base_url("/admin/logout"));
                                } ?>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </section>
</div>