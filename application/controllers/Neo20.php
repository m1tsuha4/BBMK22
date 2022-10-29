<?php
class Neo20 extends CI_Controller
{

	public function index($id = null)
	{
		if (
			@$this->session->userdata("adminBBMK19") and @$this->session->userdata("statusBBMK19") == "neotelem"
		) {
			$data["title"] = "Neo Telemetri Dashboard | BBMK 2019";
			$data["id"] = $id;
			$this->load->view("head", $data);
			$this->load->view("ukm/template/header");
			$this->load->view("ukm/home");
			$this->load->view("ukm/template/footer");
		} else {
			$this->alert->msg("error", "Oops..", "Anda tidak memiliki izin untuk mengakses halaman ini", 1, base_url());
		}
	}

	public function inputUKM()
	{
		if (isset($_POST["input"])) {
			$nama = $this->db->escape_str($this->input->input_stream("nama", TRUE));
			$motto = $this->db->escape_str($this->input->input_stream("motto", TRUE));
			$tgl_berdiri = $this->db->escape_str($this->input->input_stream("tgl_berdiri", TRUE));
			$kuota = $this->db->escape_str($this->input->input_stream("kuota", TRUE));
			$deskripsi = $this->db->escape_str($this->input->input_stream("deskripsi", TRUE));
			$visi = $this->db->escape_str($this->input->input_stream("visi", TRUE));
			$misi = $this->db->escape_str($this->input->input_stream("misi", TRUE));
			$nama_cp = $this->db->escape_str($this->input->input_stream("nama_cp", TRUE));
			$kontak_cp = $this->db->escape_str($this->input->input_stream("kontak_cp", TRUE));
			$website = $this->db->escape_str($this->input->input_stream("website", TRUE));
			$facebook = $this->db->escape_str($this->input->input_stream("facebook", TRUE));
			$instagram = $this->db->escape_str($this->input->input_stream("instagram", TRUE));
			$username = $this->db->escape_str($this->input->input_stream("username", TRUE));
			$password1 = $this->db->escape_str($this->input->input_stream("password1", TRUE));
			$password2 = $this->db->escape_str($this->input->input_stream("password2", TRUE));

			if ($username == "") {
				$data["verify"] = "1";
				//$this->alert->pesan("error", "Oops...", "Username UKM wajib diisi....");
			} else if ($password1 == "") {
				$data["verify"] = "2";
				//$this->alert->pesan("error", "Oops...", "Password UKM tidak boleh kosong...");
			} else if ($password1 != $password2) {
				$data["verify"] = "3";
				//$this->alert->pesan("error", "Oops...", "Kedua password harus sama...");
			} else if ($nama == "") {
				$data["verify"] = "5";
			} else {
				$query = $this->db->query("SELECT username FROM ukm WHERE username = '$username'")->num_rows();
				if ($query == 1) {
					$data["verify"] = "4";
				} else {
					$password3 = password_hash($password1, PASSWORD_DEFAULT);
					$insert = $this->db->query("INSERT INTO ukm(nama, motto, berdiri, kuota, deskripsi, visi, misi, nama_cp, kontak_cp, website, facebook, instagram, username, password) VALUES('$nama', '$motto', '$tgl_berdiri', '$kuota', '$deskripsi', '$visi', '$misi', '$nama_cp', '$kontak_cp', '$website', '$facebook', '$instagram', '$username', '$password3')");
					if ($insert) {
						$data["insert"] = "berhasil";
						$data["redir"] = base_url("/neo/inputUKM");
					} else {
						$data["insert"] = "gagal";
					}
				}
			}
		}
		if (
			@$this->session->userdata("adminBBMK19") and @$this->session->userdata("statusBBMK19") == "neotelem"
		) {
			$data["title"] = "Neo Telemetri Dashboard | BBMK 2019";
			$this->load->view("head", $data);
			$this->load->view("ukm/template/header");
			$this->load->view("neo/inputUKM");
			$this->load->view("ukm/template/footer");
		} else {
			$this->alert->msg("error", "Oops..", "Anda tidak memiliki izin untuk mengakses halaman ini", 1, base_url());
		}
	}

