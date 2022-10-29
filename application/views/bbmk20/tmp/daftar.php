<?php


?>


<div class="container-lg">
	<div class="login daftar bg-2">
		<p class="h2 color-1">PENDAFTARAN</p>
		<form class="form-group" action="" method="post">
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
			<div class="form-floating mb-3">
				<input type="text" name="nama" class="form-control" id="floatingInput" placeholder="Username">
				<label for="floatingInput">Nama Panjang</label>
			</div>
			<div class="form-floating mb-3">
				<input type="number" name="nobp" class="form-control" id="floatingInput" placeholder="NIM">
				<label for="floatingInput">NIM</label>
			</div>
			<div class="form-floating mb-3">
				<input type="password" name="password" class="form-control" id="floatingInput" placeholder="Password">
				<label for="floatingInput">Password</label>
			</div>
			<div class="form-floating mb-3">
				<input type="password" name="password2" class="form-control" id="floatingInput" placeholder="Ulangi Password">
				<label for="floatingInput">Ulangi Password</label>
			</div>

			<label>Pilih UKM</label>
			<select name="ukm" class="form-control">
				<?php
				$query = $this->db->query("SELECT * FROM ukm");
				foreach ($query->result() as $key) { ?>
					<?php

					$query = $this->db->query("SELECT* FROM peserta WHERE id_ukm ='$key->id'");
					echo $query->num_rows();
					if ($query->num_rows() > "450") {
					} else {
					?>
						<option value="<?= $key->id; ?>"><?= $key->nama; ?></option>
					<?php
					}
					?>

				<?php
				} ?>
			</select>
			<div class="form-floating mb-3">
				<button class="btn color-4 bg-1" type="submit" name="daftar">
					Daftar
				</button>
			</div>

		</form>
		<p class="h7 color-1 text-left">Sudah punya akun? Login <a href="<?= base_url() ?>/main/login">disini</a></p>
	</div>
	<!-- <form action="" method="post">
							<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
							<div class="form-group">
								<label for="nama">Nama Lengkap :</label>
								<input type="text" name="nama" class="form-control">
							</div>
							<div class="form-group">
								<label for="nobp">Nomor BP :</label>
								<input type="text" name="nobp" class="form-control">
							</div>
							<div class="form-group">
								<label for="password">Password :</label>
								<input type="password" name="password" class="form-control">
							</div>
							<div class="form-group">
								<label for="password">Ulangi Password :</label>
								<input type="password" name="password2" class="form-control">
							</div>
							<div class="form-group">
								<label for="ukm">UKM yang dipilih :</label><br>
								<select name="ukm" class="form-control">
								<?php
								$query = $this->db->query("SELECT * FROM ukm");
								foreach ($query->result() as $key) { ?>
									<option value="<?= $key->id; ?>"><?= $key->nama; ?></option>
								<?php
								} ?>
								</select>
								<small><i><font class="text-danger">Pastikan kuota UKM masih tersedia</font></i></small>
							</div>
							Sudah punya akun ? login <a href="<?= base_url(); ?>main/login" class="text-info">di sini</a>
							<input type="submit" name="daftar" class="btn btn-info btn-block" value="Daftar" style="border-radius: 0;margin-top: 5px">
						</form> -->
	<?php
	if (@$status == "nama") {
		$this->alert->pesan("error", "Oops...", "Nama harus diisi...");
	} else if (@$status == "nobp") {
		$this->alert->pesan("error", "Oops...", "Nomor BP harus diisi...");
	} else if (@$status == "pass") {
		$this->alert->pesan("error", "Oops...", "Password harus diisi...");
	} else if (@$status == "pas2") {
		$this->alert->pesan("error", "Oops...", "Kedua password harus sama...");
	} else if (@$status == "penuh") {
		$this->alert->pesan("error", "Oops...", "Maaf, kuota penuh...");
	} else if (@$status == "gagal") {
		$this->alert->pesan("error", "Oops...", "Pendaftaran gagal, coba lagi...");
	} else if (@$status == "berhasil") {
		$this->alert->pesan("success", "Berhasil...", "Akunmu berhasil didaftarkan, silahkan ikuti proses berikutnya...", 1, base_url("/main/login"));
	} else if (@$status == "bp") {
		$this->alert->pesan("error", "Oops...", "Peserta yang diizinkan hanya BP 18 dan 19");
	}
	?>