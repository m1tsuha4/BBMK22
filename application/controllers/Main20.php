<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main20 extends CI_Controller
{

	public function index()
	{
		$data["title"] = "BBMK Online 2021";
		$this->load->view("bbmk20/template/header", $data);
		$this->load->view("bbmk20/template/index", $data);
		$this->load->view("bbmk20/template/footer", $data);
	}


	public function ukm($id)
	{
		$data["title"] = "BBMK Online 2021";
		$data["ukmid"] = $id;
		$this->load->view("bbmk20/template/header", $data);
		$this->load->view("bbmk20/template/ukm", $data);
		$this->load->view("bbmk20/template/footer", $data);
	}

	public function login()
	{
		if (@$this->session->userdata("userBBMK")) {
			$this->alert->msg("success", "Anda sudah login...", "", 1, base_url("/main20/home"));
		} else {
			$data["title"] = "BBMK Online 2021";
			$this->load->view("bbmk20/template/header", $data);
			$this->load->view("bbmk20/template/login",);
			$this->load->view("bbmk20/template/footer");
		}
	}

	//! Tidak dipakai
	public function cek()
	{
		if (@$this->session->userdata("userBBMK")) {
			$this->alert->msg("success", "Anda sudah login...", "", 1, base_url("/main20/home"));
		} else {
			$data["title"] = "BBMK Online 2021";
			$this->load->view("head", $data);
			$this->load->view("bbmk20/welcome/template/header");
			$this->load->view("bbmk20/welcome/cek");
		}
	}

	public function login2()
	{
		if (@$this->session->userdata("userBBMK")) {
			$this->alert->msg("success", "Anda sudah login...", "", 1, base_url("/main20/home"));
		} else {
			$data["title"] = "Halaman Login | BBMK Online 2021";
			$this->load->view("bbmk20/tmp/header", $data);
			$this->load->view("bbmk20/tmp/login");
		}
	}
	public function daftar()
	{
		if (isset($_POST["daftar"])) {
			$nama = $this->db->escape_str($this->input->input_stream("nama", TRUE));
			$nobp = $this->db->escape_str($this->input->input_stream("nobp", TRUE));
			$pass = $this->db->escape_str($this->input->input_stream("password", TRUE));
			$pas2 = $this->db->escape_str($this->input->input_stream("password2", TRUE));
			$ukm  = $this->db->escape_str($this->input->input_stream("ukm", TRUE));

			$_query = $this->db->query("SELECT * FROM ukm WHERE id = '$ukm'");
			$q = $_query->row();

			if ($nama == "") {
				$data["status"] = "nama";
			} else if ($nobp == "") {
				$data["status"] = "nobp";
			} else if ($pass == "") {
				$data["status"] = "pass";
			} else if ($pass == $pas2) {

				//! BBMK 2021 19 dan 20

				if (is_numeric($nobp)) {
					if (preg_match("/^19/", $nobp) or preg_match("/^20/", $nobp) or preg_match("/^18/", $nobp)) {
						$password = password_hash($pass, PASSWORD_DEFAULT);
						$insert = $this->db->query("INSERT INTO peserta(nama, nobp, password, id_ukm) VALUES('$nama', '$nobp', '$password', '$ukm')");
						if ($insert) {
							$total = $q->total;
							$after = $total + 1;
							$update = $this->db->query("UPDATE ukm SET total = '$after' WHERE id = '$ukm'");
							if ($update) {
								$data["status"] = "berhasil";
							} else {
								$data["status"] = "gagal";
							}
						} else {
							$data["status"] = "insert";
						}
					} else {
						$data["status"] = "bp";
					}
				} else {
					$data["status"] = "number";
				}
			} else {
				$data["status"] = "pass";
			}
		}


		$data["title"] = "Halaman Pendaftaran | BBMK Online 2021";
		$this->load->view("template/header", $data);
		$this->load->view("tmp/daftar");
		$this->load->view("template/footer");
	}

	public function home($page = "index", $tabs = "news")
	{
		if (@$this->session->userdata("userBBMK19")) {
			$data["title"] = "Halaman Peserta | BBMK 2021";
			$data["tabs"] = $tabs;
			$this->load->view("head", $data);
			$this->load->view("bbmk20/tmp/home/template/header");
			$this->load->view("bbmk20/tmp/home/$page");
		} else {
			$this->alert->msg("error", "Oops...", "Anda tidak memiliki izin mengakses halaman ini...", 1, base_url());
		}
	}

	public function logout()
	{
		session_destroy();
		$this->alert->msg("success", "Berhasil logout...", "", 1, base_url());
	}

	public function download($ukm, $file_kelulusan)
	{
		$xquery = $this->db->query("SELECT * FROM peserta WHERE nobp = '" . $this->session->userdata("userBBMK") . "'");
		$row = $xquery->row();

		$idukm = $ukm;
		$this->load->helper('download');
		$path = file_get_contents(base_url() . "assets/file-sertifikat/$idukm/$file_kelulusan"); // get file name
		$name = $file_kelulusan; // new name for your file
		force_download($name, $path); // start download`
		$this->alert->msg("success", "Download Berhasil ...", "", 1, base_url("main20/home/profile"));
	}

	public function downloadfile($ukm, $idfile, $namafile)
	{
		$xquery = $this->db->query("SELECT * FROM filemateri WHERE id_ukm = '" . $ukm . "' AND id = '" . $idfile . "'");
		$row = $xquery->row();
		$letakfile = $row->letakfile;

		$this->load->helper('download');
		$path = file_get_contents(base_url() . "assets/filemateri/$ukm/$namafile"); // get file name
		$name = $row->namafile; // new name for your file
		force_download($name, $path); // start download`

	}
}
