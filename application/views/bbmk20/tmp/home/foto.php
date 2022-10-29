<ul class="list-group">
	<li class="list-group-item" style="background-color: #C4AECD;">
		<h3 style="color: #3D005D">Upload Foto</h3>
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
			<div class="inputx">
				<label>Pilih Foto Profile :</label>
				<input type="file" name="foto">
			</div>
			<ul>
				<li>
					<font class="text-danger">Format foto harus <b>jpg</b> ataupun <b>png</b></font>
				</li>
				<li>
					<font class="text-danger">Ukuran foto tidak boleh lebih dari <b>300kb</b></font>
				</li>
			</ul>
			<input type="submit" name="upload" value="Upload" class="btn" style="background-color: #3D005D; color:white;">
		</form>
		<?php
		if (isset($_POST["upload"])) {
			$nama = $_FILES["foto"]["name"];
			$ext  = pathinfo($nama, PATHINFO_EXTENSION);
			$tmp  = $_FILES["foto"]["tmp_name"];
			$size = $_FILES["foto"]["size"];
			$bp   = $this->session->userdata("userBBMK19");

			if ($ext == "jpg" or $ext == "JPG" or $ext == "png" or $ext == "PNG") {
				if ($size <= 307200) {
					if ($ext == "jpg" or $ext == "JPG") {
						$nama_baru = $bp . ".jpg";
					} else {
						$nama_baru = $bp . ".png";
					}
					$insert = $this->db->query("UPDATE peserta SET foto = '$nama_baru' WHERE nobp = '$bp'");
					if ($insert) {
						$upload = move_uploaded_file($tmp, "assets/img/profile peserta/$nama_baru");
						if ($upload) {
							$this->alert->pesan("success", "Berhasil...", "Foto berhasil diupload...");
						} else {
							$this->alert->pesan("error", "Oops...", "Gagal mengupload foto...");
						}
					} else {
						$this->alert->pesan("error", "Oops...", "Gagal mengupdate database...");
					}
				} else {
					$this->alert->pesan("error", "Oops...", "Ukuran file maximal hanya 300kb");
				}
			} else {
				$this->alert->pesan("error", "Oops...", "Format foto harus jpg atau png");
			}
		} ?>
	</li>
</ul>