<?php if(isset($_SESSION['login'])){header('Location:'.BASEURL.'home');}
if(isset($_SESSION['loginAdmin'])){header('Location:'.BASEURL.'admin/dashboard');}
if (isset($_SESSION['loginPetugas'])) {header('Location:'.BASEURL.'petugas');}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $data['judul'] ?></title>
	<link rel="stylesheet" type="text/css" href="<?=BASEURL ?>asset/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?=BASEURL ?>asset/css/home.css">
</head>
<body>
