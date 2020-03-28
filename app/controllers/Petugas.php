<?php 
Class Petugas extends Controller{
	function index()
	{
		$data['judul']='Petugas| Lelang';
		$data['dashboardAktif']='aktif';
		$this->view('templateAdmin/header',$data);
		$this->view('petugas/dashboard',$data);
		$this->view('templateAdmin/footer');	
	}
	public function dashboard()
	{
		$data['judul']='Petugas| Lelang';
		$data['dashboardAktif']='aktif';
		$this->view('templateAdmin/header',$data);
		$this->view('petugas/dashboard',$data);
		$this->view('templateAdmin/footer');	
	}
	public function barang()
	{
		$data['judul']='Barang| lelang';
		$data['barangAktif']='aktif';
		$data['barang']=$this->model('Admin_model')->getDataBarang();
		$this->view('templateAdmin/header',$data);
		$this->view('admin/barang',$data);
		$this->view('templateAdmin/footer');
	}
	public function lelang()
	{
		$data['judul']='Data Lelang| lelang';
		$data['lelangAktif']='aktif';
		$data['lelang']=$this->model('Admin_model')->getDataLelang();
		$this->view('templateAdmin/header',$data);
		$this->view('petugas/lelang',$data);
		$this->view('templateAdmin/footer');
	}
	public function hapuslelang($id)
	{
		if ($this->model('Admin_model')->hpslelang($id)>0) {
			Flasher::setFlash('lelang id ke '.$id.' di hapus','alert-sukses');
			header('Location:'.BASEURL.'petugas/lelang');
			exit();
		}
		else{
			Flasher::setFlash('lelang gagal  di hapus','alert-gagal');
			header('Location:'.BASEURL.'petugas/lelang');
			exit();
		}
	}
	public function tutupLelang()
	{
		if (isset($_POST['tutup'])) {
			$id=$_POST['id'];
			if ($this->model('Admin_model')->tutupLelang($id)>0) {
				Flasher::setFlash('lelang di tutup','alert-sukses');
				header('Location:'.BASEURL.'petugas/lelang');
				exit();
			}
		}
		else{
			header('Location:'.BASEURL.'petugas/lelang');
		}
	}

	public function tambahLelang()
		{
			$data['judul']=' Tambah Lelang| lelang';
			$data['lelangAktif']='aktif';
			$data['barang']=$this->model('Admin_model')->getDataBarang();
			if (isset($_POST['tambah'])) {
				if ($this->model('Admin_model')->getLelangId($_POST) == 0) {
				
					if ($this->model('Admin_model')->tambahlelang($_POST)>0) {
						Flasher::setFlash('data berhasil ditambahkan','alert-sukses');
						header('Location:'.BASEURL.'petugas/lelang');
						exit();
					}
					
				}
				else{
					Flasher::setFlash('data sudah ada','alert-gagal');
					header('Location:'.BASEURL.'petugas/tambahLelang');
					exit();
				}
			}
			$this->view('templateAdmin/header',$data);
			$this->view('petugas/tambah_lelang',$data);
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
	public function histori_lelang()
	{
		$data['judul']=' Histori lelang| lelang';
		$data['laporanAktif']='aktif';
		$data['histori']=$this->model('Admin_model')->getHistori();
		$this->view('templateAdmin/header',$data);
		$this->view('admin/histori_lelang',$data);
		$this->view('templateAdmin/footer');
		
	}
	public function pemenang_lelang()
	{
		$data['judul']=' pemenang| lelang';
		$data['laporanAktif']='aktif';
		$data['laporan']=$this->model('Admin_model')->getLaporanPemenang();
		$this->view('templateAdmin/header',$data);
		$this->view('admin/pemenang_lelang',$data);
		$this->view('templateAdmin/footer');
		
	}
	public function konfirm($id,$id_lelang)
	{
		if ($this->model('Admin_model')->konfirmGagal($id_lelang)>0) {
			if ($this->model('Admin_model')->konfirmPemenang($id)>0) {
				header('Location:'.BASEURL.'petugas/pemenang_lelang');
			}
		}
	}
}