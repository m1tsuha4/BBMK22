<?php

// Peserta 2021

$jumlah_peserta21 = $this->db->query("SELECT* FROM peserta WHERE tahun ='2021'")->num_rows();
$jumlah_verif21 = $this->db->query("SELECT* FROM peserta WHERE stat_reg= 1 AND tahun ='2021'")->num_rows();
$jumlah_nonverif21 = $this->db->query("SELECT* FROM peserta WHERE stat_reg= 2 AND tahun ='2021'")->num_rows();
$jumlah_belumverif21 = $this->db->query("SELECT* FROM peserta WHERE stat_reg= 0 AND tahun ='2021'")->num_rows();


$jumlah_lulus21 = $this->db->query("SELECT* FROM peserta WHERE kelulusan= 1 AND tahun ='2021'")->num_rows();
$jumlah_tidaklulus21 = $this->db->query("SELECT* FROM peserta WHERE kelulusan= 2 AND tahun ='2021'")->num_rows();
$jumlah_belumlulus21 = $this->db->query("SELECT* FROM peserta WHERE kelulusan= 0 AND tahun ='2021'")->num_rows();

// 2020

$jumlah_peserta20 = $this->db->query("SELECT* FROM peserta WHERE tahun is NULL")->num_rows();
$jumlah_verif20 = $this->db->query("SELECT* FROM peserta WHERE stat_reg= 1 AND tahun is NULL")->num_rows();
$jumlah_nonverif20 = $this->db->query("SELECT* FROM peserta WHERE stat_reg= 2 AND tahun is NULL")->num_rows();
$jumlah_belumverif20 = $this->db->query("SELECT* FROM peserta WHERE stat_reg= 0 AND tahun is NULL")->num_rows();


$jumlah_lulus20 = $this->db->query("SELECT* FROM peserta WHERE kelulusan= 1 AND tahun is NULL")->num_rows();
$jumlah_tidaklulus20 = $this->db->query("SELECT* FROM peserta WHERE kelulusan= 2 AND tahun is NULL")->num_rows();
$jumlah_belumlulus20 = $this->db->query("SELECT* FROM peserta WHERE kelulusan= 0 AND tahun is NULL  ")->num_rows();

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Statistick 2021</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row - Jumlah Peserta -->
    <div class="row">
        <!-- Total Peserta -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Participant</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_peserta21 ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Diverifikasi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Verified</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_verif21 ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Verifikasi Ditolak -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Unverified</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jumlah_nonverif21 ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-times fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Belum Diverifikasi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">On Process </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_belumverif21 ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pass Chart</h6>
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
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Verification Chart</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-5">
                        <canvas id="verifChart" width="800" height="750"></canvas>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- 2020 -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Statistic 2020</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row - Jumlah Peserta -->
    <div class="row">
        <!-- Total Peserta -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Participant</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_peserta20 ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Diverifikasi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Verified</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_verif20 ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Verifikasi Ditolak -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Unverified</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jumlah_nonverif20 ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-times fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Belum Diverifikasi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">On Process</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_belumverif21 ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pass Chart</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="passChart20"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Verification Chart</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-5">
                        <canvas id="verifChart20" width="800" height="750"></canvas>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- 2020 -->

</div>
<!-- End of Main Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>

<script>
    new Chart(document.getElementById("verifChart"), {
        type: 'doughnut',
        data: {
            labels: ["Verificated", "On Process", "Unverified"],
            datasets: [{
                label: "Population (millions)",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#ffc93c", "#dbf6e9", "#9ddfd3", "#31326f", "#31326f", "#e84545", "#903749", "#53354a", "#f39189", "#bb8082", "#6e7582", "#046582", "#f8f5f1", "#1f441e", "#cee6b4"],
                data: [
                    <?php
                    echo ($jumlah_verif21 . ',');
                    echo ($jumlah_belumverif21 . ',');
                    echo ($jumlah_nonverif21 . ',');

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

    // kelulusan
    new Chart(document.getElementById("passChart"), {
        type: 'doughnut',
        data: {
            labels: ["Pass", "Not Pass", "Process"],
            datasets: [{
                label: "Population (millions)",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#ffc93c", "#dbf6e9", "#9ddfd3", "#31326f", "#31326f", "#e84545", "#903749", "#53354a", "#f39189", "#bb8082", "#6e7582", "#046582", "#f8f5f1", "#1f441e", "#cee6b4"],
                data: [
                    <?php

                    echo ($jumlah_lulus21 . ',');
                    echo ($jumlah_tidaklulus21 . ',');
                    echo ($jumlah_belumlulus21 . ',');

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
    // 2020

    new Chart(document.getElementById("verifChart20"), {
        type: 'doughnut',
        data: {
            labels: ["Verificated", "On Process", "Unverified"],
            datasets: [{
                label: "Population (millions)",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#ffc93c", "#dbf6e9", "#9ddfd3", "#31326f", "#31326f", "#e84545", "#903749", "#53354a", "#f39189", "#bb8082", "#6e7582", "#046582", "#f8f5f1", "#1f441e", "#cee6b4"],
                data: [
                    <?php
                    echo ($jumlah_verif20 . ',');
                    echo ($jumlah_belumverif20 . ',');
                    echo ($jumlah_nonverif20 . ',');

                    ?>
                ]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Participant'
            }
        }
    });

    // kelulusan
    new Chart(document.getElementById("passChart20"), {
        type: 'doughnut',
        data: {
            labels: ["Pass", "Not Pass", "Process"],
            datasets: [{
                label: "Population (millions)",
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
                text: 'Participant passed'
            }
        }
    });
</script>