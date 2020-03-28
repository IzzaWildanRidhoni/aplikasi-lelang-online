<div class="container">
	<table  cellpadding="10" cellspacing="0" class="table">
		<tr >
			<th>Id</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Password</th>
			<th>Telp</th>
		</tr>
		<?php foreach ($data['peserta'] as $peserta): ?>
			<tr>
				<td><?= $peserta['id_user'] ?></td>
				<td><?= $peserta['nama'] ?></td>
				<td><?= $peserta['username'] ?></td>
				<td><?= $peserta['password'] ?></td>
				<td><?= $peserta['telp'] ?></td>
			</tr>
		<?php endforeach ?>
	</table>
</div>