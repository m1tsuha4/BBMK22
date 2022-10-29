<?php
$key = $this->db->query("SELECT nama, id FROM ukm WHERE username = '".$this->session->userdata("adminBBMK19")."'")->row();
$list = $this->db->query("SELECT * FROM peserta WHERE id_ukm = '".$key->id."'"); 
?>
<div class="container">
	<ul class="list-group">
		<li class="list-group-item text-center">
			<h1>Daftar Peserta BBMK UKM <?= $key->nama; ?></h1>
			<a href="#" id="print" class="text-secondary"><i class="fas fa-print"></i></a>
		</li>
		<li class="list-group-item">
			<table class="table">
				<tr>
					<th>Nama</th>
					<th>Nomor BP</th>
					<th>Nomor HP</th>
					<th>Jurusan</th>
				</tr>
				<?php
				foreach ($list->result() as $user) { ?>
				<tr>
					<td><?= $user->nama; ?></td>
					<td><?= $user->nobp; ?></td>
					<td><?= $user->hp; ?></td>
					<td>
						<?php
						@$jurusan = $this->db->query("SELECT * FROM jurusan WHERE id = '".$user->jurusan."'")->row()->nama;
						echo @$jurusan; ?>
					</td>
				</tr>
				<?php
				} ?>
			</table>
		</li>
	</ul>
</div>
<script type="text/javascript">
	$("#print").click(function(event){
		event.preventDefault()
		window.print()
	})
</script>