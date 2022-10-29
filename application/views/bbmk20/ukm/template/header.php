<?php
$query = $this->db->query("SELECT logo FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'");
$q = $query->row();
$query1 = $this->db->query("SELECT nama  FROM ukm WHERE username = '" . $this->session->userdata("adminBBMK19") . "'");
$data = $query1->row();
?>

<nav class="navbar navbar-expand-sm navbar-light bg-light sticky-top">
	<a class="navbar-brand" href="http://bbmk.kemahasiswaan.unand.ac.id"><img src="<?= base_url(); ?>assets/img/logo-bbmk/logo.png" height="30px"></a>
	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#bbmk-navbar">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div id="bbmk-navbar" class="collapse navbar-collapse">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link text-primary" href="<?= base_url(); ?>admin20/home">
					<i class="fas fa-home"></i> HOME
				</a>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto" id="profile">
			<li class="nav-item">
				<a class="nav-link" data-toggle="collapse" data-target="#profile-content" href="#profile-content">
					<?php
					if ($q->logo == null) {
						$logo = "head-full-color.svg";
					} else {
						$logo = $q->logo;
					} ?>
					<img src="<?= base_url(); ?>/assets/img/logo/<?= $logo; ?>" height="40px"> <i class="fas fa-chevron-down"></i>
				</a>
				<div id="profile-content" class="collapse" data-parent="#profile" style="position: absolute; width: 130px; right: 0">
					<ul class="list-group">
						<li class="list-group-item text-right">
							<!-- add 2019 -->
							<b style="color: #3D005D"><?= $data->nama; ?></b>
							<!-- <b style="color: #3D005D">Nama UKM</b> -->
						</li>
						<li class="list-group-item text-right">
							<a href="<?= base_url(); ?>admin20/setting" style="color: #3D005D">Pengaturan</a>
						</li>
						<li class="list-group-item text-right">
							<a href="<?= base_url(); ?>admin20/logout" style="color: #3D005D">Logout</a>
						</li>
					</ul>
				</div>
			</li>
		</ul>
	</div>
</nav>
<div class="row">
	<div class="col-md-3">
		<ul class="list-group" style="background-color: #C4AECD;">
			<li class="list-group-item text-center" style="background-color: #3D005D; border-radius: 0px 0px 35px 35px;">
				<div style="width: 200px;height: 200px;border-radius: 300px;margin: auto;padding: 70px 30px;background-color: white; ">
					<img src="<?= base_url(); ?>assets/img/logo-bbmk/logo.png" width="100%">
				</div>
			</li>

			<li class="list-group-item" id="ukm" style="background-color: #C4AECD;">
				<a data-toggle="collapse" data-target="#update-profile" style="color: #3D005D" href="#update-profile">
					<i class="fas fa-chevron-down item-danger"></i> Menu UKM
				</a>
				<div id="update-profile" class="collapse show" data-parent="#ukm">
					<ul class="list-group list-group-flush">

						<li class="list-group-item" style="background-color: #C4AECD;">
							<i class="fas fa-arrow-right"></i>
							<a href="<?= base_url(); ?>admin20/edit" style="color: #3D005D">Edit Profile UKM</a>
						</li>
						<li class="list-group-item" style="background-color: #C4AECD;">
							<i class="fas fa-arrow-right"></i>
							<a href="<?= base_url(); ?>admin20/timeline" style="color: #3D005D">Timeline</a>
						</li>
						<li class="list-group-item" style="background-color: #C4AECD;">
							<i class="fas fa-arrow-right"></i>
							<a href="<?= base_url(); ?>admin20/sosial" style="color: #3D005D">Media Sosial</a>
						</li>
						<li class="list-group-item" style="background-color: #C4AECD;">
							<i class="fas fa-arrow-right"></i>
							<a href="<?= base_url(); ?>admin20/notif" style="color: #3D005D">Buat Pemberitahuan</a>
						</li>
						<!-- <li class="list-group-item" style="background-color: #C4AECD;">
							<i class="fas fa-arrow-right"></i>
							<a href="<?= base_url(); ?>admin20/cetak" style="color: #3D005D">Print List Peserta</a>
						</li> -->
						<li class="list-group-item" style="background-color: #C4AECD;">
							<i class="fas fa-arrow-right"></i>
							<a href="<?= base_url(); ?>admin20/syarat" style="color: #3D005D">Syarat Daftar Ulang</a>
						</li>
						<!-- <li class="list-group-item" style="background-color: #C4AECD;">
							<i class="fas fa-arrow-right"></i>
							<a href="<?= base_url(); ?>admin20/jadwal" style="color: #3D005D">Jadwal dan Kegiatan BBMK</a>
						</li> -->

						<!-- tambahan baru 2019 -->
						<li class="list-group-item" style="background-color: #C4AECD;">
							<i class="fas fa-arrow-right"></i>
							<a href="<?= base_url(); ?>admin20/dokumentasi" style="color: #3D005D">Upload Materi</a>
						</li>
					</ul>
				</div>
			</li>
			<li class="list-group-item" id="peserta" style="background-color: #C4AECD;">
				<a data-toggle="collapse" data-target="#peserta-content" style="color: #3D005D" href="#peserta-content">
					<i class="fas fa-chevron-down item-danger"></i> Lihat Peserta Terdaftar
				</a>
				<div id="peserta-content" class="collapse show" data-parent="#peserta">
					<ul class="list-group list-group-flush">
						<li class="list-group-item" style="background-color: #C4AECD;">
							<i class="fas fa-arrow-right"></i>
							<a href="<?= base_url(); ?>admin20/peserta" style="color: #3D005D">Semua</a>
						</li>
						<li class="list-group-item" style="background-color: #C4AECD;">
							<i class="fas fa-arrow-right"></i>
							<a href="<?= base_url(); ?>admin20/peserta/belum" style="color: #3D005D">Belum Verifikasi</a>
						</li>
						<li class="list-group-item" style="background-color: #C4AECD;">
							<i class="fas fa-arrow-right"></i>
							<a href="<?= base_url(); ?>admin20/peserta/sudah" style="color: #3D005D">Sudah Verifikasi</a>
						</li>
						<li class="list-group-item" style="background-color: #C4AECD;">
							<i class="fas fa-arrow-right"></i>
							<a href="<?= base_url(); ?>admin20/kehadiran" style="color: #3D005D">Absensi Peserta</a>
						</li>
						<li class="list-group-item" style="background-color: #C4AECD;">
							<i class="fas fa-arrow-right"></i>
							<a href="<?= base_url(); ?>admin20/daftarhadir" style="color: #3D005D">Daftar Kehadiran Peserta</a>
						</li>
						<li class="list-group-item" style="background-color: #C4AECD;">
							<i class="fas fa-arrow-right"></i>
							<a href="<?= base_url(); ?>admin20/kelulusanpeserta" style="color: #3D005D">Kelulusan Peserta</a>
						</li>
					</ul>
				</div>
			</li>

		</ul>
	</div>
	<div class="col-md-9">