<div class="container">
	<?php Flasher::flash() ?>

	<h3><a href="<?=BASEURL ?>petugas/laporan"><< </a>laporan Pemenang</h3>
	<hr>
	<table  cellpadding="10" cellspacing="0" class="table">
		<tr >
			<th>id_histori</th>
			<th>Nama pemenang</th>
			<th>nama barang</th>
			<th>merk</th>
			<th>email</th>
			<th>penawaran harga</th>
			<th>action</th>
		</tr>
<?php foreach ($data['laporan'] as $laporan): ?>
			<tr>
				<td>HIST0<?= $laporan['id_histori'] ?></td>
				<td><?=$laporan['nama'] ?></td>
				<td><?=$laporan['nama_barang'] ?></td>
				<td><?= $laporan['merk'] ?></td>
				<td><?= $laporan['email'] ?></td>
				<td>Rp. <?= $laporan['penawaran_harga'] ?></td>
				<td><a href="<?= BASEURL ?>petugas/konfirm/<?= $laporan['id_histori'] ?>/<?= $laporan['id_lelang'] ?>">Konfirmasi</a></td>
			</tr>
		<?php endforeach ?> 
	</table>
</div>