<!-- Content Row - Jumlah Peserta -->
<div class="row mt-5">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4" style="background-color:#e6eff6">

            <div class="row">
                <div class="col-md-6 pengenalanUKM-head" data-anijs="if: scroll, on: window, do: bounceInUp animated, before: scrollReveal repeat, after: scrollReveal">
                    <h1><?= $ukm->nama ?></h1>
                </div>
                <div class="col-md-5" data-anijs="if: scroll, on: window, do: bounceInDown animated, before: scrollReveal repeat, after: scrollReveal">
                    <img src="<?= base_url() ?>/assets/img/logo/<?= $ukm->logo ?>" style="width: 400px" alt="" />
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Content Row - Jumlah Peserta -->
<div class="row mt-5">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4" style="background-color:#e6eff6">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"> Statistik Peserta</h6>
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
        <div class="card shadow mb-4" style="background-color:#e6eff6">
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
        <div class="card shadow mb-4" style="background-color:#e6eff6">
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
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4" style="background-color:#e6eff6">
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
</div>



<!-- grafik Fakultas -->
<div class="row">
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
            foreach ($ukm_faculty2->result() as $f) {
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
<!-- fakultas -->

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





<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
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

<script>
    // kelulusan
    new Chart(document.getElementById("passChart"), {
        type: 'bar',
        data: {
            labels: ["Lulus", "Tidak Lulus", "Belum Lulus"],
            datasets: [{
                label: "Peserta 2020",
                backgroundColor: ["#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", ],
                data: [
                    <?php

                    echo ($participant21_pass . ',');
                    echo ($participant21_not_pass . ',');
                    echo ($participant21_n_pass . ',');

                    ?>

                ]
            }, {
                label: "Peserta 2021",
                backgroundColor: ["#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", ],
                data: [
                    <?php
                    echo ($participant20_pass . ',');
                    echo ($participant20_not_pass . ',');
                    echo ($participant20_n_pass . ',');
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



    // jurusan
    new Chart(document.getElementById("fakultasChart"), {
        type: 'bar',
        data: {
            labels: [
                <?php
                foreach ($ukm_faculty2->result() as $fakultas) {
                    echo ('"' . $fakultas->nama_fakultas . '",');
                }
                ?>
            ],
            datasets: [{
                    label: "Peserta Tahun 2021",
                    backgroundColor: ["#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", ],
                    data: [
                        <?php
                        foreach ($ukm_faculty2->result() as $f) {
                            echo ($f->y21 . ',');
                        }

                        ?>

                    ]
                },
                {
                    label: "Peserta Tahun 2020 ",
                    backgroundColor: ["#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", ],
                    data: [
                        <?php
                        foreach ($ukm_faculty2->result() as $f) {
                            echo ($f->y20 . ',');
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



    new Chart(document.getElementById("pesertaGraph"), {
        type: 'bar',
        data: {
            labels: ["Laki-laki", "Perempuan"],
            datasets: [{
                    label: "Peserta 2021",
                    backgroundColor: ["#3e95cd", "#3e95cd", "#3e95cd"],
                    data: [
                        <?php
                        echo ($participant21_male . ',');
                        echo ($participant21_fmale . ',');
                        ?>
                    ]
                },
                {
                    label: "Peserta 2020",
                    backgroundColor: ["#c45850", "#c45850", "#c45850"],
                    data: [
                        <?php
                        echo ($participant20_male . ',');
                        echo ($participant20_fmale . ',');
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
                    echo ($participant20_pass . ',');
                    echo ($participant20_n_pass . ',');
                    echo ($participant20_not_pass . ',');
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
                    echo ($participant21_pass . ',');
                    echo ($participant21_n_pass . ',');
                    echo ($participant21_not_pass . ',');
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