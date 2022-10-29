<ul class="list-group">
    <li class="list-group-item" style="background-color: #C4AECD;">
        <h3 style="color: #3D005D">Edit Timeline</h3>
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
                <label>Timeline 1 :</label>
                <input type="text" name="timeline1" placeholder="..." value="<?= $data->timeline1; ?>">
            </div>
            <div class="inputx">
                <label>Timeline 2 :</label>
                <input type="text" name="timeline2" placeholder="..." value="<?= $data->timeline2; ?>">
            </div>
            <div class="inputx">
                <label>Timeline 3 :</label>
                <input type="text" name="timeline3" placeholder="..." value="<?= $data->timeline3; ?>">
            </div>
            <div class="inputx">
                <label>Timeline 4 :</label>
                <input type="text" name="timeline4" placeholder="..." value="<?= $data->timeline4; ?>">
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