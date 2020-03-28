<?php
if(isset($_SESSION['login'])){header('Location:'.BASEURL.'home');}
 if(isset($_SESSION['loginAdmin'])){}
elseif(isset($_SESSION['loginPetugas'])){}
else{
	Flasher::setFlash('login terlebih dahulu','alert-gagal');
	header('Location:'.BASEURL.'Admin');
}
?>
		
<!DOCTYPE html>
<html>
<head>
	<title><?= $data['judul'] ?></title>
	<link rel="stylesheet" type="text/css" href="<?=BASEURL ?>asset/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?=BASEURL ?>asset/css/home.css">
	<link rel="stylesheet" type="text/css" href="<?=BASEURL ?>asset/css/admin.css">
</head>
<body>
<nav class="navAdmin">
	<?php if (isset($_SESSION['loginAdmin'])): ?>
		<h4 class="brandAdmin">Admin</h4>
	<?php endif ?>
	<?php if (isset($_SESSION['loginPetugas'])): ?>
		<h4 class="brandAdmin">Petugas | Lelang</h4>
	<?php endif ?>
	<ul>
		<li>
			<a href="<?=BASEURL ?>admin/logout">logout</a>
		</li>

	</ul>
</nav>
		<?php if (isset($_SESSION['loginAdmin'])): ?>
<div class="sidebar">
	<ul>
		<li>
			<a href="<?= BASEURL ?>admin" class="<?php echo ($data['dashboardAktif']) ?>">Dashboard</a>
		</li>
		<li>
			<a href="<?= BASEURL ?>Barang" class="<?php echo ($data['barangAktif']) ?>">Data Barang</a>
		</li>
		<li>
			<a href="<?= BASEURL ?>admin/petugas" class="<?php echo ($data['petugasAktif']) ?>">Petugas</a>
		</li>
		<li>
			<a href="<?= BASEURL ?>admin/peserta" class="<?php echo ($data['pesertaAktif']) ?>">Peserta</a>
		</li>
		<li>
			<a href="<?= BASEURL ?>admin/laporan" class="<?php echo ($data['laporanAktif']) ?>">General Laporan</a>
		</li>
		
	</ul>
</div>
		<?php endif ?>
		<?php if (isset($_SESSION['loginPetugas'])): ?>
<div class="sidebar">
	<ul>
		<li>
			<a href="<?= BASEURL ?>petugas" class="<?php echo ($data['dashboardAktif']) ?>">Dashboard</a>
		</li>
		<li>
			<a href="<?= BASEURL ?>petugas/barang" class="<?php echo ($data['barangAktif']) ?>">Data Barang</a>
		</li>
		<li>
			<a href="<?= BASEURL ?>petugas/lelang" class="<?php echo ($data['lelangAktif']) ?>">Data Lelang</a>
		</li>
		<li>
			<a href="<?= BASEURL ?>petugas/laporan" class="<?php echo ($data['laporanAktif']) ?>">General Laporan</a>
		</li>
		
	</ul>
</div>
		<?php endif ?>
