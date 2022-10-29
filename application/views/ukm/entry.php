<ul class="list-group">
	<li class="list-group-item bg-light">
		<?php
		$key = $this->db->query("SELECT * FROM peserta WHERE id = '$pid'")->row();
		@$jurusan = $this->db->query("SELECT * FROM jurusan WHERE id = '" . $key->jurusan . "'")->row();
		@$fakultas = $this->db->query("SELECT * FROM fakultas WHERE id = '" . $jurusan->id_fakultas . "'")->row();
		@$ukm = $this->db->query("SELECT * FROM ukm WHERE id = '" . $key->id_ukm . "'")->row();
		// @$ukm1 = $this->db->query("SELECT * FROM ukm WHERE id = '".$ukm2->nama."'")->row();
		// @$ukm = $this->db->query("SELECT * FROM ukm WHERE id = '".$key->id_ukm."'")->row();
		?>
		<h3 class="text-danger">Profile Peserta (<?= $key->nama; ?>)</h3>
	</li>
	<li class="list-group-item">
		<div class="row">
			<div class="col-md-6">
				<table class="table">
					<tr>
						<td>Nama</td>
						<td><?= $key->nama; ?></td>
						<?php
						if ($key->foto == null) {
							$foto = "head-full-color.svg";
						} else {
							$foto = $key->foto;
						} ?>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td><?= $key->jk; ?></td>
					</tr>
					<tr>
						<td>Nomor BP</td>
						<td><?= $key->nobp; ?></td>
					</tr>
					<tr>
						<td>Jurusan</td>
						<td><?= @$jurusan->nama; ?></td>
					</tr>
					<tr>
						<td>Fakultas</td>
						<td><?= @$fakultas->fakultas; ?></td>
					</tr>
					<tr>
						<td>Agama</td>
						<td><?= $key->agama; ?></td>
					</tr>

					<tr>
						<td>Alamat</td>
						<td><?= $key->alamat; ?></td>
					</tr>
					<tr>
						<td>HP</td>
						<td><?= $key->hp; ?></td>
					</tr>
					<tr>
						<td>Hobi</td>
						<td><?= $key->hobi; ?></td>
					</tr>
					<tr>
						<td>Prestasi</td>
						<td><?= $key->prestasi; ?></td>
					</tr>
					<tr>
						<td>Bakat</td>
						<td><?= $key->skill; ?></td>
					</tr>

					<tr>
						<td>Pilihan UKM</td>
						<td><?= @$ukm->nama; ?></td>
					</tr>
					<?php
					if ($key->fileverif1) {
					?>
						<tr>
							<td>File Verifikasi 1</td>
							<td><a href="<?= base_url() ?>admin/downloadfile/<?= $key->id ?>/<?= $ukm->id ?>/file1/<?= $key->fileverif1 ?>">Download</a> </td>
						</tr>
					<?php
					}
					?>

					<?php
					if ($key->fileverif2) {
					?>
						<tr>
							<td>File Verifikasi 2</td>
							<td><a href="<?= base_url() ?>admin/downloadfile/<?= $key->id ?>/<?= $ukm->id ?>/file2/<?= $key->fileverif2 ?>">Download</a> </td>
						</tr>
					<?php
					}
					?>


					<?php
					if ($key->fileverif3) {
					?>
						<tr>
							<td>File Verifikasi 3</td>
							<td><a href="<?= base_url() ?>admin/downloadfile/<?= $key->id ?>/<?= $ukm->id ?>/file3/<?= $key->fileverif3 ?>">Download</a> </td>
						</tr>
					<?php
					}
					?>


					<?php
					if ($key->fileverif4) {
					?>
						<tr>
							<td>File Verifikasi 4</td>
							<td><a href="<?= base_url() ?>admin/downloadfile/<?= $key->id ?>/<?= $ukm->id ?>/file4/<?= $key->fileverif4 ?>">Download</a> </td>
						</tr>
					<?php
					}
					?>


					<?php
					if ($key->fileverif5) {
					?>


						<tr>
							<td>File Verifikasi 5</td>
							<td><a href="<?= base_url() ?>admin/downloadfile/<?= $key->id ?>/<?= $ukm->id ?>/file5/<?= $key->fileverif5 ?>">Download</a> </td>
						</tr>
					<?php
					}
					?>





					<td>Status</td>
					<td>
						<?php
						if ($key->stat_reg == "1") {
							echo "Sudah Verifikasi";
						} else if ($key->stat_reg == "2") {
							echo "Verifikasi ditolak";
						} else {
							echo "Belum diverifikasi";
						}
						?>
					</td>
                
					<td>


						<?php
						if ($key->kelulusan == '1') {
						?>
							<p> Link Sertifikat : <a href="<?= base_url() ?>main/download/<?= $key->id_ukm ?>/<?= $key->sertifikat ?>"> <button class="btn btn-success">
										Download
									</button></a> </p>
						<?php
						}
						?>
					</td>
					</tr>
				</table>
			</div>
			<div class="col-md-6 text-center"><img src="<?= base_url(); ?>assets/img/profile peserta/<?= $foto; ?>" height="300px"></div>
		</div>
	</li>
</ul>