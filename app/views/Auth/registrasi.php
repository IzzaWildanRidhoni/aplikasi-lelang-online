<div class="register">
	<h3>registrasi</h3><hr>
	<?php Flasher::flash(); ?>

	<form method="post">
	<div class="row">
		<div class="col" style="margin-right: 10px">
			<input required="" type="text" name="nama" placeholder="Nama Lengkap" autofocus="" maxlength="25">
			<input required="" type="text" name="tlpn" placeholder="Nomer Telephon" maxlength="14" minlength="12">
			<input required="" type="email" name="email" placeholder="Email Aktif">
		</div>
		<div class="col" style="margin-left: 10px">
			<input required="" type="text" name="username" placeholder="Username" maxlength="15">
			<input required="" type="password" name="password" placeholder="Password">
			<input required="" type="password" name="password2" placeholder="Ulangi Password">
			
		</div>
	</div>
	<button type="submit" name="register">Register</button>
	</form>
	<hr>
	<center>
	<a href="<?= BASEURL ?>Auth ">Sudah registrasi</a>
	</center>

</div>