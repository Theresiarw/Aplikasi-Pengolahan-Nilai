-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2018 at 05:01 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smk`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `kode_guru` char(5) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `status_aktif` enum('Aktif','Tidak Aktif') NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`kode_guru`, `nip`, `nama_guru`, `kelamin`, `alamat`, `no_telepon`, `status_aktif`, `username`, `password`, `gambar`) VALUES
('G-003', '198602102011011009', 'Pajar Fauzi', 'Laki-Laki', 'Jl. Arsajaya', '085250783872', 'Aktif', 'Pajar Fauzi', 'guru', 'gambar_guru/gambar.jpg'),
('G-004', '198312142014032001', 'Rohana', 'Perempuan', 'Intu Lingau', '082158115927', 'Aktif', 'Rohana', 'guru', 'gambar_guru/avatar3.png'),
('G-001', '198012312015052001', 'Adriana', 'Perempuan', 'Engkuni Pasek Rt.01\r\n', '085250650171', 'Aktif', 'adriana', 'k', 'gambar_guru/guru.png'),
('G-002', '6407200303780001', 'Misraim', 'Laki-Laki', 'Sekolaq Darat\r\n', '085246826380', 'Aktif', 'Misraim', 'guru', 'gambar_guru/gambar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` char(5) NOT NULL,
  `tahun_ajar` varchar(12) NOT NULL,
  `kelas` enum('VII','VIII','IX') NOT NULL,
  `nama_kelas` varchar(20) NOT NULL,
  `kode_guru` char(5) NOT NULL,
  `status_aktif` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `tahun_ajar`, `kelas`, `nama_kelas`, `kode_guru`, `status_aktif`) VALUES
('K-001', '2018/2019', 'VII', 'Kelas A', 'G-001', 'Aktif'),
('K-002', '2018/2019', 'VII', 'Kelas B', 'G-002', 'Aktif'),
('K-003', '2018/2019', 'VIII', 'Kelas A', 'G-003', 'Aktif'),
('K-004', '2018/2019', 'VIII', 'Kelas B', 'G-004', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id` int(5) NOT NULL,
  `kode_kelas` char(5) NOT NULL,
  `kode_siswa` char(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id`, `kode_kelas`, `kode_siswa`) VALUES
(48, 'K-001', 'S-003'),
(46, 'K-001', 'S-001'),
(47, 'K-001', 'S-004');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(5) NOT NULL,
  `semester` int(2) NOT NULL,
  `kode_pelajaran` char(5) NOT NULL,
  `kode_guru` char(5) NOT NULL,
  `kode_kelas` char(5) NOT NULL,
  `kode_siswa` char(5) NOT NULL,
  `nilai_tugas1` int(4) NOT NULL,
  `nilai_tugas2` int(4) NOT NULL,
  `nilai_tugas3` int(4) NOT NULL,
  `nilai_tugas4` int(4) NOT NULL,
  `nilai_tugas5` int(4) NOT NULL,
  `nilai_tugas6` int(4) NOT NULL,
  `nilai_uts` int(4) NOT NULL,
  `nilai_uas` int(4) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `rata_rata` char(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `semester`, `kode_pelajaran`, `kode_guru`, `kode_kelas`, `kode_siswa`, `nilai_tugas1`, `nilai_tugas2`, `nilai_tugas3`, `nilai_tugas4`, `nilai_tugas5`, `nilai_tugas6`, `nilai_uts`, `nilai_uas`, `keterangan`, `rata_rata`) VALUES
