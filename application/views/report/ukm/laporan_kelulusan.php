<?php

header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=laporan_kelulusan.xls");

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

?>

<table border="1" width="100%">

    <thead>

        <tr>
            <th scope="col">No</th>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Kontak</th>
            <th scope="col">Status Kelulusan</th>



        </tr>

    </thead>

    <tbody>

        <?php
        $no = 1;
        $reg1 = 1;
        $reg2 = 2;

        foreach ($query->result() as $key) {
            if ($key->kelulusan == 1) {
                $status = "Lulus";
            } else if ($key->stat_reg == 2) {
                $status = "Tidak Lulus";
            } else {
                $status = "Belum Diisi";
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
                <td><?= $no++; ?></td>
                <td><?= $key->nobp; ?></td>
                <td><?= $key->nama; ?></td>
                <td><?= $jurusan; ?></td>
                <td><?= $key->hp; ?></td>
                <td><?= $status; ?></td>

            </tr>

        <?php } ?>



    </tbody>

</table>