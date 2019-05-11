-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2019 at 09:30 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi peg pdam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_absensi`
--

CREATE TABLE `tabel_absensi` (
  `kd_absensi` int(10) NOT NULL,
  `NIP` varchar(10) NOT NULL,
  `tanggal_absensi` date NOT NULL,
  `jam_masuk` varchar(10) NOT NULL,
  `jam_keluar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_jabatan`
--

CREATE TABLE `tabel_jabatan` (
  `kd_jabatan` varchar(10) NOT NULL,
  `nama_jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_jabatan`
--

INSERT INTO `tabel_jabatan` (`kd_jabatan`, `nama_jabatan`) VALUES
('KD011', 'Manager'),
('KD012', 'Wakil Manager'),
('KD013', 'Sekretaris'),
('KD014', 'Sekretaris I'),
('KD015', 'Direktur Utama'),
('KD016', 'Direktur Teknik'),
('KD017', 'Direktur Umum'),
('KD018', 'Bidang Pelayanan'),
('KD019', 'Bidang Keuangan'),
('KD020', 'Bagian Umum');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pangkat`
--

CREATE TABLE `tabel_pangkat` (
  `kd_pangkat` varchar(10) NOT NULL,
  `Nama_pangkat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pangkat`
--

INSERT INTO `tabel_pangkat` (`kd_pangkat`, `Nama_pangkat`) VALUES
('KD001', 'Staf '),
('KD002', 'Staf Tingkat I'),
('KD003', 'Staf Madya '),
('KD004', 'Staf Madya I'),
('KD005', 'Staf Utama'),
('KD006', 'Pegawai Dasar'),
('KD007', 'Pegawai Dasar Tingkat'),
('KD008', 'Pegawai Dasar Tingkat I'),
('KD009', 'Staf Muda'),
('KD010', 'Staf Muda Tingkat I');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pegawai`
--

CREATE TABLE `tabel_pegawai` (
  `NIP` varchar(9) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `jk_pegawai` varchar(15) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `Tmpt_lhr` varchar(70) NOT NULL,
  `gol_darah` varchar(10) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `kd_pangkat` varchar(10) NOT NULL,
  `kd_jabatan` varchar(10) NOT NULL,
  `kd_pendidikan` varchar(10) NOT NULL,
  `Rt_Rw` varchar(10) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kec` varchar(50) NOT NULL,
  `kab` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pegawai`
--

INSERT INTO `tabel_pegawai` (`NIP`, `nama_pegawai`, `jk_pegawai`, `tgl_lhr`, `Tmpt_lhr`, `gol_darah`, `agama`, `kd_pangkat`, `kd_jabatan`, `kd_pendidikan`, `Rt_Rw`, `no_tlp`, `desa`, `kec`, `kab`) VALUES
('123008', 'Ivan Sanusi', 'Laki-Laki', '1970-01-01', 'Majalengka', 'O', 'Islam', 'KD008', 'KD018', 'KD028', '001/005', '082248999770', 'Karanagsem', 'Leuwimunding', 'Majalengka'),
('123009', 'guinnevere', 'Perempuan', '1970-01-01', 'Majalengka', 'O', 'Islam', 'KD007', 'KD017', 'KD027', '001/002', '082234098777', 'Karanagsem', 'Leuwimunding', 'Majalengka'),
('123098', 'Kagura', 'Perempuan', '1970-01-01', 'Majalengka', 'B', 'Islam', 'KD004', 'KD015', 'KD025', '002/004', '087654987345', 'Ranji', 'Kadipaten', 'Majalengka'),
('123392', 'Amanda', 'Perempuan', '1970-01-01', 'Majalengka', 'O', 'Islam', 'KD006', 'KD016', 'KD026', '001/005', '082345098009', 'Karanagsem', 'Leuwimunding', 'Majalengka'),
('123456', 'Dadan', 'Laki-Laki', '1970-01-01', 'Majalengka', 'O', 'Islam', 'KD001', 'KD011', 'KD021', '002/002', '089765432456', 'Bongas', 'Sumberjaya', 'Majalengka'),
('123656', 'Didin', 'Laki-Laki', '1970-01-01', 'Majalengka', 'A', 'Islam', 'KD002', 'KD012', 'KD022', '002/002', '089765432987', 'Ranji', 'Kadipaten', 'Majalengka'),
('123765', 'Zilong', 'Laki-Laki', '1970-01-01', 'Majalengka', 'O', 'Islam', 'KD003', 'KD014', 'KD024', '004/004', '082345987654', 'Karanagsem', 'Leuwimunding', 'Majalengka'),
('123887', 'Ananda', 'Perempuan', '1970-01-01', 'Majalengka', 'AB', 'Islam', 'KD010', 'KD020', 'KD030', '002/003', '087654222444', 'Palasah', 'Palasah', 'Majalengka'),
('123987', 'Deden', 'Laki-Laki', '1970-01-01', 'Majalengka', 'A', 'Islam', 'KD003', 'KD013', 'KD023', '002/004', '0876543452654', 'Bongas', 'Sumberjaya', 'Majalengka'),
('123998', 'Tarzan', 'Laki-Laki', '1970-01-01', 'Majalengka', 'B', 'Islam', 'KD009', 'KD019', 'KD029', '001/004', '087654445', 'Leuwimunding', 'Leuwimunding', 'Majalengka');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendidikan`
--

CREATE TABLE `tabel_pendidikan` (
  `kd_pendidikan` varchar(10) NOT NULL,
  `nama_pendidikan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pendidikan`
--

INSERT INTO `tabel_pendidikan` (`kd_pendidikan`, `nama_pendidikan`) VALUES
('KD021', 'S1'),
('KD022', 'S1'),
('KD023', 'S2'),
('KD024', 'S3'),
('KD025', 'S2'),
('KD026', 'S1'),
('KD027', 'S2'),
('KD028', 'S3'),
('KD029', 'S2'),
('KD030', 'S1');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `username`, `password`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_absensi`
--
ALTER TABLE `tabel_absensi`
  ADD PRIMARY KEY (`kd_absensi`),
  ADD KEY `NIP` (`NIP`);

--
-- Indexes for table `tabel_jabatan`
--
ALTER TABLE `tabel_jabatan`
  ADD PRIMARY KEY (`kd_jabatan`);

--
-- Indexes for table `tabel_pangkat`
--
ALTER TABLE `tabel_pangkat`
  ADD PRIMARY KEY (`kd_pangkat`);

--
-- Indexes for table `tabel_pegawai`
--
ALTER TABLE `tabel_pegawai`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `kd_pangkat` (`kd_pangkat`),
  ADD KEY `kd_jabatan` (`kd_jabatan`),
  ADD KEY `kd_pendidikan` (`kd_pendidikan`);

--
-- Indexes for table `tabel_pendidikan`
--
ALTER TABLE `tabel_pendidikan`
  ADD PRIMARY KEY (`kd_pendidikan`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_absensi`
--
ALTER TABLE `tabel_absensi`
  ADD CONSTRAINT `tabel_absensi_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `tabel_pegawai` (`NIP`);

--
-- Constraints for table `tabel_pegawai`
--
ALTER TABLE `tabel_pegawai`
  ADD CONSTRAINT `tabel_pegawai_ibfk_1` FOREIGN KEY (`kd_pangkat`) REFERENCES `tabel_pangkat` (`kd_pangkat`),
  ADD CONSTRAINT `tabel_pegawai_ibfk_2` FOREIGN KEY (`kd_jabatan`) REFERENCES `tabel_jabatan` (`kd_jabatan`),
  ADD CONSTRAINT `tabel_pegawai_ibfk_3` FOREIGN KEY (`kd_pendidikan`) REFERENCES `tabel_pendidikan` (`kd_pendidikan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