(108, 2, 'P-002', 'G-002', 'K-001', 'S-001', 78, 75, 82, 85, 90, 95, 80, 80, 'TUNTAS', ''),
(109, 2, 'P-003', 'G-003', 'K-001', 'S-001', 76, 90, 82, 85, 75, 80, 90, 82, 'TUNTAS', ''),
(112, 1, 'P-001', 'G-002', 'K-001', 'S-004', 90, 80, 70, 76, 80, 98, 75, 80, 'Tujuh puluh delapan', ''),
(137, 1, 'P-001', 'G-001', 'K-001', 'S-001', 78, 89, 100, 78, 89, 89, 89, 89, 'TUNTAS', '87.63'),
(107, 2, 'P-001', 'G-001', 'K-001', 'S-001', 100, 80, 90, 80, 80, 95, 80, 88, 'TUNTAS', ''),
(138, 1, 'P-002', 'G-002', 'K-001', 'S-001', 89, 80, 90, 88, 90, 90, 89, 89, 'TUNTAS', '88.13'),
(139, 1, 'P-003', 'G-003', 'K-001', 'S-001', 100, 78, 67, 89, 89, 89, 89, 89, 'TUNTAS', '86.25'),
(113, 1, 'P-002', 'G-001', 'K-002', 'S-004', 80, 78, 89, 90, 77, 78, 70, 80, 'TUNTAS', ''),
(140, 1, 'P-003', 'G-004', 'K-001', 'S-001', 67, 89, 79, 90, 78, 100, 89, 90, 'TUNTAS', '85.25'),
(122, 2, 'P-006', 'G-001', 'K-001', 'S-004', 89, 60, 80, 40, 78, 90, 60, 60, 'TIDAK LULUS', ''),
(130, 2, 'P-004', 'G-002', 'K-001', 'S-001', 67, 45, 56, 56, 56, 56, 56, 56, 'TIDAK TUNTAS', '');

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `kode_pelajaran` char(5) NOT NULL,
  `nama_pelajaran` varchar(100) NOT NULL,
  `kkm` varchar(2) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`kode_pelajaran`, `nama_pelajaran`, `kkm`, `keterangan`) VALUES
('P-006', 'Pendidikan Agama', '75', 'Wajib'),
('P-004', 'Ilmu Pengetahuan Sosial', '75', 'Wajib'),
('P-003', 'Ilmu Pengetahuan Alam', '75', 'Wajib'),
('P-001', 'Bahasa Indonesia', '70', 'Wajib'),
('P-002', 'Bahasa Inggris', '70', 'Wajib'),
('P-005', 'Matematika', '70', 'Wajib'),
('P-007', 'Pendidikan Kewarganegaraan', '70', 'Wajib');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `kode_siswa` char(5) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `kelamin` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `tahun_angkatan` char(4) NOT NULL,
  `status` enum('Aktif','Lulus','Keluar') NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`kode_siswa`, `nis`, `nama_siswa`, `kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telepon`, `tahun_angkatan`, `status`, `username`, `password`, `gambar`) VALUES
('S-004', '0047599274', 'Adrianus Sugiharto', 'Laki-Laki', 'Protestan', 'Eheng', '23-05-2004', 'Jln. Poros', '082353516690', '2018', 'Aktif', 'adrianus ', '12345', 'gambar_siswa/siswa2.png'),
('S-001', '465/0054294190', 'Aldinus', 'Laki-Laki', 'Kristen', 'Sendawar', '14-12-2003', 'Awai', '082251516680', '2018', 'Aktif', 'Aldinus', '12345', 'gambar_siswa/siswa2.png'),
('S-003', '0022823017', 'Adi Sansius', 'Laki-Laki', 'Protestan', 'Eheng', '02-10-2002', 'Pepas Eheng', '082158115927', '2018', 'Lulus', 'adi Sansius', '12345', 'gambar_siswa/siswa2.png'),
('S-002', '0053393218', 'Adella Olla', 'Perempuan', 'Protestan', 'Pasek', '26-12-2005', 'Egkuni Pasek', '085751089771', '2018', 'Aktif', 'adella Olla', '12345', 'gambar_siswa/siswa.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fullname`, `gambar`) VALUES
(2, 'admin', 'admin', 'Administrator', 'gambar_admin/there.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`kode_guru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`kode_pelajaran`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`kode_siswa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
