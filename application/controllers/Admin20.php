<?php
class Admin20 extends CI_Controller
{

	public function index()
	{
		if (isset($_POST["login"])) {
			$username = $this->db->escape_str($this->input->input_stream("username", TRUE));
			$password = $this->db->escape_str($this->input->input_stream("password", TRUE));

			$query = $this->db->query("SELECT nama, username, password FROM ukm WHERE username = '$username'");
			$cek = $query->num_rows();
			if ($cek == 1) {
				$q = $query->row();
				if (password_verify($password, $q->password)) {
					$login = "login";
					if ($q->nama == "Neo Telemetri") {
						$login = "neotelem";
					}
					$data_session = array(
						"adminBBMK19" => "$username",
						"statusBBMK" => "$login"
					);
					$session = $this->session->set_userdata($data_session);
					if ($login == "neotelem") {
						$data["password"] = "benar";
						$redir = "neo";
					} else {
						$data["password"] = "benar";
						$redir = "admin20/home";
					}
					$data["url"] = base_url("/$redir");
				} else {
					$data["password"] = "salah";
				}
			} else {
				$data["password"] = "error";
			}
		}

		if (!@$this->session->userdata("adminBBMK19")) {
			$this->load->view("bbmk20/template/header");
			$this->load->view("bbmk20/ukm/login");
			$this->load->view("bbmk20/template/footer");
		} else {
			$this->alert->msg("success", "Anda sudah login...", "Session anda diaktifkan", 1, base_url("/admin20/home"));
		}
	}

	public function home($id = null)
	{
		if (@$this->session->userdata("adminBBMK19")) {
			$data["title"] = "Admin Dashboard | BBMK";
			$data["id"] = $id;
			$this->load->view("head", $data);
			$this->load->view("bbmk20/ukm/template/header");
			$this->load->view("bbmk20/ukm/home");
			$this->load->view("bbmk20/ukm/template/footer");
		} else {
			$this->alert->msg("error", "Oops...", "Anda tidak memiliki izin untuk menghapus halaman ini", "1", base_url());
		}
	}

