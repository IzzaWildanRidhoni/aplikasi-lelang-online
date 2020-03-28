<?php
Class Deskripsi extends Controller{
	function index($id)
	{
		$data['judul']='Deskripsi Barang';
		$data['lelang']=$this->model('Deskripsi_model')->getDataLelangId($id);
		$data['semualelang']=$this->model('Deskripsi_model')->getBeberapaDataLelang();
		$data['infoLelang']=$this->model('Deskripsi_model')->infoLelang($id);
		if (isset($_POST['btntawar'])) {
			if ($_POST['tawar'] < $_POST['harga_awal']) {
				Flasher::setFlash('penawaran minimal Rp.'.$_POST['harga_awal'],'alert-gagal');
				header("Location:".BASEURL."Deskripsi/".$_POST['id_lelang']);
				exit();
			}
			if ($_POST['tawar'] == $_POST['harga_tertinggi']) {
				Flasher::setFlash('penawaran tidak boleh sama dengan penawar tertinggi','alert-gagal');
				header("Location:".BASEURL."Deskripsi/".$_POST['id_lelang']);
				exit();
			}
			if ($this->model('Deskripsi_model')->tambahTawaran($_POST)>0) {
				Flasher::setFlash('anda telah menawar produk ini','alert-sukses');
				header("Location:".BASEURL."Deskripsi/".$_POST['id_lelang']);
				exit();
			}
		}
		$data['maxtawar']=$this->model('Deskripsi_model')->getMaxTawar($id);
		$this->view('templates/header',$data);
		$this->view('home/barang',$data);
		$this->view('templates/footer');
	}

}