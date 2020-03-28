<div class="container">
	<a href="<?= BASEURL ?>petugas/tambahLelang" class="tambah"> Tambah lelang</a>
	<form action="" method="post" class="cari">
	<?php Flasher::flash() ?>
		<input type="text" name="keyword" autofocus="" placeholder="Cari Barang ">
		<button type="submit" name="cari">Cari</button>
	</form>
	<table  cellpadding="10" cellspacing="0" class="table">
		<tr >
			<th>no</th>
			<th>Merk</th>
			<th>harga awal</th>
			<th>Petugas</th>
			<th>status</th>
			<th colspan="2">Setting</th>
		</tr>
		<?php 
		$i=1;
		foreach ($data['lelang'] as $lelang): ?>
			<tr>
				<td><?= $i++ ?></td>
				<td><?= $lelang['merk'] ?></td>
				<td><?= $lelang['harga_awal'] ?></td>
				<td><?= $lelang['nama_petugas'] ?></td>
				<td><?= $lelang['status'] ?></td>
				<td>
					<form action="<?= BASEURL ?>petugas/tutupLelang" method="post">
						<input type="hidden" name="id" value="<?= $lelang['id_lelang'] ?>">
					<?php if ($lelang['status']=='tutup'): ?>
						<button  class="btn-tutup" onClick="return confirm('yakin akan ditutup?')" name="tutup" disabled="">lelang ditutup</button>
					<?php endif ?>
					<?php if ($lelang['status']=='buka'): ?>
						<button  class="btn-buka" onClick="return confirm('yakin akan ditutup?')" name="tutup">tutup lelang</button>
					<?php endif ?>
					</form>
				</td>
				<td><a href="<?=BASEURL?>petugas/hapuslelang/<?= $lelang['id_lelang'] ?>" onclick="return confirm('yakin?');"><img class="icon"src="<?= BASEURL ?>asset/img/icon/hapus.svg" ></a></a></td>
			</tr>
		<?php endforeach ?>
	</table>

</div>