<div class="boxTambah">
	<h3 class="judulBox">Edit barang</h3>
	<form class="formBarang" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $data['editBarang']['id_barang'] ?> ">
		<input type="hidden" name="gambarLama" value="<?= $data['editBarang']['gambar'] ?> ">
			<input type="text" name="nama_barang" placeholder="nama barang" autofocus="" required="" value="<?= $data['editBarang']['nama_barang'] ?> ">
			<input type="text" name="merk" placeholder="merk" required="" value="<?= $data['editBarang']['merk'] ?> ">
		
			<input type="text" name="spesifikasi" placeholder="spesifikasi" required="" value="<?= $data['editBarang']['spesifikasi'] ?> ">
			
			<input type="text" name="kondisi" placeholder="kondisi" required="" value="<?= $data['editBarang']['kondisi'] ?> ">
			<input type="file" name="gambar" >
			<img src="<?= BASEURL ?>asset/img/<?= $data['editBarang']['gambar'] ?> " alt="" width="200px">
			<button type="submit" name="edit">Edit</button>
	</form>
</div>