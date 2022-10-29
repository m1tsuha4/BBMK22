<?php
// Peserta 2021

$jumlah_peserta21 = $this->db->query("SELECT* FROM peserta WHERE tahun is NULL")->num_rows();
$jumlah_verif21 = $this->db->query("SELECT* FROM peserta WHERE stat_reg= 1 AND tahun is NULL")->num_rows();
$jumlah_nonverif21 = $this->db->query("SELECT* FROM peserta WHERE stat_reg= 2 AND tahun is NULL")->num_rows();
$jumlah_belumverif21 = $this->db->query("SELECT* FROM peserta WHERE stat_reg= 0 AND tahun is NULL")->num_rows();


$jumlah_lulus21 = $this->db->query("SELECT* FROM peserta WHERE kelulusan= 1 AND tahun is NULL")->num_rows();
$jumlah_tidaklulus21 = $this->db->query("SELECT* FROM peserta WHERE kelulusan= 2 AND tahun is NULL")->num_rows();
$jumlah_belumlulus21 = $this->db->query("SELECT* FROM peserta WHERE kelulusan= 0 AND tahun is NULL")->num_rows();

?>



<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Peserta</h1>
        <a href="<?= base_url() ?>superadmin/downloadpeserta20" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate All Participant</a>
        <a href="<?= base_url() ?>superadmin/downloadukm20" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate UKM</a>
        <a href="<?= base_url() ?>superadmin/downloadfakultas20" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Faculty</a>
        <a href="<?= base_url() ?>superadmin/downloadjurusan20" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Major</a>
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

    <!-- ===== Content Row - Chart Peserta ===== -->
    <div class="row">
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
                        <canvas id="verifChart" height=" 250"></canvas>
                    </div>

                </div>
            </div>
        </div>

        <!-- UKM Pilihan Peserta-->
        <div class="col-md-6 pb-4">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardUKM" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardUKM">
                    <h6 class="m-0 font-weight-bold text-primary">UKM Pilihan Peserta</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardUKM">
                    <div class="card-body" style="height:700px">
                        <div class="chart-pie">
                            <canvas id="ukmChart" height=" 400"></canvas>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Asal Fakultas Peserta-->
        <div class=" col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardFak" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardFak">
                    <h6 class="m-0 font-weight-bold text-primary">Fakultas Peserta</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardFak">
                    <div class="card-body" style="height:700px">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="fakultasChart" height="300"></canvas>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ===== AKHIR CHART PESERTA -->

    <!-- ===== CHART UKM ===== -->
    <div class="row">

        <?php
        $query = $this->db->query("SELECT * FROM ukm");
        $no_ukm = 1;
        foreach ($query->result() as $ukm) {

            $peserta = $this->db->query("SELECT* FROM peserta WHERE id_ukm ='$ukm->id' AND tahun is NULL");
            $pesertaverif = $this->db->query("SELECT* FROM peserta WHERE id_ukm ='$ukm->id' AND stat_reg= 1 AND tahun is NULL");
            $pesertanonverif = $this->db->query("SELECT* FROM peserta WHERE id_ukm ='$ukm->id' AND stat_reg= 2 AND tahun is NULL");
            $pesertabelumverif = $this->db->query("SELECT* FROM peserta WHERE id_ukm ='$ukm->id' AND stat_reg= 0 AND tahun is NULL");

            $pesertalulus = $this->db->query("SELECT* FROM peserta WHERE id_ukm ='$ukm->id' AND kelulusan= 1 AND tahun is NULL");
            $pesertatidaklulus = $this->db->query("SELECT* FROM peserta WHERE id_ukm ='$ukm->id' AND kelulusan= 2 AND tahun is NULL");
            $pesertabelumlulus = $this->db->query("SELECT* FROM peserta WHERE id_ukm ='$ukm->id' AND kelulusan= 0 AND tahun is NULL");

        ?>

            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <a href="#collapseCardDataUKM" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary"><?= $ukm->nama ?></h6>
                    </a>
                    <div class="collapse show" id="collapseCardDataUKM">
                        <div class="card-body">
                            <div class="text-center">
                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 200px" src="<?= base_url() ?>/assets/img/logo/<?= $ukm->logo ?>" alt="..." />
                            </div>
                            <table class="table table-borderless" style="width: 60%; margin-left: auto; margin-right: auto">
                                <tr>
                                    <td>Pendaftar</td>
                                    <td>:</td>
                                    <td><?= $peserta->num_rows() ?></td>
                                </tr>
                                <tr>
                                    <td>Diverifikasi</td>
                                    <td>:</td>
                                    <td><?= $pesertaverif->num_rows() ?></td>
                                </tr>
                                <tr>
                                    <td>Belum Diverifikasi</td>
                                    <td>:</td>
                                    <td><?= $pesertabelumverif->num_rows() ?></td>
                                </tr>
                                <tr>
                                    <td>Tidak Diverifikasi</td>
                                    <td>:</td>
                                    <td><?= $pesertanonverif->num_rows() ?></td>
                                </tr>
                                <tr>
                                    <td>Lulus</td>
                                    <td>:</td>
                                    <td><?= $pesertalulus->num_rows() ?></td>
                                </tr>
                                <tr>
                                    <td>Tidak Lulus</td>
                                    <td>:</td>
                                    <td><?= $pesertatidaklulus->num_rows() ?></td>
                                </tr>
                                <tr>
                                    <td>Belum Lulus</td>
                                    <td>:</td>
                                    <td><?= $pesertabelumlulus->num_rows() ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>




    </div>
    <!-- ===== AKHIR CHART UKM ===== -->

    <!-- fakultas -->
    <h3>Fakultas </h3>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Fakultas</th>
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
                $query = $this->db->query("SELECT * FROM fakultas");
                $no_ukm = 1;
                foreach ($query->result() as $ukm) {

                    $peserta = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id' AND tahun is NULL ");
                    $pesertaverif = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id' AND stat_reg= 1 AND tahun is NULL");
                    $pesertanonverif = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id' AND stat_reg= 2 AND tahun is NULL");
                    $pesertabelumverif = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id' AND stat_reg= 0 AND tahun is NULL");

                    $pesertalulus = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id' AND kelulusan= 1 AND tahun is NULL");
                    $pesertatidaklulus = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id' AND kelulusan= 2 AND tahun is NULL");
                    $pesertabelumlulus = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id' AND kelulusan= 0 AND tahun is NULL");

                ?>
                    <tr>
                        <th scope="row"><?= $no_ukm ?></th>
                        <td><?= $ukm->fakultas ?></td>
                        <td><?= $pesertalulus->num_rows() ?></td>
                        <td><?= $pesertatidaklulus->num_rows()  ?></td>
                        <td><?= $pesertabelumlulus->num_rows() ?></td>
                        <td><?= $pesertaverif->num_rows()  ?></td>
                        <td><?= $pesertanonverif->num_rows() ?></td>
                        <td><?= $pesertabelumverif->num_rows()  ?></td>
                        <td><?= $peserta->num_rows() ?></td>

                    </tr>
                <?php
                    $no_ukm++;
                } ?>
            </tbody>
        </table>
    </div>
    <!-- fakultas -->

    <!-- Jurusan -->
    <h3>Jurusan</h3>
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
                        $peserta = $this->db->query("SELECT* FROM peserta WHERE jurusan ='$j->id' AND tahun is NULL");
                        $pesertaverif = $this->db->query("SELECT* FROM peserta WHERE jurusan ='$j->id' AND stat_reg= 1 AND tahun is NULL");
                        $pesertanonverif = $this->db->query("SELECT* FROM peserta WHERE jurusan ='$j->id' AND stat_reg= 2 AND tahun is NULL");
                        $pesertabelumverif = $this->db->query("SELECT* FROM peserta WHERE jurusan ='$j->id' AND stat_reg= 0 AND tahun is NULL");

                        $pesertalulus = $this->db->query("SELECT* FROM peserta WHERE jurusan ='$j->id' AND kelulusan= 1 AND tahun is NULL");
                        $pesertatidaklulus = $this->db->query("SELECT* FROM peserta WHERE jurusan ='$j->id' AND kelulusan= 2 AND tahun is NULL");
                        $pesertabelumlulus = $this->db->query("SELECT* FROM peserta WHERE jurusan ='$j->id' AND kelulusan= 0 AND tahun is NULL");

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

</div>

<!-- /.container-fluid -->
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


    new Chart(document.getElementById("ukmChart"), {
        type: 'doughnut',
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
                label: "Population (millions)",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#ffc93c", "#dbf6e9", "#9ddfd3", "#31326f", "#31326f", "#e84545", "#903749", "#53354a", "#f39189", "#bb8082", "#6e7582", "#046582", "#f8f5f1", "#1f441e", "#cee6b4"],
                data: [
                    <?php
                    $query = $this->db->query("SELECT * FROM ukm");
                    $no_ukm = 1;
                    foreach ($query->result() as $ukm) {
                        $peserta = $this->db->query("SELECT* FROM peserta WHERE id_ukm ='$ukm->id'");
                        echo ($peserta->num_rows() . ',');
                    }
                    ?>

                ]
            }]
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
        type: 'doughnut',
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
                label: "Population (millions)",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#ffc93c", "#dbf6e9", "#9ddfd3", "#31326f", "#31326f", "#e84545", "#903749", "#53354a", "#f39189", "#bb8082", "#6e7582", "#046582", "#f8f5f1", "#1f441e", "#cee6b4"],
                data: [
                    <?php
                    $query = $this->db->query("SELECT * FROM fakultas");
                    $no_ukm = 1;
                    foreach ($query->result() as $ukm) {
                        $peserta = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id'");
                        echo ($peserta->num_rows() . ',');
                    }
                    ?>

                ]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Fakultas Peserta BBMK 2021'
            }
        }
    });
</script>