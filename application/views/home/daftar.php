  <div class="container form-container form-container-regis">
  	<form action="" method="post">
  		<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
  		<div class="row align-items-start">
  			<!-- <div class="col-md-4 regis-logo">
  				<img src="<?= base_url(); ?>assets3/img/bg.png" alt="">
  			</div> -->
  			<div class="col-md-4 form-regis">
  				<h4>Pendaftaran</h4>
  				<div class="form-floating mb-2">
  					<input name="nama" type="text" required class="form-control" id="inputName" placeholder="Nama Lengkap">
  					<label for="inputName" class="form-label">Nama Lengkap</label>
  				</div>
  				<div class="form-floating mb-2">
  					<input name="nobp" type="number" required class="form-control form-control-sm" id="floatingInput" placeholder="NIM" />
  					<label for="floatingInput" class="form-label">NIM</label>
  				</div>
  				<div class="form-floating mb-2">
  					<input name="email" required type="email" class="form-control " id="floatingInput" placeholder="name@example.com">
  					<label for="floatingInput" class="form-label">Email</label>
  				</div>
  				<div class="form-floating mb-2">
  					<input name="password" required type="password" class="form-control " id="floatingPassword" placeholder="Password" />
  					<label for="floatingPassword" class="form-label">Password</label>
  				</div>
  				<div class="form-floating mb-2">
  					<input name="password2" required type="password" class="form-control " id="floatingPassword" placeholder="Password" />
  					<label for="floatingPassword" class="form-label">Ulangi Password</label>
  				</div>
  				<div class="ukmMenu mb-2">

  					<select class="form-select form-control form-label" name="ukm" aria-label="Default select example" required>
  						<option disabled selected>Pilih UKM</option>
  						<?php
							$query = $this->db->query("SELECT * FROM ukm");
							foreach ($query->result() as $key) { ?>
  							<?php

								$query = $this->db->query("SELECT* FROM peserta WHERE id_ukm ='$key->id'");
								echo $query->num_rows();

								if ($key->total >= $key->kuota) {
								} else {
								?>
  								<option value="<?= $key->id; ?>"><?= $key->nama; ?></option>
  							<?php
								}
								?>

  						<?php
							} ?>
  					</select>
  				</div>

  				<input type="submit" name="daftar" class="btn btnForm">
  				<div class="form-floating mb-2 akun-link">
  					<p>
  						Sudah punya akun? <a href="login.html"><b>masuk disini</b></a>
  					</p>
  				</div>
  			</div>
  			<div class="col-md-4 regis-img">
  				<img src="<?= base_url(); ?>assets3/img/regis.svg" alt="">
  			</div>
  	</form>
  </div>
  </div>

  <?php
	if (@$status == "nama") {
		$this->alert->msg("error", "Oops...", "Nama harus diisi...");
	} else if (@$status == "nobp") {
		$this->alert->msg("error", "Oops...", "Nomor BP harus diisi...");
	} else if (@$status == "pass") {
		$this->alert->msg("error", "Oops...", "Ulangi password...");
	} else if (@$status == "pas2") {
		$this->alert->msg("error", "Oops...", "Kedua password harus sama...");
	} else if (@$status == "penuh") {
		$this->alert->msg("error", "Oops...", "Maaf, kuota penuh...");
	} else if (@$status == "gagal") {
		$this->alert->msg("error", "Oops...", "Pendaftaran gagal, coba lagi...");
	} else if (@$status == "ukm") {
		$this->alert->msg("error", "Oops...", "Isi UKM, coba lagi...");
	} else if (@$status == "berhasil") {
		$this->alert->msg("success", "Berhasil...", "Akunmu berhasil didaftarkan, silahkan ikuti proses berikutnya...", 1, base_url("/main/login"));
	} else if (@$status == "bp") {
		$this->alert->msg("error", "Oops...", "Peserta yang diizinkan hanya BP 19, 20 dan 21");
	} else if (@$status == "pass2") {
		$this->alert->msg("error", "Oops...", "Password tidak sama ");
	}
	?>