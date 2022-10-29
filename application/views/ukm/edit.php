<ul class="list-group">
	<li class="list-group-item" style="background-color: #C4AECD;">
		<h3 style="color: #3D005D">Edit Profile UKM</h3>
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
				<label>Nama UKM :</label>
				<input type="text" name="nama_ukm" placeholder="Masukkan nama ukm..." value="<?= $data->nama; ?>">
			</div>
			<div class="inputx">
				<label>Deskripsi : </label>
				<textarea name="deskripsi" placeholder="Masukkan deskripsi ukm..."><?= $data->deskripsi; ?></textarea>
			</div>
			<div class="inputx">
				<label>Tanggal Berdiri :</label>
				<input type="date" name="tgl_berdiri" values="<?= $data->berdiri; ?>">
			</div>
			<div class="inputx">
				<label>Visi : </label>
				<textarea name="visi" placeholder="Masukkan visi..."><?= $data->visi; ?></textarea>
			</div>
			<div class="inputx">
				<label>Misi :</label>
				<textarea name="misi" placeholder="Masukkan misi..."><?= $data->misi; ?></textarea>
			</div>
			<div class="inputx">
				<label>Motto :</label>
				<input type="text" name="motto" placeholder="Masukkan motto..." value="<?= $data->motto; ?>">
			</div>
			<div class="inputx">
				<label>Nama CP :</label>
				<input type="text" name="nama_cp" placeholder="Masukkan nama cp..." value="<?= $data->nama_cp; ?>">
			</div>
			<div class="inputx">
				<label>Kontak CP (Nohp / WA) :</label>
				<input type="text" name="kontak_cp" placeholder="Masukkan kontak cp..." value="<?= $data->kontak_cp; ?>">
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