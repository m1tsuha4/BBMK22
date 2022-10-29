<?php


if (@$status == "tidakdiverifikasi") {
    $ss = $this->db->query("SELECT id FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'")->row()->id;
    $query = $this->db->query("SELECT * FROM peserta WHERE id_ukm = '$ss' AND tahun = '2021' AND stat_reg='2' ");
} else if (@$status == "verifikasi") {
    $ss = $this->db->query("SELECT id FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'")->row()->id;
    $query = $this->db->query("SELECT * FROM peserta WHERE id_ukm = '$ss' AND tahun = '2021' AND stat_reg='1' ");
} else if (@$status == "belumdiverifikasi") {
    $ss = $this->db->query("SELECT id FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'")->row()->id;
    $query = $this->db->query("SELECT * FROM peserta WHERE id_ukm = '$ss' AND tahun = '2021' AND stat_reg='0' ");
} else {
    $ss = $this->db->query("SELECT id FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'")->row()->id;
    $query = $this->db->query("SELECT * FROM peserta WHERE id_ukm = '$ss' AND tahun = '2021' ");
}

?>


<!-- ===== PAGE CONTENT ===== -->
<!-- <img src="../assets/img/bg.png" alt="" class="bg-content" /> -->
<div class="container-fluid">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">No</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Kontak</th>
                <th scope="col">Status Verifikasi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $reg1 = 1;
            $reg2 = 2;
            $pesan1 = "Verifikasi Peserta?";
            $pesan2 = "Batalkan Verifikasi Peserta?";
            foreach ($query->result() as $key) {
                if ($key->stat_reg == 1) {
                    $status = "Sudah Diverifikasi";
                } else if ($key->stat_reg == 2) {
                    $status = "Tidak diverifikasi";
                } else {
                    $status = "Belum diverifikasi";
                }
                if ($key->jurusan != "") {

                    $xquery = $this->db->query("SELECT * FROM jurusan WHERE id = '$key->jurusan' ");
                    $data = $xquery->row();
                    $jurusan = $data->nama;
                } else {
                    $jurusan = "Belum diisi";
                }


            ?>
                <tr>
                    <th scope="row" class="th-row-icon">
                        <a href="<?= base_url(); ?>admin/entry/<?= $key->id; ?>" class="btn btn-primary btn-peserta"><i class="uil uil-eye"></a></i>
                    </th>
                    <td><?= $no++; ?></td>
                    <td><?= $key->nobp; ?></td>
                    <td><?= $key->nama; ?></td>
                    <td><?= $jurusan; ?></td>
                    <td><?= $key->hp; ?></td>
                    <td><?= $status ?></td>
                    <td>
                        <!-- <a href="" class="btn btn-danger btn-peserta"><i class="uil uil-times-circle"></i></a> -->
                        <form action="" method="post" onsubmit="return confirm('Verifikasi peserta ini ?')">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                            <button type="submit" name="verify1<?= $key->id ?>" class="btn btn-success"><i class="uil uil-check-circle"></i></button>
                        </form>
                        <form action="" method="post" onsubmit="return confirm('Tidak verifikasi peserta ini ?')">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                            <button type="submit" name="unverify1<?= $key->id ?>" class="btn btn-danger"><i class="uil uil-times-circle"></i></button>
                        </form>
                    </td>
                </tr>

            <?php
                if (isset($_POST["verify1$key->id"])) {

                    $update = $this->db->query("UPDATE peserta SET stat_reg = 1 WHERE id = '" . $key->id . "'");
                    if ($update) {
                        $this->alert->pesan("success", "Berhasil...", "Verifikasi berhasil  ", 1);
                    } else {
                        $this->alert->pesan("error", "Gagal...");
                    }
                }
                if (isset($_POST["unverify1$key->id"])) {

                    $update = $this->db->query("UPDATE peserta SET stat_reg = 2 WHERE id = '" . $key->id . "'");
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