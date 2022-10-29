    <div class="container form-container form-container-login">
        <div class="row align-items-start">
            <div class="col-md-4 form-login" data-anijs="if: load, on: window, do: slideInLeft animated, before: scrollReveal repeat">
                <form action="" method="post">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                    <h4>BBMK 2021</h4>
                    <p>Masuk menggunakan NIM untuk melanjutkan</p>
                    <div class="form-floating mb-3">
                        <input name="username" type="number" class="form-control form-control-sm" id="floatingInput" placeholder="NIM" />
                        <label for="floatingInput" class="form-label">NIM</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control form-control-sm" id="floatingPassword" placeholder="Password" />
                        <label for="floatingPassword" class="form-label">Password</label>
                    </div>
                    <div class="form-check form-switch mb-3 switch-tog">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" onclick="myFunction()" />
                        <label class="form-check-label switch-text" for="flexSwitchCheckDefault">Show Password</label>
                    </div>
                    <button type="submit" name="login" class="btn btnForm"><a href="">Masuk</a></button>
                    <div class="form-floating mb-3 akun-link">
                        <p>
                            Belum punya akun? <a href="<?= base_url(); ?>main/daftar"><b>daftar disini</b></a>
                        </p>
                    </div>
                </form>
            </div>
            <div class="col-md-8 img-form text-center">
                <img src="<?= base_url(); ?>assets3/img/form.png" alt="Form" />
            </div>
        </div>
    </div>
    </body>
    <?php
    if (isset($_POST["login"])) {
        $username = $this->db->escape_str($this->input->input_stream("username", TRUE));
        $password = $this->db->escape_str($this->input->input_stream("password", TRUE));

        $query = $this->db->query("SELECT * FROM peserta WHERE nobp = '$username'");
        if ($query->num_rows() == 1) {
            $key = $query->row();
            if (password_verify($password, $key->password)) {
                $this->session->set_userdata("userBBMK19", "$username");
                $this->alert->msg("success", "Berhasil...", "Login berhasil...", 1, base_url("/main/home"));
            } else {
                $this->alert->msg("error", "Oops...", "Password salah...");
            }
        } else {
            $this->alert->msg("error", "Oops...", "Akun anda belum terdaftar....");
        }
    } ?>