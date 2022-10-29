<?php
class Cetak extends CI_Controller{
	public function index($id=null){
		$data["id"] = $id;
		$data["title"] = "Cetak Kartu Pendaftaran";
		$this->load->view("head", $data);
		$this->load->view("print");
	}
}