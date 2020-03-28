<?php  
Class Auth_model{
	private $db;
	private $table='tb_masyarakat';
		public function __construct()
		{
			$this->db=new Database;
		}
		public function getAllMasyarakat($user)
		{
			$this->db->query("SELECT * FROM tb_masyarakat WHERE username='$user'");
			 return $this->db->single();
		}

		public function tambahCustomer($data)
		{
			$nama=htmlspecialchars($data['nama']);
			$username=htmlspecialchars($data['username']);
			$password=htmlspecialchars($data['password']);
			$password2=htmlspecialchars($data['password2']);
			$tlpn=htmlspecialchars($data['tlpn']);
			$email=htmlspecialchars($data['email']);
			if (($password2==$password)==false) {
				Flasher::setFlash('password tidak sama','alert-gagal');
				header('Location:'.BASEURL.'Auth/registrasi');
				exit();
			}
			
			if ($this->getAllMasyarakat($username)==true) {
				Flasher::setFlash('username sudah digunakan','alert-gagal');
				header('Location:'.BASEURL.'Auth/registrasi');
				exit();
			}
		
			$query="INSERT INTO  tb_masyarakat VALUES(:id,:nama,:username,:password,:telp,:email)";
			$this->db->query($query);

			$this->db->bind('id','');
			$this->db->bind('nama',$nama);
			$this->db->bind('username',$username);
			$this->db->bind('password',md5($password));
			$this->db->bind('telp',$tlpn);
			$this->db->bind('email',$email);
			$this->db->execute();
			return $this->db->rowCount();

		}
}