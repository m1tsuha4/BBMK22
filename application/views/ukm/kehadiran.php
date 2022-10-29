<ul class="list-group">
	<li class="list-group-item" style="background-color: #C4AECD;">
		<?php
		$status = "sudah";
		$ss = $this->db->query("SELECT id FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'")->row()->id;
		if ($status == "belum") {
			$status2 = "Belum Verifikasi";
			$query = $this->db->query("SELECT * FROM peserta WHERE id_ukm = '$ss' AND stat_reg != '1'");
		} else if ($status == "sudah") {
			$query = $this->db->query("SELECT * FROM peserta WHERE id_ukm = '$ss' AND stat_reg = '1'");
			$status2 = "Sudah Verifikasi";
		} else {
			$query = $this->db->query("SELECT * FROM peserta WHERE id_ukm = '$ss'");
			$status2 = "Semua";
		} ?>
		<h3 style="color: #3D005D">Daftar Peserta Terdaftar (<?= $status2; ?>)</h3>
	</li>
	<li class="list-group-item">
		<table class="table">
			<tr>
				<th>Lihat</th>
				<th>No</th>
				<th>BP</th>
				<th>Nama</th>
				<th>Kehadiran 1</th>
				<th>Kehadiran 2</th>
				<th>Kehadiran 3</th>
				<th>Kehadiran 4</th>


			</tr>
			<?php
			$no = 1;
			foreach ($query->result() as $key) {
				$jurusan = $this->db->query("SELECT * FROM jurusan WHERE id = '" . $key->jurusan . "'")->row();
			?>
				<tr>
					<td><a href="<?= base_url(); ?>admin/entry/<?= $key->id; ?>" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
					<td><?= $no++; ?></td>
					<td><?= $key->nobp; ?></td>
					<td><?= $key->nama; ?></td>


					<?php
					$uid = $key->id;
					if ($key->stat_reg == 1) {
						$reg = "0";
						$pesan = "Batalkan verifikasi ?";
						$alert = "Verifikasi dibatalkan...";
					} else {
						$reg = "1";
						$pesan = "Verifikasi peserta ini ?";
						$alert = "Peserta berhasil diverifikasi";
					}
					?>

					<!-- Kehadiran 1 -->
					<?php

					if ($key->hadir1 == 1) {
						$absensi1 = "0";
						$pesan1 = "Batalkan Kehadiran 1 ?";
						$alert = "Kehadiran dibatalkan...";
					} else {
						$absensi1 = "1";
						$pesan1 = "Verifikasi Kehadiran 1 peserta ini ?";
						$alert = "Kehadrian Peserta berhasil diverifikasi";
					}


					// Kehadiran 2

					if ($key->hadir2 == 1) {
						$absensi2 = "0";
						$pesan2 = "Batalkan Kehadiran 2 ?";
						$alert = "Kehadiran dibatalkan...";
					} else {
						$absensi2 = "1";
						$pesan2 = "Verifikasi Kehadiran 2 peserta ini ?";
						$alert = "Kehadrian Peserta berhasil diverifikasi";
					}

					// Kehadiran 3

					if ($key->hadir3 == 1) {
						$absensi3 = "0";
						$pesan3 = "Batalkan Kehadiran 3 ?";
						$alert = "Kehadiran dibatalkan...";
					} else {
						$absensi3 = "1";
						$pesan3 = "Verifikasi Kehadiran 3 peserta ini ?";
						$alert = "Kehadrian Peserta berhasil diverifikasi";
					}


					// Kehadiran 4

					if ($key->hadir4 == 1) {
						$absensi4 = "0";
						$pesan4 = "Batalkan Kehadiran 4 ?";
						$alert = "Kehadiran dibatalkan...";
					} else {
						$absensi4 = "1";
						$pesan4 = "Verifikasi Kehadiran 4 peserta ini ?";
						$alert = "Kehadrian Peserta berhasil diverifikasi";
					}

					?>

					<td>

						<form action="" method="post" onsubmit="return confirm('<?= $pesan1; ?>')" style="display: inline-block;">
							<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
							<button type="submit" name="verify1<?= $uid . $absensi1; ?>" class="<?php if ($key->hadir1 == '1') {
																									echo 'btn btn-danger';
																								} else {
																									echo 'btn btn-success';
																								} ?>">
								<i class="<?php if ($key->hadir1 == '1') {
												echo 'fas fa-times';
											} else {
												echo 'fas fa-check';
											} ?>"></i>
							</button>
						</form>
					</td>

					<!-- Kehadiran 2 -->
					<td>

						<form action="" method="post" onsubmit="return confirm('<?= $pesan2; ?>')" style="display: inline-block;">
							<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
							<button type="submit" name="verify2<?= $uid . $absensi2; ?>" class="<?php if ($key->hadir2 == '1') {
																									echo 'btn btn-danger';
																								} else {
																									echo 'btn btn-success';
																								} ?>">
								<i class="<?php if ($key->hadir2 == '1') {
												echo 'fas fa-times';
											} else {
												echo 'fas fa-check';
											} ?>"></i>
							</button>
						</form>
					</td>

					<!-- Kehadiran 3 -->
					<td>

						<form action="" method="post" onsubmit="return confirm('<?= $pesan3; ?>')" style="display: inline-block;">
							<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
							<button type="submit" name="verify3<?= $uid . $absensi3; ?>" class="<?php if ($key->hadir3 == '1') {
																									echo 'btn btn-danger';
																								} else {
																									echo 'btn btn-success';
																								} ?>">
								<i class="<?php if ($key->hadir3 == '1') {
												echo 'fas fa-times';
											} else {
												echo 'fas fa-check';
											} ?>"></i>
							</button>
						</form>
					</td>

					<!-- Kehadiran 4 -->
					<td>

						<form action="" method="post" onsubmit="return confirm('<?= $pesan4; ?>')" style="display: inline-block;">
							<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
							<button type="submit" name="verify4<?= $uid . $absensi4; ?>" class="<?php if ($key->hadir4 == '1') {
																									echo 'btn btn-danger';
																								} else {
																									echo 'btn btn-success';
																								} ?>">
								<i class="<?php if ($key->hadir4 == '1') {
												echo 'fas fa-times';
											} else {
												echo 'fas fa-check';
											} ?>"></i>
							</button>
						</form>
					</td>


					<!-- kehadiran 1 -->
					<?php
					if (isset($_POST["verify1$uid$absensi1"])) {
						$update = $this->db->query("UPDATE peserta SET hadir1 = '$absensi1' WHERE id = '" . $key->id . "'");
						if ($update) {
							$this->alert->pesan("success", "Berhasil...", "$alert", 1, base_url("/admin/kehadiran"));
						} else {
							$this->alert->pesan("error", "Gagal...");
						}
					}
					?>

					<!-- kehadiran 2 -->
					<?php
					if (isset($_POST["verify2$uid$absensi2"])) {
						$update = $this->db->query("UPDATE peserta SET hadir2 = '$absensi2' WHERE id = '" . $key->id . "'");
						if ($update) {
							$this->alert->pesan("success", "Berhasil...", "$alert", 1, base_url("/admin/kehadiran"));
						} else {
							$this->alert->pesan("error", "Gagal...");
						}
					}
					?>

					<!-- kehadiran 3 -->
					<?php
					if (isset($_POST["verify3$uid$absensi3"])) {
						$update = $this->db->query("UPDATE peserta SET hadir3 = '$absensi3' WHERE id = '" . $key->id . "'");
						if ($update) {
							$this->alert->pesan("success", "Berhasil...", "$alert", 1, base_url("/admin/kehadiran"));
						} else {
							$this->alert->pesan("error", "Gagal...");
						}
					}
					?>


					<!-- kehadiran 4 -->
					<?php
					if (isset($_POST["verify4$uid$absensi4"])) {
						$update = $this->db->query("UPDATE peserta SET hadir4 = '$absensi4' WHERE id = '" . $key->id . "'");
						if ($update) {
							$this->alert->pesan("success", "Berhasil...", "$alert", 1, base_url("/admin/kehadiran"));
						} else {
							$this->alert->pesan("error", "Gagal...");
						}
					}
					?>

				</tr>
			<?php

			} ?>
		</table>
	</li>
</ul>