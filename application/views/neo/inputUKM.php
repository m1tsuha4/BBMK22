<ul class="list-group">
	<li class="list-group-item bg-light">
		<h3 class="text-danger">Input Data UKM</h3>
	</li>
	<li class="list-group-item">
		<form action="" method="post">
			<?php
			$csrf = array(
		        'name' => $this->security->get_csrf_token_name(),
		        'hash' => $this->security->get_csrf_hash()
			); ?>

			<input name="<?=$csrf['name'];?>" style="display: none;" value="<?=$csrf['hash'];?>" type="hidden">
			<div class="inputx">
				<label><font class="text-danger">*</font>Nama UKM :</label>
				<input type="text" name="nama" placeholder="Masukkan nama UKM..." value="<?= @$_POST["nama"]; ?>">
			</div>
			<div class="inputx">
				<label>Jargon :</label>
				<input type="text" name="motto" placeholder="Masukkan jargon UKM..." value="<?= @$_POST["motto"]; ?>">
			</div>
			<div class="inputx">
				<label>Kuota Peserta BBMK :</label>
				<input type="number" name="kuota" placeholder="Masukkan jumlah kuota..." value="<?= @$_POST["kuota"]; ?>">
			</div>
			<div class="inputx">
				<label>Profil Singkat UKM <small><i>(Maksimal 40 kata)</i></small> : <font class="text-danger"><small><i>(Tekan Shift + Enter untuk baris baru)</i></small></font></label>

				<textarea class="ckeditor" name="deskripsi" placeholder="Masukkan profile singkat UKM..."><?= @$_POST["deskripsi"]; ?></textarea>
			</div>
			<div class="inputx">
				<label>Visi UKM : <font class="text-danger"><small><i>(Tekan Shift + Enter untuk baris baru)</i></small></font></label>
				<textarea name="visi" class="ckeditor" placeholder="Masukkan visi UKM..."><?= @$_POST["visi"]; ?></textarea>
			</div>
			<div class="inputx">
				<label>Misi UKM : <font class="text-danger"><small><i>(Tekan Shift + Enter untuk baris baru)</i></small></font></label>
				<textarea name="misi" class="ckeditor" placeholder="Masukkan misi UKM..."><?= @$_POST["misi"]; ?></textarea>
			</div>
			<div class="inputx">
				<label>Nama CP :</label>
				<input type="text" name="nama_cp" placeholder="Masukkan nama CP UKM..." value="<?= @$_POST["nama_cp"]; ?>">
			</div>
			<div class="inputx">
				<label>Kontak CP (Nohp / WA) :</label>
				<input type="text" name="kontak_cp" placeholder="Masukkan kontak CP..." value="<?= @$_POST["kontak_cp"]; ?>">
			</div>
			<div class="inputx">
				<label>Website :</label>
				<input type="text" name="website" placeholder="Masukkan web UKM..." value="<?= @$_POST["website"]; ?>">
			</div>
			<div class="inputx">
				<label>Facebook :</label>
				<input type="text" name="facebook" placeholder="Masukkan facebook UKM..." value="<?= @$_POST["facebook"]; ?>">
			</div>
			<div class="inputx">
				<label>Instagram :</label>
				<input type="text" name="instagram" placeholder="Masukkan instagram UKM..." value="<?= @$_POST["instagram"]; ?>">
			</div>
			<div class="inputx">
				<label><font class="text-danger">*</font>Username :</label>
				<input type="text" name="username" placeholder="Masukkan username UKM..." value="<?= @$_POST["username"]; ?>">
			</div>
			<div class="inputx">
				<label><font class="text-danger">*</font>Password :</label>
				<input type="password" name="password1" placeholder="Masukkan password UKM...">
			</div>
			<div class="inputx">
				<label><font class="text-danger">*</font>Konfirmasi Password :</label>
				<input type="password" name="password2" placeholder="Ulangi password UKM...">
			</div>
			<input type="submit" name="input" style="margin-top: 20px" class="btn btn-primary" value="Input Data">
		</form>
		<?php
		if(@$verify == "1"){
			$this->alert->pesan("error", "Oops...", "Username UKM wajib diisi....");
		}else if(@$verify == "2"){
			$this->alert->pesan("error", "Oops...", "Password UKM tidak boleh kosong...");
		}else if(@$verify == "3"){
			$this->alert->pesan("error", "Oops...", "Kedua password harus sama...");
		}else if(@$verify == "4"){
			$this->alert->pesan("error", "Oops...", "Username sudah digunakan...");
		}else if(@$verify == "5"){
			$this->alert->pesan("error", "Oops...", "Nama UKM wajib diisi...");
		}

		if(@$insert == "berhasil"){
			echo "Testing";
			$this->alert->pesan("success", "Berhasil...", "Data UKM berhasil diinputkan...", 1, "$redir");
		}else if(@$insert == "gagal"){
			echo "Gagal";
			$this->alert->pesan("error", "Oopss...", "Terjadi kesalahan...");
		} ?>
	</li>
</ul>