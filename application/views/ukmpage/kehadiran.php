<?php
$ss = $this->db->query("SELECT id FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'")->row()->id;
$query = $this->db->query("SELECT * FROM peserta WHERE id_ukm = '$ss' AND tahun = '2021' AND stat_reg = '1'");
?>


<!-- ===== PAGE CONTENT ===== -->
<!-- <img src="../assets/img/bg.png" alt="" class="bg-content" /> -->
<div class="container-fluid">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Hari 1</th>
                <th scope="col">Hari 2</th>
                <th scope="col">Hari 3</th>
                <th scope="col">Hari 4</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            $hadir1 = "Isi kehadiran 1 Peserta?";
            $nonhadir1 = "Batalkan kehadiran 1 Peserta?";
            $hadir2 = "Isi kehadiran 2  Peserta?";
            $nonhadir2 = "Batalkan kehadiran 2 Peserta?";
            $hadir3 = "Isi kehadiran 3  Peserta?";
            $nonhadir3 = "Batalkan kehadiran 3 Peserta?";
            $hadir4 = "Isi kehadiran 4  Peserta?";
            $nonhadir4 = "Batalkan kehadiran 4 Peserta?";

            foreach ($query->result() as $key) {
                $no  += 1;
            ?>
                <tr>
                    <th scope="row"><?= $no ?></th>
                    <td><?= $key->nobp ?></td>
                    <td><?= $key->nama ?></td>
                    <td>
                        <?php if ($key->hadir1 == "0") { ?>
                            <form action="" method="post" onsubmit="return confirm('Isi kehadiran 1 Peserta?')">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                <button type="submit" name="hadir1<?= $key->id ?>" class="btn btn-success btn-peserta "><i class="uil uil-check-circle"></i></button>
                            </form>
                        <?php } ?>
                        <?php if ($key->hadir1 == "1") { ?>
                            <form action="" method="post" onsubmit="return confirm('Batalkan kehadiran 1 Peserta?')">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                <button type="submit" name="tidakhadir1<?= $key->id ?>" class="btn btn-danger btn-peserta"><i class="uil uil-times-circle"></i></button>
                            </form>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if ($key->hadir2 == "0") { ?>
                            <form action="" method="post" onsubmit="return confirm('Isi kehadiran 2  Peserta?')">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                <button type="submit" name="hadir2<?= $key->id ?>" class="btn btn-success btn-peserta "><i class="uil uil-check-circle"></i></button>
                            </form>
                        <?php } ?>
                        <?php if ($key->hadir2 == "1") { ?>
                            <form action="" method="post" onsubmit="return confirm('Batalkan kehadiran 2 Peserta?')">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                <button type="submit" name="tidakhadir2<?= $key->id ?>" class="btn btn-danger btn-peserta"><i class="uil uil-times-circle"></i></button>
                            </form>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if ($key->hadir3 == "0") { ?>
                            <form action="" method="post" onsubmit="return confirm('Isi kehadiran 3  Peserta?')">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                <button type="submit" name="hadir3<?= $key->id ?>" class="btn btn-success btn-peserta "><i class="uil uil-check-circle"></i></button>
                            </form>
                        <?php } ?>
                        <?php if ($key->hadir3 == "1") { ?>
                            <form action="" method="post" onsubmit="return confirm('Batalkan kehadiran 3 Peserta?')">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                <button type="submit" name="tidakhadir3<?= $key->id ?>" class="btn btn-danger btn-peserta"><i class="uil uil-times-circle"></i></button>
                            </form>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if ($key->hadir4 == "0") { ?>
                            <form action="" method="post" onsubmit="return confirm('Isi kehadiran 4  Peserta?')">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                <button type="submit" name="hadir4<?= $key->id ?>" class="btn btn-success btn-peserta "><i class="uil uil-check-circle"></i></button>
                            </form>
                        <?php } ?>
                        <?php if ($key->hadir4 == "1") { ?>
                            <form action="" method="post" onsubmit="return confirm('Batalkan kehadiran 4 Peserta?')">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                <button type="submit" name="tidakhadir4<?= $key->id ?>" class="btn btn-danger btn-peserta"><i class="uil uil-times-circle"></i></button>
                            </form>
                        <?php } ?>
                    </td>
                </tr>
            <?php
                if (isset($_POST["hadir1$key->id"])) {

                    $update = $this->db->query("UPDATE peserta SET hadir1 = 1 WHERE id = '" . $key->id . "'");
                    if ($update) {
                        $this->alert->pesan("success", "Berhasil...", "Verifikasi berhasil  ", 1);
                    } else {
                        $this->alert->pesan("error", "Gagal...");
                    }
                }
                if (isset($_POST["tidakhadir1$key->id"])) {

                    $update = $this->db->query("UPDATE peserta SET hadir1 = 0 WHERE id = '" . $key->id . "'");
                    if ($update) {
                        $this->alert->pesan("success", "Berhasil...", "Tidak Verifikasi berhasil  ", 1);
                    } else {
                        $this->alert->pesan("error", "Gagal...");
                    }
                }

                if (isset($_POST["hadir2$key->id"])) {

                    $update = $this->db->query("UPDATE peserta SET hadir2 = 1 WHERE id = '" . $key->id . "'");
                    if ($update) {
                        $this->alert->pesan("success", "Berhasil...", "Verifikasi berhasil  ", 1);
                    } else {
                        $this->alert->pesan("error", "Gagal...");
                    }
                }
                if (isset($_POST["tidakhadir2$key->id"])) {

                    $update = $this->db->query("UPDATE peserta SET hadir2 = 0 WHERE id = '" . $key->id . "'");
                    if ($update) {
                        $this->alert->pesan("success", "Berhasil...", "Tidak Verifikasi berhasil  ", 1);
                    } else {
                        $this->alert->pesan("error", "Gagal...");
                    }
                }

                if (isset($_POST["hadir3$key->id"])) {

                    $update = $this->db->query("UPDATE peserta SET hadir3 = 1 WHERE id = '" . $key->id . "'");
                    if ($update) {
                        $this->alert->pesan("success", "Berhasil...", "Verifikasi berhasil  ", 1);
                    } else {
                        $this->alert->pesan("error", "Gagal...");
                    }
                }
                if (isset($_POST["tidakhadir3$key->id"])) {

                    $update = $this->db->query("UPDATE peserta SET hadir3 = 0 WHERE id = '" . $key->id . "'");
                    if ($update) {
                        $this->alert->pesan("success", "Berhasil...", "Tidak Verifikasi berhasil  ", 1);
                    } else {
                        $this->alert->pesan("error", "Gagal...");
                    }
                }

                if (isset($_POST["hadir4$key->id"])) {

                    $update = $this->db->query("UPDATE peserta SET hadir4 = 1 WHERE id = '" . $key->id . "'");
                    if ($update) {
                        $this->alert->pesan("success", "Berhasil...", "Verifikasi berhasil  ", 1);
                    } else {
                        $this->alert->pesan("error", "Gagal...");
                    }
                }
                if (isset($_POST["tidakhadir4$key->id"])) {

                    $update = $this->db->query("UPDATE peserta SET hadir4 = 0 WHERE id = '" . $key->id . "'");
                    if ($update) {
                        $this->alert->pesan("success", "Berhasil...", "Tidak Verifikasi berhasil  ", 1);
                    } else {
                        $this->alert->pesan("error", "Gagal...");
                    }
                }
            } ?>

        </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>