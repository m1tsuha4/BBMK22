<?php
$ukm = $this->db->query("SELECT * FROM ukm WHERE username = '" . $ukmid . "'")->row();
?>


<!-- ===== BERANDA ===== -->
<section id="beranda">
    <div class="container">
        <div class="row">
            <div class="col-md-6 me-2 col-beranda">
                <!-- <div class="be-bg">
              <img src="assets/img/bg.png" class="element" alt="" />
            </div> -->
                <div class="be-text" data-anijs="if: scroll, on: window, do: bounceInLeft animated, before: scrollReveal repeat, after: scrollReveal">
                    <h1>BBMK</h1>
                    <h2>2021</h2>
                </div>
                <!-- <a href="<?= base_url(); ?>/main/daftar">
                       <button class="btn btnBeranda" type="button">
                           Daftar Segera!
                       </button>
                   </a> -->
            </div>
            <div class="col-auto beranda" data-anijs="if: scroll, on: window, do: bounceInRight animated, before: scrollReveal repeat, after: scrollReveal">
                <img src="<?= base_url(); ?>assets3/img/beranda.png" alt="BERANDA" />
            </div>
        </div>
    </div>
    <div class="row beranda-arrow">
        <a href="#pengenalan"> <i class="uil uil-angle-down"></i></a>
    </div>
</section>
<!-- Ukm -->
<section id="pengenalan">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-5 pengenalanUKM" data-anijs="if: scroll, on: window, do: bounceInDown animated, before: scrollReveal repeat, after: scrollReveal">
                <img src="<?= base_url() ?>/assets/img/logo/<?= $ukm->logo ?>" style="width: 400px" alt="" />
                <p>“ <?= $ukm->deskripsi ?>”</p>
            </div>
            <div class="col-md-6 pengenalanUKM-head" data-anijs="if: scroll, on: window, do: bounceInUp animated, before: scrollReveal repeat, after: scrollReveal">
                <h2>APA ITU</h2>
                <h1><?= $ukm->nama ?></h1>
            </div>
        </div>
    </div>
</section>

<!-- Visi Misi -->
<section id="visimisi">
    <div class="container">
        <div class="row">
            <div class="col-md-5 visi-head align-middle" data-anijs="if: scroll, on: window, do: rollIn animated, before: scrollReveal repeat, after: scrollReveal">
                <h1>VISI & MISI</h1>
            </div>
            <div class="col-md-6 visi-misi" data-anijs="if: scroll, on: window, do: slideInDown animated, before: scrollReveal repeat, after: scrollReveal">
                <div class="row visi">
                    <h5>Visi</h5>
                    <p>“ <?= $ukm->visi ?>”</p>
                </div>
                <div class="row misi mt-2">
                    <h5>Misi</h5>
                    <ol style="text-align: justify">
                        <?= $ukm->misi ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ===== AKHIR BERANDA ===== -->

<!-- ===== ALUR PENDAFTARAN ===== -->
<section id="alur">
    <div class="container">
        <div class="row">
            <div class="col-md-6 alurnya" data-anijs="if: scroll, on: window, do: zoomInLeft animated, before: scrollReveal repeat, after: scrollReveal">
                <div class="row mt-5">
                    <div class="col-1 gambar-alur">
                        <i class="uil uil-monitor icon-alur"></i>
                        <div class="ver-line"></div>
                    </div>
                    <div class="col text-alur">
                        <h4>Daftar di Website</h4>
                        <p>Peserta mendaftar di halaman</p>
                        <p id="linkBBMK">www.bbmk.kemahasiswaan.unand.ac.id</p>
                        <p>1 - 4 November 2021</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <i class="uil uil-sign-alt icon-alur"></i>
                        <div class="ver-line"></div>
                    </div>
                    <div class="col text-alur">
                        <h4>Pilih UKM</h4>
                        <p>Pilih UKM yang ingin kamu ikuti!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <i class="uil uil-user-plus icon-alur"></i>
                        <div class="ver-line"></div>
                    </div>
                    <div class="col text-alur">
                        <h4>Input Data</h4>
                        <p>Lengkapi data diri dan darta verifikasi kamu!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <i class="uil uil-user-check icon-alur"></i>
                    </div>
                    <div class="col text-alur">
                        <h4>Verifikasi Data</h4>
                        <p>Tunggu informasi terverifikasi sebagai peserta</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 alurPen" data-anijs="if: scroll, on: window, do: rotateInDownRight animated, before: scrollReveal repeat, after: scrollReveal">
                <h2>ALUR</h2>
                <h1>PENDAFTARAN</h1>
            </div>
        </div>
    </div>
