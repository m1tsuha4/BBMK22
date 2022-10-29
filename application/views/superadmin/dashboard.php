<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <ul class="list-group">
                <li class="list-group-item bg-light">
                    <h3 class="text-danger">Daftar Peserta Terdaftar </h3>
                </li>

                <li class="list-group-item">
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>BP</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>UKM</th>
                            <th>Kelulusan</th>



                        </tr>
                        <?php
                        $no = 1;
                        foreach ($peserta as $ps) :
                            $jurusan = $this->db->query("SELECT * FROM jurusan WHERE id = '" . $ps->jurusan . "'")->row();
                            $ukm = $this->db->query("SELECT * FROM ukm WHERE id = '" . $ps->id_ukm . "'")->row();

                            if ($ps->kelulusan == 1) {
                                $kelulusan = "Lulus";
                            } else if ($ps->kelulusan == 0) {
                                $kelulusan = "Belum Lulus ";
                            } else {
                                $kelulusan = "Tidak Lulus";
                            }
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $ps->nobp ?></td>
                                <td><?= $ps->nama ?></td>
                                <td><?= @$jurusan->nama ?></td>
                                <td><?= @$ukm->nama ?></td>
                                <td><?= $kelulusan ?></td>

                            </tr>




                        <?php
                            $no = $no + 1;
                        endforeach
                        ?>
                    </table>
                </li>
            </ul>
        </div>
    </section>
</div>