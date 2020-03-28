<?php if(isset($_SESSION['login'])){}else{
	Flasher::setFlash('login terlebih dahulu','alert-gagal');
	header('Location:'.BASEURL.'Auth/index');exit();
}?>
		
<!DOCTYPE html>
<html>
<head>
	<title><?= $data['judul'] ?></title>
	<link rel="stylesheet" type="text/css" href="<?=BASEURL ?>asset/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?=BASEURL ?>asset/css/home.css">
</head>
<body>
<nav>
	<a href="<?= BASEURL ?>">
		<img src="<?= BASEURL ?>asset/img/icon/dilelang.png" alt="" height="40px" class="brand">
	</a>
	<ul>
		<li>
			<a href="<?= BASEURL ?>" class="<?= $data['homeaktif'] ?>">Home</a>
		</li>
		<li>
			<a href="<?=BASEURL ?>home/pesanan" class="<?= $data['pesanaktif'] ?>">Pesanan</a>
		</li>
		<li>
			<a href="<?=BASEURL ?>home/profile" class="<?= $data['profileaktif'] ?>">Profile</a>
		</li>
		<li>
			<a href="<?=BASEURL ?>home/logout">logout</a>
		</li>

	</ul>
</nav>