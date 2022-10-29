<?php

$pages = $page;
// Jumlah data per halaman
$limit = 25;
$limitStart = ($pages - 1) * $limit;
$afterpage = ($page - 1) * $limit;
$no = 1 + $afterpage;

$kel_peserta = $kelulusan;
$jnquery = $this->db->query("SELECT * FROM peserta WHERE tahun =2021 AND kelulusan ='$kel_peserta'");
$notif = "Error";
if ($kel_peserta == 0) {
    $notif = "Belum Lulus";
} else if ($kel_peserta == 1) {
    $notif = "Lulus";
} else if ($kel_peserta == 2) {
    $notif = "Tidak Lulus";
} else {
    $notif = "Error";
}
?>

<?php
if (!isset($_GET['cari'])) {
    $nquery = $this->db->query("SELECT * FROM peserta WHERE tahun =2021 AND kelulusan ='$kel_peserta' ORDER BY id_ukm ASC LIMIT  $limitStart,$limit ");
    $res = $this->db->query("SELECT * FROM peserta WHERE tahun =2021 AND kelulusan ='$kel_peserta' ORDER BY id_ukm ASC LIMIT  $limitStart,$limit ")->num_rows();
} else {
    $cari = $_GET['cari'];
    $data = $this->db->query("select * from peserta where nama like '%" . $cari . " %'  and kelulusan  ='$kel_peserta'  AND kelulusan ='$kel_peserta' ORDER BY id_ukm ASC LIMIT  $limitStart,$limit ");
    $nquery = $data;
    $res = $this->db->query("select * from peserta where nama like '%" . $cari . " %'  and kelulusan  ='$kel_peserta'  AND kelulusan ='$kel_peserta' ORDER BY id_ukm ASC LIMIT  $limitStart,$limit ")->num_rows();
}
?>

<br />

<style>
    .header-wrapper {
        display: flex;
        justify-content: space-between;
    }

    .title-wrapper {
        display: flex;
        flex-direction: column;
    }
</style>

<!-- Kelulusan Peserta BBMK 2021 -->
<div class="row mt-5">
    <div class="header-wrapper">
        <div class="title-wrapper">
            <h3>Tabel Peserta <?= $notif ?> </h3>
            <p> Hasil Pencarian : <?= $res ?> ditemukan </p>
        </div>
        <div class="input-form">
            <form action="" method="get">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Peserta</label>
                    <input name="cari" type="text" class="form-control">
                    <small id="emailHelp" class="form-text text-muted">Masukkan nama peserta yang akan dicari</small>
                    <input type="submit" value="Cari" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Peserta</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover display" id="example" width="100%" cellspacing="0">
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

                </div>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <ul class="pagination flex-wrap">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php
        $nums_data = $jnquery->num_rows();
        $total_page = $nums_data / $limit;

        for ($i = 1; $i <= $total_page; $i++) {
            if ($i == $pages) {
                $stat = "active";
            } else {
                $stat = "";
            }
        ?>
            <li class="page-item <?= $stat ?>"><a class="page-link" href="<?= base_url() ?>main/stat/pengumuman/<?= $kelulusan ?>/<?= $i ?>"><?= $i ?></a></li>

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

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js
    "></script>
<script>
    $(document).ready(function() {
        $("#example").DataTable();
    });
</script>