<!-- Introduction -->
<section id="intro beranda" class="section-title mb-5" style="height: 700px;">
    <video playsinline autoplay muted loop>
        <source src="<?= base_url() ?>assets/videos/bg_vid.mp4" type="video/mp4" />
    </video>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5 glass">
                <h1> <img src="<?= base_url() ?>assets/logo/unand.png" alt="" width="40" /><b>BINA BAKAT MINAT DAN KEPEMIMPINAN</b></h1>
                <p>
                    BBMK merupakan salah satu rangkaian yang wajib diikuti oleh mahasiswa bar. BBMK bertujuan agar mahasiswa dapat mengetahui, mengenal dan ikut serta dalam pembangunan kreativitas mahasiswa di lingkungan Universitas Andalas.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End of Introduction -->

<!-- Statistic -->
<!-- <img src="assets/tengah-biru.svg"  alt="" srcset="" width="78%" class="tengah-biru"> -->
<section id="web" class="section-web mb-5">
    <div class="container">
        <h3 class="text-center"><b>
                Halaman BBMK
            </b></h3>
        <hr />
        <div class="row justify-content-md-center">
            <div class="col-md-4 justify-self-center">
                <div class="card card-style border-0 shadow-lg" style="width: 25rem">
                    <div class="card-body">
                        <img src="<?= base_url() ?>assets/images/website/bbmk20.png" class="img-fluid" />
                        <h5 class="card-title pt-4"><b>BBMK 2020</b></h5>
                        <a href="<?= base_url() ?>main20" class="btn btn-bulat rounded-pill mt-3 mb-2">Lihat Halaman</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 justify-self-center">
                <div class="card card-style border-0 shadow-lg" style="width: 25rem">
                    <div class="card-body">
                        <img src="<?= base_url() ?>assets/images/website/bbmk21.png" class="img-fluid" />
                        <h5 class="card-title pt-4"><b>BBMK 2021</b></h5>
                        <a href="<?= base_url() ?>main/index21" class="btn btn-bulat rounded-pill mt-3 mb-2">Lihat Halaman</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Statistic -->

<!-- Statistic -->
<!-- <img src="assets/tengah-biru.svg"  alt="" srcset="" width="78%" class="tengah-biru"> -->
<div class="m-blue">
    <section id="stat" class="section-stat container mt-5 pb-5 pt-5">
        <h3 class="text-center"><b>Statistik BBMK</b></h3>
        <hr />
        <div class="row">
            <div class="col card card-style border-0 shadow-lg p-5 ">
                <button class="carousel-control-prev  card-style " style="width:35px" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" style="color:black;" aria-hidden="true"><i class="fa-solid fa-angle-left"></i></i></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval=" 5000">
                            <canvas id="fakultasChart"></canvas>
                        </div>
                        <div class="carousel-item" data-bs-interval="5000">
                            <canvas id="passChart"></canvas>
                        </div>
                        <div class="carousel-item" data-bs-interval="5000">
                            <canvas id="pesertaGraph"></canvas>
                        </div>
                    </div>
                    <br />
                    <br />
                    <div class="carousel-indicators mt-4">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" style="background-color:black;" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" style="background-color:black;" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" style="background-color:black;" aria-label="Slide 3"></button>
                    </div>
                </div>
                <button class="carousel-control-next card-style" style=" width:35px;" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-prev-icon" style="color:black;" aria-hidden="true"><i class="fa-solid fa-angle-right"></i></i></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
</div>
<!-- End of Statistic -->

<!-- Documentation -->
<section id="documentation">
    <div class="container mt-5 mb-5 p-5">
        <h3 class="text-center"><b>Dokumentasi Kegiatan BBMK</b></h3>
        <hr />
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card card-style border-0 h-100">
                    <img src="<?= base_url() ?>assets/images/dokumentasi/dokum1.jpg" class="card-img-top" alt="Dokumentasi" />
                    <div class="card-body">
                        <h5 class="card-title text-center">Dokumentasi BBMK 2021</h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-style border-0 h-100">
                    <img src="<?= base_url() ?>assets/images/dokumentasi/dokum2.jpg" class="card-img-top" alt="Dokumentasi" width="90%" />
                    <div class="card-body">
                        <h5 class="card-title text-center">Dokumentasi BBMK 2020</h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-style border-0 h-100">
                    <img src="<?= base_url() ?>assets/images/dokumentasi/dokum3.jpg" class="card-img-top" alt="Dokumentasi" />
                    <div class="card-body">
                        <h5 class="card-title text-center">Dokumentasi BBMK 2019</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Documentation -->

<section id="ukm" class="section-ukm mb-5">
    <div class="container">
        <div class="row row-ukm justify-content-center">
            <div class="col ukmUkm text-center" data-anijs="if: scroll, on: window, do: lightSpeedIn animated, before: scrollReveal repeat, after: scrollReveal">
                <h1>UKM - UKM</h1>
                <hr />
            </div>
        </div>
        <div class="row justify-content-center UKM mt-2">
            <?php
            $query = $this->db->query("SELECT * FROM ukm");
            $no_ukm = 1;
            foreach ($query->result() as $ukm) {
            ?>
                <div class="col-md-4 align-self-center mb-3">
                    <div class=" card card-style  shadow-lg ">
                        <div class=" card-body justify-self-center">
                            <div class="row">
                                <img src="<?= base_url() ?>assets/img/logo/<?= $ukm->logo ?>" style="width:200px; height:200px;object-fit:contain" class="mx-auto" />
                            </div>
                            <h5 class="text-center card-title"><?= $ukm->nama ?></h5>
                            <a href="<?= base_url() ?>main/ukm21/<?= $ukm->username ?>" class="text-center btn btn-bulat rounded-pill mt-3 mb-2" style="display: block;">Lihat UKM</a>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>


    </div>
    </div>
</section>


<!-- End of Footer -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<script>
    window.onload = function() {
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
                    text: 'Total Peserta Lulus'
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
                    text: 'Total Peserta'
                }
            }
        });
    }
</script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
    $(".carousel").carousel();
</script>