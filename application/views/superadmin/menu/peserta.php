<?php
$pages = $page;
// Jumlah data per halaman
$limit = 50;
$limitStart = ($pages - 1) * $limit;
$afterpage = ($page - 1) * $limit;
$no = 1 + $afterpage;

?>
<?php
if ($tahun == 2020) {
    $tahun_2021 = "";
    $tahun_2020 = "active";
    $tahun_kirim = 2020;
    $nquery = $this->db->query("SELECT * FROM peserta WHERE tahun is NULL LIMIT  $limitStart,$limit");
    $nquery2 = $this->db->query("SELECT * FROM peserta WHERE tahun is NULL ");
} else if ($tahun == 2021) {
    $tahun_2021 = "active";
    $tahun_2020 = "";
    $tahun_kirim = 2021;
    $nquery = $this->db->query("SELECT * FROM peserta WHERE tahun = 2021  LIMIT  $limitStart,$limit");
    $nquery2 = $this->db->query("SELECT * FROM peserta WHERE tahun = 2021");
} else {
    $tahun_2021 = "";
    $tahun_2020 = "";
    $tahun_kirim = 2020;
    $nquery = $this->db->query("SELECT * FROM peserta WHERE tahun = '' LIMIT  $limitStart,$limit");
    $nquery2 = $this->db->query("SELECT * FROM peserta WHERE tahun = ''");
}
?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <ul class="list-group">
                <li class="list-group-item bg-light">
                    <h3 class="text-info">
                        <div class="list-group">
                            <a href="<?= base_url() ?>superadmin/peserta/2020" class="list-group-item list-group-item-action <?= $tahun_2020 ?>" aria-current="true">
                                Peserta BBMK 2020
                            </a>
                            <a href="<?= base_url() ?>superadmin/peserta/2021" class="list-group-item list-group-item-action <?= $tahun_2021 ?>">Peserta BBMK 2021</a>
                        </div>
                    </h3>
                </li>
                <li class="list-group-item">

                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>BP</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>UKM</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>Reset</th>
                        </tr>
                        <?php
                        foreach ($nquery->result() as $key) {
                            $mq = $this->db->query("SELECT nama, total FROM ukm WHERE id = '" . $key->id_ukm . "'")->row();
                            $m = $mq->nama;
                            @$n = $this->db->query("SELECT nama FROM jurusan WHERE id = '" . $key->jurusan . "'")->row()->nama;
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $key->nobp; ?></td>
                                <td><?= $key->nama; ?></td>
                                <td><?= $n; ?></td>
                                <td><?= $m; ?></td>
                                <td>
                                    <?php
                                    if ($key->stat_reg == '1') {
                                        echo "Sudah diverifikasi";
                                    } else {
                                        echo "Belum diverifikasi";
                                    } ?>
                                <td>
                                    <form action="" method="post" style="display: block" onsubmit="return confirm('Hapus peserta ini ?')">
                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                        <button type="submit" name="hapus<?= $key->id; ?>" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <?php
                                    $uid = $key->id;
                                    if (isset($_POST["hapus$uid"])) {
                                        $delete = $this->db->query("DELETE FROM peserta WHERE id = '$uid'");
                                        if ($delete) {
                                            $total = $mq->total;
                                            $now = $total - 1;
                                            $update = $this->db->query("UPDATE ukm SET total = '$now' WHERE id = '" . $key->id_ukm . "'");

                                            if ($update) {
                                                $this->alert->pesan("success", "Berhasil...", "Peserta berhasil dihapus", 1, base_url("/superadmin/peserta"));
                                            } else {
                                                $this->alert->pesan("error", "Gagal...");
                                            }
                                        }
                                    } ?>
                                </td>
                                <td>
                                    <form action="" method="post" onsubmit="return confirm('Reset password peserta ini ?')" style="display: inline-block;">
                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                        <button type="submit" name="reset<?= $uid; ?>" class="btn btn-warning">
                                            <i class="fas fa-redo-alt"></i>
                                        </button>
                                    </form>
                                    <?php
                                    if (isset($_POST["reset$uid"])) {
                                        $new = password_hash("bbmk2021", PASSWORD_DEFAULT);
                                        $update = $this->db->query("UPDATE peserta SET password = '$new' WHERE id = '" . $key->id . "'");
                                        if ($update) {
                                            $this->alert->pesan("success", "Berhasil...", "Password peserta berhasil direset", base_url("/admin/peserta"));
                                        } else {
                                            $this->alert->pesan("error", "Gagal...");
                                        }
                                    } ?>
                                </td>
                            </tr>
                        <?php
                        } ?>
                    </table>
                </li>
            </ul>
            <ul class="pagination flex-wrap">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                $nums_data = $nquery2->num_rows();
                $total_page = $nums_data / $limit;

                for ($i = 1; $i <= $total_page; $i++) {
                    if ($i == $pages) {
                        $stat = "active";
                    } else {
                        $stat = "";
                    }
                ?>
                    <li class="page-item <?= $stat ?>"><a class="page-link" href="<?= base_url() ?>superadmin/peserta/<?= $tahun_kirim ?>/<?= $i ?>"><?= $i ?></a></li>

                <?php
                }

                ?>

                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </div>
    </section>
</div>