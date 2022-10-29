<ul class="list-group">
	<li class="list-group-item" style="background-color: #C4AECD;">
		<h3 style="color: #3D005D">Upload Materi dan Dokumentasi</h3>
	</li>
	<li class="list-group-item">
		<?php
		$query = $this->db->query("SELECT * FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'");
		$data = $query->row(); ?>

		<form method="post" enctype="multipart/form-data">
			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">



			<label>Nama file : </label>
			<input type="text" name="nfile">

			<input type="file" name="filemateri" placeholder="Pilih file..." class="form-control">
			<input type="submit" name="uploadfile" class="btn btn-primary">
		</form>
		<?php

		if (isset($_POST["uploadfile"])) {
			$namafiles	=	$_POST["nfile"];

			$nama	=	$_FILES["filemateri"]["name"];
			$ext 	= 	pathinfo($nama, PATHINFO_EXTENSION);
			$size	= 	$_FILES["filemateri"]["size"];
			$tmp 	= 	$_FILES["filemateri"]["tmp_name"];

			// if ($ext == "jpg" or $ext == "JPG" or $ext == "png" or $ext == "PNG") {
			if ($size <= 3007200) {
				$idukm = $data->id;
				$letakfile = $namafiles . '-' . $idukm . '.' . $ext;
				$kirim = $this->db->query("INSERT INTO filemateri(id_ukm, namafile, letakfile) VALUES('$idukm', '$namafiles', '$letakfile')");

				if ($kirim) {
					$upload = move_uploaded_file($tmp, "assets/filemateri/$idukm/$letakfile");
					$this->alert->pesan("success", "Berhasil...");
				} else {
					$this->alert->pesan("error", "Gagal...");
				}
			} else {
				$this->alert->pesan("error", "Gagal...");
			}
		}
		// }



		if (@$update == "berhasil") {
			$this->alert->pesan("success", "Berhasil...", "Dokumentasi tersimpan");
		} else if (@$update == "gagal") {
			$this->alert->pesan("error", "Oops...", "Gagal disimpan");
		} ?>
	</li>

	<li class="list-group-item">
		<?php
		$query = $this->db->query("SELECT id FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'");
		$q = $query->row();
		$query2 = $this->db->query("SELECT * FROM filemateri WHERE id_ukm = '" . $q->id . "'");
		foreach ($query2->result() as $data) { ?>

			<form action="" method="post" style="display: inline-block;" onsubmit="return confirm('Hapus materi ini ?')">
				<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
				<p><?= $data->namafile  ?> </p>
				<button type="submit" name="hapus<?= $data->id; ?>" class="btn btn-danger" style="display: inline-block;"><i class="fas fa-trash"></i></button>
			</form>
			<?php
			if (isset($_POST["hapus" . $data->id])) {
				$delete = $this->db->query("DELETE FROM filemateri WHERE id = '" . $data->id . "'");
				if ($delete) {
					$this->alert->pesan("success", "File berhasil dihapus", "", 1, base_url("/admin/home"));
				} else {
					$this->alert->pesan("error", "Gagal");
				}
			} ?>


			</p>
			<hr class="bg-primary">
		<?php
		}
		?>
	</li>
</ul>