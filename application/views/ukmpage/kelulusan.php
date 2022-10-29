<?php
$ss = $this->db->query("SELECT id FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'")->row()->id;
$query = $this->db->query("SELECT * FROM peserta WHERE id_ukm = '$ss' AND tahun = '2021' AND stat_reg = '1'");
?>

<div class="container-fluid mt-2">
    <table class="table table-hover table-borderless" style="background-color: #ddd;" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>No</th>
                <th>BP</th>
                <th>Nama</th>
                <th>Status Kelulusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            $btnStat = "bg-secondary";
            $stat = "Belum diisi";
            foreach ($query->result() as $key) {
                $no  += 1;
                if ($key->kelulusan == "1") {
                    $btnStat = "bg-success";
                    $stat = "Lulus";
                } else if ($key->kelulusan == "2") {
                    $btnStat = "bg-danger";
                    $stat = "Tidak Lulus";
                } else {
                    $btnStat = "bg-secondary";
                    $stat = "Belum diisi";
                }

            ?>
                <tr>
                    <th scope="row" class="th-row-icon">
                        <a href="" class="btn btn-primary btn-peserta"><i class="uil uil-eye"></a></i>
                    </th>
                    <td><?= $no ?></td>
                    <td><?= $key->nobp ?></td>
                    <td><?= $key->nama ?></td>
                    <td><span class="badge <?= $btnStat ?> text-light"><?= $stat ?></span></td>
                    </td>
                    <td>
                        <form action="" method="post" onsubmit="return confirm('Luluskan Peserta?')">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                            <button type="submit" name="lulus<?= $key->id ?>" class="btn btn-success btn-peserta "><i class="uil uil-check-circle"></i></button>
                        </form>
                        <form action="" method="post" onsubmit="return confirm('Batalkan kehadiran 4 Peserta?')">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                            <button type="submit" name="tidaklulus<?= $key->id ?>" class="btn btn-danger btn-peserta"><i class="uil uil-times-circle"></i></button>
                        </form>

                    </td>
                </tr>
            <?php
                if (isset($_POST["lulus$key->id"])) {
                    $update = $this->db->query("UPDATE peserta SET kelulusan = 1 WHERE id = '" . $key->id . "'");
                    if ($update) {
                        $this->alert->pesan("success", "Berhasil...", "Verifikasi berhasil  ", 1);
                    } else {
                        $this->alert->pesan("error", "Gagal...");
                    }
                }
                if (isset($_POST["tidaklulus$key->id"])) {

                    $update = $this->db->query("UPDATE peserta SET kelulusan = 2 WHERE id = '" . $key->id . "'");
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