<?php
$pquery = $this->db->query("SELECT id_ukm FROM peserta WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
$id_ukm = $pquery->row()->id_ukm; ?>
<ul class="list-group list-group-flush">
	<li class="list-group-item">
		<?php
		$xquery = $this->db->query("SELECT * FROM pemberitahuan WHERE id_ukm = '$id_ukm'");
		foreach ($xquery->result() as $data) { ?>
			<p style="border-bottom: 1px solid grey; padding-bottom: 5px; width: 50%"><b><?= $data->judul; ?></b> <small><i>(<?= $data->waktu; ?>)</i></small></p>
			<p><?= $data->isi; ?></p>
			<hr class="bg-primary">
		<?php
		}
		?>
	</li>

</ul>