<div class="boxTambah">
	<h3 class="judulBox">Tambah Lelang</h3>
	<?php Flasher::flash() ?>
	<form class="formBarang" method="post">
		<select name="id_barang" id="id_barang" class="selectLelang">
			<?php foreach ($data['barang'] as $barang): ?>
				<option value="<?= $barang['id_barang'] ?>"><?= $barang['merk'] ?></option>
			<?php endforeach ?>
		</select>
		<input type="number" name="harga_awal" placeholder="harga_awal" required>
		<button type="submit" name="tambah">Tambah Lelang</button>
	</form>
</div>