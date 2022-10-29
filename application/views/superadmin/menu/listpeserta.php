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

<div class="container-fluid">
    <li class="list-group-item bg-light">
        <h3 class="text-info">
            <div class="list-group">
                <a href="<?= base_url() ?>superadmin/listpeserta/2020" class="list-group-item list-group-item-action <?= $tahun_2020 ?>" aria-current="true">
                    Peserta BBMK 2020
                </a>
                <a href="<?= base_url() ?>superadmin/listpeserta/2021" class="list-group-item list-group-item-action <?= $tahun_2021 ?>">Peserta BBMK 2021</a>
            </div>
        </h3>
    </li>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Peserta Terdaftar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>BP</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>UKM</th>
                            <th>Kelulusan</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                    if ($key->kelulusan == '1') {
                                        echo "Lulus";
                                    } else if ($key->kelulusan == '2') {
                                        echo "Tidak Lulus";
                                    } else {
                                        echo "Belum Lulus";
                                    } ?>
                                <td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <ul class="pagination flex-wrap">

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
                        <li class="page-item <?= $stat ?>"><a class="page-link" href="<?= base_url() ?>superadmin/listpeserta/<?= $tahun_kirim ?>/<?= $i ?>"><?= $i ?></a></li>

                    <?php
                    }

                    ?>

                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->