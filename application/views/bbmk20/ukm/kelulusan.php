<ul class="list-group">
	<li class="list-group-item" style="background-color: #C4AECD;">
		<?php
		$ss = $this->db->query("SELECT id FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'")->row()->id;
		$status = "sudah";
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
				<th>Kelulusan Peserta</th>
				<th>Status Peserta</th>
				<th>Link Sertifikat</th>



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





					<td>

						<?php
						$uid = $key->id;
						if ($key->sertifikat == "") {
							$msg = "Belum ada";
						} else {
							$msg = "Sudah ada";
						}

						if ($key->kelulusan == "2") {
							$msgl = "Tidak Lulus";
						} else if ($key->kelulusan == "1") {
							$msgl = "Lulus";
						} else {
							$msgl = "Belum Lulus";
						}

						?>
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1<?= $uid ?>"> <i class="fas fa-check"></i></button>
						<!-- Modal -->
						<form action="" method="post" style="display: inline-block;">
							<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
							<div class="modal fade" id="exampleModal1<?= $uid ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Luluskan peserta?</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="inputx">
												<label>Kirimkan Pesan Kepada: <?= $key->nama ?></label>
												<input type="text" name="pesankelulusan" placeholder="...">
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
											<h5 class="modal-title" id="exampleModalLabel">Tidak luluskan peserta?</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="inputx">
												<label>Kirimkan Pesan Kepada : <?= $key->nama ?></label>
												<input type="text" name="pesankelulusan" placeholder="...">
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


					</td>

					<td>
						<button class="btn btn-secondary">
							<?= $msgl ?>
						</button>

					</td>
					<td>
						<button class="btn btn-info">
							<?= $msg ?>
						</button>

					</td>
					<td>

						<form action="" method="post" enctype="multipart/form-data">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							<label>File Sertifikat</label>
							<input type="file" name="sertif" placeholder="Pilih file..." class="form-control">
							<input type="submit" name="upload<?= $uid ?>" class="btn btn-primary">
						</form>
					</td>

					<!-- Kelulusan-->
					<?php
					if (isset($_POST["verify1$uid"])) {
						$pesankelulusan = $this->db->escape_str($this->input->input_stream("pesankelulusan", TRUE));

						$status = 1;
						$update = $this->db->query("UPDATE peserta SET kelulusan = '$status',pesankelulusan='$pesankelulusan' WHERE id = '" . $key->id . "'");
						if ($update) {
							$this->alert->pesan("success", "Berhasil...", "Verifikasi ditambahkan  ", 1, base_url("/admin/kelulusanpeserta"));
						} else {
							$this->alert->pesan("error", "Gagal...");
						}
					}
					if (isset($_POST["verify2$uid"])) {
						$pesankelulusan = $this->db->escape_str($this->input->input_stream("pesankelulusan", TRUE));

						$status = 2;
						$update = $this->db->query("UPDATE peserta SET kelulusan = '$status',pesankelulusan='$pesankelulusan' WHERE id = '" . $key->id . "'");
						if ($update) {
							$this->alert->pesan("success", "Berhasil...", "Verifikasi ditambahkan  ", 1, base_url("/admin/kelulusanpeserta"));
						} else {
							$this->alert->pesan("error", "Gagal...");
						}
					}



					?>
					<?php
					if (isset($_POST["upload$uid"])) {
						$nama	=	$_FILES["sertif"]["name"];
						$ext 	= 	pathinfo($nama, PATHINFO_EXTENSION);
						$size	= 	$_FILES["sertif"]["size"];
						$tmp 	= 	$_FILES["sertif"]["tmp_name"];


						if ($size <= 1007200) {



							if ($ext == "jpg" or $ext == "JPEG") {
								$tipe = ".jpg";
							} else if ($ext == "png" or $ext == "PNG") {
								$tipe = ".png";
							}
							$ukm = $key->id_ukm;
							$bp = $key->nobp;
							$nama_baru = $ukm . "-" . $bp . "." . $ext;
						} else {
							$this->alert->pesan("error", "Gagal...");
						}

						$update = $this->db->query("UPDATE peserta SET sertifikat = '$nama_baru' WHERE id = '" . $key->id . "'");
						if ($update) {
							$upload = move_uploaded_file($tmp, "assets/file-sertifikat/$ukm/$nama_baru");

							$this->alert->pesan("success", "Berhasil...", "Profile berhasil diperbarui...");
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