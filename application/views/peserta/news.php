<?php
$query = $this->db->query("SELECT * FROM peserta WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
$key = $query->row();

if ($key->foto == null) {
    $foto = "assets3/img/unand.png";
} else {
    $foto = "assets/img/profile peserta/" . $key->foto;
}; ?>

<!-- ===== PAGE CONTENT ===== -->
<img src=".<?= base_url(); ?>assets3/img/bg.png" alt="" class="bg-content" />
<div class="container-fluid">
    <div class="col-md-6 offset-md-3 form-regis text-center edit-profile">
        <div class="">
            <form class="mt-4">
                <div class="d-flex justify-content-center">
                    <div class="profile-photo mt-3">
                        <img src="<?= base_url(); ?><?= $foto ?>" alt="Profile Photo" width="200" class="rounded-circle img-thumbnail" />
                    </div>
                </div>
            </form>
        </div>
        <h4>Halo, <?= $key->nama ?>!</h4>
        <div class="text-start">
            <h4>News</h4>
        </div>
        <?php
        $xquery = $this->db->query("SELECT * FROM pemberitahuan WHERE id_ukm = '$key->id_ukm'");
        foreach ($xquery->result() as $data) { ?>
            <p> <?= $data->waktu; ?></p>
            <div class="col">
                <div class="card card-informasi border-light">
                    <div class="card-header card-heading"><?= $data->judul ?></div>
                    <div class="card-body">
                        <p class="card-text">
                            <?= $data->isi ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>