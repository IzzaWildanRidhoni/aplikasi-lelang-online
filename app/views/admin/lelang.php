<div class="container">
	<table  cellpadding="10" cellspacing="0" class="table">
		<tr >
			<th>Id lelang</th>
			<th>id  Barang</th>
			<th>tgl lelang</th>
			<th>harga awal</th>
			<th>harga akhir</th>
			<th>status</th>
			<th>id petugas</th>
			<th colspan="2">Setting</th>
		</tr>
		<?php foreach ($data['lelang'] as $lelang): ?>
			<tr>
				<td><?= $lelang['id_lelang'] ?></td>
				<td><?= $lelang['id_barang'] ?></td>
				<td><?= $lelang['tgl_lelang'] ?></td>
				<td><?= $lelang['harga_awal'] ?></td>
				<td><?= $lelang['harga_akhir'] ?></td>
				<td><?= $lelang['status'] ?></td>
				<td><?= $lelang['id_petugas'] ?></td>
				<td><a href="" ><img class="icon"src="<?= BASEURL ?>asset/img/icon/edit.svg" ></a></td>
				<td><a href=""><img class="icon"src="<?= BASEURL ?>asset/img/icon/hapus.svg" ></a></a></td>

			</tr>
		<?php endforeach ?>
	</table>
</div>