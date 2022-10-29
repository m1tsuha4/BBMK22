<ul class="list-group">
    <li class="list-group-item" style="background-color: #C4AECD;">
        <h3 style="color: #3D005D">Edit Sosial Media</h3>
    </li>
    <li class="list-group-item">
        <?php
        $query = $this->db->query("SELECT * FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'");
        $data = $query->row(); ?>
        <form action="" method="post">
            <?php
            $csrf = array(
                "name" => $this->security->get_csrf_token_name(),
                "hash" => $this->security->get_csrf_hash()
            ); ?>
            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>">

            <div class="inputx">
                <label>Instagram :</label>
                <input type="text" name="instagram" placeholder="Masukkan instagram UKM..." value="<?= $data->instagram; ?>">
            </div>
            <div class="inputx">
                <label>twitter :</label>
                <input type="text" name="twitter" placeholder="Masukkan instagram UKM..." value="<?= $data->twitter; ?>">
            </div>
            <div class="inputx">
                <label>Youtube :</label>
                <input type="text" name="youtube" placeholder="Masukkan instagram UKM..." value="<?= $data->youtube; ?>">
            </div>
            <div class="inputx">
                <label>Facebook :</label>
                <input type="text" name="facebook" placeholder="Masukkan instagram UKM..." value="<?= $data->facebook; ?>">
            </div>
            <div class="inputx">
                <label>Email :</label>
                <input type="text" name="email" placeholder="Masukkan instagram UKM..." value="<?= $data->email; ?>">
            </div>
            <div class="inputx">
                <label>Website :</label>
                <input type="text" name="website" placeholder="Masukkan instagram UKM..." value="<?= $data->website; ?>">
            </div>
            <input type="submit" name="update" class="btn" style="background-color: #3D005D; color:white;" value="Update Profile" style="margin-top: 20px">
        </form>
        <?php
        if (@$update == "berhasil") {
            $this->alert->pesan("success", "Berhasil...", "Data ukm berhasil diperbarui...");
        } else if (@$update == "gagal") {
            $this->alert->pesan("error", "Oops...", "Data ukm gagal diperbarui...");
        } ?>
    </li>
</ul>