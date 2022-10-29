<li class="list-group-item">
	<?php
	$query = $this->db->query("SELECT id FROM ukm WHERE username = '".$this->session->userdata("adminBBMK19")."'");
	$q = $query->row();
	$query2 = $this->db->query("SELECT * FROM pemberitahuan WHERE id_ukm = '".$q->id."'");
	foreach ($query2->result() as $data) { ?>
		<p style="border-bottom: 1px solid grey; padding-bottom: 5px; width: 50%">
			<form action="" method="post" style="display: inline-block;" onsubmit="return confirm('Hapus pemberitahuan ini ?')"> 
				<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
				<button type="submit" name="hapus<?= $data->id; ?>" class="btn btn-danger" style="display: inline-block;"><i class="fas fa-trash"></i></button>
			</form>
			<?php
			if(isset($_POST["hapus".$data->id])){
				$delete = $this->db->query("DELETE FROM pemberitahuan WHERE id = '".$data->id."'");
				if($delete){
					$this->alert->pesan("success", "Pemberitahuan berhasil dihapus", "", 1, base_url("/admin/home"));
				}else{
					$this->alert->pesan("error", "Gagal");
				}
			} ?>
			<b><?= $data->judul; ?></b> <small><i>(<?= $data->waktu; ?>)</i></small>
		</p>
		<p>
			<?= $data->isi; ?>
		</p>
		<hr class="bg-primary">
	<?php
	}
	?>
</li>