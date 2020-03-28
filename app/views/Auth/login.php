<div class="login">
	<h3>Login Page</h3>
	<?php Flasher::flash(); ?>
	<form action="" method="post">
		<input type="text" name="username" placeholder="username" autocomplete="off" autofocus="">
		<input type="password" name="password" placeholder="Password"  autocomplete="off">
		<button type="submit" name="submit">Login</button>
	</form>
		<hr>
		<a href="<?=BASEURL ?>Auth/registrasi">Create New Account</a>
</div>