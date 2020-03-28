<?php 
Class Home_model{
	private $db;
	function __construct()
	{
		$this->db=new Database;
	}

	public function getDataLelang()
	{
		$query="SELECT * FROM tb_barang JOIN tb_lelang WHERE tb_barang.id_barang = tb_lelang.id_barang";
		$this->db->query($query);
		return $this->db->resultSet();
	}

	public function cariDataLelang($data)
	{
		$keyword=$data['keyword'];
		$query="SELECT * FROM tb_barang JOIN tb_lelang WHERE tb_barang.id_barang = tb_lelang.id_barang AND merk LIKE '%$keyword%'";
		$this->db->query($query);
		return $this->db->resultSet();
	}
	public function getDataPesanan()
	{
		$id_user=$_SESSION['id_user'];
		$query="SELECT * FROM tb_lelang,tb_histori_lelang as tbhl, tb_barang WHERE tb_lelang.id_barang=tb_barang.id_barang AND tb_lelang.id_lelang=tbhl.id_lelang AND tbhl.id_user=$id_user";
		$this->db->query($query);
		return $this->db->resultSet();
	}
	public function getDataProfile()
	{
		$id_user=$_SESSION['id_user'];
		$query="SELECT * FROM tb_masyarakat WHERE id_user=$id_user";
		$this->db->query($query);
		return $this->db->single();
	}
}