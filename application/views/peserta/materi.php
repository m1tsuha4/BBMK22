<?php
$query = $this->db->query("SELECT * FROM peserta WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
$peserta = $query->row();

$mquery = $this->db->query("SELECT * FROM filemateri WHERE id_ukm = '$peserta->id_ukm'");
$materikey = $mquery->row();
?>

<!-- ===== PAGE CONTENT ===== -->
<img src="<?= base_url(); ?>assets3/img/bg.png" alt="" class="bg-content" />
<div class="container-fluid">
    <div class="row mt-5 text-center materi-head">
        <h2>MATERI BBMK UKM NEO TELEMETRI</h2>
    </div>
    <div class="col-md-6 offset-md-3 form-regis text-center edit-profile">
        <div class="row row-cols-1 row-cols-md-2 g-4 content-materi">

            <?php
            foreach ($mquery->result() as $key) {
            ?>
                <div class="col">
                    <div class="card card-materi">
                        <img src="<?= base_url(); ?>assets3/img/ppt-logo.png" class="card-img-top" alt="Upload Materi BBMK" />
                        <div class="card-body">
                            <h5 class="card-title"><?= $key->namafile ?></h5>

                            <a href="<?= base_url() ?>main/downloadfile/<?= $peserta->id_ukm ?>/<?= $key->id ?>"><button class="btn btnForm btnForm-edit btn-materi btn-materipeserta">Download</button></a>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
</div>
</div>