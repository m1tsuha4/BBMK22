<ul class="list-group">
	<li class="list-group-item " style="background-color: #C4AECD;">
		<h3 style="color: #3D005D">Upload Logo UKM</h3>
	</li>
	<li class="list-group-item">
		<form action="" method="post" enctype="multipart/form-data">
			<?php
			$csrf = array(
				"name" => $this->security->get_csrf_token_name(),
				"hash" => $this->security->get_csrf_hash()
			);
			?>
			<input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>">
			<div class="form-group" style="margin-bottom: 20px">
				<label>Pilih File</label>
				<input type="file" name="logo" placeholder="Pilih file..." class="form-control">
			</div>
			<p>
			<h5>
				<font class="text-danger">*</font> Anda hanya dapat mengupload logo <b>satu kali</b> saja dan <b>tidak dapat mengganti logo</b> setelah itu
			</h5>
			<h5>
				<font class="text-danger">*</font> Ukuran file tidak boleh <b>melebihi 500kb</b>
			</h5>
			</p>
			<input type="submit" name="upload" class="btn" style="background-color: #3D005D; color:white;" value="Upload">
		</form>
		<?php
		if (@$upload == "tipe") {
			$this->alert->pesan("error", "Oopss...", "Tipe gambar yang diizinkan hanya jpg atau png");
		} else if (@$upload == "size") {
			$this->alert->pesan("error", "Oopss...", "Ukuran file tidak boleh melebihi 300kb");
		} else if (@$upload == "insert") {
			$this->alert->pesan("error", "Oopss...", "Gagal menginputkan data ke database");
		} else if (@$upload == "gagal") {
			$this->alert->pesan("error", "Oopss...", "Terjadi kesalahan saat upload file");
		} else if (@$upload == "success") {
			$this->alert->pesan("success", "Berhasil...", "Upload logo berhasil...", 1, base_url("/admin/foto"));
		} ?>
	</li>
</ul>