<ul class="list-group">
	<li class="list-group-item bg-light">
    	<h3 class="text-info">
        	Semua Peserta BBMK 2019
    	</h3>
	</li>
	<li class="list-group-item">
    	<?php
    	$nquery = $this->db->query("SELECT * FROM peserta");
    	$no = 1;
    	?>
    	<table class="table">
        	<tr>
	            <th>No</th>
            	<th>BP</th>
            	<th>Nama</th>
	            <th>Jurusan</th>
    	        <th>UKM</th>
	            <th>Status</th>
	            <th>Action</th>
        	</tr>
        	<?php
        	foreach($nquery->result() as $key){
            	$mq = $this->db->query("SELECT nama, total FROM ukm WHERE id = '".$key->id_ukm."'")->row();
            	$m = $mq->nama;
            	@$n = $this->db->query("SELECT nama FROM jurusan WHERE id = '".$key->jurusan."'")->row()->nama;
            ?>
        	<tr>
            	<td><?= $no++; ?></td>
            	<td><?= $key->nobp; ?></td>
	            <td><?= $key->nama; ?></td>
            	<td><?= $n; ?></td>
	            <td><?= $m; ?></td>
    			<td>
                	<?php
            		if($key->stat_reg == '1'){
                    	echo "Sudah diverifikasi";
                    }else{
                    	echo "Belum diverifikasi";
                    } ?>
    			<td>
                	<form action="" method="post" style="display: block" onsubmit="return confirm('Hapus peserta ini ?')">
                    	<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                        <button type="submit" name="hapus<?= $key->id; ?>" class="btn btn-danger">
                        	<i class="fas fa-trash"></i>
                    	</button>
               	 	</form>
                <?php
            	$uid = $key->id;
            	if(isset($_POST["hapus$uid"])){
                	$delete = $this->db->query("DELETE FROM peserta WHERE id = '$uid'");
                	if($delete){
                    	$total = $mq->total;
                    	$now = $total-1;
                    	$update = $this->db->query("UPDATE ukm SET total = '$now' WHERE id = '".$key->id_ukm."'");
                    
                    	if($update){
                        	$this->alert->pesan("success", "Berhasil...", "Peserta berhasil dihapus", 1, base_url("/neo/peserta"));
                        }else{
                        	$this->alert->pesan("error", "Gagal...");
                        }
                    }
                } ?>
            	</td>
        	</tr>
            <?php
            } ?>
    	</table>
	</li>
</ul>