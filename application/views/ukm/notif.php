<ul class="list-group">
	<li class="list-group-item" style="background-color: #C4AECD;">
		<h3 style="color: #3D005D">Buat Pemberitahuan</h3>
	</li>
	<li class="list-group-item">
		<form action="" method="post">
			<?php
			$csrf = array(
				"name" => $this->security->get_csrf_token_name(),
				"hash" => $this->security->get_csrf_hash()
			); ?>
			<input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>">
			<div class="inputx">
				<label>Judul :</label>
				<input type="text" name="judul" placeholder="Masukkan judul...">
			</div>
			<div class="inputx" style="margin-bottom: 20px">
				<label>Isi : <font class="text-danger"><small><i>(Tekan Shift + Enter untuk baris baru)</i></small></font></label>
				<textarea class="ckeditor" name="notif" placeholder="Masukkan pemberitahuan..."></textarea>
			</div>
			<input type="submit" name="kirim" value="Kirim" class="btn" style="background-color: #3D005D; color:white;">
			<p>
			<h5>
				<font class="text-danger">*</font> Pemberitahuan yang anda kirim akan tampil di setiap akun peserta yang mendaftar di UKM anda
			</h5>
			</p>
		</form>
		<?php
		if (@$kirim == "berhasil") {
			$this->alert->pesan("success", "Berhasil...", "Pemberitahuan akan dikirimkan ke peserta...");
		} else if (@$kirim == "gagal") {
			$this->alert->pesan("error", "Oops...", "Pemberitahuan gagal dikirim");
		} ?>
	</li>
</ul>