<?php
$ukm = $this->db->query("SELECT * FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'")->row();
?>
<ul class="list-group">
	<li class="list-group-item" style="background-color: #C4AECD;">
		<h3 style="color: #3D005D">Syarat Daftar Ulang Peserta</h3>
	</li>
	<li class="list-group-item">
		<form action="" method="post">
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
			<div class="inputx">
				<label>
					Syarat daftar ulang 1
				</label>
				<input type="text" name="syarat1" value="<?= $ukm->syarat1; ?>">
			</div>
			<div class="inputx">
				<label>
					Syarat daftar ulang 2
				</label>
				<input type="text" name="syarat2" " value=" <?= $ukm->syarat2; ?>">
			</div>
			<div class="inputx">
				<label>
					Syarat daftar ulang 3
				</label>
				<input type="text" name="syarat3" value="<?= $ukm->syarat3; ?>">
			</div>
			<div class="inputx">
				<label>
					Syarat daftar ulang 4
				</label>
				<input type="text" name="syarat4" value="<?= $ukm->syarat4; ?>">
			</div>
			<div class="inputx">
				<label>
					Syarat daftar ulang 5
				</label>
				<input type="text" name="syarat5" value="<?= $ukm->syarat5; ?>">
			</div>
			<p>
				<font class="text-danger">*</font> Syarat ini akan ditampilkan di halaman peserta dan website ukm
			</p>
			<input type="submit" name="update" class="btn" style="background-color: #3D005D; color:white;" value="Update">
		</form>
		<?php
		if (isset($_POST["update"])) {
			$syarat1 = $this->db->escape_str($this->input->input_stream("syarat1", TRUE));
			$syarat2 = $this->db->escape_str($this->input->input_stream("syarat2", TRUE));
			$syarat3 = $this->db->escape_str($this->input->input_stream("syarat3", TRUE));
			$syarat4 = $this->db->escape_str($this->input->input_stream("syarat4", TRUE));
			$syarat5 = $this->db->escape_str($this->input->input_stream("syarat5", TRUE));

			$update = $this->db->query("UPDATE ukm SET syarat1 = '$syarat1', syarat2 = '$syarat2', syarat3 = '$syarat3', syarat4 = '$syarat4', syarat5 = '$syarat5' WHERE username = '" . $this->session->userdata("adminBBMK19") . "'");
			if ($update) {
				$this->alert->pesan("success", "Berhasil...", "Update Syarat", 1, base_url("/admin/syarat"));
			} else {
				$this->alert->pesan("error", "Gagal...");
			}
		} ?>
	</li>
</ul>