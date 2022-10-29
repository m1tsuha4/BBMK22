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
$nquery = $this->db->query("SELECT * FROM peserta WHERE tahun =2021 AND kelulusan ='$kel_peserta' ");
?>

<br />

<!-- Kelulusan Peserta BBMK 2021 -->
<table id="example" class="display" style="width: 100%">
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
            $stat = "";
            if ($key->kelulusan == '1') {
                $stat = "Lulus";
            } else if ($key->kelulusan == '2') {
                $stat = "Tidak Lulus";
            } else {
                $stat = "Belum Lulus";
            }
        ?>

            <tr>
                <td><?= $no++; ?></td>
                <td><?= $key->nobp; ?></td>
                <td><?= $key->nama; ?></td>
                <td><?= $n; ?></td>
                <td><?= $m; ?></td>
                <td><?= $stat; ?></td>

            </tr>
        <?php } ?>
    </tbody>
</table>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js
    "></script>
<script>
    $(document).ready(function() {
        $("#example").DataTable();
    });
</script>



<!-- /.container-fluid -->

<!-- End of Main Content -->