	public function lihatUKM()
	{
		if (
			@$this->session->userdata("adminBBMK19") and @$this->session->userdata("statusBBMK19") == "neotelem"
		) {
			$data["title"] = "Neo Telemetri Dashboard | BBMK 2019";
			$this->load->view("head", $data);
			$this->load->view("ukm/template/header");
			$this->load->view("neo/lihatUKM");
			$this->load->view("ukm/template/footer");
		} else {
			$this->alert->msg("error", "Oops..", "Anda tidak memiliki izin untuk mengakses halaman ini", 1, base_url());
		}
	}

	public function peserta()
	{
		if (
			@$this->session->userdata("adminBBMK19") and @$this->session->userdata("statusBBMK19") == "neotelem"
		) {
			$data["title"] = "Neo Telemetri Dashboard | BBMK 2019";
			$this->load->view("head", $data);
			$this->load->view("ukm/template/header");
			$this->load->view("neo/peserta");
			$this->load->view("ukm/template/footer");
		} else {
			$this->alert->msg("error", "Oops..", "Anda tidak memiliki izin untuk mengakses halaman ini", 1, base_url());
		}
	}
	//  add 2019
	public function lihatdokumentasi()
	{
		if (@$this->session->userdata("adminBBMK19") and @$this->session->userdata("statusBBMK19") == "neotelem") {
			$data["title"] = "Neo Telemetri Dashboard | BBMK 2019";
			$this->load->view("head", $data);
			$this->load->view("ukm/template/header");
			$this->load->view("neo/lihatdokumentasi");
			$this->load->view("ukm/template/footer");
		} else {
			$this->alert->msg("error", "Oops..", "Anda tidak memiliki izin untuk mengakses halaman ini", 1, base_url());
		}
	}

	public function editUKM($id = null)
	{
		if (isset($_POST["reset"])) {
			$i = $this->db->escape_str($this->input->input_stream("id", TRUE));
			$new_password = password_hash("neotelemetri", PASSWORD_DEFAULT);
			$reset = $this->db->query("UPDATE ukm SET password = '$new_password' WHERE id = '$i'");
			if ($reset) {
				$data["reset"] = "berhasil";
			} else {
				$data["reset"] = "gagal";
			}
		}

		if (isset($_POST["edit"])) {
			$nama = $this->db->escape_str($this->input->input_stream("nama", TRUE));
			$motto = $this->db->escape_str($this->input->input_stream("motto", TRUE));
			$kuota = $this->db->escape_str($this->input->input_stream("kuota", TRUE));
			$deskripsi = $this->db->escape_str($this->input->input_stream("deskripsi", TRUE));
			$visi = $this->db->escape_str($this->input->input_stream("visi", TRUE));
			$misi = $this->db->escape_str($this->input->input_stream("misi", TRUE));
			$nama_cp = $this->db->escape_str($this->input->input_stream("nama_cp", TRUE));
			$kontak_cp = $this->db->escape_str($this->input->input_stream("kontak_cp", TRUE));
			$website = $this->db->escape_str($this->input->input_stream("website", TRUE));
			$facebook = $this->db->escape_str($this->input->input_stream("facebook", TRUE));
			$instagram = $this->db->escape_str($this->input->input_stream("instagram", TRUE));
			$username = $this->db->escape_str($this->input->input_stream("username", TRUE));
			$ide = $this->db->escape_str($this->input->input_stream("id", TRUE));

			$edit = $this->db->query("UPDATE ukm SET nama = '$nama', motto = '$motto', kuota = '$kuota', deskripsi = '$deskripsi', visi = '$visi', misi = '$misi', nama_cp = 'nama_cp', kontak_cp = '$kontak_cp', website = '$website', facebook = '$facebook', instagram = '$instagram', username = '$username' WHERE id = '$ide'");
			if ($edit) {
				$data["edit"] = "berhasil";
			} else {
				$data["edit"] = "gagal";
			}
		}

		if (
			@$this->session->userdata("adminBBMK19")  and @$this->session->userdata("statusBBMK19") == "neotelem"
		) {
			$data["title"] = "Neo Telemetri Dashboard | BBMK 2019";
			$data["id"] = $id;
			$this->load->view("head", $data);
			$this->load->view("ukm/template/header");
			$this->load->view("neo/editUKM");
			$this->load->view("ukm/template/footer");
		} else {
			$this->alert->msg("error", "Oops..", "Anda tidak memiliki izin untuk mengakses halaman ini", 1, base_url());
		}
	}
}
