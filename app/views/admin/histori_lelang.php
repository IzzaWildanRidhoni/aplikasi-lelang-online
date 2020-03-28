<div class="container">
	<?php Flasher::flash() ?>
<h3><a href="<?=BASEURL ?>petugas/laporan"><< </a>Histori Lelang</h3>
	<hr>

	<table  cellpadding="10" cellspacing="0" class="table">
		<tr >
			<th>id_histori</th>
			<th>Nama</th>
			<th>Merk Barang</th>
			<th>penawaran harga</th>
			<th>status</th>

		</tr>
		<?php foreach ($data['histori'] as $histori): ?>
			<tr>

				<td>HIST0<?= $histori['id_histori'] ?></td>
				<td><?=$histori['nama'] ?></td>
				<td><?=$histori['merk'] ?></td>
				<td>Rp. <?= $histori['penawaran_harga'] ?></td>
				<td><?= $histori['status'] ?></td>
			</tr>
		<?php endforeach ?> 
	</table>
</div>