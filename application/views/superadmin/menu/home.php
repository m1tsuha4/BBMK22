<div class="container-fluid">
    <div class="col-md-6 offset-md-3 form-regis text-center edit-profile">
        <div class="">
            <h3 class="text-info">
                Cari Nim Peserta
            </h3>
            <form action="" method="post">
                <?php
                $csrf = array(
                    "name" => $this->security->get_csrf_token_name(),
                    "hash" => $this->security->get_csrf_hash()
                );
                ?>
                <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>">

                <div class="form-floating mb-2">
                    <input type="number" name="nim" class="form-control" id="inputPrestasi" placeholder="nim" required />
                    <label for="inputPrestasi" class="form-label form-label-edit">Tahun</label>
                </div>
                <input value="Reset Peserta Tahun Sebelumnya" type="submit" name="find" class="btn btn-warning">
                <input value="Hapus Akun Peserta" type="submit" name="find2" class="btn btn-danger">
            </form>
        </div>
    </div>
</div>