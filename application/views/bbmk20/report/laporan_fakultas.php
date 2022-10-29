<?php

header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=laporan_fakultas.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

    <thead>

        <tr>
            <th>No</th>
            <th>Fakultas</th>
            <th>Verif</th>
            <th>Verif ditolak</th>
            <th>Belum Verifikasi</th>
            <th>Lulus</th>
            <th>Tidak Lulus</th>
            <th>Belum Lulus</th>
            <th>Total</th>



        </tr>

    </thead>

    <tbody>

        <?php
        $query = $this->db->query("SELECT * FROM fakultas");
        $no_ukm = 1;
        foreach ($query->result() as $ukm) {

            $peserta = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id'");
            $pesertaverif = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id' AND stat_reg= 1");
            $pesertanonverif = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id' AND stat_reg= 2");
            $pesertabelumverif = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id' AND stat_reg= 0");

            $pesertalulus = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id' AND kelulusan= 1");
            $pesertatidaklulus = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id' AND kelulusan= 2");
            $pesertabelumlulus = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id' AND kelulusan= 0");

        ?>

            <tr>
                <td><?= $no_ukm ?></td>
                <td><?= $ukm->fakultas ?></td>
                <td><?= $pesertaverif->num_rows() ?></td>
                <td><?= $pesertanonverif->num_rows() ?></td>
                <td><?= $pesertabelumverif->num_rows() ?></td>
                <td><?= $pesertalulus->num_rows() ?></td>
                <td><?= $pesertatidaklulus->num_rows() ?></td>
                <td><?= $pesertabelumlulus->num_rows() ?></td>
                <td><?= $peserta->num_rows() ?></td>
            </tr>



        <?php
            $no_ukm++;
        } ?>

    </tbody>

</table>