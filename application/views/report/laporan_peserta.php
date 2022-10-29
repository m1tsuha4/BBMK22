<?php

header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=laporan peserta.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

    <thead>

        <tr>
            <th>No</th>
            <th>Keterangan</th>

            <th>Jumlah</th>



        </tr>

    </thead>

    <tbody>

        <?php $i = 1;
        $jumlah_peserta = $this->db->query("SELECT* FROM peserta WHERE tahun ='2021'");
        $jumlah_verif = $this->db->query("SELECT* FROM peserta WHERE stat_reg= 1 AND tahun ='2021'");
        $jumlah_nonverif = $this->db->query("SELECT* FROM peserta WHERE stat_reg= 2 AND tahun ='2021'");
        $jumlah_belumverif = $this->db->query("SELECT* FROM peserta WHERE stat_reg= 0 AND tahun ='2021'");


        $jumlah_lulus = $this->db->query("SELECT* FROM peserta WHERE kelulusan= 1 AND tahun ='2021'");
        $jumlah_tidaklulus = $this->db->query("SELECT* FROM peserta WHERE kelulusan= 2 AND tahun ='2021'");
        $jumlah_belumlulus = $this->db->query("SELECT* FROM peserta WHERE kelulusan= 0 AND tahun ='2021'");
        ?>

        <tr>
            <td>1</td>
            <td>Jumlah Peserta</td>
            <td><?= $jumlah_peserta->num_rows() ?></td>
        </tr>


        <tr>
            <td>2</td>
            <td>Jumlah Verifikasi</td>
            <td><?= $jumlah_verif->num_rows() ?></td>
        </tr>



        <tr>
            <td>3</td>
            <td>Jumlah Belum Verifikasi</td>
            <td><?= $jumlah_belumverif->num_rows() ?></td>
        </tr>

        <tr>
            <td>4</td>
            <td>Jumlah Verifikasi Ditolak</td>
            <td><?= $jumlah_nonverif->num_rows() ?></td>
        </tr>


        <tr>
            <td>5</td>
            <td>Jumlah Peserta Lulus</td>
            <td><?= $jumlah_lulus->num_rows() ?></td>
        </tr>
        <tr>
            <td>6</td>
            <td>Jumlah Peserta Tidak Lulus</td>
            <td><?= $jumlah_tidaklulus->num_rows() ?></td>
        </tr>
        <tr>
            <td>7</td>
            <td>Jumlah Peserta Belum Lulus</td>
            <td><?= $jumlah_belumlulus->num_rows() ?></td>
        </tr>



    </tbody>

</table>