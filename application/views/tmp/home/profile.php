<?php
$xquery = $this->db->query("SELECT * FROM peserta WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
$row = $xquery->row(); ?>
<ul class="list-group">
	<li class="list-group-item" style="background-color: #C4AECD;">
		<h3 style="color: #3D005D">Edit Profile</h3>
	</li>
	<li class="list-group-item">




		<form action="" method="post">
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
			<div class="form-group">
				<label><b>Jenis Kelamin</b></label><br>
				<input type="radio" name="jk" value="Laki - Laki" <?php if ($row->jk == "Laki - Laki") {
																		echo "checked";
																	} ?>> Laki - Laki <input type="radio" name="jk" value="Perempuan" <?php if ($row->jk == "Perempuan") {
																																			echo "checked";
																																		} ?>> Perempuan
			</div>
			<div class="inputx">
				<label>Tempat Lahir :</label>
				<input type="text" name="tmp_lahir" placeholder="Masukkan tempat kelahiran.." value="<?= $row->tmp_lahir; ?>">
			</div>
			<div class="inputx">
				<label>Tanggal Lahir :</label>
				<input type="date" name="tgl_lahir" placeholder="Ex: 1998-14-11" class="form-control" value="<?= $row->tgl_lahir; ?>">
			</div>
			<div class="inputx">
				<label>Agama</label>
				<select name="agama" class="custom-select">
					<option value="Islam">Islam</option>
					<option value="Kristen Protestan">Kristen Protestan</option>
					<option value="Kristen Katolik">Kristen Katolik</option>
					<option value="Hindu">Hindu</option>
					<option value="Buddha">Buddha</option>
					<option value="Khonghucu">Khonghucu</option>

					<?php
					if ($row->agama) {
					?>
						<option value="<?= $row->agama; ?>" selected><?= $row->agama ?></option>
					<?php
					}
					?>

				</select>
			</div>

			<div class="inputx">
				<label>SMA :</label>
				<input type="text" name="sma" placeholder="Masukkan SMA..." value="<?= $row->sma; ?>">
			</div>
			<div class="inputx">
				<label>Alamat :</label>
				<input type="text" name="alamat" placeholder="Masukkan alamat..." value="<?= $row->alamat; ?>">
			</div>
			<div class="inputx">
				<label>Nomor HP :</label>
				<input type="text" name="hp" placeholder="Masukkan nomor HP..." value="<?= $row->hp; ?>">
			</div>
			<div class="inputx">
				<label>Hobi :</label>
				<input type="text" name="hobi" placeholder="Masukkan hobi..." value="<?= $row->hobi; ?>">
			</div>
			<div class="inputx">
				<label>Prestasi :</label>
				<input type="text" name="prestasi" placeholder="Masukkan prestasi..." value="<?= $row->prestasi; ?>">
			</div>
			<div class="inputx">
				<label>Bakat :</label>
				<input type="text" name="skill" placeholder="Masukkan skill..." value="<?= $row->skill; ?>">
			</div>


			<input type="submit" name="update" class="btn" style="background-color: #3D005D; color:white;" value="Update Profile" style="margin-top: 50px">
		</form>

		<form action="" method="post">
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
			<div class="inputx">
				<label>Fakultas :</label>
				<select name="fakultas" class="form-control">
					<?php
					$jquery = $this->db->query("SELECT * FROM fakultas");
					foreach ($jquery->result() as $j) { ?>
						<option value="<?= $j->id; ?>" <?php if ($row->fakultas == $j->id) {
															echo "selected";
														} ?>><?= $j->fakultas; ?></option>
					<?php
					} ?>
				</select>
			</div>
			<input type="submit" name="upfakultas" class="btn" style="background-color: #3D005D; color:white;" value="Tambahkan Fakultas" style="margin-top: 50px">
		</form>


		<form action="" method="post">
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

			<?php
			if ($row->fakultas == 0) {
			?>
				<div class="inputx">
					<label>Jurusan :</label>
					<input disabled type="text" value="Silahkan isi fakultas terlebih dahulu">
				</div>
			<?php
			} else {
			?>
				<div class="inputx">
					<label>Jurusan :</label>
					<select name="jurusan" class="form-control">
						<?php
						$jquery = $this->db->query("SELECT * FROM jurusan WHERE id_fakultas = '$row->fakultas'");
						foreach ($jquery->result() as $j) { ?>
							<option value="<?= $j->id; ?>" <?php if ($row->jurusan == $j->id) {
																echo "selected";
															} ?>><?= $j->nama; ?></option>
						<?php
						} ?>
					</select>
				</div>
				<input type="submit" name="upjurusan" class="btn" style="background-color: #3D005D; color:white;" value="Tambahkan Jurusan" style="margin-top: 50px">
			<?php } ?>
		</form>

		<?php
		if (isset($_POST["update"])) {
			@$jk	=	$this->db->escape_str($this->input->input_stream("jk", TRUE));
			$tmp_lahir	=	$this->db->escape_str($this->input->input_stream("tmp_lahir", TRUE));
			$tgl_lahir	=	$this->db->escape_str($this->input->input_stream("tgl_lahir", TRUE));
			$agama	=	$this->db->escape_str($this->input->input_stream("agama", TRUE));
			$sma	=	$this->db->escape_str($this->input->input_stream("sma", TRUE));
			$alamat	=	$this->db->escape_str($this->input->input_stream("alamat", TRUE));
			$hp	=	$this->db->escape_str($this->input->input_stream("hp", TRUE));
			$hobi	=	$this->db->escape_str($this->input->input_stream("hobi", TRUE));
			$prestasi	=	$this->db->escape_str($this->input->input_stream("prestasi", TRUE));
			$skill	=	$this->db->escape_str($this->input->input_stream("skill", TRUE));
			$motto	=	$this->db->escape_str($this->input->input_stream("motto", TRUE));
			$update = $this->db->query("UPDATE peserta SET jk = '$jk', tmp_lahir = '$tmp_lahir', tgl_lahir = '$tgl_lahir', agama = '$agama', sma = '$sma', alamat = '$alamat', hp = '$hp', hobi = '$hobi', prestasi = '$prestasi', skill = '$skill', motto = '$motto' WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
			if ($update) {
				$this->alert->pesan("success", "Berhasil...", "$alert", 1, base_url("/main/home/profile"));
			} else {
				$this->alert->pesan("error", "Gagal...");
			}
		}

		if (isset($_POST["upfakultas"])) {
			$fakultas	=	$this->db->escape_str($this->input->input_stream("fakultas", TRUE));
			$update = $this->db->query("UPDATE peserta SET  fakultas = '$fakultas' WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
			if ($update) {
				$this->alert->pesan("success", "Berhasil...", "$alert", 1, base_url("/main/home/profile"));
			} else {
				$this->alert->pesan("error", "Gagal...");
			}
		}

		if (isset($_POST["upjurusan"])) {
			$jurusan	=	$this->db->escape_str($this->input->input_stream("jurusan", TRUE));
			$update = $this->db->query("UPDATE peserta SET  jurusan = '$jurusan' WHERE nobp = '" . $this->session->userdata("userBBMK19") . "'");
			if ($update) {
				$this->alert->pesan("success", "Berhasil...", "$alert", 1, base_url("/main/home/profile"));
			} else {
				$this->alert->pesan("error", "Gagal...");
			}
		}

		?>
	</li>
</ul>