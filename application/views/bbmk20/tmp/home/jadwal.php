<ul class="list-group">
	<li class="list-group-item" style="background-color: #C4AECD;">
		<h3 style="color: #3D005D">Jadwal dan Kegiatan BBMK</h3>
	</li>
	<li class="list-group-item">
		<?php
		$ukm = $this->db->query("SELECT id_ukm FROM peserta WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'")->row()->id_ukm;
		@$key = $this->db->query("SELECT * FROM ukm WHERE id = '$ukm'")->row();
		echo @$key->timeline;
		$syarat1 = "";
		$syarat2 = "";
		$syarat3 = "";
		$syarat4 = "";
		if ($key->timeline1) {
			$syarat1 = '<a class="btn btn-info"> 1. ' . $key->timeline1 . ' </a><br/><br/>';
		}
		if ($key->timeline2) {
			$syarat2 = '<a class="btn btn-info"> 2. ' . $key->timeline2 . ' </a><br/><br/>';
		}
		if ($key->timeline3) {
			$syarat3 = '<a class="btn btn-info"> 3. ' . $key->timeline3 . ' </a><br/><br/>';
		}
		if ($key->timeline4) {
			$syarat4 = '<a class="btn btn-info"> 4. ' . $key->timeline4 . ' </a><br/><br/>';
		}

		echo $syarat1;
		echo $syarat2;
		echo $syarat3;
		echo $syarat4;
		?>

	</li>
</ul>