	<span class="breadcrumb">lelang > Deskripsi > <?= $data['lelang'][0]['merk'] ?></span>
<div class="row detailBarang">
	<div class="deskripsi col">
			<?php Flasher::flash() ?>
				<div class="image" style="background-image: url(<?= BASEURL ?>asset/img/<?= $data['lelang'][0]['gambar'] ?>);">
						<?php if ( $data['lelang'][0]['status']=='buka'): ?>
						<span class="statusbarang">
						<?php else:?>	
						<span class="statusbarangttp">
						<?php endif; ?>
							Di<?= $data['lelang'][0]['status'] ?>
						</span>
						<div class="petugasicon">
						<img src="<?= BASEURL ?>asset/img/icon/petugas.png" width="30px" alt=""> <span><?= $data['lelang'][0]['nama_petugas'] ?></span>
					</div>

				</div>
				<?php if ($data['infoLelang']==true): ?>
					<div class="alert alert-warning">
						<p>anda sudah menawarkan barang ini</p>
					</div>
				<?php endif ?>
				
					<h2>
						<?= $data['lelang'][0]['merk'] ?>
					</h2>
										
				<div class="kotak ">
					<?= $data['lelang'][0]['nama_barang'] ?>
				</div>
				<div class="kotak ">
					<?= $data['lelang'][0]['spesifikasi'] ?>
				</div>
				<div class="kotak ">
					<?= $data['lelang'][0]['kondisi'] ?>
				</div>
				<div class="kotak ">
					min Rp.<?= $data['lelang'][0]['harga_awal'] ?>
				</div>
				<div class="kotak alert-warning">
					<?php if (is_null($data['maxtawar'][0]['max_tawar'])): ?>
						belum ada penawaran
					<?php else: ?>
					tawaran tertinggi Rp.<?=  $data['maxtawar'][0]['max_tawar']?>
					<?php endif; ?>
				</div>
				<?php if($data['lelang'][0]['status']=='buka'): ?>
				<div class="row">
					<div class="col">
					<form action="" method="post">
						<input type="hidden" name="harga_tertinggi" value="<?=  $data['maxtawar'][0]['max_tawar']?>">
						<input type="hidden" name="harga_awal" value="<?= $data['lelang'][0]['harga_awal'] ?>">
						<input type="hidden" name="id_user" value="<?= 	$_SESSION['id_user'];?>" >
						<input type="hidden" name="id_lelang" value=" <?=$data['lelang'][0]['id_lelang']?>">
						<input type="text" name="tawar" placeholder="Rp..." class="inputTawar" autocomplete="off">
					</div>
					<div class="col">
						<?php if ($data['infoLelang']==true): ?>
								<button class="btntawar" name="btntawar" disabled="">Tawar</button>
						<?php else: ?>
								<button class="btntawar" name="btntawar">Tawar</button>
						<?php 	endif; ?>
					</div>
				</form>
				</div>
			<?php endif; ?>
	</div>
	<div class="baranglain col" style="margin-left: 20px">
		<div class="judul">
				<span>Barang</span> Lelang
		</div>
	<?php foreach ($data['semualelang'] as $lelang): ?>
		<a href="<?= BASEURL ?>deskripsi/<?= $lelang['id_lelang'] ?>">
			<div class="boxbl">
				<img src="<?= BASEURL ?>asset/img/<?= $lelang['gambar'] ?>" alt="" width="30%">
				<div class="merk">
					<?= $lelang['merk'] ?>
					<span>
					Rp.<?= $lelang['harga_awal'] ?>
					</span><br>
				</div>
			</div>
		</a>
			<?php endforeach ?>
			<a href="<?=BASEURL ?>home" class="viewAll">view all</a>
		
	</div>
</div>
