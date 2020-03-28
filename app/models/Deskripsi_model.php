<?php 
Class Deskripsi_model{
	private $db;
		public function __construct()
		{
			$this->db=new Database;
		}
	public function getDataLelangId($id)
	{
		$query="SELECT * FROM tb_barang,tb_petugas, tb_lelang WHERE tb_barang.id_barang = tb_lelang.id_barang AND tb_lelang.id_lelang=$id AND tb_petugas.id_petugas=tb_lelang.id_petugas";
		$this->db->query($query);
		return $this->db->resultSet();
	}
	
	public function tambahTawaran($data)
	{
		$id_lelang=$data['id_lelang'];
		$id_user=$data['id_user'];
		$tawar=$data['tawar'];

		$query="SELECT * FROM tb_histori_lelang WHERE id_lelang=$id_lelang AND id_user=$id_user";
		$this->db->query($query);
		if($this->db->single() > 0){
			Flasher::setFlash('anda sudah menawarkan barang ini','alert-gagal');
			header("Location:".BASEURL."Deskripsi/".$_POST['id_lelang']);
			exit();
		}
		$query="INSERT INTO tb_histori_lelang VALUES('',$id_lelang,$id_user,$tawar,'menunggu')";
		$this->db->query($query);
		$this->db->execute();
		return $this->db->rowCount();
	}
	public function getBeberapaDataLelang()
	{
		$query="SELECT * FROM tb_barang JOIN tb_lelang WHERE tb_barang.id_barang = tb_lelang.id_barang LIMIT 0,7";
		$this->db->query($query);
		return $this->db->resultSet();
	}
	function infoLelang($id)
	{
		$id_user=$_SESSION['id_user'];
		$query="SELECT * FROM tb_histori_lelang WHERE id_user=$id_user AND id_lelang=$id";
		$this->db->query($query);
		return $this->db->single();
	}
	public function getMaxTawar($id)
	{
		$query="SELECT max(penawaran_harga) as max_tawar FROM tb_histori_lelang WHERE id_lelang=$id";
		$this->db->query($query);
		return $this->db->resultSet();
	}

}