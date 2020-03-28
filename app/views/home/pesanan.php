<div class="isiPesanan">
	<span class="jdlhome">Pesanan</span>

	<div class=" row tbl_pesanan jdl">
			<div class="col">No</div>
			<div class="col">Gambar</div>
			<div class="col">Merk</div>
			<div class="col">tanggal lelang</div>
			<div class="col">penawaran anda</div>
			<div class="col">Ket</div>
		</div>	
	<?php 
	$i=1;
	foreach ($data['pesanan'] as $pesanan): ?>
		<a href="<?= BASEURL ?>deskripsi/<?= $pesanan['id_lelang'] ?>">
		<?php if ($pesanan['ket']=="menang"): ?>
			<div class=" row tbl_pesanan bg-sukses">
		<?php elseif ($pesanan['ket']=="kalah"):?>
			<div class=" row tbl_pesanan bg-gagal">
		<?php else :?>
			<div class=" row tbl_pesanan">
		<?php endif?>
		
			<div class="col"><?= $i; ?></div>
			<div class="col img" style="background-image: url(<?= BASEURL ?>asset/img/<?= $pesanan['gambar'] ?>)" width="">
			</div>
			<div class="col">
				<?=$pesanan['merk'] ?>
			</div>
			<div class="col">
				<?=$pesanan['tgl_lelang'] ?>
			</div>
			<div class="col">
				<?=$pesanan['penawaran_harga'] ?>
			</div>
			<div class="col">
					<span> anda <?=$pesanan['ket'] ?> lelang</span>
			</div>
		</div>
		</a>
		<?php $i++; ?>
	<?php endforeach ?>
</div>