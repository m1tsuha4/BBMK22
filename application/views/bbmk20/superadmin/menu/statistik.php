<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php
                            $jumlah_peserta = $this->db->query("SELECT* FROM peserta");
                            $jumlah_verif = $this->db->query("SELECT* FROM peserta WHERE stat_reg= 1");
                            $jumlah_nonverif = $this->db->query("SELECT* FROM peserta WHERE stat_reg= 2");
                            $jumlah_belumverif = $this->db->query("SELECT* FROM peserta WHERE stat_reg= 0");


                            $jumlah_lulus = $this->db->query("SELECT* FROM peserta WHERE kelulusan= 1");
                            $jumlah_tidaklulus = $this->db->query("SELECT* FROM peserta WHERE kelulusan= 2");
                            $jumlah_belumlulus = $this->db->query("SELECT* FROM peserta WHERE kelulusan= 0");
                            ?>
                            <h3><?= $jumlah_peserta->num_rows() ?></h3>

                            <p>Total Peserta</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $jumlah_verif->num_rows() ?></h3>

                            <p>Diverifikasi</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $jumlah_nonverif->num_rows() ?></h3>

                            <p>Verifikasi ditolak</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= $jumlah_belumverif->num_rows() ?></h3>

                            <p>Belum diverifikasi</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->

            <h3>Statstik Peserta <a class="btn btn-info" href="<?= base_url() ?>superadmin/downloadpeserta">Download Excel</a> </h3>
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
                            <canvas id="doughnut-chart" width="800" height="450"></canvas>
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







            <div class="row">


                <!-- open card tag  -->
                <?php
                $query = $this->db->query("SELECT * FROM ukm");
                $no_ukm = 1;
                foreach ($query->result() as $ukm) {

                    $peserta = $this->db->query("SELECT* FROM peserta WHERE id_ukm ='$ukm->id'");
                    $pesertaverif = $this->db->query("SELECT* FROM peserta WHERE id_ukm ='$ukm->id' AND stat_reg= 1");
                    $pesertanonverif = $this->db->query("SELECT* FROM peserta WHERE id_ukm ='$ukm->id' AND stat_reg= 2");
                    $pesertabelumverif = $this->db->query("SELECT* FROM peserta WHERE id_ukm ='$ukm->id' AND stat_reg= 0");

                    $pesertalulus = $this->db->query("SELECT* FROM peserta WHERE id_ukm ='$ukm->id' AND kelulusan= 1");
                    $pesertatidaklulus = $this->db->query("SELECT* FROM peserta WHERE id_ukm ='$ukm->id' AND kelulusan= 2");
                    $pesertabelumlulus = $this->db->query("SELECT* FROM peserta WHERE id_ukm ='$ukm->id' AND kelulusan= 0");

                ?>


                    <div class="card col-md-4 offset-md-1">
                        <img class="card-img-top php" src="<?= base_url() ?>assets/img/logo/<?= $ukm->logo ?>" alt="Card image cap">

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Pendaftar : <?= $peserta->num_rows() ?></li>
                            <li class="list-group-item">Diverifikasi : <?= $pesertaverif->num_rows() ?></li>
                            <li class="list-group-item">Tidak Diverifikasi : <?= $pesertanonverif->num_rows() ?></li>
                            <li class="list-group-item">Diverifikasi : <?= $pesertabelumverif->num_rows() ?></li>

                            <li class="list-group-item">Lulus : <?= $pesertalulus->num_rows() ?></li>
                            <li class="list-group-item">Tidak Lulus : <?= $pesertatidaklulus->num_rows() ?></li>
                            <li class="list-group-item">Belum Lulus : <?= $pesertabelumlulus->num_rows() ?></li>

                        </ul>
                    </div>

                <?php
                }

                ?>

                <!-- close card tag -->
            </div>
            <h3>UKM <a class="btn btn-info" href="<?= base_url() ?>superadmin/downloadukm">Download Excel</a> </h3>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">UKM</th>
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
                        $query = $this->db->query("SELECT * FROM ukm");
                        $no_ukm = 1;
                        foreach ($query->result() as $ukm) {

                            $peserta = $this->db->query("SELECT* FROM peserta WHERE id_ukm ='$ukm->id'");
                            $pesertaverif = $this->db->query("SELECT* FROM peserta WHERE id_ukm ='$ukm->id' AND stat_reg= 1");
                            $pesertanonverif = $this->db->query("SELECT* FROM peserta WHERE id_ukm ='$ukm->id' AND stat_reg= 2");
                            $pesertabelumverif = $this->db->query("SELECT* FROM peserta WHERE id_ukm ='$ukm->id' AND stat_reg= 0");

                            $pesertalulus = $this->db->query("SELECT* FROM peserta WHERE id_ukm ='$ukm->id' AND kelulusan= 1");
                            $pesertatidaklulus = $this->db->query("SELECT* FROM peserta WHERE id_ukm ='$ukm->id' AND kelulusan= 2");
                            $pesertabelumlulus = $this->db->query("SELECT* FROM peserta WHERE id_ukm ='$ukm->id' AND kelulusan= 0");

                        ?>
                            <tr>
                                <th scope="row"><?= $no_ukm ?></th>
                                <td><?= $ukm->nama ?></td>
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
            <h3>Fakultas <a class="btn btn-info" href="<?= base_url() ?>superadmin/downloadfakultas">Download Excel</a> </h3>
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

                            $peserta = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id'");
                            $pesertaverif = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id' AND stat_reg= 1");
                            $pesertanonverif = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id' AND stat_reg= 2");
                            $pesertabelumverif = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id' AND stat_reg= 0");

                            $pesertalulus = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id' AND kelulusan= 1");
                            $pesertatidaklulus = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id' AND kelulusan= 2");
                            $pesertabelumlulus = $this->db->query("SELECT* FROM peserta WHERE fakultas ='$ukm->id' AND kelulusan= 0");

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
            <h3>Jurusan <a class="btn btn-info" href="<?= base_url() ?>superadmin/downloadjurusan">Download Excel</a> </h3>
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

        </div>
    </section>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<script>
    new Chart(document.getElementById("doughnut-chart"), {
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
                text: 'Fakultas Peserta BBMK 2021'
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