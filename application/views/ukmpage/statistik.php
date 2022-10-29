<!-- ===== PAGE CONTENT ===== -->
<!-- <img src="../assets/img/bg.png" alt="" class="bg-content" /> -->
<?php
$ss = $this->db->query("SELECT id FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'")->row()->id;
$query = $this->db->query("SELECT * FROM peserta WHERE id_ukm = '$ss' AND tahun = '2021' AND stat_reg='2' ");

?>

<?php
$jumlah_peserta = $this->db->query("SELECT * FROM peserta WHERE id_ukm = '$ss' AND tahun = '2021'");
$jumlah_verif = $this->db->query("SELECT * FROM peserta WHERE id_ukm = '$ss' AND tahun = '2021'AND stat_reg='1' ");
$jumlah_nonverif = $this->db->query("SELECT * FROM peserta WHERE id_ukm = '$ss' AND tahun = '2021'AND stat_reg='2' ");
$jumlah_belumverif = $this->db->query("SELECT * FROM peserta WHERE id_ukm = '$ss' AND tahun = '2021'AND stat_reg='0' ");


$jumlah_lulus = $this->db->query("SELECT* FROM peserta WHERE id_ukm = '$ss' AND tahun = '2021' AND kelulusan= 1");
$jumlah_tidaklulus = $this->db->query("SELECT* FROM peserta WHERE id_ukm = '$ss' AND tahun = '2021' AND kelulusan= 2");
$jumlah_belumlulus = $this->db->query("SELECT* FROM peserta WHERE id_ukm = '$ss' AND tahun = '2021'AND kelulusan= 0");
?>
<div class="container-fluid">
    <h1 class="h3 mb-0 text-gray-800">Statistik BBMK 2021</h1>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                            <div class="card-header">Total Peserta</div>
                            <div class="card-body">

                                <p class="card-text"><?= $jumlah_peserta->num_rows() ?></p>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-6">
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header">Peserta Diverifikasi</div>
                            <div class="card-body">

                                <p class="card-text"><?= $jumlah_verif->num_rows() ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header">Peserta Tidak Diverifikasi</div>
                            <div class="card-body">

                                <p class="card-text"><?= $jumlah_nonverif->num_rows() ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                            <div class="card-header">Peserta Belum Diverifikasi</div>
                            <div class="card-body">

                                <p class="card-text"><?= $jumlah_belumverif->num_rows() ?></p>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.row -->
                <div class="row mt-5">



                    <div class="col-lg-3 col-6">
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header">Peserta Lulus</div>
                            <div class="card-body">

                                <p class="card-text"><?= $jumlah_lulus->num_rows() ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header">Peserta Tidak Lulus</div>
                            <div class="card-body">

                                <p class="card-text"><?= $jumlah_tidaklulus->num_rows() ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                            <div class="card-header">Peserta Belum Lulus</div>
                            <div class="card-body">

                                <p class="card-text"><?= $jumlah_belumlulus->num_rows() ?></p>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.row -->
                <div class="row mt-5">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Generate</h1>
                        <a href="<?= base_url() ?>admin/downloadpeserta" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate All Participant</a>
                        <a href="<?= base_url() ?>admin/downloadkehadiran" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Present</a>
                        <a href="<?= base_url() ?>admin/downloadkelulusan" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Pass Participant</a>

                    </div>
                </div>

                <!-- <h3>Statstik Peserta <a class="btn btn-info" href="<?= base_url() ?>superadmin/downloadpeserta">Download Excel</a> </h3> -->
                <!-- verifikasi -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Bar chart -->
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-chart-bar"></i>
                                    Diagram Lingkaran
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="verif-chart" width="800" height="450"></canvas>
                            </div>
                            <!-- /.card-body-->
                        </div>
                        <!-- /.card -->

                        <!-- Donut chart -->

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- verifikasi -->


                <!-- kelulusan -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Bar chart -->
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-chart-bar"></i>
                                    Diagram Lingkaran
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="kelulusan-chart" width="800" height="450"></canvas>
                            </div>
                            <!-- /.card-body-->
                        </div>
                        <!-- /.card -->

                        <!-- Donut chart -->

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- kelulusan -->






                <!-- fakultas -->
                <div class="row">



                    <div class="col-md-12">
                        <!-- Bar chart -->
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-chart-bar"></i>
                                    Diagram Lingkaran
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="jurusan-chart" width="800" height="450"></canvas>
                            </div>
                            <!-- /.card-body-->
                        </div>
                        <!-- /.card -->

                        <!-- Donut chart -->

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>

                <!-- fakultas -->







        </section>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
    <script>
        // kelulusan
        new Chart(document.getElementById("kelulusan-chart"), {
            type: 'doughnut',
            data: {
                labels: ["Lulus", "Tidak Lulus", "Belum Lulus"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#ffc93c", "#dbf6e9", "#9ddfd3", "#31326f", "#31326f", "#e84545", "#903749", "#53354a", "#f39189", "#bb8082", "#6e7582", "#046582", "#f8f5f1", "#1f441e", "#cee6b4"],
                    data: [
                        <?php

                        echo ($jumlah_lulus->num_rows() . ',');
                        echo ($jumlah_tidaklulus->num_rows() . ',');
                        echo ($jumlah_belumlulus->num_rows() . ',');

                        ?>

                    ]
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Diagram Kelulusan'
                }
            }
        });

        // verif
        new Chart(document.getElementById("verif-chart"), {
            type: 'doughnut',
            data: {
                labels: ["Sudah diverifikasi", "Belum diverifikasi", "Verifikasi ditolak"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#ffc93c", "#dbf6e9", "#9ddfd3", "#31326f", "#31326f", "#e84545", "#903749", "#53354a", "#f39189", "#bb8082", "#6e7582", "#046582", "#f8f5f1", "#1f441e", "#cee6b4"],
                    data: [
                        <?php
                        echo ($jumlah_verif->num_rows() . ',');
                        echo ($jumlah_belumverif->num_rows() . ',');
                        echo ($jumlah_nonverif->num_rows() . ',');

                        ?>

                    ]
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Verifikasi Peserta BBMK 2021'
                }
            }
        });

        // jurusan
        new Chart(document.getElementById("jurusan-chart"), {
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
                            $peserta = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id' AND id_ukm = '$ss' AND tahun = '2021'");
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
</div>