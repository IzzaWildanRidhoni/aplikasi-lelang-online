<div class="container">
	<?php Flasher::flash() ?>
	<a href="<?= BASEURL ?>Barang/tambahBarang" class="tambah">Tambah Barang</a>
	<form action="" method="post" class="cari">
		<input type="text" name="keyword" autofocus="" placeholder="Cari Barang ">
		<button type="submit" name="cari">Cari</button>
	</form>
	<table  cellpadding="10" cellspacing="0" class="table">
		<tr >
			<th>No</th>
			<th>Namabarang</th>
			<th>Merk</th>
			<th>Gambar</th>
			<th>Spesifikasi</th>
			<th>Kondisi</th>
			<th colspan="2">Setting</th>
		</tr>
		<?php 
		$i=1;
		foreach ($data['barang'] as $barang): ?>
			<tr>
				<td><?= $i++ ?></td>
				<td><?= $barang['nama_barang'] ?></td>
				<td><?= $barang['merk'] ?></td>
				<td><img src="<?= BASEURL ?>asset/img/<?=$barang['gambar'] ?>" alt="" width="100px"></td>
				<td><?= $barang['spesifikasi'] ?></td>
				<td><?= $barang['kondisi'] ?></td>
				<td><a href="<?=BASEURL?>barang/editBarang/<?= $barang['id_barang'] ?>" ><img class="icon"src="<?= BASEURL ?>asset/img/icon/edit.svg" ></a></td>
				<td><a href="<?=BASEURL?>barang/hapusBarang/<?= $barang['id_barang'] ?>" onclick="return confirm('yakin?');"><img class="icon"src="<?= BASEURL ?>asset/img/icon/hapus.svg" ></a></a></td>

			</tr>
		<?php endforeach ?>
	</table>
</div>