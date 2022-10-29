<?php
// Peserta 2021
$jumlah_peserta21 = $this->db->query("SELECT* FROM peserta WHERE tahun ='2021'")->num_rows();
$jumlah_verif21 = $this->db->query("SELECT* FROM peserta WHERE stat_reg= 1 AND tahun ='2021'")->num_rows();
$jumlah_nonverif21 = $this->db->query("SELECT* FROM peserta WHERE stat_reg= 2 AND tahun ='2021'")->num_rows();
$jumlah_belumverif21 = $this->db->query("SELECT* FROM peserta WHERE stat_reg= 0 AND tahun ='2021'")->num_rows();

$jumlah_lulus21 = $this->db->query("SELECT* FROM peserta WHERE kelulusan= 1 AND tahun ='2021'")->num_rows();
$jumlah_tidaklulus21 = $this->db->query("SELECT* FROM peserta WHERE kelulusan= 2 AND tahun ='2021'")->num_rows();
$jumlah_belumlulus21 = $this->db->query("SELECT* FROM peserta WHERE kelulusan= 0 AND tahun ='2021'")->num_rows();


// Peserta 2020
$jumlah_peserta20 = $this->db->query("SELECT* FROM peserta WHERE tahun is Null")->num_rows();
$jumlah_verif20 = $this->db->query("SELECT* FROM peserta WHERE stat_reg= 1 AND tahun is Null")->num_rows();
$jumlah_nonverif20 = $this->db->query("SELECT* FROM peserta WHERE stat_reg= 2 AND tahun is Null")->num_rows();
$jumlah_belumverif20 = $this->db->query("SELECT* FROM peserta WHERE stat_reg= 0 AND tahun is Null")->num_rows();

$jumlah_lulus20 = $this->db->query("SELECT* FROM peserta WHERE kelulusan= 1 AND tahun is Null")->num_rows();
$jumlah_tidaklulus20 = $this->db->query("SELECT* FROM peserta WHERE kelulusan= 2 AND tahun is Null")->num_rows();
$jumlah_belumlulus20 = $this->db->query("SELECT* FROM peserta WHERE kelulusan= 0 AND tahun is Null")->num_rows();

$peserta_20_lk = $this->db->query("SELECT* FROM peserta WHERE jk='Laki - Laki' AND tahun is null")->num_rows();
$peserta_20_p = $this->db->query("SELECT* FROM peserta WHERE jk='Perempuan' AND tahun is null")->num_rows();

$peserta_21_lk = $this->db->query("SELECT* FROM peserta WHERE jk='Laki - Laki' AND tahun ='2021'")->num_rows();
$peserta_21_p = $this->db->query("SELECT* FROM peserta WHERE jk='Perempuan' AND tahun ='2021'")->num_rows();
?>



<!-- grafik Fakultas -->
<div class="row mt-5">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4" style="background-color:#e6eff6">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Grafik Peserta per Fakultas</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="fakultasChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <h3>Fakultas </h3>
    <table id="faculty" class="display" style="width: 100%">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Fakultas</th>
                <th scope="col">Peserta Tahun 2020</th>
                <th scope="col">Peserta Tahun 2021</th>
                <th scope="col">Total Peserta</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no_ukm = 1;
            foreach ($participant_faculty->result() as $f) {
                $faculty_name = $f->nama_fakultas;
                if ($faculty_name == NULL) {
                    $faculty_name = "Tidak Di isi";
                }
            ?>
                <tr>
                    <th scope="row"><?= $no_ukm ?></th>
                    <td><?= $faculty_name ?></td>
                    <td><?= $f->y20 ?></td>
                    <td><?= $f->y21 ?></td>
                    <td><?= $f->total_participant ?></td>
                </tr>
            <?php
                $no_ukm++;
            } ?>
        </tbody>
    </table>
</div>


<!-- jurusan -->
<div class="row mt-5">
    <h3>Jurusan </h3>
    <table id="major" class="display" style="width: 100%">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Fakultas</th>
                <th scope="col">Peserta Tahun 2020</th>
                <th scope="col">Peserta Tahun 2021</th>
                <th scope="col">Total Peserta</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no_ukm = 1;
            foreach ($major->result() as $m) {
            ?>
                <tr>
                    <th scope="row"><?= $no_ukm ?></th>
                    <td><?= $m->nama_jurusan ?></td>
                    <td><?= $m->fakultas ?></td>
                    <td><?= $m->y20 ?></td>
                    <td><?= $m->y21 ?></td>
                    <td><?= $m->total_participant ?></td>
                </tr>
            <?php
                $no_ukm++;
            } ?>
        </tbody>
    </table>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js
    "></script>
<script>
    $(document).ready(function() {
        $("#faculty").DataTable();
    });
    $(document).ready(function() {
        $("#major").DataTable();
    });
</script>


<!-- End of Main Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<script>
    // jurusan
    new Chart(document.getElementById("fakultasChart"), {
        type: 'bar',
        data: {
            labels: [
                <?php
                $query = $this->db->query("SELECT * FROM fakultas");
                $no_ukm = 1;
                foreach ($query->result() as $ukm) {
                    echo ('"' . $ukm->fakultas . '",');
                }
                ?>
            ],
            datasets: [{
                    label: "Peserta Tahun 2021",
                    backgroundColor: ["#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd"],
                    data: [
                        <?php
                        $query = $this->db->query("SELECT * FROM fakultas");
                        $no_ukm = 1;
                        foreach ($query->result() as $ukm) {
                            $peserta = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id'and tahun=2021");
                            echo ($peserta->num_rows() . ',');
                        }
                        ?>

                    ]
                },
                {
                    label: "Peserta Tahun 2020",
                    backgroundColor: ["#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2"],
                    data: [
                        <?php
                        $query = $this->db->query("SELECT * FROM fakultas");
                        $no_ukm = 1;
                        foreach ($query->result() as $ukm) {
                            $peserta = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id'and tahun is null");
                            echo ($peserta->num_rows() . ',');
                        }
                        ?>

                    ]
                }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Fakultas Peserta BBMK 2021'
            }
        }
    });
</script>