</section>
<!-- ===== AKHIR ALUR ===== -->
<!-- ===== LINIMASA ===== -->
<section id="linimasa">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 linimasa" data-anijs="if: scroll, on: window, do: rotateDownLeft animated, before: scrollReveal repeat, after: scrollReveal">
                <h1>LINIMASA</h1>
            </div>
            <div class="col-md-6 linimasaFlow" data-anijs="if: scroll, on: window, do: slideInUp animated, before: scrollReveal repeat, after: scrollReveal">
                <?php
                if ($ukm->timeline1) { ?>
                    <div class="row">
                        <div class="col-1">
                            <i class="uil uil-lightbulb icon-alur"></i>
                            <div class="ver-line"></div>
                        </div>
                        <div class="col text-alur">
                            <h4>Hari ke-1</h4>
                            <p><?= $ukm->timeline1 ?></p>
                        </div>
                    </div>
                <?php
                }
                ?>
                <?php
                if ($ukm->timeline2) { ?>
                    <div class="row">
                        <div class="col-1">
                            <i class="uil uil-circuit icon-alur"></i>
                            <div class="ver-line"></div>
                        </div>
                        <div class="col text-alur">
                            <h4>Hari ke-2</h4>
                            <p><?= $ukm->timeline2 ?></p>
                        </div>
                    </div>
                <?php
                }
                ?>
                <?php
                if ($ukm->timeline3) { ?>
                    <div class="row">
                        <div class="col-1">
                            <i class="uil uil-dice-three icon-alur"></i>
                            <div class="ver-line"></div>
                        </div>
                        <div class="col text-alur">
                            <h4>Hari ke-3</h4>
                            <p><?= $ukm->timeline3 ?></p>
                        </div>
                    </div>
                <?php
                }
                ?>
                <?php
                if ($ukm->timeline4) { ?>
                    <div class="row">
                        <div class="col-1">
                            <i class="uil uil-check-circle icon-alur"></i>

                        </div>
                        <div class="col text-alur">
                            <h4>Hari ke-4</h4>
                            <p><?= $ukm->timeline4 ?></p>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- ===== AKHIR LINIMASA ===== -->


</section>
<!-- ===== AKHIR LINIMASA ===== -->
<!-- ===== DOKUMENTASI ===== -->
<section id="dokumentasi-ukm">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 dokum-ukm" data-anijs="if: scroll, on: window, do: bounceInDown animated, before: scrollReveal repeat, after: scrollReveal">
                <img src="<?= base_url() ?>assets/img/web/<?= $ukm->foto1 ?>" class="img-fluid rounded" alt="Dokumentasi UKM" />
                <br />
                <hr />
                <img src="<?= base_url() ?>assets/img/web/<?= $ukm->foto1 ?>" class="img-fluid rounded img-dokum" alt="Dokumentasi UKM" />
                <img src="<?= base_url() ?>assets/img/web/<?= $ukm->foto2 ?>" class="img-fluid rounded img-dokum" alt="Dokumentasi UKM" />
                <img src="<?= base_url() ?>assets/img/web/<?= $ukm->foto3 ?>" class="img-fluid rounded img-dokum" alt="Dokumentasi UKM" />
                <img src="<?= base_url() ?>assets/img/web/<?= $ukm->foto4 ?>" class="img-fluid rounded img-dokum" alt="Dokumentasi UKM" />
            </div>

            <div class="col-md-6 dokum-head" data-anijs="if: scroll, on: window, do: rotateDownRight animated, before: scrollReveal repeat, after: scrollReveal">
                <h1>DOKUMENTASI</h1>
            </div>
            <!-- <div class="col-md-1">
            <div class="be-bg" style="transform: scaleX(-1); position: relative">
              <img src="../assets/img/bg.png" class="element" alt="" />
            </div>
          </div> -->
        </div>
    </div>
</section>
<!-- ===== AKHIR DOKUMENTASI ===== -->

<!-- ===== PERSYARATAN ===== -->
<section id="visimisi">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 visi-head align-middle" data-anijs="if: scroll, on: window, do: rotateDownLeft animated, before: scrollReveal repeat, after: scrollReveal">
                <h1>SYARAT DAFTAR ULANG</h1>
            </div>
            <div class="col-md-6 visi-misi">
                <div class="row misi mt-2">
                    <div class="col" data-anijs="if: scroll, on: window, do: slideInRight animated, before: scrollReveal repeat, after: scrollReveal">

                        <?php
                        if ($ukm->syarat1) { ?>
                            <div class="card card-informasi border-light">
                                <div class="card-body">
                                    <p class="card-text">
                                    <h4><?= $ukm->syarat1 ?></h4>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>

                        <?php
                        if ($ukm->syarat2) { ?>
                            <div class="card card-informasi border-light">
                                <div class="card-body">
                                    <p class="card-text">
                                    <h4><?= $ukm->syarat2 ?></h4>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>

                        <?php
                        if ($ukm->syarat3) { ?>
                            <div class="card card-informasi border-light">
                                <div class="card-body">
                                    <p class="card-text">
                                    <h4><?= $ukm->syarat3 ?></h4>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>
                        <?php
                        if ($ukm->syarat4) { ?>
                            <div class="card card-informasi border-light">
                                <div class="card-body">
                                    <p class="card-text">
                                    <h4><?= $ukm->syarat4 ?></h4>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>

                        <?php
                        if ($ukm->syarat5) { ?>
                            <div class="card card-informasi border-light">
                                <div class="card-body">
                                    <p class="card-text">
                                    <h4><?= $ukm->syarat5 ?></h4>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
</section>


<div class="container text-center mb-5" data-anijs="if: scroll, on: window, do: slideInUp animated, before: scrollReveal repeat, after: scrollReveal">
    <iframe width="640px" height="360px" src="<?= $ukm->video ?>"> </iframe>
</div>

<!-- AKHIR UKM -->