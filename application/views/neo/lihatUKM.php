<ul class="list-group">
	<li class="list-group-item bg-light">
		<h3 class="text-info">Daftar UKM</h3>
	</li>
	<li class="list-group-item">
		<table class="table">
			<tr>
				<th>Nama UKM</th>
				<th>Deskripsi</th>
				<th>Aksi</th>
			</tr>
			<?php
			$query = $this->db->query("SELECT * FROM ukm");
			foreach ($query->result() as $data) { ?>
				<tr>
					<td><?= $data->nama; ?></td>
					<td><?= $data->deskripsi; ?></td>
					<td><a href="<?= base_url(); ?>neo/editUKM/<?= $data->username; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
				</tr>
				<?php
			} ?>
			
		</table>
	</li>
</ul>