	public function edit()
	{
		if (isset($_POST["update"])) {
			$nama 		=	$this->db->escape_str($this->input->input_stream("nama_ukm", TRUE));
			$deskripsi 	=	$this->db->escape_str($this->input->input_stream("deskripsi", TRUE));
			$berdiri  	=	$this->db->escape_str($this->input->input_stream("tgl_berdiri", TRUE));
			$visi 		=	$this->db->escape_str($this->input->input_stream("visi", TRUE));
			$misi 		=	$this->db->escape_str($this->input->input_stream("misi", TRUE));
			$motto		=	$this->db->escape_str($this->input->input_stream("motto", TRUE));
			$nama_cp	=	$this->db->escape_str($this->input->input_stream("nama_cp", TRUE));
			$kontak_cp	=	$this->db->escape_str($this->input->input_stream("kontak_cp", TRUE));


			$update = $this->db->query("UPDATE ukm SET nama = '$nama', deskripsi = '$deskripsi', berdiri = '$berdiri', visi = '$visi', misi = '$misi', motto = '$motto', nama_cp = '$nama_cp', kontak_cp = '$kontak_cp' 
		 WHERE username = '" . $this->session->userdata("adminBBMK19") . "'");
			if ($update) {
				$data["update"] = "berhasil";
			} else {
				$data["update"] = "gagal";
			}
		}

		if (@$this->session->userdata("adminBBMK19")) {
			$data["title"] = "Edit Profile UKM | BBMK ";
			$this->load->view("head", $data);
			$this->load->view("bbmk20/ukm/template/header");
			$this->load->view("bbmk20/ukm/edit");
			$this->load->view("bbmk20/ukm/template/footer");
		} else {
			$this->alert->msg("error", "Oops...", "Anda tidak memiliki izin untuk menghapus halaman ini", "1", base_url());
		}
	}

	public function timeline()
	{
		if (isset($_POST["update"])) {
			$timeline1 		=	$this->db->escape_str($this->input->input_stream("timeline1", TRUE));
			$timeline2 		=	$this->db->escape_str($this->input->input_stream("timeline2", TRUE));
			$timeline3 		=	$this->db->escape_str($this->input->input_stream("timeline3", TRUE));
			$timeline4 		=	$this->db->escape_str($this->input->input_stream("timeline4", TRUE));


			$update = $this->db->query("UPDATE ukm SET timeline1 = '$timeline1',timeline2 = '$timeline2',timeline3 = '$timeline3',timeline4 = '$timeline4' WHERE username = '" . $this->session->userdata("adminBBMK19") . "'");
			if ($update) {
				$data["update"] = "berhasil";
			} else {
				$data["update"] = "gagal";
			}
		}

		if (@$this->session->userdata("adminBBMK19")) {
			$data["title"] = "Edit Profile UKM | BBMK ";
			$this->load->view("head", $data);
			$this->load->view("bbmk20/ukm/template/header");
			$this->load->view("bbmk20/ukm/timeline");
			$this->load->view("bbmk20/ukm/template/footer");
		} else {
			$this->alert->msg("error", "Oops...", "Anda tidak memiliki izin untuk menghapus halaman ini", "1", base_url());
		}
	}
	public function sosial()
	{
		if (isset($_POST["update"])) {
			$instagram 		=	$this->db->escape_str($this->input->input_stream("instagram", TRUE));
			$twitter 		=	$this->db->escape_str($this->input->input_stream("twitter", TRUE));
			$youtube 		=	$this->db->escape_str($this->input->input_stream("youtube", TRUE));
			$facebook 		=	$this->db->escape_str($this->input->input_stream("facebook", TRUE));
			$email 		=	$this->db->escape_str($this->input->input_stream("email", TRUE));
			$website 		=	$this->db->escape_str($this->input->input_stream("website", TRUE));


			$update = $this->db->query("UPDATE ukm SET instagram = '$instagram',twitter = '$twitter',youtube = '$youtube',facebook = '$facebook' ,email = '$email',website = '$website 'WHERE username = '" . $this->session->userdata("adminBBMK19") . "'");
			if ($update) {
				$data["update"] = "berhasil";
			} else {
				$data["update"] = "gagal";
			}
		}

		if (@$this->session->userdata("adminBBMK19")) {
			$data["title"] = "Edit Profile UKM | BBMK ";
			$this->load->view("head", $data);
			$this->load->view("bbmk20/ukm/template/header");
			$this->load->view("bbmk20/ukm/sosial");
			$this->load->view("bbmk20/ukm/template/footer");
		} else {
			$this->alert->msg("error", "Oops...", "Anda tidak memiliki izin untuk menghapus halaman ini", "1", base_url());
		}
	}



	public function notif()
	{
		if (isset($_POST["kirim"])) {
			$query = $this->db->query("SELECT id FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'");
			$q = $query->row();
			$id = $q->id;

			$judul	=	$this->db->escape_str($this->input->input_stream("judul", TRUE));
			$isi	=	$this->db->escape_str($this->input->input_stream("notif", TRUE));

			$kirim = $this->db->query("INSERT INTO pemberitahuan(id_ukm, judul, isi) VALUES('$id', '$judul', '$isi')");

			if ($kirim) {
				$data["kirim"] = "berhasil";
			} else {
				$data["kirim"] = "gagal";
			}
		}
		if (@$this->session->userdata("adminBBMK19")) {
			$data["title"] = "Buat Pemberitahuan | BBMK ";
			$this->load->view("head", $data);
			$this->load->view("bbmk20/ukm/template/header");
			$this->load->view("bbmk20/ukm/notif");
			$this->load->view("bbmk20/ukm/template/footer");
		} else {
			$this->alert->msg("error", "Oops...", "Anda tidak memiliki izin untuk menghapus halaman ini", "1", base_url());
		}
	}

	public function foto()
	{
		if (isset($_POST["upload"])) {
			$nama	=	$_FILES["logo"]["name"];
			$ext 	= 	pathinfo($nama, PATHINFO_EXTENSION);
			$size	= 	$_FILES["logo"]["size"];
			$tmp 	= 	$_FILES["logo"]["tmp_name"];
			$ukmid  =	$this->db->query("SELECT * FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'")->row()->id;

			if ($ext == "jpg" or $ext == "JPG" or $ext == "png" or $ext == "PNG") {
				if ($size <= 307200) {
					date_default_timezone_set("Asia/Jakarta");
					$time = $ukmid;
					$username = $this->session->userdata("adminBBMK19");
					if ($ext == "jpg" or $ext == "JPG") {
						$tipe = ".jpg";
					} else if ($ext == "png" or $ext == "PNG") {
						$tipe = ".png";
					}
					$nama_baru = $time . "-" . $username . $tipe;

					$insert = $this->db->query("UPDATE ukm SET logo = '$nama_baru' WHERE username = '$username'");
					if ($insert) {
						$upload = move_uploaded_file($tmp, "assets/img/$nama_baru");
						if ($upload) {
							$data["upload"] = "success";
						} else {
							$data["upload"] = "gagal";
						}
					} else {
						$data["upload"] = "insert";
					}
				} else {
					$data["upload"] = "size";
				}
			} else {
				$data["upload"] = "tipe";
			}
		}
		if (isset($_POST["upload"])) {
			$dokumentasi 		=	$this->db->escape_str($this->input->input_stream("dokumentasi", TRUE));
		}

		if (@$this->session->userdata("adminBBMK19")) {
			$data["title"] = "Upload Logo| BBMK 2021";
			$this->load->view("head", $data);
			$this->load->view("bbmk20/ukm/template/header");
			$this->load->view("bbmk20/ukm/foto");
			$this->load->view("bbmk20/ukm/template/footer");
		} else {
			$this->alert->msg("error", "Oops...", "Anda tidak memiliki izin untuk menghapus halaman ini", "1", base_url());
		}
	}

	public function peserta($status = null)
	{
		if (@$this->session->userdata("adminBBMK19")) {
			$data["title"] = "Daftar Peserta | BBMK 2019";
			if ($status == null) {
				$status = "semua";
			}
			$data["status"] = $status;
			$this->load->view("head", $data);
			$this->load->view("bbmk20/ukm/template/header");
			$this->load->view("bbmk20/ukm/peserta");
			$this->load->view("bbmk20/ukm/template/footer");
		} else {
			$this->alert->msg("error", "Oops...", "Anda tidak memiliki izin untuk menghapus halaman ini", "1", base_url());
		}
	}

	public function kehadiran($status = null)
	{
		if (@$this->session->userdata("adminBBMK19")) {
			$data["title"] = "Kehadiran Peserta | BBMK 2021";
			if ($status == null) {
				$status = "semua";
			}
			$data["status"] = $status;
			$this->load->view("head", $data);
			$this->load->view("bbmk20/ukm/template/header");
			$this->load->view("bbmk20/ukm/kehadiran");
			$this->load->view("bbmk20/ukm/template/footer");
		} else {
			$this->alert->msg("error", "Oops...", "Anda tidak memiliki izin untuk menghapus halaman ini", "1", base_url());
		}
	}


	public function daftarhadir($status = null)
	{
		if (@$this->session->userdata("adminBBMK19")) {
			$data["title"] = "Kehadiran Peserta | BBMK 2021";
			if ($status == null) {
				$status = "semua";
			}
			$data["status"] = $status;
			$this->load->view("head", $data);
			$this->load->view("bbmk20/ukm/template/header");
			$this->load->view("bbmk20/ukm/daftarhadir");
			$this->load->view("bbmk20/ukm/template/footer");
		} else {
			$this->alert->msg("error", "Oops...", "Anda tidak memiliki izin untuk menghapus halaman ini", "1", base_url());
		}
	}


	public function kelulusanpeserta($status = null)
	{
		if (@$this->session->userdata("adminBBMK19")) {
			$data["title"] = "Kehadiran Peserta | BBMK 2021";
			if ($status == null) {
				$status = "semua";
			}
			$data["status"] = $status;
			$this->load->view("head", $data);
			$this->load->view("bbmk20/ukm/template/header");
			$this->load->view("bbmk20/ukm/kelulusan");
			$this->load->view("bbmk20/ukm/template/footer");
		} else {
			$this->alert->msg("error", "Oops...", "Anda tidak memiliki izin untuk menghapus halaman ini", "1", base_url());
		}
	}

	public function setting()
	{
		if (isset($_POST["ubahPassword"])) {
			$password1 = $this->db->escape_str($this->input->input_stream("password1", TRUE));
			$password2 = $this->db->escape_str($this->input->input_stream("password2", TRUE));
			$password3 = $this->db->escape_str($this->input->input_stream("password3", TRUE));

			$query = $this->db->query("SELECT password FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'");
			$q = $query->row();
			if (password_verify($password1, $q->password)) {
				if ($password2 != null) {
					if ($password2 == $password3) {
						$password = password_hash($password2, PASSWORD_DEFAULT);
						$update = $this->db->query("UPDATE ukm SET password = '$password' WHERE username = '" . $this->session->userdata("adminBBMK19") . "'");
						if ($update) {
							$data["password"] = "berhasil";
						} else {
							$data["password"] = "gagal";
						}
					} else {
						$data["password"] = "beda";
					}
				} else {
					$data["password"] = "kosong";
				}
			} else {
				$data["password"] = "salah";
			}
		}

		if (@$this->session->userdata("adminBBMK19")) {
			$data["title"] = "Setting UKM | BBMK ";
			$this->load->view("head", $data);
			$this->load->view("bbmk20/ukm/template/header");
			$this->load->view("bbmk20/ukm/pengaturan");
			$this->load->view("bbmk20/ukm/template/footer");
		} else {
			$this->alert->msg("error", "Oops...", "Anda tidak memiliki izin untuk menghapus halaman ini", "1", base_url());
		}
	}

	public function entry($pid = 1)
	{
		if (@$this->session->userdata("adminBBMK19")) {
			$data["title"] = "Profile Peserta | BBMK 2019";
			$data["pid"] = $pid;
			$this->load->view("head", $data);
			$this->load->view("bbmk20/ukm/template/header");
			$this->load->view("bbmk20/ukm/entry");
			$this->load->view("bbmk20/ukm/template/footer");
		} else {
			$this->alert->msg("error", "Oops...", "Anda tidak memiliki izin untuk menghapus halaman ini", "1", base_url());
		}
	}

	public function cetak()
	{
		if (@$this->session->userdata("adminBBMK19")) {
			$data["title"] = "Buat Pemberitahuan | BBMK 2019";
			$this->load->view("head", $data);
			$this->load->view("head");
			$this->load->view("bbmk20/ukm/print");
		} else {
			$this->alert->msg("error", "Oops...", "Anda tidak memiliki izin untuk menghapus halaman ini", "1", base_url());
		}
	}

	public function syarat()
	{
		if (@$this->session->userdata("adminBBMK19")) {
			$data["title"] = "Upload Syarat | BBMK ";
			$this->load->view("head", $data);
			$this->load->view("bbmk20/ukm/template/header");
			$this->load->view("bbmk20/ukm/syarat");
			$this->load->view("bbmk20/ukm/template/footer");
		} else {
			$this->alert->msg("error", "Oops...", "Anda tidak memiliki izin untuk menghapus halaman ini", "1", base_url());
		}
	}
	public function dokumentasi()
	{

		if (@$this->session->userdata("adminBBMK19")) {
			$data["title"] = "Upload Dokumentasi | BBMK ";
			$this->load->view("head", $data);
			$this->load->view("bbmk20/ukm/template/header");
			$this->load->view("bbmk20/ukm/dokumentasi");
			$this->load->view("bbmk20/ukm/template/footer");
		} else {
			$this->alert->msg("error", "Oops...", "Anda tidak memiliki izin untuk menghapus halaman ini", "1", base_url());
		}
	}
	public function jadwal()
	{
		if (@$this->session->userdata("adminBBMK19")) {
			$data["title"] = "Update Jadwal | BBMK 2019";
			$this->load->view("head", $data);
			$this->load->view("ukm/template/header");
			$this->load->view("ukm/jadwal");
			$this->load->view("ukm/template/footer");
		} else {
			$this->alert->msg("error", "Oops...", "Anda tidak memiliki izin untuk menghapus halaman ini", "1", base_url());
		}
	}
	public function logout()
	{
		session_destroy();
		$this->alert->msg("success", "Logout berhasil...", "", 1, base_url("/admin"));
	}

	public function download($files)
	{
		$xquery = $this->db->query("SELECT * FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'");
		$row = $xquery->row();
		$idukm = $row->id;
		$this->load->helper('download');
		$path = file_get_contents(base_url() . "assets/verif/$idukm/$files"); // get file name
		$name = "File Verifikasi $files"; // new name for your file
		force_download($name, $path); // start download`
		$this->alert->msg("success", "Download Berhasil ...", "", 1, base_url("main/home/profile"));
	}

	public function downloadfile($idpeserta, $ukm, $letakfile, $namafile)
	{
		$xquery = $this->db->query("SELECT * FROM peserta WHERE id = '" . $idpeserta . "' AND id = '" . $ukm . "'");
		$row = $xquery->row();


		$this->load->helper('download');
		$path = file_get_contents(base_url() . "assets/verif/$letakfile/$ukm/$namafile"); // get file name
		$name = $namafile; // new name for your file
		force_download($name, $path); // start download`

	}
}
