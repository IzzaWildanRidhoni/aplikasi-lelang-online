<div class="boxTambah">
	<h3 class="judulBox">Tambah Petugas</h3>
	<?php Flasher::flash() ?>
	<form class="formBarang" method="post">
			<input type="text" name="nama_petugas" placeholder="Nama Petugas" autofocus="" required="">
			<input type="text" name="username" placeholder="username" required="">
		
			<input type="password" name="password" placeholder="password" required="">
			<input type="password2" name="password2" placeholder="password2" required="">
			<select name="level" id="level" required="">
				<option value="administrator">administrator</option>
				<option value="petugas">petugas</option>
			</select>
			<button type="submit" name="tambah">Tambah</button>
	</form>
</div>