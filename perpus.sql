-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2020 at 04:35 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `nis` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`nis`, `nama`, `kelas`, `jenis_kelamin`) VALUES
('A111', 'Dudunk', '9A', 'Laki - Laki'),
('A112', 'Tatank', '7F', 'Laki - Laki'),
('A113', 'Rina Surinem', '8D', 'Perempuan'),
('A114', 'Laravelia Amalia', '7D', 'Perempuan'),
('A115', 'Java Yondra Adi', '9G', 'Laki - Laki'),
('A116', 'Ci Meilin Yuan Yuan', '7A', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `kode_buku` varchar(11) NOT NULL,
  `judul` varchar(111) NOT NULL,
  `pengarang` varchar(111) NOT NULL,
  `deskripsi` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul`, `pengarang`, `deskripsi`) VALUES
('A001', 'Terungkapnya Misteri Gajah DIbalik Batu', 'Jajank Sutijank, M.Pd', 'Buku ini merupakan buku yang membahas serta mengupas tuntas tentang misteri Gajah DIbalik Batu'),
('A002', 'Kumpulan Kisah Anak Durhaka Nusantara', 'Radika Ditya', 'Berisi kumpulan dongeng dan kisah tentang anak yang berubah atau dikutuk oleh ibunya karna durhaka'),
('A003', 'Urban Legend Gang Senggol', 'Suherman', 'Mengangkat sebuah urband legend yang sering diperbincangkan warga Gang Senggol'),
('A004', 'Rumahku Nyatanya Bukan Istanaku', 'Anjay Asmara ', 'Menceritakan kisah seorang remaja yang ingin melengkapi apa yang menurut dia sudah lama hilang'),
('A005', 'Resep Sehat Masakan Kita', 'Rudi KitchenZone', 'Berisi Kumpulan resep modifikasi dari Chef Rudi KitchenZone ');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_transaksi` varchar(12) NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `denda` varchar(2) NOT NULL,
  `nominal` int(111) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `email`, `password`) VALUES
(1, 'Ujank', 'ujankkasep@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'androina', 'androina10@gmail.com', '5efe7c25ca5f063794ecbbf20d702849');

-- --------------------------------------------------------

--
-- Table structure for table `tmp`
--

CREATE TABLE `tmp` (
  `kode_buku` int(11) NOT NULL,
  `judul` varchar(111) NOT NULL,
  `pengarang` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` varchar(111) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `judul` varchar(111) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `denda` int(112) DEFAULT '0',
  `status` varchar(11) NOT NULL,
  `nama_petugas` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no_transaksi`, `nama`, `judul`, `tgl_pinjam`, `tgl_kembali`, `tgl_pengembalian`, `denda`, `status`, `nama_petugas`) VALUES
('20200904002', 'Laravelia Amalia', 'Urban Legend Gang Senggol', '2020-09-04', '2020-09-11', '2020-09-11', 0, '2', 'admin'),
('20200904003', 'Java Yondra Adi', 'Terungkapnya Misteri Gajah DIbalik Batu', '2020-09-04', '2020-09-13', NULL, 0, '1', 'admin'),
('20200904004', 'Rina Surinem', 'Kumpulan Kisah Anak Durhaka Nusantara', '2020-09-04', '2020-09-11', '2020-09-23', 24000, '2', 'admin'),
('20200904005', 'Ci Meilin Yuan Yuan', 'Kumpulan Kisah Anak Durhaka Nusantara', '2020-09-04', '2020-09-11', NULL, 0, '1', 'admin'),
('20200905006', 'Rina Surinem', 'Resep Sehat Masakan Kita', '2020-09-05', '2020-09-12', '2020-09-14', 4000, '2', 'admin'),
('20200905007', 'Laravelia Amalia', 'Rumahku Nyatanya Bukan Istanaku', '2020-09-05', '2020-09-12', NULL, 0, '1', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
