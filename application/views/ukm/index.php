<style type="text/css">
	#login {
		background-image: url("<?= base_url(); ?>assets/tmp/img/header3.jpg");
		background-position: center center;
		background-size: cover;
		background-attachment: fixed;
		height: 100%;
	}
</style>
<div id="login">
	<div class="container">
		<div class="row" style="padding: 10%;opacity: 0.9">
			<div class="col-md-5" style="margin: auto;">
				<ul class="list-group">
					<li class="list-group-item text-center">
						<img src="<?= base_url(); ?>assets/img/head-full-color.svg" width="50%"><br>
						<h3 class="text-center">Login Peserta</h3>
					</li>
					<li class="list-group-item">
						<form action="" method="post">
							<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
							<div class="form-group">
								<label for="nobp">Nomor BP :</label>
								<input type="text" name="username" class="form-control">
							</div>
							<div class="form-group">
								<label for="username">Password :</label>
								<input type="password" name="password" class="form-control">
							</div>
							Belum punya akun ? daftar <a href="<?= base_url(); ?>main/daftar" class="text-info">di sini</a>
							<input type="submit" name="login" class="btn btn-info btn-block" value="Login" style="border-radius: 0;margin-top: 5px">
						</form>
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
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>