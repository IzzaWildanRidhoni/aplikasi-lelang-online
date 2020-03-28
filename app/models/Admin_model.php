<?php  
Class Admin_model{
	private $db;
		public function __construct()
		{
			$this->db=new Database;
		}
		public function getPetugas($user)
		{
			$this->db->query("SELECT * FROM tb_petugas WHERE username='$user'");
			 return $this->db->single();
		}
		public function getDataBarang()
		{
			$query="SELECT * FROM tb_barang";
			$this->db->query($query);
			return $this->db->resultSet();
		}
		public function hpsBarang($id_barang)
		{
			$query="DELETE FROM tb_barang WHERE id_barang=$id_barang";
			$this->db->query($query);
			$this->db->execute();
			return $this->db->rowCount();
		}
		public function getDataBarangId($id)
		{
			$query="SELECT * FROM tb_barang WHERE id_barang=$id";
			$this->db->query($query);
			return $this->db->single();
		}
		public function cariBarang($data)
		{
			$keyword=$data['keyword'];
			$query="SELECT * FROM tb_barang WHERE
					nama_barang LIKE '%$keyword%' OR
					merk LIKE '%$keyword%' OR
					spesifikasi LIKE '%$keyword%' OR
					kondisi LIKE '%$keyword%'
			";
			$this->db->query($query);
			return $this->db->resultSet();

		}
		public function editBarang($data)
		{
			$id=htmlspecialchars($data['id']);
			$nama_barang=htmlspecialchars($data['nama_barang']);
			$merk=htmlspecialchars($data['merk']);
			$spesifikasi=htmlspecialchars($data['spesifikasi']);
			$kondisi=htmlspecialchars($data['kondisi']);
			$gambarLama=$data['gambarLama'];
			//cek apakah  user pilih  gambar baru apa tidak
			if ($_FILES['gambar']['error']===4) {
				$gambar=$gambarLama;
			}
			else{
				$gambar=$this->upload();
			}

			$query="UPDATE tb_barang SET nama_barang='$nama_barang',merk='$merk',spesifikasi='$spesifikasi',kondisi='$kondisi',gambar='$gambar' WHERE id_barang=$id";
			$this->db->query($query);
			$this->db->execute();
			return $this->db->rowCount();
		}

		public function getDataPeserta()
		{
			$query="SELECT * FROM tb_masyarakat";
			$this->db->query($query);
			return $this->db->resultSet();
		}
		// public function getDataLelang()
		// {
		// 	$query="SELECT * FROM tb_lelang";
		// 	$this->db->query($query);
		// 	return $this->db->resultSet();
		// }
		public function getDataPetugas()
		{
			$query="SELECT * FROM tb_petugas";
			$this->db->query($query);
			return $this->db->resultSet();
		}
		public function getDataPetugasId($id)
		{
			$query="SELECT * FROM tb_petugas WHERE id_petugas=$id";
			$this->db->query($query);
			return $this->db->single();
		}
		public function cekPetugas($data)
		{
			$username=$data['username'];
			$query="SELECT * FROM tb_petugas WHERE username='$username'";
			$this->db->query($query);
			return $this->db->single();	
		}
		public function editPetugas($data)
		{
			$id=$data['id'];
			$nama_petugas=htmlspecialchars($data['nama_petugas']);
			$username=htmlspecialchars($data['username']);
			$password=htmlspecialchars($data['password']);

			$query="UPDATE tb_petugas SET nama_petugas='$nama_petugas',username='$username',password='$password' WHERE id_petugas=$id";
			$this->db->query($query);
			$this->db->execute();
			return $this->db->rowCount();
		}
		public function tambahBarang($data)
		{

			$nama_barang=$data['nama_barang'];
			$merk=$data['merk'];
			$spesifikasi=$data['spesifikasi'];
			$kondisi=$data['kondisi'];
			$gambar = $this->upload();
			if( !$gambar ) {
				return false;
			}

			$query="INSERT INTO tb_barang VALUES(:idbarang,:gambar,:nama_barang,:merk,:spesifikasi,:kondisi)";
			$this->db->query($query);
			$this->db->bind('idbarang','');
			$this->db->bind('gambar',$gambar);
			$this->db->bind('nama_barang',$nama_barang);
			$this->db->bind('merk',$merk);
			$this->db->bind('spesifikasi',$spesifikasi);
			$this->db->bind('kondisi',$kondisi);
			$this->db->execute();
			return $this->db->rowCount();
		}
function upload() {

		$namaFile = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpName = $_FILES['gambar']['tmp_name'];

		// cek apakah tidak ada gambar yang diupload
		if( $error === 4 ) {
			echo "<script>
					alert('pilih gambar terlebih dahulu!');
				  </script>";
			return false;
		}

		// cek apakah yang diupload adalah gambar
		$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
			echo "<script>
					alert('yang anda upload bukan gambar!');
				  </script>";
			return false;
		}

		// cek jika ukurannya terlalu besar
		if( $ukuranFile > 1000000 ) {
			echo "<script>
					alert('ukuran gambar terlalu besar!');
				  </script>";
			return false;
		}

		// lolos pengecekan, gambar siap diupload
		// generate nama gambar baru
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;

		move_uploaded_file($tmpName, 'asset/img/' . $namaFileBaru);

		return $namaFileBaru;
	}
	public function tambahPetugas($data)
	{
		$nama_petugas=$data['nama_petugas'];
		$username=$data['username'];
		$password=$data['password'];
		$password2=$data['password2'];
		$level=$data['level'];
		if (($password==$password2)==false) {
			Flasher::setFlash('password tidak sama','alert-gagal');
			header('Location:'.BASEURL.'admin/tambahPetugas');
			exit();
		}
		$query="INSERT INTO tb_petugas VALUES('','$nama_petugas','$username','$password','$level')";
		$this->db->query($query);
		$this->db->execute();
		return $this->db->rowCount();
	}
	public function hpsPetugas($id)
		{
			$query="DELETE FROM tb_petugas WHERE id_petugas=$id";
			$this->db->query($query);
			$this->db->execute();
			return $this->db->rowCount();
		}
	public function getDataLelang()
	{
		$query="SELECT * FROM tb_barang,tb_lelang,tb_petugas WHERE tb_barang.id_barang = tb_lelang.id_barang AND tb_lelang.id_petugas =tb_petugas.id_petugas";
		$this->db->query($query);
		return $this->db->resultSet();

	}
	

	public function getLelangId($data)
	{
		$id=$data['id_barang'];
		$query="SELECT * FROM tb_lelang WHERE id_barang=$id";
		$this->db->query($query);
		return $this->db->single();

	}
	public function tutupLelang($id)
	{
		$query="UPDATE tb_lelang SET status='tutup' WHERE id_lelang=$id";
		$this->db->query($query);
		$this->db->execute();
		return $this->db->rowCount();
	}
	public function tambahlelang($data)
	{
		$id_barang=$data['id_barang'];
		$harga_awal=$data['harga_awal'];
		$id_petugas=$_SESSION['id_petugas'];
		$tanggal= date("y-m-d");
		$query="INSERT INTO tb_lelang VALUES('','$id_barang','$tanggal',$harga_awal,'buka',$id_petugas)";
		$this->db->query($query);
		$this->db->execute();
		return $this->db->rowCount();

	}

	public function getLaporanPemenang()
	{
		// $tawarabMax=$this->tawaranMax();
		$query="SELECT email,nama_barang,merk,nama,tbhl1.* FROM tb_histori_lelang AS tbhl1 ,tb_lelang,tb_barang,tb_masyarakat,
			(SELECT id_lelang,max(penawaran_harga) as max_tawar FROM tb_histori_lelang GROUP BY id_lelang) AS tbhl2 WHERE tbhl2.id_lelang=tbhl1.id_lelang AND tbhl2.id_lelang=tb_lelang.id_lelang AND status='tutup' AND tb_lelang.id_barang=tb_barang.id_barang AND tbhl1.id_user=tb_masyarakat.id_user AND tbhl1.penawaran_harga=max_tawar ORDER BY tbhl1.id_lelang DESC;
		";
		$this->db->query($query);
		return $this->db->resultSet();
	}
	public function getHistori()
	{
		$query="SELECT * FROM tb_histori_lelang AS tbhl,tb_masyarakat AS tbm,tb_lelang,tb_barang WHERE tbhl.id_user=tbm.id_user AND tb_lelang.id_lelang=tbhl.id_lelang AND tb_barang.id_barang=tb_lelang.id_barang";
		$this->db->query($query);
		return $this->db->resultSet();
	}
	public function konfirmPemenang($id)
	{
		$query="UPDATE tb_histori_lelang SET ket='menang' WHERE id_histori=$id";
		$this->db->query($query);
		$this->db->execute();
		return $this->db->rowCount();
	}
	public function konfirmgagal($id)
	{
		$query="UPDATE tb_histori_lelang SET ket='kalah' WHERE id_lelang=$id";
		$this->db->query($query);
		$this->db->execute();
		return $this->db->rowCount();
	}
	function hpslelang($id)
	{
		$query="DELETE FROM tb_lelang WHERE id_lelang=$id";
		$this->db->query($query);
		$this->db->execute();
		return $this->db->rowCount();	
	}
}
