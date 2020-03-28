<div class="login">
	<h3>Admin Login</h3>
	<?php Flasher::flash(); ?>
	<form action="" method="post">
		<input type="text" name="username" placeholder="username" autocomplete="off" autofocus="" required="">
		<input type="password" name="password" placeholder="Password"  autocomplete="off" required="">
		<select name="level" id="level">
			<option value="petugas">petugas</option>
			<option value="administrator">administrator</option>
		</select>
		
		<button type="submit" name="submitAdmin">Login</button>
	</form>
</div>