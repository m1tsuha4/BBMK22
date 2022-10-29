<?php
$query = $this->db->query("SELECT * FROM ukm WHERE username = '$id'");
$data = $query->row(); ?>
<ul class="list-group">
	<li class="list-group-item bg-light">
		<h3 class="text-danger">Edit Data UKM <?= $data->nama; ?></h3>
	</li>
	<li class="list-group-item">
		<form action="" method="post" onsubmit="return confirm('Reset password UKM ini ?')">
			<?php
			$xss = array(
				"name" => $this->security->get_csrf_token_name(),
				"hash" => $this->security->get_csrf_hash()
			); ?>
			<input type="hidden" name="<?= $xss['name']; ?>" value="<?= $xss['hash']; ?>">
			<input type="hidden" name="id" value="<?= $data->id; ?>">
			<input type="submit" name="reset" class="btn btn-danger" value="Reset Password">
		</form>
		<?php
		if(@$reset == "gagal"){
			$this->alert->pesan("error", "Gagal mereset password");
		}else if(@$reset == "berhasil"){
			$this->alert->pesan("success", "Berhasil", "Password berhasil direset");
		} ?>
	</li>
	<li class="list-group-item">
		<form action="" method="post">
			<?php
			$csrf = array(
				"name" => $this->security->get_csrf_token_name(),
				"hash" => $this->security->get_csrf_hash()
			); ?>
			<input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>">
			<input type="hidden" name="id" value="<?= $data->id; ?>">
			<div class="inputx">
				<label>Nama : </label>
				<input type="text" name="nama" placeholder="Nama baru..." value="<?= $data->nama; ?>">
			</div>
			<div class="inputx">
				<label>Jargon :</label>
				<input type="text" name="motto" placeholder="Jargon baru..." value="<?= $data->motto; ?>">
			</div>
			<div class="inputx">
				<label>Deskripsi : <font class="text-danger"><small><i>(Tekan Shift + Enter untuk baris baru)</i></small></font></label>
				<textarea class="ckeditor" name="deskripsi" placeholder="Deskripsi baru..."><?= $data->deskripsi; ?></textarea>
			</div>
			<div class="inputx">
				<label>Kuota :</label>
				<input type="number" name="kuota" placeholder="Kuota baru..." value="<?= $data->kuota; ?>">
			</div>
			<div class="inputx">
				<label>Visi : <font class="text-danger"><small><i>(Tekan Shift + Enter untuk baris baru)</i></small></font></label>
				<input type="text" name="visi" placeholder="Visi baru..." value="<?= $data->visi; ?>">
			</div>
			<div class="inputx">
				<label>Misi : <font class="text-danger"><small><i>(Tekan Shift + Enter untuk baris baru)</i></small></font></label>
				<input type="text" name="misi" placeholder="Misi baru..." value="<?= $data->misi; ?>">
			</div>
			<div class="inputx">
				<label>Nama CP :</label>
				<input type="text" name="nama_cp" placeholder="Nama CP baru..." value="<?= $data->nama_cp; ?>">
			</div>
			<div class="inputx">
				<label>Kontak CP :</label>
				<input type="text" name="kontak_cp" placeholder="Kontak CP baru..." value="<?= $data->kontak_cp; ?>">
			</div>
			<div class="inputx">
				<label>Website :</label>
				<input type="text" name="website" placeholder="Website baru..." value="<?= $data->website; ?>">
			</div>
			<div class="inputx">
				<label>Facebook :</label>
				<input type="text" name="facebook" placeholder="Facebook baru..." value="<?= $data->facebook; ?>">
			</div>
			<div class="inputx">
				<label>Instagram :</label>
				<input type="text" name="instagram" placeholder="Instagram baru..." value="<?= $data->instagram; ?>">
			</div>
			<div class="inputx">
				<label>Username :</label>
				<input type="text" name="username" placeholder="Username baru..." value="<?= $data->username; ?>">
			</div>
			<input type="submit" style="margin-top: 50px" name="edit" class="btn btn-warning" value="Edit UKM">
		</form>
		<?php
		if(@$edit == "gagal"){
			$this->alert->pesan("error", "Oops..", "Gagal mengedit data UKM");
		}else if(@$edit == "berhasil"){
			$this->alert->pesan("success", "Berhasil..", "Berhasil mengedit data UKM");
		} ?>
	</li>
</ul>