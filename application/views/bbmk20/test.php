<div class="content">
	<div class="container-fluid bg-light">
		<ul class="list-group">
			<li class="list-group-item">
				<h3 class="text-success">Ganti Password Admin</h3>
			</li>
			<li class="list-group-item">
				<form action="" method="post">
					<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
					<div class="form-group">
						<label for="password1">Password Lama :</label>
						<input type="password" name="password1" class="form-control">
					</div>
					<div class="form-group">
						<label for="password2">Password Baru :</label>
						<input type="password" name="password2" class="form-control">
					</div>
					<div class="form-group">
						<label for="password3">Ulangi Password Baru :</label>
						<input type="password" name="password3" class="form-control">
					</div>
					<input type="submit" name="ganti" class="btn btn-primary" value="Ganti Password">
				</form>
				<?php
				if(isset($_POST["ganti"])){
					$query = $this->db->query("SELECT * FROM admin WHERE username = '".$this->session->userdata("adminPKM19")."'");
					$data = $query->row();

					$password1 = $this->db->escape_str($this->input->post("password1", TRUE));
					$password2 = $this->db->escape_str($this->input->post("password2", TRUE));
					$password3 = $this->db->escape_str($this->input->post("password3", TRUE));

					if(password_verify($password1, $data->password)){
						if($password2 != ""){
							if($password2 == $password3){
								$password = password_hash($password2, PASSWORD_DEFAULT);

								$ganti = $this->db->query("UPDATE admin SET password = '$password' WHERE username = '".$this->session->userdata("adminPKM19")."'");
								if($ganti){
									$this->alert->pesan("success", "Berhasil...", "Password berhasil diganti. Silahkan login kembali", 1, base_url("/main/logout"));
								}else{
									$this->alert->pesan("", "", "Terjadi kesalahan tidak diketahui");
								}
							}else{
								$this->alert->pesan("", "", "Kedua password baru harus sama");
							}
						}else{
							$this->alert->pesan("", "", "Password baru tidak boleh kosong");
						}
					}else{
						$this->alert->pesan("", "", "Password salah...");
					}
				} ?>
			</li>
		</ul>
	</div>
</div>