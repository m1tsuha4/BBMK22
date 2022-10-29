<?php
$pquery = $this->db->query("SELECT id_ukm FROM peserta WHERE nobp = '".$this->session->userdata("userBBMK19")."'");
$id_ukm = $pquery->row()->id_ukm;
$xquery = $this->db->query("SELECT * FROM ukm WHERE id = '$id_ukm'");
$row = $xquery->row(); ?>
<ul class="list-group list-group-flush">
	<li class="list-group-item">
		<b>Nama UKM </b><br>
		<b><?= $row->nama; ?></b>
	</li>
	<li class="list-group-item">
		<b>Profile Singkat :</b><br>
		<?= $row->deskripsi; ?>
	</li>
	<li class="list-group-item">
		<b>Visi :</b><br>
		<?= $row->visi; ?>
	</li>
	<li class="list-group-item">
		<b>Misi :</b><br>
		<?= $row->misi; ?>
	</li>
	<li class="list-group-item">
		<b>Motto :</b><br>
		<?= $row->motto; ?>
	</li>
	<li class="list-group-item">
		<b>Contact Person :</b><br>
		<?= $row->nama_cp; ?> ( <?= $row->kontak_cp; ?> )
	</li>
	<li class="list-group-item">
		<b>Website :</b><br>
		<?= $row->website; ?>
	</li>
	<li class="list-group-item">
		<b>Facebook :</b><br>
		<?= $row->facebook; ?>
	</li>
	<li class="list-group-item">
		<b>Instagram :</b><br>
		<?= $row->instagram; ?>
	</li>
</ul>