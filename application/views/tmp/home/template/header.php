<div class="container-fluid">
	<nav class="navbar navbar-expand-sm navbar-light bg-light sticky-top">
		<a class="navbar-brand" href="<?= base_url(); ?>"><img src="<?= base_url(); ?>assets/img/logo-bbmk/logo.png" height="30px"></a>
		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#peserta-navbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div id="peserta-navbar" class="collapse navbar-collapse">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link text-primary" href="<?= base_url(); ?>main/home">
						<i class="fas fa-home"></i>
						HOME
					</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link text-danger" href="<?= base_url(); ?>main/logout">
						<i class="fas fa-power-off"></i> Logout
					</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="row">
		<div class="col-md-3">
			<ul class="list-group" style="background-color: #C4AECD;">
				<li class="list-group-item text-center" style="background-color: #3D005D;  border-radius: 0px 0px 35px 35px;">
					<div style="width: 200px;height: 200px; border-radius: 300px;margin: auto;padding: 70px 30px;background-color: white">
						<img src="<?= base_url(); ?>assets/img/logo-bbmk/logo.png" width="100%">
					</div>
				</li>
				<li class="list-group-item" style="background-color: #C4AECD;">
					<i class="fas fa-home"></i>
					<a style="color: #3D005D" href="<?= base_url(); ?>main/home">Dashboard</a>
				</li>
				<li class="list-group-item " style="background-color: #C4AECD;">
					<i class="fas fa-user"></i>
					<a style="color: #3D005D" href="<?= base_url(); ?>main/home/profile">Profile</a>
				</li>
				<li class="list-group-item " style="background-color: #C4AECD;">
					<i class="fas fa-camera-retro"></i>
					<a style="color: #3D005D" href="<?= base_url(); ?>main/home/foto">Upload Foto</a>
				</li>
				<li class="list-group-item " style="background-color: #C4AECD;">
					<i class="fas fa-id-card"></i>
					<a style="color: #3D005D" href="<?= base_url(); ?>main/home/file">Upload File Verifikasi</a>
				</li>
				<!-- <li class="list-group-item " style="background-color: #C4AECD;">
					<i class="fas fa-id-card"></i>
					<a style="color: #3D005D" href="<?= base_url(); ?>main/home/print">Cetak Kartu</a>
				</li> -->
				<li class="list-group-item " style="background-color: #C4AECD;">
					<i class="fab fa-google-play"></i>
					<a style="color: #3D005D" href="<?= base_url(); ?>main/home/index/ukm">Info UKM</a>
				</li>
				<li class="list-group-item " style="background-color: #C4AECD;">
					<i class="fas fa-question-circle"></i>
					<a style="color: #3D005D" href="<?= base_url(); ?>main/home/syarat">Syarat Daftar Ulang</a>
				</li>
				<li class="list-group-item " style="background-color: #C4AECD;">
					<i class="fas fa-clock"></i>
					<a style="color: #3D005D" href="<?= base_url(); ?>main/home/jadwal">Jadwal dan Kegiatan BBMK</a>
				</li>


			</ul>
		</div>
		<div class="col-md-9">