<h1 id="lebar" style="position: fixed; z-index: 99999"></h1>
	<div class="row" id="home" style="height: 700px">
		<div class="col-md-4 wow fadeInLeft" style="padding-top: 50px" data-wow-delay="1s">
			<img src="<?= base_url(); ?>assets/img/logo2.jpg" width="80%">
		</div>
		<div class="col-md-8 wow fadeIn" data-wow-delay="0.5s">
			<img src="<?= base_url(); ?>assets/img/unand.jpg" width="100%">
		</div>
	</div>
	<hr class="bg-info">
	<div class="row" id="about">
		<div class="col-md-8">
			<img src="<?= base_url(); ?>assets/img/asset8.png" id="about-img" class="wow fadeIn">
			<font class="title wow fadeInDown" data-wow-delay="0.3s"> &nbsp;&nbsp;&nbsp;ABOUT </font>
			<div class="row">
				<div class="col-md-6" style="padding: 150px 0">
					<img src="<?= base_url(); ?>assets/img/logo.jpg" width="75%" class="wow fadeInUp" data-wow-delay="0.9s">
				</div>
				<div class="col-md-6">

				</div>
			</div>
		</div>
		<div class="col-md-4">
			<img src="<?= base_url(); ?>assets/img/asset6.jpg" width="100%" class="wow fadeInRight" data-wow-delay="0.6s">
		</div>
	</div>
	<hr class="bg-info">
	<div id="alur" style="margin-top: 50px">
		<div class="text-center">
			<img src="<?= base_url(); ?>assets/img/asset15.png" id="alur-img" class="wow fadeInLeft">
			<font class="title wow fadeInRight"> ALUR PENDAFTARAN</font>
		</div>
		<div class="row" style="margin-top: 150px; margin-bottom: 150px">
			<div class="col-md-3 text-center">
				<img src="<?= base_url(); ?>assets/img/asset16.png" height="100px" class="wow rotateInDownLeft" data-wow-delay="0.3s">
				<p class="text-left wow flipInY" data-wow-delay="0.6" style="margin-top: 40px">
					Kunjungi web bbmk online 
				</p>
			</div>
			<div class="col-md-3 text-center">
				<img src="<?= base_url(); ?>assets/img/asset17.png" height="100px" class="wow rotateInDownLeft" data-wow-delay="0.6s">
				<p class="text-left wow flipInY" data-wow-delay="0.9s" style="margin-top: 40px">
					Pilih UKM yang akan diikuti dengan klik salah satu dari ukm - ukm di bawah
				</p>
			</div>
			<div class="col-md-3 text-center">
				<img src="<?= base_url(); ?>assets/img/asset18.png" height="100px" class="wow rotateInDownLeft" data-wow-delay="0.9s">
				<p class="text-left wow flipInY" data-wow-delay="1.2s" style="margin-top: 40px">
					Isi data diri yang diminta secara lengkap dan lakukan verifikasi ke sekretariat ukm yang bersangkutan
				</p>
			</div>
			<div class="col-md-3 text-center">
				<img src="<?= base_url(); ?>assets/img/asset19.png" height="100px" class="wow rotateInDownLeft" data-wow-delay="1.2s">
				<p class="text-left wow flipInY" data-wow-delay="1.5s" style="margin-top: 40px">
					Mulai melaksanakan BBMK
				</p>
			</div>
		</div>
	</div>
	<hr class="bg-info" style="margin-bottom: 150px">
	<div id="time" style="background-image: url('<?= base_url(); ?>assets/img/asset13.png');background-size: 100%;background-repeat: no-repeat;">
		<div class="text-center">
			<img src="<?= base_url(); ?>assets/img/asset22.jpg" width="50px" class="wow zoomInDown">
			<font class="title" class="wow zoomInDown" data-wow-delay="0.3s">&nbsp;&nbsp;SAVE THE DATE</font>
		</div>
	
	<hr class="bg-info" style="margin-bottom: 150px">
	<div id="ukm" style="margin-bottom: 150px">
		<div class="text-center">
			<img src="<?= base_url(); ?>assets/img/asset14.png" width="50px">
			<font class="title"> &nbsp; UKM - UKM</font>
		</div>
		<div class="row" style="margin-top: 150px">
		<?php
		$query = $this->db->query("SELECT * FROM ukm");
		foreach ($query->result() as $q) { ?>
			<div class="col-md-4 text-center" style="margin: auto;margin-bottom: 50px">
				<div class="logo">
					<img src="<?= base_url(); ?>assets/img/asset7.png" width="100%">
				</div>
				<div class="text-center text-info" style="font-weight: bolder;padding: 10px;width: 80%">
					<?= $q->nama; ?>
				</div>
			</div>
		<?php
		} ?>
		</div>
	</div>
</div>
<script type="text/javascript">
	new WOW().init()

	$(window).resize(function(){
		if($(window).width() <= 2000){
			$("#lebar").text($(window).width())
		}
	})
</script>