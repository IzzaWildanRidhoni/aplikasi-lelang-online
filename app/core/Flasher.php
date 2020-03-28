<?php 

class Flasher{

	public function setFlash($pesan,$tipe)		
	{
		$_SESSION['flash']=[
			'pesan'=>$pesan,
			'tipe'=>$tipe
		];
	}

	public function setSESSION($pesan)		
	{
		$_SESSION[$pesan]=$pesan;
	}
	public  static function flash()
	{
		if (isset($_SESSION['flash'])) {
			echo '<div class="alert '.$_SESSION['flash']['tipe'].' ">
					<p>'.$_SESSION['flash']['pesan'].'</p>
				</div>';
			unset($_SESSION['flash']);
		}
	}
}