<?php
$query = $this->db->query("SELECT * FROM ukm WHERE username = '".$this->session->userdata("adminBBMK19")."'");
$data = $query->row();
?>
<li class="list-group-item">
	<b>Nama UKM :</b>
	<br><b><?= $data->nama; ?></b>
</li>
<li class="list-group-item">
	<b>Deskripsi :</b><br>
	<?= $data->deskripsi; ?>
</li>
<li class="list-group-item">
	<b>Visi :</b>
	<?= $data->visi; ?>
</li>
<li class="list-group-item">
	<b>Misi :</b><br>
	<?= $data->misi; ?>
</li>
<li class="list-group-item">
	<b>Motto :</b><br>
	<?= $data->motto; ?>
</li>
<li class="list-group-item">
	<b>Nama CP :</b><br>
	<?= $data->nama_cp; ?>
</li>
<li class="list-group-item">
	<b>Kontak CP :</b><br>
	<?= $data->kontak_cp; ?>
</li>
<li class="list-group-item">
	<b>Website :</b><br>
	<?= $data->website; ?>
</li>
<li class="list-group-item">
	<b>Facebook :</b><br>
	<?= $data->facebook; ?>
</li>
<li class="list-group-item">
	<b>Instagram :</b><br>
	<?= $data->instagram; ?>
</li>