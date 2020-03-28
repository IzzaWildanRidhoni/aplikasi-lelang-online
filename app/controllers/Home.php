<?php
Class Home extends Controller{
	function index()
	{
		$data['judul']='Home';
		$data['homeaktif']='aktip';
		
		if (isset($_POST['cari'])) {
			$data['jdlBarang']='Hasil Cari';
			$data['lelang']=$this->model('Home_model')->cariDataLelang($_POST);
			$data['info']='';
			if ($data['lelang']== false) {
				$data['info']='Maaf';
			}
		}
		else{
			$data['jdlBarang']='Semua Barang Lelang';
			$data['lelang']=$this->model('Home_model')->getDataLelang();
		}
		$this->view('templates/header',$data);
		$this->view('home/index',$data);
		$this->view('templates/footer');
	}
	public function pesanan()
	{
		$data['judul']='pesanan';
		$data['pesanaktif']='aktip';
		$data['pesanan']=$this->model('Home_model')->getDataPesanan();
		$this->view('templates/header',$data);
		$this->view('home/pesanan',$data);
		$this->view('templates/footer');
	}
	public function profile()
	{
		$data['judul']='profile';
		$data['profileaktif']='aktip';
		$data['profile']=$this->model('Home_model')->getDataProfile();
		$this->view('templates/header',$data);
		$this->view('home/profile',$data);
		$this->view('templates/footer');
	}
	public function logout()
	{
		session_destroy();
		unset($_SESSION['login']);
		header('Location:'.BASEURL.'Auth');
	}

}