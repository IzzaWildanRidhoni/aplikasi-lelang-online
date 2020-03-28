<?php 
Class Admin extends Controller{
	function index()
	{
		$data['judul']='Admin Login';

		if (isset($_POST['submitAdmin'])) {
			$username=$_POST['username'];
			$password=$_POST['password'];
			$level=$_POST['level'];
			$data['petugas']=$this->model('Admin_model')->getPetugas($username);
			if (($username==$data['petugas']['username'] && $password==$data['petugas']['password']) && $level==$data['petugas']['level']) {
				if ($level=='administrator') {
					Flasher::setSESSION('loginAdmin');
					$_SESSION['nama_petugas']=$data['petugas']['nama_petugas'];
					header('Location:'.BASEURL.'admin/dashboard');
				}
				if($level=='petugas'){
					Flasher::setSESSION('loginPetugas');
					$_SESSION['nama_petugas']=$data['petugas']['nama_petugas'];
					$_SESSION['id_petugas']=$data['petugas']['id_petugas'];
					header('Location:'.BASEURL.'petugas');
				}
				Flasher::setFlash('username atau password salah','alert-gagal');
			}
			else{
				Flasher::setFlash('username atau password salah','alert-gagal');
			}
		}
		$this->view('templateLogin/header',$data);
		$this->view('admin/login',$data);
		$this->view('templateLogin/footer');
	}
	public function dashboard()
	{
		$data['judul']='Admin| Lelang';
		$data['dashboardAktif']='aktif';
		$this->view('templateAdmin/header',$data);
		$this->view('admin/dashboard',$data);
		$this->view('templateAdmin/footer');	
	}
	
	public function peserta()
	{
		$data['judul']='Barang| lelang';
		$data['pesertaAktif']='aktif';
		$data['peserta']=$this->model('Admin_model')->getDataPeserta();
		$this->view('templateAdmin/header',$data);
		$this->view('admin/peserta',$data);
		$this->view('templateAdmin/footer');
	}
	public function lelang()
	{
		$data['judul']=' Data Lelang| lelang';
		$data['lelangAktif']='aktif';
		$data['lelang']=$this->model('Admin_model')->getDataLelang();
		$this->view('templateAdmin/header',$data);
		$this->view('admin/lelang',$data);
		$this->view('templateAdmin/footer');
	}
	public function petugas()
	{
		$data['judul']=' Data Petugas| lelang';
		$data['petugasAktif']='aktif';
		$data['petugas']=$this->model('Admin_model')->getDataPetugas();
		$this->view('templateAdmin/header',$data);
		$this->view('admin/petugas',$data);
		$this->view('templateAdmin/footer');
	}
	public function tambahPetugas()
	{
		$data['petugasAktif']='aktif';
		$data['judul']="tambah Petugas";
		if (isset($_POST['tambah'])) {
			if ($this->model('Admin_model')->cekPetugas($_POST) == 0) {
				if ($this->model('Admin_model')->tambahPetugas($_POST)>0) {
					Flasher::setFlash('data petugas berhasil 	disimpan','alert-sukses');
					header('Location:'.BASEURL.'Admin/petugas');
					exit();
				}
			}
			Flasher::setFlash('petugas sudah ada','alert-gagal');
			header('Location:'.BASEURL.'Admin/tambahPetugas');
			exit();
		}
		$this->view('templateAdmin/header',$data);
		$this->view('admin/tambahPetugas',$data);
		$this->view('templateAdmin/footer');
	}
	public function hapusPetugas($id)
	{
		if ($this->model('Admin_model')->hpsPetugas($id)>0) {
			Flasher::setFlash('data berhasil di hapus','alert-sukses');
			header('Location:'.BASEURL.'admin/petugas');
			exit();
		}
	}
	public function editPetugas($id)
	{
		$data['judul']=' Edit Petugas| lelang';
		$data['petugasAktif']='aktif';
		$data['editPetugas']=$this->model('Admin_model')->getDataPetugasId($id);
		if (isset($_POST['edit'])) {
			if ($this->model('Admin_model')->editPetugas($_POST)>0) {
				Flasher::setFlash('data Berhasil di edit','alert-sukses');
				header('Location:'.BASEURL.'admin/petugas');
			}
		}
		$this->view('templateAdmin/header',$data);
		$this->view('admin/editPetugas',$data);
		$this->view('templateAdmin/footer');
		
	}
	public function laporan()
	{
		$data['judul']=' laporan| lelang';
		$data['laporanAktif']='aktif';
		$data['laporan']=$this->model('Admin_model')->getLaporanPemenang();
		$data['histori']=$this->model('Admin_model')->getHistori();
		$this->view('templateAdmin/header',$data);
		$this->view('admin/laporan',$data);
		$this->view('templateAdmin/footer');
		
	}
	public function logout()
	{
		session_destroy();
		Flasher::setFlash('anda telah logout','alert-sukses');
		header('Location:'.BASEURL.'admin');
	}
}