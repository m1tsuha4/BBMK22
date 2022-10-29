<!-- Pembuka Login -->
<div class="container-lg">
	<div class="login bg-2">
		<p class="h2 color-1">LOG IN</p>
		<p class="h2 color-1">Super Admin</p>
		<form class="form-group" action="" method="post">
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
			<div class="form-floating mb-3">
				<input type="text" name="username" class="form-control" id="floatingInput" placeholder="NIM">
				<label for="floatingInput">Username</label>
			</div>
			<div class="form-floating mb-3">
				<input type="password" name="password" class="form-control" id="floatingInput" placeholder="Password">
				<label for="floatingInput">Password</label>
			</div>
			<div class="form-floating mb-3">
				<button type="submit" name="login" class="btn color-4 bg-1">
					Masuk
				</button>
		</form>


	</div>
</div>