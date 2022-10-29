<?php
$ukm = $this->db->query("SELECT * FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'")->row();
@$timeline = $this->db->query("SELECT * FROM jadwal WHERE id_ukm = '" . $ukm->id . "'")->row()->timeline;
?>
<ul class="list-group">
	<li class="list-group-item" style="background-color: #C4AECD;">
		<h3 style="color: #3D005D">Jadwal dan Kegiatan BBMK</h3>
	</li>
	<li class="list-group-item">
		<form action="" method="post">
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
			<div class="form-group">
				<label for="jadwal">Deskripsikan Jadwal dan Kegiatan BBMK :</label>
				<textarea name="jadwal" class="ckeditor"> <?= @$timeline; ?></textarea>
			</div>
			<input type="submit" name="update" class="btn" style="background-color: #3D005D; color:white;" value="update">
		</form>
		<?php
		if (isset($_POST["update"])) {
			$cek = $this->db->query("SELECT * FROM jadwal WHERE id = '" . $ukm->id . "'");
			$jadwal = $this->db->escape_str($this->input->input_stream("jadwal", TRUE));

			if ($cek->num_rows() == 1) {
				$update = $this->db->query("UPDATE jadwal SET timeline = '$jadwal' WHERE id_ukm = '" . $ukm->id . "'");
				if ($update) {
					$this->alert->pesan("success", "Berhasil...", "Jadwal berhasil diupdate", 1, base_url("/admin/jadwal"));
				} else {
					$this->alert->pesan("error", "Oops...", "Terjadi kesalahan tidak diketahui");
				}
			} else {
				$insert = $this->db->query("INSERT INTO jadwal(id_ukm, timeline) VALUES('" . $ukm->id . "', '$jadwal')");
				if ($insert) {
					$this->alert->pesan("success", "Berhasil...", "Jadwal berhasil diupdate", 1, base_url("/admin/jadwal"));
				} else {
					$this->alert->pesan("error", "Oops...", "Terjadi kesalahan tidak diketahui");
				}
			}
		} ?>
	</li>
</ul>