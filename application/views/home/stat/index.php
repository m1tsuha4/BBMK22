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


<!-- Content Row - Jumlah Peserta -->
<div class="row mt-5">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Grafik Peserta 2020 dan 2021</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="pesertaGraph"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Grafik Peserta 2020</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="pesertaLulus20"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Grafik Peserta 2021</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="pesertaLulus21"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- ===== Content Row - Chart Peserta ===== -->
<div class="row">
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Grafik Kelulusan Peserta</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="passChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Grafik Verifikasi Peserta</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie">
                    <canvas id="verifChart"></canvas>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- grafik ukm -->
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
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

<!-- grafik Fakultas -->
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
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

<!-- Grafik Kelulusan Per UKM -->
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
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
        <div class="card shadow mb-4">
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
        <div class="card shadow mb-4">
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
    new Chart(document.getElementById("verifChart"), {
        type: 'bar',
        data: {
            labels: ["Diverifikasi", "Belum Diverifikasi", "Tidak Diverifikasi"],
            datasets: [{
                    label: "Peserta 2021",
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#ffc93c", "#dbf6e9", "#9ddfd3", "#31326f", "#31326f", "#e84545", "#903749", "#53354a", "#f39189", "#bb8082", "#6e7582", "#046582", "#f8f5f1", "#1f441e", "#cee6b4"],
                    data: [
                        <?php
                        echo ($jumlah_verif21 . ',');
                        echo ($jumlah_belumverif21 . ',');
                        echo ($jumlah_nonverif21 . ',');

                        ?>
                    ]
                },
                {
                    label: "Peserta 2020",
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#ffc93c", "#dbf6e9", "#9ddfd3", "#31326f", "#31326f", "#e84545", "#903749", "#53354a", "#f39189", "#bb8082", "#6e7582", "#046582", "#f8f5f1", "#1f441e", "#cee6b4"],
                    data: [
                        <?php
                        echo ($jumlah_verif20 . ',');
                        echo ($jumlah_belumverif20 . ',');
                        echo ($jumlah_nonverif20 . ',');

                        ?>
                    ]
                }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Total Participant'
            }
        }
    });


    // kelulusan
    new Chart(document.getElementById("passChart"), {
        type: 'bar',
        data: {
            labels: ["Lulus", "Tidak Lulus", "Belum Lulus"],
            datasets: [{
                label: "Peserta 2020",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#ffc93c", "#dbf6e9", "#9ddfd3", "#31326f", "#31326f", "#e84545", "#903749", "#53354a", "#f39189", "#bb8082", "#6e7582", "#046582", "#f8f5f1", "#1f441e", "#cee6b4"],
                data: [
                    <?php

                    echo ($jumlah_lulus21 . ',');
                    echo ($jumlah_tidaklulus21 . ',');
                    echo ($jumlah_belumlulus21 . ',');

                    ?>

                ]
            }, {
                label: "Peserta 2021",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#ffc93c", "#dbf6e9", "#9ddfd3", "#31326f", "#31326f", "#e84545", "#903749", "#53354a", "#f39189", "#bb8082", "#6e7582", "#046582", "#f8f5f1", "#1f441e", "#cee6b4"],
                data: [
                    <?php

                    echo ($jumlah_lulus20 . ',');
                    echo ($jumlah_tidaklulus20 . ',');
                    echo ($jumlah_belumlulus20 . ',');

                    ?>

                ]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Total Participant Passed'
            }
        }
    });


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
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#ffc93c", "#dbf6e9", "#9ddfd3", "#31326f", "#31326f", "#e84545", "#903749", "#53354a", "#f39189", "#bb8082", "#6e7582", "#046582", "#f8f5f1", "#1f441e", "#cee6b4"],
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
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#ffc93c", "#dbf6e9", "#9ddfd3", "#31326f", "#31326f", "#e84545", "#903749", "#53354a", "#f39189", "#bb8082", "#6e7582", "#046582", "#f8f5f1", "#1f441e", "#cee6b4"],
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
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#ffc93c", "#dbf6e9", "#9ddfd3", "#31326f", "#31326f", "#e84545", "#903749", "#53354a", "#f39189", "#bb8082", "#6e7582", "#046582", "#f8f5f1", "#1f441e", "#cee6b4"],
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
                    label: "Peserta Tahun 2020 (millions)",
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#ffc93c", "#dbf6e9", "#9ddfd3", "#31326f", "#31326f", "#e84545", "#903749", "#53354a", "#f39189", "#bb8082", "#6e7582", "#046582", "#f8f5f1", "#1f441e", "#cee6b4"],
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
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#ffc93c", "#dbf6e9", "#9ddfd3", "#31326f", "#31326f", "#e84545", "#903749", "#53354a", "#f39189", "#bb8082", "#6e7582", "#046582", "#f8f5f1", "#1f441e", "#cee6b4"],
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
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#ffc93c", "#dbf6e9", "#9ddfd3", "#31326f", "#31326f", "#e84545", "#903749", "#53354a", "#f39189", "#bb8082", "#6e7582", "#046582", "#f8f5f1", "#1f441e", "#cee6b4"],
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
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#ffc93c", "#dbf6e9", "#9ddfd3", "#31326f", "#31326f", "#e84545", "#903749", "#53354a", "#f39189", "#bb8082", "#6e7582", "#046582", "#f8f5f1", "#1f441e", "#cee6b4"],
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
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#ffc93c", "#dbf6e9", "#9ddfd3", "#31326f", "#31326f", "#e84545", "#903749", "#53354a", "#f39189", "#bb8082", "#6e7582", "#046582", "#f8f5f1", "#1f441e", "#cee6b4"],
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
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#ffc93c", "#dbf6e9", "#9ddfd3", "#31326f", "#31326f", "#e84545", "#903749", "#53354a", "#f39189", "#bb8082", "#6e7582", "#046582", "#f8f5f1", "#1f441e", "#cee6b4"],
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
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#ffc93c", "#dbf6e9", "#9ddfd3", "#31326f", "#31326f", "#e84545", "#903749", "#53354a", "#f39189", "#bb8082", "#6e7582", "#046582", "#f8f5f1", "#1f441e", "#cee6b4"],
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

    new Chart(document.getElementById("pesertaGraph"), {
        type: 'bar',
        data: {
            labels: ["Laki-laki", "Perempuan"],
            datasets: [{
                    label: "Peserta 2021",
                    backgroundColor: ["#3e95cd", "#3e95cd", "#3e95cd"],
                    data: [
                        <?php
                        echo ($peserta_21_lk . ',');
                        echo ($peserta_21_p . ',');
                        ?>
                    ]
                },
                {
                    label: "Peserta 2020",
                    backgroundColor: ["#c45850", "#c45850", "#c45850"],
                    data: [
                        <?php
                        echo ($peserta_20_lk . ',');
                        echo ($peserta_20_p . ',');
                        ?>
                    ]
                }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Total Participant'
            }
        }
    });

    new Chart(document.getElementById("pesertaLulus20"), {
        type: 'pie',
        data: {
            labels: ["Peserta Lulus", "Peserta Belum Lulus", "Peserta Tidak lulus"],
            datasets: [{
                label: "Peserta 2022",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f"],
                data: [
                    <?php
                    echo ($jumlah_lulus20 . ',');
                    echo ($jumlah_belumlulus20 . ',');
                    echo ($jumlah_tidaklulus20 . ',');
                    ?>
                ]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Total Participant'
            }
        }
    });


    new Chart(document.getElementById("pesertaLulus21"), {
        type: 'pie',
        data: {
            labels: ["Peserta Lulus", "Peserta Belum Lulus", "Peserta Tidak lulus"],
            datasets: [{
                label: "Peserta 2022",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f"],
                data: [
                    <?php
                    echo ($jumlah_lulus21 . ',');
                    echo ($jumlah_belumlulus21 . ',');
                    echo ($jumlah_tidaklulus21 . ',');
                    ?>
                ]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Total Participant'
            }
        }
    });
</script>