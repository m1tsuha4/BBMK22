<?php

header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=laporan fakultas.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">



    <tbody>
        <!-- Jurusan -->
        <?php
        $query = $this->db->query("SELECT * FROM fakultas");
        $no_ukm = 1;
        foreach ($query->result() as $ukm) {
        ?>
            <h3>Fakultas <?= $ukm->fakultas ?></h3>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Lulus</th>
                            <th scope="col">Tidak Lulus</th>
                            <th scope="col">Belum Lulus</th>
                            <th scope="col">Verif </th>
                            <th scope="col">Belum Verif</th>
                            <th scope="col">Tolak Verif</th>
                            <th scope="col">Total</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $jquery = $this->db->query("SELECT * FROM jurusan WHERE id_fakultas=$ukm->id");
                        $no_j = 1;
                        foreach ($jquery->result() as $j) {
                            $peserta = $this->db->query("SELECT* FROM peserta WHERE jurusan ='$j->id'");
                            $pesertaverif = $this->db->query("SELECT* FROM peserta WHERE jurusan ='$j->id' AND stat_reg= 1");
                            $pesertanonverif = $this->db->query("SELECT* FROM peserta WHERE jurusan ='$j->id' AND stat_reg= 2");
                            $pesertabelumverif = $this->db->query("SELECT* FROM peserta WHERE jurusan ='$j->id' AND stat_reg= 0");

                            $pesertalulus = $this->db->query("SELECT* FROM peserta WHERE jurusan ='$j->id' AND kelulusan= 1");
                            $pesertatidaklulus = $this->db->query("SELECT* FROM peserta WHERE jurusan ='$j->id' AND kelulusan= 2");
                            $pesertabelumlulus = $this->db->query("SELECT* FROM peserta WHERE jurusan ='$j->id' AND kelulusan= 0");

                        ?>
                            <tr>
                                <th scope="row"><?= $no_j ?></th>
                                <td><?= $j->nama ?></td>
                                <td><?= $pesertalulus->num_rows() ?></td>
                                <td><?= $pesertatidaklulus->num_rows()  ?></td>
                                <td><?= $pesertabelumlulus->num_rows() ?></td>
                                <td><?= $pesertaverif->num_rows()  ?></td>
                                <td><?= $pesertanonverif->num_rows() ?></td>
                                <td><?= $pesertabelumverif->num_rows()  ?></td>
                                <td><?= $peserta->num_rows() ?></td>

                            </tr>
                        <?php
                            $no_j++;
                        } ?>
                    </tbody>
                </table>
            </div>
            <!-- Jurusan -->
        <?php } ?>

    </tbody>

</table>