<?php if(isset($_SESSION['login'])){header('Location:'.BASEURL.'home');}
if(isset($_SESSION['loginAdmin'])){header('Location:'.BASEURL.'admin/dashboard');}
if (isset($_SESSION['loginPetugas'])) {header('Location:'.BASEURL.'petugas');}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome</title>
	<link rel="stylesheet" href="<?= BASEURL ?>asset/css/welcome.css">
</head>
<body>
	<nav>
	<a href="<?= BASEURL ?>">
		<img src="<?= BASEURL ?>asset/img/icon/dilelang.png" alt="" class="brand">
	</a>
	<ul>
		<li>
			<a href="#" class="aktif">HOME</a>
		</li>
		<li>
			<a href="<?=BASEURL ?>home/logout">LOGIN</a>
		</li>
	</ul>
</nav>

<div class="isicontent">
	<span class="welcome">Selamat Datang Di Situs <span>diLelang</span></span>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore, similique, ipsam. Minus non tenetur suscipit, magnam iure repellat repellendus error molestiae</p>
	<a href="<?= BASEURL ?>auth">ikut Lelang</a>
</div>
</body>
</html>