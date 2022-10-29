<!-- ini index peserta -->

<ul class="list-group">
	<li class="list-group-item" style="background-color: #C4AECD;">
		<h3 style="color: #3D005D">
			Dashboard
		</h3>
	</li>
	<li class="list-group-item">
		<div class="row">
			<div class="col-md-5">
				<ul class="list-group">
					<li class="list-group-item">
						<?php
						$query = $this->db->query("SELECT * FROM peserta WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
						$key = $query->row();
						if ($key->foto == null) {
							$foto = "head-full-color.svg";
						} else {
							$foto = $key->foto;
						}; ?>
						<div class="text-center">
							<img src="<?= base_url(); ?>assets/img/profile peserta/<?= $foto; ?>" width="90%"><br>


						</div>

						<?php
						if ($key->kelulusan == '0') {
							$btn = "btn-primary";
							$status = "Proses BBMK";
						} else if ($key->kelulusan == '1') {
							$btn = "btn-success";
							$status = "LULUS BBMK";
						} else {
							$btn = "btn-danger";
							$status = "Tidak lulus BBMK";
						}

						if ($key->stat_reg == '1') {
							$btn2 = "btn-success";
							$status2 = "Sudah diverifikasi";
						} else {
							$btn2 = "btn-danger";
							$status2 = "Belum diverifikasi";
						}

						$query = $this->db->query("SELECT * FROM fakultas WHERE id = '$key->fakultas'");
						$data = $query->row();
						$queryj = $this->db->query("SELECT * FROM jurusan WHERE id = '$key->jurusan'");
						$data2 = $queryj->row();
						?>
						<p class="mt-4"> Nama :<?= $key->nama; ?> </p>
						<p class="mt-4"> BP : <?= $key->nobp; ?> </p>
					
						<p class="mt-4"> Status Kelulusan : <button class="btn <?= $btn; ?>" type="button"><?= $status; ?></button> </p>
							<p> Status Verifikasi : <button class="btn <?= $btn2; ?>" type="button"><?= $status2; ?></button> </p>

						<div class="inputx">
							<label for="exampleInputEmail1">Pesan Kelulusan</label>
							<textarea disabled><?= $key->pesankelulusan ?></textarea>
						</div>



						<div class="inputx">
							<label for="exampleInputEmail1">Pesan Verifikasi</label>
							<textarea disabled><?= $key->pesanverif ?></textarea>
						</div>
						<?php
						if ($key->kelulusan == '1') {
						?>
							<p> Link Sertifikat : <a href="<?= base_url() ?>main/download/<?= $key->id_ukm ?>/<?= $key->sertifikat ?>"> <button class="btn btn-success">
										Download
									</button></a> </p>
						<?php
						}
						?>

					</li>
				</ul>
			</div>
			<style type="text/css">
				.purple {
					color: purple !important;
					font-weight: bolder;
					border-bottom: 2px solid purple;
					display: inline-block;
					margin: 0 10px;
					padding-bottom: 5px;
				}
			</style>
			<div class="col-md-7">
				<ul class="list-group">
					<li class="list-group-item">
						[ <a href="<?= base_url(); ?>main/home/index" class="text-secondary <?php if ($tabs != 'profile' and $tabs != 'ukm') {
																								echo 'purple';
																							} ?>">News</a> ] |
						[ <a href="<?= base_url(); ?>main/home/index/ukm" class="text-secondary <?php if ($tabs == 'ukm') {
																									echo 'purple';
																								} ?>">UKM</a> ]
					</li>
					<li class="list-group-item">
						<?php
						if ($tabs == "profile") {
							$this->load->view("tmp/home/tabs/profile");
						} else if ($tabs == "ukm") {
							$this->load->view("tmp/home/tabs/ukm");
						} else {
							$this->load->view("tmp/home/tabs/news");
						} ?>
					</li>