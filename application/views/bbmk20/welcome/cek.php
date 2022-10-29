<style type="text/css">
	#cek{
		background-image: url("<?= base_url(); ?>assets/img/asset20.png");
		background-size: 100%;
		background-repeat: no-repeat;
		height: 1000px
	}
	.cek-akun{
		margin: auto;
		text-align: center;
		padding-top: 10%;
	}
	.cek-akun label{
		color: white;
		font-weight: bolder;
		font-size: 40px;
		display: block;
		margin-bottom: 30px
	}
	.cek-input{
		background-color: white;
		width: 50%;
		margin: auto;
		border-radius: 7px;
		margin-bottom: 50px;
	}
	.cek-input input{
		width: 90%;
		padding: 10px;
		border: 0;
		background-color: transparent;
		color: blue;
	}
	.cek-input button{
		background-color: transparent;
		border: 0;
		color: blue;
	}
	.data{
		height: 500px;
		background-color: white;
		width: 50%;
		border-radius: 7px;
		margin: auto;
		border: 1px solid gold;
	}
</style>
<div id="cek">
	<div class="cek-akun">
		<form action="" method="post">
			<label>CEK AKUNMU DISINI</label>
			<div class="cek-input">
				<input type="text" name="bp" placeholder="Ketikkan nomor bp mu">
				<button type="submit" name="cek">
					<i class="fas fa-search"></i>
				</button>
			</div>
		</form>
		<div class="data">

		</div>
	</div>
</div>