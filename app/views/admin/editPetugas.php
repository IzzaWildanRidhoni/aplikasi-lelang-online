<div class="boxTambah">
	<h3 class="judulBox">Edit Petugas</h3>
	<form class="formBarang" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $data['editPetugas']['id_petugas'] ?> ">
			<input type="text" name="nama_petugas" placeholder="nama Petugas" autofocus="" required="" value="<?= $data['editPetugas']['nama_petugas'] ?> " size="15">
			<input type="text" name="username" placeholder="username" required="" value="<?= $data['editPetugas']['username'] ?>">
			<input type="password" name="password" placeholder="password" required="" value="<?= $data['editPetugas']['password'] ?>">		
			
			<button type="submit" name="edit">Edit</button>
	</form>
</div>