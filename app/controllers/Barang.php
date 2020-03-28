<?php 
Class Barang extends Controller{
	function index()
	{
		$data['judul']='Barang| lelang';
		$data['barangAktif']='aktif';
		$data['barang']=$this->model('Admin_model')->getDataBarang();
		if (isset($_POST['cari'])) {
		$data['barang']=$this->model('Admin_model')->cariBarang($_POST);
		}
		$this->view('templateAdmin/header',$data);
		$this->view('admin/barang',$data);
		$this->view('templateAdmin/footer');
	}
	public function hapusBarang($id)
	{
		if ($this->model('Admin_model')->hpsBarang($id)>0) {
			Flasher::setFlash('data berhasil di hapus','alert-sukses');
			header('Location:'.BASEURL.'Barang');
		}
	}
	public function tambahBarang()
	{
		$data['judul']=' Tambah barang| lelang';
		$data['barangAktif']='aktif';
		if (isset($_POST['tambah'])) {
			if ($this->model('Admin_model')->tambahBarang($_POST)>0) {
				Flasher::setFlash('data Barang berhasil disimpan','alert-sukses');
				header('Location:'.BASEURL.'Barang');			}
		}
		$this->view('templateAdmin/header',$data);
		$this->view('admin/tambahBarang',$data);
		$this->view('templateAdmin/footer');
	}
	public function editBarang($id)
	{
		$data['judul']=' Edit barang| lelang';
		$data['barangAktif']='aktif';
		$data['editBarang']=$this->model('Admin_model')->getDataBarangId($id);
		if (isset($_POST['edit'])) {
			if ($this->model('Admin_model')->editBarang($_POST)>0) {
				Flasher::setFlash('data Berhasil di edit','alert-sukses');
				header('Location:'.BASEURL.'Barang');
			}
		}
		$this->view('templateAdmin/header',$data);
		$this->view('admin/editBarang',$data);
		$this->view('templateAdmin/footer');
		
	}

}
