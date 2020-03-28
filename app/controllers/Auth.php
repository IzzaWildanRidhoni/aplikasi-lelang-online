<?php 
Class Auth extends Controller{
	private $db;
	function index()
	{
		$data['judul']='login Page';

		if (isset($_POST['submit'])) {
			$username=$_POST['username'];
			$password=$_POST['password'];
			$data['masyarakat']=$this->model('Auth_model')->getAllMasyarakat($username);
			if ($username==$data['masyarakat']['username'] && md5($password)==$data['masyarakat']['password']) {
				Flasher::setSESSION('login');
				$_SESSION['id_user']=$data['masyarakat']['id_user'];
				header('Location:'.BASEURL.'home');
			}
			else{
				Flasher::setFlash('username atau password salah','alert-gagal');
			}
		}

		$this->view('templateLogin/header',$data);
		$this->view('Auth/login');
		$this->view('templateLogin/footer');
	}
	function registrasi()
	{
		if (isset($_POST['register'])) {
		if($this->model('Auth_model')->tambahCustomer($_POST)>0){
			Flasher::setFlash('anda berhasil registrasi, Silahkan LOGIN','alert-sukses');
		}
		}
		$data['judul']='Registrasi Page';
		$this->view('templateLogin/header',$data);
		$this->view('Auth/registrasi');
		$this->view('templateLogin/footer');
	}

}