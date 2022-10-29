<?php
$query = $this->db->query("SELECT * FROM peserta WHERE nobp = '$id'");
if($query->num_rows() == 1){
	$key = $query->row();
	$key2 = $this->db->query("SELECT * FROM ukm WHERE id = '".$key->id_ukm."'")->row();
	$key3 = $this->db->query("SELECT * FROM jurusan WHERE id = '".$key->jurusan."'")->row();
	 ?>
	<div class="container">
		<ul class="list-group">
			<li class="list-group-item text-center">
				<div class="row">
					<div class="col-md-2 text-center">
						<img src="<?= base_url(); ?>assets/img/unand.png" width="50%">
					</div>
					<div class="col-md-8 text-center">
						<h3 class="text-center">Kartu Bukti Pendaftaran BBMK</h3>
						<h4 class="text-center">Universitas Andalas</h4>
					</div>
					<div class="col-md-2 text-center">
						<img src="<?= base_url(); ?>assets/img/logo.png" width="80%">
					</div>
				</div>
			</li>
			<li class="list-group-item">
				<div class="container">
					<div class="row">
						<div class="col-md-6" style="padding-left: 100px">
							<b>
								<table border="0" width="100%" cellpadding="10">
									<tr>
										<td>Nama</td>
										<td><?= $key->nama; ?></td>
									</tr>
									<tr>
										<td>Nomor BP</td>
										<td><?= $key->nobp; ?></td>
									</tr>
									<tr>
										<td>Jurusan</td>
										<td><?= @$key3->nama; ?></td>
									</tr>
									<tr>
										<td>UKM</td>
										<td><?= $key2->nama; ?></td>
									</tr>
									<tr>
										<td>Jenis Kelamin </td>
										<td><?= $key->jk; ?></td>
									</tr>
									<tr>
										<td>Tempat Lahir</td>
										<td><?= $key->tmp_lahir; ?></td>
									</tr>
									<tr>
										<td>Tanggal Lahir</td>
										<td><?= $key->tgl_lahir; ?></td>
									</tr>
									<tr>
										<td>Agama </td>
										<td><?= $key->agama; ?></td>
									</tr>
									<tr>
										<td>SMA</td>
										<td><?= $key->sma; ?></td>
									</tr>
									<tr>
										<td>Alamat</td>
										<td><?= $key->alamat; ?></td>
									</tr>
									<tr>
										<td>Nomor HP</td>
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
										<td>Skill</td>
										<td><?= $key->skill; ?></td>
									</tr>
									<tr>
										<td>Motto</td>
										<td><?= $key->motto; ?></td>
									</tr>
								</table>
							</b>
						</div>
						<div class="col-md-6 text-right" style="padding-right: 100px">
							<?php
							if($key->foto == null){
								$foto = "head-full-color.svg";
							}else{
								$foto = $key->foto;
							} ?>
							<img src="<?= base_url(); ?>assets/img/<?= $foto; ?>" width="200px">
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
	<script type="text/javascript">
		window.print()
	</script>
	<?php
} ?>
