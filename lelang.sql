-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28 Mar 2020 pada 06.24
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lelang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(15) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `spesifikasi` varchar(100) NOT NULL,
  `kondisi` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `gambar`, `nama_barang`, `merk`, `spesifikasi`, `kondisi`) VALUES
(2, 'supra.jpg  ', 'motor  ', 'supra x 150 cc  ', 'Tipe Mesin 4-Langkah, DOHC, 4 KatupKapasitas Mesin	149,16 cc Sistem Suplai   ', 'bagus  '),
(3, 'samsung.jpg ', 'smartphone ', 'samsung fold ', 'Chipset: Qualcomm SDM855 Snapdragon 855 (7 nm)RAM &amp; Memori: 12 GB &amp; 512 GB ', ' lecet lcd saja '),
(4, '5e47cabfc7206.jpeg', 'laptop ', 'acer aspire E5-476G ', 'Aspire seri E hadir layar 14 inci dengan beautiful form, CPU Core i5/i7 ', 'bagus '),
(14, '5e4bc1fadf413.jpg', 'flashdisk', 'Toshiba 16 Gb', 'storage : 16 Gb', 'Bagus'),
(16, '5e4c894a07422.jpg', 'motor  ', 'Supra x 125 R  ', 'Chipset: Snapdragon 665 RAM &amp; Memori: 3/32, 4/64 GB Kamera: Triple 13 MP + 8 MP + 2 MP Baterai: ', 'bagus  '),
(19, '5e5529b923908.jpg ', 'vivo  ', 'vivo u10  ', 'Chipset: Snapdragon 665 RAM &amp; Memori: 3/32, 4/64 GB Kamera: Triple 13 MP + 8 MP + 2 MP Baterai: ', 'bagus '),
(20, '5e70c2f77ce36.jpg', 'lenovo  ', 'lenovo  a6000  ', 'Chipset: Snapdragon 665 RAM &amp; Memori: 3/32, 4/64 GB Kamera: Triple 13 MP + 8 MP + 2 MP Baterai: ', 'bagus  '),
(21, '5e73002f0f738.jpg ', 'asdsadsasd ', 'asdsasdasd ', 'sadasd', 'assdasdadasd '),
(22, '5e77d61089f4c.png', 'naruto', 'asdsadsa', 'assdsads', 'asdasd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_histori_lelang`
--

CREATE TABLE `tb_histori_lelang` (
  `id_histori` int(11) NOT NULL,
  `id_lelang` int(11) NOT NULL,
  `id_user` int(10) NOT NULL,
  `penawaran_harga` int(20) NOT NULL,
  `ket` enum('menunggu','kalah','menang','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_histori_lelang`
--

INSERT INTO `tb_histori_lelang` (`id_histori`, `id_lelang`, `id_user`, `penawaran_harga`, `ket`) VALUES
(49, 45, 1, 34000000, 'kalah'),
(50, 45, 5, 35000000, 'menang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lelang`
--

CREATE TABLE `tb_lelang` (
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(15) NOT NULL,
  `tgl_lelang` date NOT NULL,
  `harga_awal` int(10) NOT NULL,
  `status` enum('buka','tutup','') NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_lelang`
--

INSERT INTO `tb_lelang` (`id_lelang`, `id_barang`, `tgl_lelang`, `harga_awal`, `status`, `id_petugas`) VALUES
(44, 2, '2020-03-19', 1200000, 'buka', 2),
(45, 3, '2020-03-19', 34000000, 'tutup', 2),
(46, 4, '2020-03-19', 7000000, 'buka', 2),
(47, 14, '2020-03-19', 90000, 'buka', 2),
(48, 16, '2020-03-19', 14000000, 'buka', 2),
(49, 19, '2020-03-19', 1500000, 'buka', 2),
(50, 20, '2020-03-19', 1600000, 'buka', 2),
(53, 22, '2020-03-22', 120000, 'buka', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_masyarakat`
--

CREATE TABLE `tb_masyarakat` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_masyarakat`
--

INSERT INTO `tb_masyarakat` (`id_user`, `nama`, `username`, `password`, `telp`, `email`) VALUES
(1, 'izza wildan ridhoni', 'wildan', 'af6b3aa8c3fcd651674359f500814679', '085643301453', 'izzawildan88@gmail.com'),
(2, 'maswil', 'maswil', '2e497ff78dc4dc966212b096c0f2e77d', '21333333333333', 'maswil@gmail.com'),
(3, 'budi budeng', 'budi', '00dfc53ee86af02e742515cdcf075ed3', '085643301453', 'budi@gmail.com'),
(4, 'Yuanda Hanif Hisyam', 'yuanda', 'c8417b8ced64c9d3dee0d5d5a5fa4c90', '085654308211', 'yuanda@gmail.com'),
(5, 'arindul', 'arin', '92b622722a993c1df446461cc3fe0ad7', '21333222222222', 'arin@gail.cim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL,
  `level` enum('administrator','petugas','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `level`) VALUES
(1, 'izza wildan', 'wildan', 'wildan', 'administrator'),
(2, 'gunawan', 'gunawan', 'gunawan', 'petugas'),
(5, 'risah', 'risah', 'risah', 'petugas'),
(6, 'yuanda', 'yuanda', 'yuanda', 'petugas'),
(8, 'Budeng', 'budi', 'budi', 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_histori_lelang`
--
ALTER TABLE `tb_histori_lelang`
  ADD PRIMARY KEY (`id_histori`),
  ADD KEY `id_lelang` (`id_lelang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_lelang`
--
ALTER TABLE `tb_lelang`
  ADD PRIMARY KEY (`id_lelang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_histori_lelang`
--
ALTER TABLE `tb_histori_lelang`
  MODIFY `id_histori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tb_lelang`
--
ALTER TABLE `tb_lelang`
  MODIFY `id_lelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_histori_lelang`
--
ALTER TABLE `tb_histori_lelang`
  ADD CONSTRAINT `tb_histori_lelang_ibfk_1` FOREIGN KEY (`id_lelang`) REFERENCES `tb_lelang` (`id_lelang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_histori_lelang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_masyarakat` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_lelang`
--
ALTER TABLE `tb_lelang`
  ADD CONSTRAINT `tb_lelang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_lelang_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
