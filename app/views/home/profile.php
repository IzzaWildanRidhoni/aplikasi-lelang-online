<div class="isiPesanan">
	<span class="jdlhome">Profile</span>
	<div class="row profile" style="padding: 20px">
		<div class="col-1">
			<img src="<?= BASEURL ?>asset/img/icon/petugas.png" alt="" width="200px">
		</div>
		<div class="col cright">
			<div class="row">
				<div class="col">
						<label for="nama">Nama</label>
						<input type="text" id="nama" value="<?= $data['profile']['nama'] ?>" disabled>
						<label for="username">username</label>
						<input type="text" id="username" value="<?= $data['profile']['username'] ?>" disabled>
				</div>
				<div class="col">
					<label for="telp">telp</label>
					<input type="text" id="telp" value="<?= $data['profile']['telp'] ?>" disabled>
					<label for="email">email</label>
					<input type="text" id="email" value="<?= $data['profile']['email'] ?>" disabled>
				</div>
			</div>
		</div>
	</div>
</div>