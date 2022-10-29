<ul class="list-group">
	<li class="list-group-item" style="background-color: #C4AECD;">
		<?php
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
				<th>Nama</th>
				<th>Jurusan</th>
				<th>Kontak</th>

				<th>Status</th>
				<th>Verifikasi</th>
				<th>Reset Password</th>


			</tr>
			<?php
			$no = 1;
			$reg1 = 1;
			$reg2 = 2;
			$pesan1 = "Verifikasi Peserta?";
			$pesan2 = "Batalkan Verifikasi Peserta?";
			foreach ($query->result() as $key) {
				$jurusan = $this->db->query("SELECT * FROM jurusan WHERE id = '" . $key->jurusan . "'")->row();



			?>
				<tr>
					<td><a href="<?= base_url(); ?>admin/entry/<?= $key->id; ?>" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
					<td><?= $no++; ?></td>

					<td><?= $key->nama; ?></td>
					<td><?= @$jurusan->nama; ?></td>
					<td><?= $key->hp; ?></td>

					<!-- //* status verifikasi -->
					<td>
						<?php
						if ($key->stat_reg == "1") {
							echo "Sudah Verifikasi";
						} else if ($key->stat_reg == "2") {
							echo "Verifikasi ditolak";
						} else {
							echo "Belum verifikasi";
						} ?>
					</td>

					<?php

					$uid = $key->id;
					$name = $key->nama;
					?>
					<td>
						<!-- Button trigger modal -->

						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1<?= $uid ?>"> <i class="fas fa-check"></i></button>
						<!-- Modal -->
						<form action="" method="post" style="display: inline-block;">
							<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
							<div class="modal fade" id="exampleModal1<?= $uid ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Verifikasi peserta?</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="inputx">
												<label>Kirimkan Pesan Kepada: <?= $name ?></label>
												<input type="text" name="pesanverif" placeholder="...">
											</div>
											<input hidden type="text" name="idpeserta" value="<?= $key->id ?>">

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" name="verify1<?= $uid ?>" class="btn btn-success">Save changes</button>
										</div>
									</div>
								</div>
							</div>
						</form>





						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2<?= $uid ?>"> <i class="fas fa-times"></i></button>
						<!-- Modal -->
						<form action="" method="post" style="display: inline-block;">
							<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
							<div class="modal fade" id="exampleModal2<?= $uid ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Tolak verifikasi peserta?</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="inputx">
												<label>Kirimkan Pesan Kepada : <?= $name ?></label>
												<input type="text" name="pesanverif" placeholder="...">
											</div>
											<input hidden type="text" name="idpeserta" value="<?= $key->id ?>">

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" name="verify2<?= $uid ?>" class="btn btn-success">Yes</button>
										</div>
									</div>
								</div>
							</div>
						</form>

					<td>
						<form action="" method="post" onsubmit="return confirm('Reset password peserta ini ?')" style="display: inline-block;">
							<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
							<button type="submit" name="reset<?= $uid; ?>" class="btn btn-warning">
								<i class="fas fa-redo-alt"></i>
							</button>
						</form>
					</td>
					<?php
					if (isset($_POST["verify1$uid"])) {
						$pesanverif = $this->db->escape_str($this->input->input_stream("pesanverif", TRUE));

						$status = 1;
						$update = $this->db->query("UPDATE peserta SET stat_reg = '$status',pesanverif='$pesanverif' WHERE id = '" . $key->id . "'");
						if ($update) {
							$this->alert->pesan("success", "Berhasil...", "Verifikasi ditambahkan  ", 1, base_url("/admin/peserta"));
						} else {
							$this->alert->pesan("error", "Gagal...");
						}
					}

					if (isset($_POST["verify2$uid"])) {
						$pesanverif = $this->db->escape_str($this->input->input_stream("pesanverif", TRUE));
						$status2 = 2;
						$update = $this->db->query("UPDATE peserta SET stat_reg = '$status2', pesanverif='$pesanverif' WHERE id = '" . $key->id . "'");
						if ($update) {
							$this->alert->pesan("success", "Berhasil...", "Verifikasi ditolak", 1, base_url("/admin/peserta"));
						} else {
							$this->alert->pesan("error", "Gagal...");
						}
					}
					if (isset($_POST["reset$uid"])) {
						$new = password_hash("bbmk2021", PASSWORD_DEFAULT);
						$update = $this->db->query("UPDATE peserta SET password = '$new' WHERE id = '" . $key->id . "'");
						if ($update) {
							$this->alert->pesan("success", "Berhasil...", "Password peserta berhasil direset", base_url("/admin/peserta"));
						} else {
							$this->alert->pesan("error", "Gagal...");
						}
					} ?>

					</td>
				</tr>
			<?php
			} ?>
		</table>
	</li>
</ul>