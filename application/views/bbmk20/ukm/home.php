<?php
$query = $this->db->query("SELECT nama, logo, kuota, total FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'");
$data = $query->row();
if ($data->logo == null) {
	$logo = "head-full-color.svg";
} else {
	$logo = $data->logo;
}
?>
<ul class="list-group">
	<li class="list-group-item" style="background-color: #C4AECD;">
		<h3 style="color: #3D005D">Selamat Datang, <?= $data->nama; ?></h3>
	</li>
	<li class="list-group-item">
		<div class="row">
			<div class="col-md-4">
				<ul class="list-group">
					<li class="list-group-item text-center">
						<img src="<?= base_url(); ?>/assets/img/logo/<?= $logo; ?>" width="40%"><br>
						<?= $data->nama; ?>
					</li>

				</ul>
			</div>
			<style type="text/css">
				.purple {
					color: purple !important;
					font-weight: bolder;
					border-bottom: 2px solid red;
					display: inline-block;
					margin: 0 10px;
					padding-bottom: 5px;
				}
			</style>
			<div class="col-md-8">
				<ul class="list-group">
					<li class="list-group-item">
						<a class="text-secondary <?php if ($id != 'profile') {
														echo 'purple';
													} ?>" href="<?= base_url(); ?>/admin/home/news" id="news">News</a>
						<a class="text-secondary <?php if ($id == 'profile') {
														echo 'purple';
													} ?>" href="<?= base_url(); ?>/admin/home/profile" id="detail">Profile</a>
					</li>
					<?php
					if ($id == "profile") {
						$this->load->view("ukm/profile");
					} else {
						$this->load->view("ukm/news");
					} ?>
				</ul>
			</div>
		</div>
	</li>
</ul>