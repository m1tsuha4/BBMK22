<?php

header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=laporan_kehadiran.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>
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
$queryss = $this->db->query("SELECT * FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'");
$dataukm = $queryss->row();

$hari1 = false;
$hari2 = false;
$hari3 = false;
$hari4 = false;

if ($dataukm->timeline1 != "") {
    $hari1 = true;
}
if ($dataukm->timeline1 != "") {
    $hari2 = true;
}
if ($dataukm->timeline1 != "") {
    $hari3 = true;
}
if ($dataukm->timeline1 != "") {
    $hari4 = true;
}

?>

<table border="1" width="100%">

    <thead>

        <tr>
            <th scope="col">No</th>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            <?php
            if ($hari1) {
            ?>
                <th scope="col">Hadir1</th>
            <?php
            }
            ?>
            <?php
            if ($hari2) {
            ?>
                <th scope="col">Hadir2</th>
            <?php
            }
            ?>
            <?php
            if ($hari3) {
            ?>
                <th scope="col">Hadir3</th>
            <?php
            }
            ?>
            <?php
            if ($hari4) {
            ?>
                <th scope="col">Hadir4</th>
            <?php
            }
            ?>



        </tr>

    </thead>

    <tbody>

        <?php
        $no = 1;
        foreach ($query->result() as $key) {

            $hadirhari1 = "Tidak Hadir";
            $hadirhari2 = "Tidak Hadir";

            $hadirhari3 = "Tidak Hadir";

            $hadirhari4 = "Tidak Hadir";


            if ($key->hadir1 == "1") {
                $hadirhari1 = "Hadir";
            }
            if ($key->hadir2 == "1") {
                $hadirhari2 = "Hadir";
            }
            if ($key->hadir3 == "1") {
                $hadirhari3 = "Hadir";
            }
            if ($key->hadir4 == "1") {
                $hadirhari4 = "Hadir";
            }


        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $key->nobp; ?></td>
                <td><?= $key->nama; ?></td>

                <?php
                if ($hari1) {
                ?>
                    <td><?= $hadirhari1; ?></td>
                <?php
                }
                ?>

                <?php
                if ($hari2) {
                ?>
                    <td><?= $hadirhari2; ?></td>
                <?php
                }
                ?>

                <?php
                if ($hari3) {
                ?>
                    <td><?= $hadirhari3; ?></td>
                <?php
                }
                ?>

                <?php
                if ($hari4) {
                ?>
                    <td><?= $hadirhari4; ?></td>
                <?php
                }
                ?>
            </tr>

        <?php

        } ?>


    </tbody>

</table>