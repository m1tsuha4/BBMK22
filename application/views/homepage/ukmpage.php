<?php
$ukm = $this->db->query("SELECT * FROM ukm WHERE username = '" . $user . "'")->row();
?>

<style>
    .section-doc {
        background-image: url("<?= base_url() ?>assets/css/footer.png");

    }

    .section-title {
        min-height: 600px;
    }
</style>

<!-- Introduction -->
<section id="intro" class="section-title">
    <video playsinline autoplay muted loop class="videoInsert">
        <source src="<?= base_url() ?>assets/videos/bg_vid.mp4" type="video/mp4" />
    </video>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-1 glass">
                <img src="<?= base_url() ?>/assets/img/logo/<?= $ukm->logo ?>" class="img-fluid" style="max-width: 250px" alt="..." />
                <p>
                    <?= $ukm->deskripsi ?>
                </p>
                <p><b>Media Sosial</b></p>
                <img src="<?= base_url() ?>assets/logo/ukm/ig.svg" />
                <img src="<?= base_url() ?>assets/logo/ukm/yt.svg" />
                <img src="<?= base_url() ?>assets/logo/ukm/linkedin.svg" />
            </div>
        </div>
    </div>
</section>
<!-- End of Introduction -->

<!-- Statistic -->
<!-- <img src="assets/tengah-biru.svg"  alt="" srcset="" width="78%" class="tengah-biru"> -->
<section id="visi-misi" class="section-web my-5 py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="<?= base_url() ?>assets/logo/ukm/visi.svg" class="img-fluid" alt="..." />
            </div>
            <div class="col-md-6">
                <h4 class="text-title"><b>Visi dan Misi</b></h4>
                <h5>Visi</h5>
                <p>
                    <?= $ukm->visi ?>
                </p>
                <h5>Misi</h5>
                <p>
                    <?= $ukm->misi ?>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End of Statistic -->

<section id="doc" class="section-doc pt-5">
    <div class="container">
        <div class="row justify-content-center p-5 mt-5" style="background: rgba(255, 255, 255, 0.5);
	border-radius: 16px;
	box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
	backdrop-filter: blur(4.2px);
	-webkit-backdrop-filter: blur(4.2px);">
            <h4 class="text-title"><b>Dokumentasi</b></h4>
            <div class="col">
                <img src="<?= base_url() ?>assets/img/web/<?= $ukm->foto1 ?>" class="img-fluid glass-color" alt="Dokumentasi" />
            </div>
            <div class="col">
                <img src="<?= base_url() ?>assets/img/web/<?= $ukm->foto2 ?>" class="img-fluid glass-color" alt="Dokumentasi" />
            </div>
            <div class="col">
                <img src="<?= base_url() ?>assets/img/web/<?= $ukm->foto3 ?>" class="img-fluid glass-color" alt="Dokumentasi" />
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="glass-color" style="background: rgba(255, 255, 255, 0.5);
	border-radius: 16px;
	box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
	backdrop-filter: blur(4.2px);
	-webkit-backdrop-filter: blur(4.2px);">
        <div class="container mt-5">
            <div class="text-center bbmkFooter">
                <div class="detail_info">
                    <i class="uil uil-instagram instagram_icon"></i>
                    <b>
                        <a href="https://www.instagram.com/bbmkonlineunand" target="_blank">
                            bbmkonlineunand</a>
                    </b>
                </div>
            </div>
            <h4 class="text-center text-title pt-1">
                <b>Berkolaborasi Bersama</b>
            </h4>
            <div class="row logoFooter justify-content-center pt-3">
                <img class="neo" src="<?= base_url(); ?>assets3/ukm/logo/neotelemetri.png" alt="Neo Telemetri" />
                <img class="ukmp" src="<?= base_url(); ?>assets3/ukm/logo/ukmp.png" alt="UKMP" />
                <img class="fki" src="<?= base_url(); ?>assets3/ukm/logo/rabbani.png" alt="FKI Rabbani" />
                <img class="pandeka" src="<?= base_url(); ?>assets3/ukm/logo/pandekar.png" alt="Pandekar" />
                <img class="kopma" src="<?= base_url(); ?>assets3/ukm/logo/kopma.png" alt="KOPMA" />
                <img class="pikmag" src="<?= base_url(); ?>assets3/ukm/logo/pikmag.png" alt="PIKMAG" />
                <img class="aiesec" src="<?= base_url(); ?>assets3/ukm/logo/aiesec.png" alt="AIESEC" />
                <img class="genta" src="<?= base_url(); ?>assets3/ukm/logo/genta.png" alt="Genta " />
                <img class="menwa" src="<?= base_url(); ?>assets3/ukm/logo/menwa.png" alt="Menwa" />
                <img class="uko" src="<?= base_url(); ?>assets3/ukm/logo/uko.png" alt="UKO" />
                <img class="pika" src="<?= base_url(); ?>assets3/ukm/logo/pika.png" alt="PIKA" />
                <img class="kosbema" src="<?= base_url(); ?>assets3/ukm/logo/kosbema.png" alt="KOSBEMA" />
                <img class="mapala" src="<?= base_url(); ?>assets3/ukm/logo/mapala.png" alt="MAPALA" />
                <img class="ksr" src="<?= base_url(); ?>assets3/ukm/logo/ksrpmi.png" alt="KSR PMI" />
                <img class="pramuka" src="<?= base_url(); ?>assets3/ukm/logo/pramuka.png" alt="Pramuka" />
                <img class="sinema" src="<?= base_url(); ?>assets3/ukm/logo/sinema.png" alt="Sinematografi" />
                <img class="hipmi" src="<?= base_url(); ?>assets3/ukm/logo/hipmi.png" alt="HIPMI" />
                <img class="php" src="<?= base_url(); ?>assets3/ukm/logo/php.png" alt="PHP" />
                <img class="uks" src="<?= base_url(); ?>assets3/ukm/logo/uks.png" alt="UKS" />
            </div>
        </div>
    </footer>
</section>

<!-- End of Footer -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>