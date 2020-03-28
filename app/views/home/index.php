<div class="jumbotron">
	<form action="" method="post">
	<div class="boxcari">
		<center><span>Search</span></center>
		<input type="text" name="keyword" placeholder="Cari Barang Lelang" autofocus="" autocomplete="off">
		<button type="submit" name="cari">Cari</button>
	</div>	
	</form>
</div>

<div class="content">
	<span class="judul">&nbsp;<?=$data['jdlBarang'] ?></span>
	<?php Flasher::flash() ?>
		<?php if ($data['jdlBarang']=='Hasil Cari'): ?>
			<br><h2 class="back"><a href="<?= BASEURL ?>"> <i><--kembali ke Home</i></a></h2>
		<?php endif ?>
		<?php if (isset($data['info'])): ?>
			<?php if ($data['info']=='Maaf'): ?>
				<center><img src="<?= BASEURL ?>asset/img/icon/404.png" alt="" width="400px">
				<h2 class="infoCari">Maaf Barang Tidak diemukan</h2></center>
			<?php endif ?>
		<?php endif ?>
	<div class="row ">
		<?php foreach ($data['lelang'] as $barang): ?>
			
		<a href="<?= BASEURL ?>deskripsi/<?= $barang['id_lelang'] ?>">
			<div class="col-4 card">
			<?php if ($barang['status']=='tutup'): ?>
				<div class="gambar" style='background-image: url("<?= BASEURL ?>asset/img/<?=$barang['gambar'] ?>");'>
							<span class="infotutup">Ditutup</span>
				</div>
			<?php endif ?>
			<?php if ($barang['status']=='buka'): ?>
				<div class="gambarDibuka" style='background-image: url("<?= BASEURL ?>asset/img/<?=$barang['gambar'] ?>");'>
							<span class="infobuka">Dibuka</span>
				</div>
			<?php endif ?>
				<div class="desc">
					<span class="merk"><?= $barang['merk'] ?></span>
					<span class="harga">Rp.<?=$barang['harga_awal'] ?></span>
				</div>
			</div>
		</a>
		<?php endforeach ?>
		
	</div>
</div>
