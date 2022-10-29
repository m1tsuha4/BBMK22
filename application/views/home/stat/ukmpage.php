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

<!-- grafik ukm -->
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4" style="background-color:#e6eff6">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Grafik Peserta per UKM</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="ukmChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Grafik Kelulusan Per UKM -->
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4" style="background-color:#e6eff6">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Grafik Kelulusan per UKM</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="ukmKelulusan"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4" style="background-color:#e6eff6">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Grafik Tidak Lulus per UKM</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="ukmTidakLulus"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4" style="background-color:#e6eff6">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Grafik Belum Diproses per UKM</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="ukmProses"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<script>
    new Chart(document.getElementById("ukmChart"), {
        type: 'bar',
        data: {
            labels: [
                <?php
                $query = $this->db->query("SELECT * FROM ukm");
                $no_ukm = 1;
                foreach ($query->result() as $ukm) {
                    echo ('"' . $ukm->nama . '",');
                }
                ?>
            ],
            datasets: [{
                    label: "Peserta Tahun 2020",
                    backgroundColor: ["#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd"],
                    data: [
                        <?php
                        $query = $this->db->query("SELECT * FROM ukm");
                        $no_ukm = 1;
                        foreach ($query->result() as $ukm) {
                            $peserta = $this->db->query("SELECT* FROM peserta WHERE id_ukm = $ukm->id AND tahun = 2021");
                            echo ($peserta->num_rows() . ',');
                        }
                        ?>
                    ]
                },
                {
                    label: "Peserta Tahun 2021",
                    backgroundColor: ["#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2"],
                    data: [
                        <?php
                        $query = $this->db->query("SELECT * FROM ukm");
                        $no_ukm = 1;
                        foreach ($query->result() as $ukm) {
                            $peserta = $this->db->query("SELECT* FROM peserta WHERE id_ukm = $ukm->id AND tahun is null ");
                            echo ($peserta->num_rows() . ',');
                        }
                        ?>
                    ]
                },




            ],

        },
        options: {
            title: {
                display: true,
                text: 'Peserta BBMK 2021'
            }
        }
    });




    new Chart(document.getElementById("ukmKelulusan"), {
        type: 'bar',
        data: {
            labels: [
                <?php
                $query = $this->db->query("SELECT * FROM ukm");
                $no_ukm = 1;
                foreach ($query->result() as $ukm) {
                    echo ('"' . $ukm->nama . '",');
                }
                ?>
            ],
            datasets: [{
                    label: "Peserta Tahun 2020",
                    backgroundColor: ["#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd"],
                    data: [
                        <?php
                        $query = $this->db->query("SELECT * FROM ukm");
                        $no_ukm = 1;
                        foreach ($query->result() as $ukm) {
                            $peserta = $this->db->query("SELECT* FROM peserta WHERE id_ukm = $ukm->id AND tahun = 2021 AND kelulusan=1");
                            echo ($peserta->num_rows() . ',');
                        }
                        ?>
                    ]
                },
                {
                    label: "Peserta Tahun 2021",
                    backgroundColor: ["#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2"],
                    data: [
                        <?php
                        $query = $this->db->query("SELECT * FROM ukm");
                        $no_ukm = 1;
                        foreach ($query->result() as $ukm) {
                            $peserta = $this->db->query("SELECT* FROM peserta WHERE id_ukm = $ukm->id AND kelulusan=1 AND tahun is null ");
                            echo ($peserta->num_rows() . ',');
                        }
                        ?>
                    ]
                },
            ],

        },
        options: {
            title: {
                display: true,
                text: 'Peserta BBMK 2021'
            }
        }
    });


    new Chart(document.getElementById("ukmTidakLulus"), {
        type: 'bar',
        data: {
            labels: [
                <?php
                $query = $this->db->query("SELECT * FROM ukm");
                $no_ukm = 1;
                foreach ($query->result() as $ukm) {
                    echo ('"' . $ukm->nama . '",');
                }
                ?>
            ],
            datasets: [{
                    label: "Peserta Tahun 2020",
                    backgroundColor: ["#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd"],
                    data: [
                        <?php
                        $query = $this->db->query("SELECT * FROM ukm");
                        $no_ukm = 1;
                        foreach ($query->result() as $ukm) {
                            $peserta = $this->db->query("SELECT* FROM peserta WHERE id_ukm = $ukm->id AND tahun = 2021 AND kelulusan=2");
                            echo ($peserta->num_rows() . ',');
                        }
                        ?>
                    ]
                },
                {
                    label: "Peserta Tahun 2021",
                    backgroundColor: ["#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2"],
                    data: [
                        <?php
                        $query = $this->db->query("SELECT * FROM ukm");
                        $no_ukm = 1;
                        foreach ($query->result() as $ukm) {
                            $peserta = $this->db->query("SELECT* FROM peserta WHERE id_ukm = $ukm->id AND kelulusan=2 AND tahun is null ");
                            echo ($peserta->num_rows() . ',');
                        }
                        ?>
                    ]
                },
            ],

        },
        options: {
            title: {
                display: true,
                text: 'Peserta BBMK 2021'
            }
        }
    });

    new Chart(document.getElementById("ukmProses"), {
        type: 'bar',
        data: {
            labels: [
                <?php
                $query = $this->db->query("SELECT * FROM ukm");
                $no_ukm = 1;
                foreach ($query->result() as $ukm) {
                    echo ('"' . $ukm->nama . '",');
                }
                ?>
            ],
            datasets: [{
                    label: "Peserta Tahun 2020",
                    backgroundColor: ["#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd"],

                    data: [
                        <?php
                        $query = $this->db->query("SELECT * FROM ukm");
                        $no_ukm = 1;
                        foreach ($query->result() as $ukm) {
                            $peserta = $this->db->query("SELECT* FROM peserta WHERE id_ukm = $ukm->id AND tahun = 2021 AND kelulusan = 0");
                            echo ($peserta->num_rows() . ',');
                        }
                        ?>
                    ]
                },
                {
                    label: "Peserta Tahun 2021",
                    backgroundColor: ["#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2"],
                    data: [
                        <?php
                        $query = $this->db->query("SELECT * FROM ukm");
                        $no_ukm = 1;
                        foreach ($query->result() as $ukm) {
                            $peserta = $this->db->query("SELECT* FROM peserta WHERE id_ukm = $ukm->id AND kelulusan = 0 AND tahun is null ");
                            echo ($peserta->num_rows() . ',');
                        }
                        ?>
                    ]
                },
            ],

        },
        options: {
            title: {
                display: true,
                text: 'Peserta BBMK 2021'
            }
        }
    });
</script>