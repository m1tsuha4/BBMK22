<!-- Content Row - Jumlah Peserta -->
<div class="row mt-5">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4" style="background-color:#e6eff6">
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

<div class="row mt-5">
    <div class="col-md-6">
        <div class="card shadow mb-4" style="background-color:#e6eff6">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Peserta 2020</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>

                            <th scope="col">Lulus</th>
                            <th scope="col">Tidak Lulus</th>
                            <th scope="col">Belum Diisi </th>

                        </tr>
                    </thead>
                    <tbody>

                        <td><?= $all_participant->pass20 ?></td>
                        <td><?= $all_participant->not_pass20 ?></td>
                        <td><?= $all_participant->npass20 ?></td>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow mb-4" style="background-color:#e6eff6">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Peserta 2021</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>

                            <th scope="col">Lulus</th>
                            <th scope="col">Tidak Lulus</th>
                            <th scope="col">Belum Diisi </th>

                        </tr>
                    </thead>
                    <tbody>

                        <td><?= $all_participant->pass21 ?></td>
                        <td><?= $all_participant->not_pass21 ?></td>
                        <td><?= $all_participant->npass21 ?></td>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
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

                    echo ($all_participant->pass21 . ',');
                    echo ($all_participant->not_pass21 . ',');
                    echo ($all_participant->npass21 . ',');

                    ?>

                ]
            }, {
                label: "Peserta 2021",
                backgroundColor: ["#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", "#8e5ea2", ],
                data: [
                    <?php

                    echo ($all_participant->pass20 . ',');
                    echo ($all_participant->not_pass20 . ',');
                    echo ($all_participant->npass20 . ',');

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

    new Chart(document.getElementById("pesertaGraph"), {
        type: 'pie',
        data: {
            labels: ["Peserta Tahun 2020", "Peserta 2021"],
            datasets: [{
                label: "Peserta 2021",
                backgroundColor: ["#3e95cd", 'rgb(255, 205, 86)'],
                data: [
                    <?php
                    echo ($all_participant->y20 . ',');
                    echo ($all_participant->y21);

                    ?>
                ]
            }, ]
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
                label: "Peserta 2020",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f"],
                data: [
                    <?php
                    echo ($all_participant->pass20 . ',');
                    echo ($all_participant->npass20 . ',');
                    echo ($all_participant->not_pass20 . ',');

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
                    echo ($all_participant->pass21 . ',');
                    echo ($all_participant->npass21 . ',');
                    echo ($all_participant->not_pass21 . ',');

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