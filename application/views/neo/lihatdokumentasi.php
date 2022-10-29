<ul class="list-group">
	<li class="list-group-item bg-light">
		<h3 class="text-danger">Dokumentasi Kegiatan BBMK 2019</h3>
	</li>
	<li class="list-group-item">
		<table class="table">
			<tr>
				<th>Nama UKM</th>
				<th>Link dokumentasi</th>
			</tr>
			<?php
			$query = $this->db->query("SELECT * FROM ukm");
			foreach ($query->result() as $data) { ?>
				<tr>
					<td><?= $data->nama; ?></td>
					<td><?= $data->dokumentasi; ?></td>
				</tr>
			<?php
			} ?>

		</table>
	</li>
</ul>