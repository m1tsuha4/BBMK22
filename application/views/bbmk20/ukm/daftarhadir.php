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
					if ($key->hadir1 == '1') {
						$kehadiran1 = "Hadir";
					} else {
						$kehadiran1 = "Tidak Hadir";
					}

					if ($key->hadir2 == '1') {
						$kehadiran2 = "Hadir";
					} else {
						$kehadiran2 = "Tidak Hadir";
					}


					if ($key->hadir3 == '1') {
						$kehadiran3 = "Hadir";
					} else {
						$kehadiran3 = "Tidak Hadir";
					}


					if ($key->hadir4 == '1') {
						$kehadiran4 = "Hadir";
					} else {
						$kehadiran4 = "Tidak Hadir";
					}

					?>
					<td><?= $kehadiran1; ?></td>
					<td><?= $kehadiran2; ?></td>
					<td><?= $kehadiran3; ?></td>
					<td><?= $kehadiran4; ?></td>
				</tr>
			<?php }; ?>
		</table>
	</li>
</ul>