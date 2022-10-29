<ul class="list-group">
	<li class="list-group-item" style="background-color: #C4AECD;">
		<h3 style="color: #3D005D">Syarat Daftar Ulang</h3>
	</li>
	<li class="list-group-item">
		<?php
		$ukm = $this->db->query("SELECT id_ukm FROM peserta WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'")->row()->id_ukm;
		$key = $this->db->query("SELECT * FROM ukm WHERE id = '$ukm'")->row();
		$syarat1 = "";
		$syarat2 = "";
		$syarat3 = "";
		$syarat4 = "";
    $syarat5 = "";
		if ($key->syarat1) {
			$syarat1 = '<a class="btn btn-info"> 1. ' . $key->syarat1 . ' </a><br/><br/>';
		}
		if ($key->syarat2) {
			$syarat2 = '<a class="btn btn-info"> 2. ' . $key->syarat2 . ' </a><br/><br/>';
		}
		if ($key->syarat3) {
			$syarat3 = '<a class="btn btn-info"> 3. ' . $key->syarat3 . ' </a><br/><br/>';
		}
		if ($key->syarat4) {
			$syarat4 = '<a class="btn btn-info"> 4. ' . $key->syarat4 . ' </a><br/><br/>';
		}
    	if ($key->syarat5) {
			$syarat5 = '<a class="btn btn-info"> 5. ' . $key->syarat5 . ' </a><br/><br/>';
		}

		echo $syarat1;
		echo $syarat2;
		echo $syarat3;
		echo $syarat4;
    	echo $syarat5;
		?>


	</li>
</ul>