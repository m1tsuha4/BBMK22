<!-- Pembuka Login -->
<div class="container-lg">
    <div class="login bg-2">
        <p class="h2 color-1">LOG IN</p>
        <form class="form-group" action="" method="post">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <div class="form-floating mb-3">
                <input type="number" name="username" class="form-control" id="floatingInput" placeholder="NIM">
                <label for="floatingInput">NIM</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingInput" placeholder="Password">
                <label for="floatingInput">Password</label>
            </div>
            <div class="form-floating mb-3">
                <button type="submit" name="login" class="btn color-4 bg-1">
                    Masuk
                </button>
        </form>
        <!--         <p class="h7 color-1 text-left">Belum punya akun? Daftar <a href="<?= base_url() ?>/main/daftar">disini</a></p> -->
        <?php
        if (isset($_POST["login"])) {
            $username = $this->db->escape_str($this->input->input_stream("username", TRUE));
            $password = $this->db->escape_str($this->input->input_stream("password", TRUE));

            $query = $this->db->query("SELECT * FROM peserta WHERE nobp = '$username'");
            if ($query->num_rows() == 1) {
                $key = $query->row();
                if (password_verify($password, $key->password)) {
                    $this->session->set_userdata("userBBMK19", "$username");
                    $this->alert->pesan("success", "Berhasil...", "Login berhasil...", 1, base_url("/main/home"));
                } else {
                    $this->alert->pesan("error", "Oops...", "Password salah...");
                }
            } else {
                $this->alert->pesan("error", "Oops...", "Akun anda belum terdaftar....");
            }
        } ?>

    </div>
</div>