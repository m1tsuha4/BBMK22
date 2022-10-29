<?php
$query = $this->db->query("SELECT * FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'");
$ukm = $query->row();
?>

<!-- ===== PAGE CONTENT ===== -->
<img src="<?= base_url(); ?>assets3/img/bg.png" alt="" class="bg-content">
<div class="container-fluid">
    <div class="row mt-5 text-center materi-head">
        <h2>Pemberitahuan Kepada Peserta BBMK</h2>
    </div>
    <div class="col-md-6 offset-md-3 text-center">
        <div class="pemberitahuan">
            <form action="" method="post">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="form-floating mb-2 mt-3">
                    <input type="text" name="judul" class="form-control" id="inputLink" placeholder="Judul" />
                    <label for="inputLink" class="form-label form-label-edit">Judul</label>
                </div>
                <div class="form-floating mb-2">
                    <textarea name="notif" style=" height: 15rem;" class="form-control" placeholder="Masukkan pemberitahuan" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Masukkan pemberitahuan</label>
                </div>

                <input type="submit" value="kirim" class="btn btnForm btnForm-edit mt-5 mb-5" name="kirim">
            </form>
        </div>
    </div>

    <?php
    $xquery = $this->db->query("SELECT * FROM pemberitahuan WHERE id_ukm = $ukm->id");
    foreach ($xquery->result() as $ukm) {
    ?>
        <form action="" method="post" onsubmit="return confirm('Hapus pemberitahuan ini ?')">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

            <div class="col-md-6 offset-md-3 text-center">
                <p> <?= $ukm->waktu; ?></p>
                <div class="col">
                    <div class="card card-informasi border-light">
                        <div class="card-header card-heading"><?= $ukm->judul ?></div>
                        <div class="card-body">
                            <p class="card-text">
                                <?= $ukm->isi ?>
                            </p>
                        </div>
                        <button type="submit" name="delete<?= $ukm->id ?>" class="btn btn-danger"><i class="uil uil-times-circle"></i></button>
                    </div>
                </div>
            </div>
        </form>
    <?php

        if (isset($_POST["delete$ukm->id"])) {

            $update = $this->db->query("DELETE FROM pemberitahuan WHERE id = '" . $ukm->id . "'");
            if ($update) {
                $this->alert->msg("success", "Berhasil...", "Delete berhasil  ", 1, base_url("/admin/notif"));
            } else {
                $this->alert->msg("error", "Gagal...");
            }
        }
    }


    ?>
</div>
</div>
<?php
if (isset($_POST["kirim"])) {
    $query = $this->db->query("SELECT id FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'");
    $q = $query->row();
    $id = $q->id;

    $judul    =    $this->db->escape_str($this->input->input_stream("judul", TRUE));
    $note    =    $this->db->escape_str($this->input->input_stream("notif", TRUE));

    $kirim = $this->db->query("INSERT INTO pemberitahuan(id_ukm, judul, isi) VALUES('$id', '$judul', '$note')");

    if ($kirim) {
        $this->alert->msg("success", "Pemberitahuan akan dikirimkan ke peserta...", "", 1, base_url("/admin/notif"));
    } else if (@$kirim == "gagal") {
        $this->alert->msg("error", "Oops...", "Pemberitahuan gagal dikirim");
    }
}
?>