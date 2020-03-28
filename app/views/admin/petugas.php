<div class="container">
	<a href="<?= BASEURL ?>admin/tambahPetugas" class="tambah" style="margin-bottom: 20px">Tambah Petugas</a>
	<?php Flasher::flash() ?>
	<table  cellpadding="10" cellspacing="0" class="table">
		<tr >
			<th>no</th>
			<th>nama petugas</th>
			<th>username</th>
			<th>password</th>
			<th>level</th>
			<th colspan="2">Setting</th>
		</tr>

		<?php 
		$i=1;
		foreach ($data['petugas'] as $petugas): ?>
			<tr>
				<td><?= $i++;?></td>
				<td><?= $petugas['nama_petugas'] ?></td>
				<td><?= $petugas['username'] ?></td>
				<td><?= $petugas['password'] ?></td>
				<td><?= $petugas['level'] ?></td>
				<td><a href="<?=BASEURL ?>admin/editPetugas/<?=$petugas['id_petugas'] ?>" ><img class="icon"src="<?= BASEURL ?>asset/img/icon/edit.svg" ></a></td>
				<td><a href="<?=BASEURL ?>admin/hapusPetugas/<?=$petugas['id_petugas'] ?>" onClick="return confirm('yakin?') "><img class="icon"src="<?= BASEURL ?>asset/img/icon/hapus.svg" ></a></a></td>

			</tr>
		<?php endforeach ?>
	</table>
</div>