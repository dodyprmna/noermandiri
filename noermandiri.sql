-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2020 at 02:49 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noermandiri`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_ulang`
--

CREATE TABLE `daftar_ulang` (
  `ID_DAFTAR_ULANG` varchar(12) NOT NULL,
  `ID_JENJANG` varchar(6) NOT NULL,
  `NO_INDUK` varchar(13) NOT NULL,
  `TGL_DAFTAR_ULANG` date NOT NULL,
  `TOTAL_BIAYA_DAFTAR_ULANG` int(11) NOT NULL,
  `STATUS` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_ulang`
--

INSERT INTO `daftar_ulang` (`ID_DAFTAR_ULANG`, `ID_JENJANG`, `NO_INDUK`, `TGL_DAFTAR_ULANG`, `TOTAL_BIAYA_DAFTAR_ULANG`, `STATUS`) VALUES
('DU060420001', '03', '0002', '2020-04-06', 1000000, 0),
('DU070420002', '02', '0001', '2020-04-06', 1000000, 1),
('DU070420003', '03', '0001', '2020-04-06', 1000000, 1);

--
-- Triggers `daftar_ulang`
--
DELIMITER $$
CREATE TRIGGER `id_Daftar_Ulang_Auto` BEFORE INSERT ON `daftar_ulang` FOR EACH ROW BEGIN
DECLARE nr integer 	DEFAULT 0;
	SELECT COUNT(*)INTO @id FROM daftar_ulang;
    set NEW.ID_DAFTAR_ULANG  = CONCAT("DU",DATE_FORMAT(CURRENT_DATE,'%d%m%y'),LPAD(@id+1,3,'0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_les`
--

CREATE TABLE `jadwal_les` (
  `ID_JADWAL` varchar(12) NOT NULL,
  `ID_TENTOR` varchar(12) NOT NULL,
  `ID_MAPEL` varchar(6) NOT NULL,
  `ID_KELAS` varchar(6) NOT NULL,
  `ID_RUANGAN` varchar(6) NOT NULL,
  `ID_SESI` varchar(4) NOT NULL,
  `TANGGAL` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenjang_kelas`
--

CREATE TABLE `jenjang_kelas` (
  `ID_JENJANG` varchar(6) NOT NULL,
  `NAMA_JENJANG` varchar(5) NOT NULL,
  `BIAYA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenjang_kelas`
--

INSERT INTO `jenjang_kelas` (`ID_JENJANG`, `NAMA_JENJANG`, `BIAYA`) VALUES
('01', '1 SMP', 1000000),
('02', '2 SMP', 1000000),
('03', '3 SMP', 1000000);

--
-- Triggers `jenjang_kelas`
--
DELIMITER $$
CREATE TRIGGER `id_jenjang_Auto` BEFORE INSERT ON `jenjang_kelas` FOR EACH ROW BEGIN
DECLARE nr integer 	DEFAULT 0;
	SELECT COUNT(*)INTO @id FROM jenjang_kelas;
    set NEW.ID_JENJANG  = CONCAT(LPAD(@id+1,2,'0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `ID_KELAS` varchar(6) NOT NULL,
  `ID_JENJANG` varchar(6) NOT NULL,
  `NAMA_KELAS` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`ID_KELAS`, `ID_JENJANG`, `NAMA_KELAS`) VALUES
('1SMPA', '01', '1 SMP A'),
('2SMPA', '02', '2 SMP A'),
('3SMPA', '03', '3 SMP A');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `ID_MAPEL` varchar(6) NOT NULL,
  `NAMA_MAPEL` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`ID_MAPEL`, `NAMA_MAPEL`) VALUES
('BING', 'Bahasa Inggris'),
('BIO', 'Biologi'),
('EKO', 'Ekonomi'),
('FIS', 'Fisika'),
('KIM', 'Kimia'),
('MTK', 'Matematika');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `ID_PEGAWAI` varchar(12) NOT NULL,
  `NAMA_PEGAWAI` varchar(30) NOT NULL,
  `JK_PEGAWAI` char(1) NOT NULL,
  `ALAMAT_PEGAWAI` varchar(50) NOT NULL,
  `TGL_LAHIR_PEG` date NOT NULL,
  `NOTELP_PEGAWAI` varchar(13) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `LEVEL` char(1) NOT NULL,
  `PASSWORD_PEGAWAI` varchar(255) NOT NULL,
  `STATUS_PEGAWAI` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`ID_PEGAWAI`, `NAMA_PEGAWAI`, `JK_PEGAWAI`, `ALAMAT_PEGAWAI`, `TGL_LAHIR_PEG`, `NOTELP_PEGAWAI`, `EMAIL`, `LEVEL`, `PASSWORD_PEGAWAI`, `STATUS_PEGAWAI`) VALUES
('PEG001', 'Maulana', 'L', 'Komplek Sidotopo Dipo', '1988-03-04', '0855555', 'maulan@gmail.com', '1', '21232f297a57a5a743894a0e4a801fc3', '1'),
('PEG002', 'Tengker', '', 'Surabaya', '1991-01-01', '0822', 'tengker@gmail.com', '1', 'b6be14bceb32e2083e4162e4ccce2cd5', '1'),
('PEG003', 'Boboboy', '', 'Surabaya', '1990-02-20', '0811', 'boboy@gmail.com', '1', '26ffcef53c44522efbfe7fef964a4058', '1'),
('PEG004', 'Roy', 'L', 'Surabaya', '1988-04-10', '0822', 'roy@gmail.com', '1', 'b6be14bceb32e2083e4162e4ccce2cd5', '1'),
('PEG005', 'Rio', 'L', 'Surabaya', '1996-12-12', '0811', 'rio@gmail.com', '1', '26ffcef53c44522efbfe7fef964a4058', '1'),
('PEG006', 'Reta', 'L', 'Surabaya', '1995-12-15', '0899', 'reta@gmail.com', '1', '47c8c701a4cd6e769579376af52560cc', '1');

--
-- Triggers `pegawai`
--
DELIMITER $$
CREATE TRIGGER `Id_Pegawai_Auto` BEFORE INSERT ON `pegawai` FOR EACH ROW BEGIN
DECLARE nr integer 	DEFAULT 0;
	SELECT COUNT(*)INTO @id FROM pegawai;
    set NEW.ID_PEGAWAI  = CONCAT("PEG",LPAD(@id+1,3,'0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `ID_PEMBAYARAN` varchar(12) NOT NULL,
  `ID_PEGAWAI` varchar(12) NOT NULL,
  `NO_PENDAFTARAN` varchar(12) NOT NULL,
  `TANGGAL_PEMBAYARAN` date NOT NULL,
  `TOTAL_PEMBAYARAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`ID_PEMBAYARAN`, `ID_PEGAWAI`, `NO_PENDAFTARAN`, `TANGGAL_PEMBAYARAN`, `TOTAL_PEMBAYARAN`) VALUES
('PAY060420001', 'PEG001', 'REG060420001', '2020-04-06', 1050000),
('PAY060420002', 'PEG001', 'REG060420002', '2020-04-06', 1050000);

--
-- Triggers `pembayaran`
--
DELIMITER $$
CREATE TRIGGER `Id_Pembayaran_Auto` BEFORE INSERT ON `pembayaran` FOR EACH ROW BEGIN
DECLARE nr integer 	DEFAULT 0;
	SELECT COUNT(*)INTO @id FROM pembayaran;
    set NEW.ID_PEMBAYARAN  = CONCAT("PAY",DATE_FORMAT(CURRENT_DATE,'%d%m%y'),LPAD(@id+1,3,'0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_daftar_ulang`
--

CREATE TABLE `pembayaran_daftar_ulang` (
  `ID_PEMBAYARAN_DAFTAR_ULANG` varchar(12) NOT NULL,
  `ID_DAFTAR_ULANG` varchar(12) NOT NULL,
  `ID_PEGAWAI` varchar(12) NOT NULL,
  `TGL_PEMBAYARAN_DAFTAR_ULANG` date NOT NULL,
  `TOTAL_PEMBAYARAN_DAFTAR_ULANG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran_daftar_ulang`
--

INSERT INTO `pembayaran_daftar_ulang` (`ID_PEMBAYARAN_DAFTAR_ULANG`, `ID_DAFTAR_ULANG`, `ID_PEGAWAI`, `TGL_PEMBAYARAN_DAFTAR_ULANG`, `TOTAL_PEMBAYARAN_DAFTAR_ULANG`) VALUES
('', 'DU060420001', 'PEG001', '2020-04-06', 1000000),
('PYU070420002', 'DU070420002', 'PEG001', '2020-04-06', 1000000),
('PYU070420003', 'DU070420003', 'PEG001', '2020-04-06', 1000000);

--
-- Triggers `pembayaran_daftar_ulang`
--
DELIMITER $$
CREATE TRIGGER `Id_Pembayaran_Daftar_Ulang_Auto` BEFORE INSERT ON `pembayaran_daftar_ulang` FOR EACH ROW BEGIN
DECLARE nr integer 	DEFAULT 0;
	SELECT COUNT(*)INTO @id FROM pembayaran_daftar_ulang;
    set NEW.ID_PEMBAYARAN_DAFTAR_ULANG  = CONCAT("PYU",DATE_FORMAT(CURRENT_DATE,'%d%m%y'),LPAD(@id+1,3,'0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_siswa_baru`
--

CREATE TABLE `pendaftaran_siswa_baru` (
  `NO_PENDAFTARAN` varchar(12) NOT NULL,
  `ID_JENJANG` varchar(6) NOT NULL,
  `TANGGAL_PENDAFTARAN` date NOT NULL,
  `NAMA_PENDAFTAR` varchar(30) NOT NULL,
  `JENIS_KELAMIN` char(1) NOT NULL,
  `ALAMAT_PENDAFTAR` varchar(50) NOT NULL,
  `TGL_LAHIR_PENDAFTAR` date NOT NULL,
  `NOTELP_PENDAFTAR` varchar(13) NOT NULL,
  `NOTELP_ORTU` varchar(13) NOT NULL,
  `EMAIL_PENDAFTAR` varchar(50) NOT NULL,
  `TOTAL_TAGIHAN` int(11) NOT NULL,
  `BIAYA_REGISTRASI` int(11) NOT NULL,
  `BIAYA_LES` int(11) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `ASAL_SEKOLAH` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran_siswa_baru`
--

INSERT INTO `pendaftaran_siswa_baru` (`NO_PENDAFTARAN`, `ID_JENJANG`, `TANGGAL_PENDAFTARAN`, `NAMA_PENDAFTAR`, `JENIS_KELAMIN`, `ALAMAT_PENDAFTAR`, `TGL_LAHIR_PENDAFTAR`, `NOTELP_PENDAFTAR`, `NOTELP_ORTU`, `EMAIL_PENDAFTAR`, `TOTAL_TAGIHAN`, `BIAYA_REGISTRASI`, `BIAYA_LES`, `STATUS`, `ASAL_SEKOLAH`) VALUES
('REG060420001', '02', '2020-04-06', 'M Rizal Ramadhani', 'L', 'Simokerto', '2020-04-01', '0855', '0855', 'rizal@gmail.com', 1050000, 50000, 1000000, 1, 'SMPN 9 Surabaya'),
('REG060420002', '03', '2020-04-06', 'Taufik', 'L', 'Simokerto', '2020-04-01', '0877', '0877', 'taufik@gmail.com', 1050000, 50000, 1000000, 1, 'SMPN5 Surabaya');

--
-- Triggers `pendaftaran_siswa_baru`
--
DELIMITER $$
CREATE TRIGGER `Id_Pendaftaran_Auto` BEFORE INSERT ON `pendaftaran_siswa_baru` FOR EACH ROW BEGIN
DECLARE nr integer 	DEFAULT 0;
	SELECT COUNT(*)INTO @id FROM pendaftaran_siswa_baru;
    set NEW.NO_PENDAFTARAN  = CONCAT("REG",DATE_FORMAT(CURRENT_DATE,'%d%m%y'),LPAD(@id+1,3,'0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `ID_RUANGAN` varchar(6) NOT NULL,
  `NAMA_RUANGAN` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`ID_RUANGAN`, `NAMA_RUANGAN`) VALUES
('R001', 'Ruangan 1');

--
-- Triggers `ruangan`
--
DELIMITER $$
CREATE TRIGGER `Id_Ruangan_Auto` BEFORE INSERT ON `ruangan` FOR EACH ROW BEGIN
DECLARE nr integer 	DEFAULT 0;
	SELECT COUNT(*)INTO @id FROM ruangan;
    set NEW.ID_RUANGAN  = CONCAT("R",LPAD(@id+1,3,'0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sesi`
--

CREATE TABLE `sesi` (
  `ID_SESI` varchar(4) NOT NULL,
  `NAMA_SESI` varchar(7) NOT NULL,
  `JAM_MULAI` time NOT NULL,
  `JAM_SELESAI` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sesi`
--

INSERT INTO `sesi` (`ID_SESI`, `NAMA_SESI`, `JAM_MULAI`, `JAM_SELESAI`) VALUES
('SES1', '', '12:00:00', '14:00:00');

--
-- Triggers `sesi`
--
DELIMITER $$
CREATE TRIGGER `Id_Sesi_Auto` BEFORE INSERT ON `sesi` FOR EACH ROW BEGIN
DECLARE nr integer 	DEFAULT 0;
	SELECT COUNT(*)INTO @id FROM sesi;
    set NEW.ID_SESI  = CONCAT("SES",LPAD(@id+1,1,'0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `NO_INDUK` varchar(13) NOT NULL,
  `ID_KELAS` varchar(6) DEFAULT NULL,
  `NAMA_SISWA` varchar(30) NOT NULL,
  `ALAMAT_SISWA` varchar(50) NOT NULL,
  `TGL_LAHIR_SISWA` date NOT NULL,
  `JK_SISWA` char(1) NOT NULL,
  `EMAIL_SISWA` varchar(50) NOT NULL,
  `NOTELP_ORTU_SISWA` varchar(13) NOT NULL,
  `NOTELP_SISWA` varchar(13) NOT NULL,
  `ASAL_SEKOLAH` varchar(20) NOT NULL,
  `STATUS_SISWA` tinyint(1) NOT NULL,
  `PASSWORD_SISWA` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`NO_INDUK`, `ID_KELAS`, `NAMA_SISWA`, `ALAMAT_SISWA`, `TGL_LAHIR_SISWA`, `JK_SISWA`, `EMAIL_SISWA`, `NOTELP_ORTU_SISWA`, `NOTELP_SISWA`, `ASAL_SEKOLAH`, `STATUS_SISWA`, `PASSWORD_SISWA`) VALUES
('0001', '2SMPA', 'M Rizal Ramadhanii', 'Simokertoo', '2020-04-02', 'L', 'rizal@gmail.com', '0855', '08555', 'SMPN 9 Surabaya', 1, 'd68be6cebcd6d1653ae74776709324d1'),
('0002', '3SMPA', 'Taufik', 'Simokerto', '2020-04-01', 'L', 'taufik@gmail.com', '', '0877', 'SMPN5 Surabaya', 1, 'e707124b7acf5a2856b17899afa99bb6'),
('0003', '2SMPA', 'Teteh', 'Surabaya', '2020-03-04', 'P', 'teteh@gmail.com', '0877', '0877', 'SMPN 9', 1, 'e707124b7acf5a2856b17899afa99bb6');

--
-- Triggers `siswa`
--
DELIMITER $$
CREATE TRIGGER `Id_Siswa_Auto` BEFORE INSERT ON `siswa` FOR EACH ROW BEGIN
DECLARE nr integer 	DEFAULT 0;
	SELECT COUNT(*)INTO @id FROM siswa;
    set NEW.NO_INDUK  = CONCAT(LPAD(@id+1,4,'0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tentor`
--

CREATE TABLE `tentor` (
  `ID_TENTOR` varchar(12) NOT NULL,
  `ID_MAPEL` varchar(6) NOT NULL,
  `NAMA_TENTOR` varchar(30) NOT NULL,
  `JK_TENTOR` char(1) NOT NULL,
  `ALAMAT_TENTOR` varchar(50) NOT NULL,
  `TGL_LAHIR_TENTOR` date NOT NULL,
  `NOTELP_TENTOR` varchar(13) NOT NULL,
  `EMAIL_TENTOR` varchar(50) NOT NULL,
  `PASSWORD_TENTOR` varchar(255) NOT NULL,
  `STATUS_TENTOR` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tentor`
--

INSERT INTO `tentor` (`ID_TENTOR`, `ID_MAPEL`, `NAMA_TENTOR`, `JK_TENTOR`, `ALAMAT_TENTOR`, `TGL_LAHIR_TENTOR`, `NOTELP_TENTOR`, `EMAIL_TENTOR`, `PASSWORD_TENTOR`, `STATUS_TENTOR`) VALUES
('TTR001', 'KIM', 'Taufik', 'L', 'Surabaya', '1990-04-02', '085555', 'taufik@gmail.com', 'c26d9b72e08e5ede480b4c5ba2ed35b4', '0'),
('TTR002', 'MTK', 'Derry', 'L', 'Surabaya', '1989-04-14', '08777', 'derry@gmail.com', 'ebf537abf128ff0cdc191e8b283f43eb', '1'),
('TTR003', 'BING', 'Bachri', 'L', 'Surabaya', '1989-04-22', '0123', 'bachri@gmail.com', 'eb62f6b9306db575c2d596b1279627a4', '1'),
('TTR004', 'BIO', 'Boy', 'L', 'Surabaya', '1995-01-01', '0877', 'boy@gmail.com', 'e707124b7acf5a2856b17899afa99bb6', '1'),
('TTR005', 'FIS', 'Teteh', 'L', 'Surabaya', '1992-02-02', '0899', 'teteh@gmail.com', '47c8c701a4cd6e769579376af52560cc', '1'),
('TTR006', 'EKO', 'Rani', 'L', 'Surabaya', '1989-04-08', '0866', 'rani@gmail.com', '656626d3691e02c2c2e83276a94add4f', '1'),
('TTR007', 'BIO', 'Iqbal', 'L', 'Surabaya', '1989-12-12', '0844', 'iqbal@gmail.com', 'd6c3e4cbc8c56ce6db139744dc6b81c1', '1');

--
-- Triggers `tentor`
--
DELIMITER $$
CREATE TRIGGER `Id_Tentor_Auto` BEFORE INSERT ON `tentor` FOR EACH ROW BEGIN
DECLARE nr integer 	DEFAULT 0;
	SELECT COUNT(*)INTO @id FROM tentor;
    set NEW.ID_TENTOR  = CONCAT("TTR",LPAD(@id+1,3,'0'));
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_ulang`
--
ALTER TABLE `daftar_ulang`
  ADD PRIMARY KEY (`ID_DAFTAR_ULANG`),
  ADD KEY `FK_MELAKUKAN1` (`NO_INDUK`),
  ADD KEY `FK_MENGAMBIL` (`ID_JENJANG`);

--
-- Indexes for table `jadwal_les`
--
ALTER TABLE `jadwal_les`
  ADD PRIMARY KEY (`ID_JADWAL`),
  ADD KEY `FK_BERISII` (`ID_MAPEL`),
  ADD KEY `FK_BERTEMPAT` (`ID_RUANGAN`),
  ADD KEY `FK_DILAKUKAN_PADA` (`ID_SESI`),
  ADD KEY `FK_MEMILIKIII` (`ID_KELAS`),
  ADD KEY `FK_MENGAJAR` (`ID_TENTOR`);

--
-- Indexes for table `jenjang_kelas`
--
ALTER TABLE `jenjang_kelas`
  ADD PRIMARY KEY (`ID_JENJANG`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`ID_KELAS`),
  ADD KEY `FK_BERDASARKAN` (`ID_JENJANG`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`ID_MAPEL`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`ID_PEGAWAI`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`ID_PEMBAYARAN`),
  ADD KEY `FK_DILAKUKAN` (`NO_PENDAFTARAN`),
  ADD KEY `FK_MELAKUKAN` (`ID_PEGAWAI`);

--
-- Indexes for table `pembayaran_daftar_ulang`
--
ALTER TABLE `pembayaran_daftar_ulang`
  ADD PRIMARY KEY (`ID_PEMBAYARAN_DAFTAR_ULANG`),
  ADD KEY `FK_DILAKUKAN1` (`ID_DAFTAR_ULANG`),
  ADD KEY `FK_MELAYANI` (`ID_PEGAWAI`);

--
-- Indexes for table `pendaftaran_siswa_baru`
--
ALTER TABLE `pendaftaran_siswa_baru`
  ADD PRIMARY KEY (`NO_PENDAFTARAN`),
  ADD KEY `FK_MENDAFTAR2` (`ID_JENJANG`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`ID_RUANGAN`);

--
-- Indexes for table `sesi`
--
ALTER TABLE `sesi`
  ADD PRIMARY KEY (`ID_SESI`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NO_INDUK`),
  ADD KEY `FK_BERANGGOTAKAN` (`ID_KELAS`);

--
-- Indexes for table `tentor`
--
ALTER TABLE `tentor`
  ADD PRIMARY KEY (`ID_TENTOR`),
  ADD KEY `FK_MENGAJAR2` (`ID_MAPEL`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_ulang`
--
ALTER TABLE `daftar_ulang`
  ADD CONSTRAINT `FK_MELAKUKAN1` FOREIGN KEY (`NO_INDUK`) REFERENCES `siswa` (`NO_INDUK`),
  ADD CONSTRAINT `FK_MENGAMBIL` FOREIGN KEY (`ID_JENJANG`) REFERENCES `jenjang_kelas` (`ID_JENJANG`);

--
-- Constraints for table `jadwal_les`
--
ALTER TABLE `jadwal_les`
  ADD CONSTRAINT `FK_BERISII` FOREIGN KEY (`ID_MAPEL`) REFERENCES `mata_pelajaran` (`ID_MAPEL`),
  ADD CONSTRAINT `FK_BERTEMPAT` FOREIGN KEY (`ID_RUANGAN`) REFERENCES `ruangan` (`ID_RUANGAN`),
  ADD CONSTRAINT `FK_DILAKUKAN_PADA` FOREIGN KEY (`ID_SESI`) REFERENCES `sesi` (`ID_SESI`),
  ADD CONSTRAINT `FK_MEMILIKIII` FOREIGN KEY (`ID_KELAS`) REFERENCES `kelas` (`ID_KELAS`),
  ADD CONSTRAINT `FK_MENGAJAR` FOREIGN KEY (`ID_TENTOR`) REFERENCES `tentor` (`ID_TENTOR`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `FK_BERDASARKAN` FOREIGN KEY (`ID_JENJANG`) REFERENCES `jenjang_kelas` (`ID_JENJANG`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `FK_DILAKUKAN` FOREIGN KEY (`NO_PENDAFTARAN`) REFERENCES `pendaftaran_siswa_baru` (`NO_PENDAFTARAN`),
  ADD CONSTRAINT `FK_MELAKUKAN` FOREIGN KEY (`ID_PEGAWAI`) REFERENCES `pegawai` (`ID_PEGAWAI`);

--
-- Constraints for table `pembayaran_daftar_ulang`
--
ALTER TABLE `pembayaran_daftar_ulang`
  ADD CONSTRAINT `FK_DILAKUKAN1` FOREIGN KEY (`ID_DAFTAR_ULANG`) REFERENCES `daftar_ulang` (`ID_DAFTAR_ULANG`),
  ADD CONSTRAINT `FK_MELAYANI` FOREIGN KEY (`ID_PEGAWAI`) REFERENCES `pegawai` (`ID_PEGAWAI`);

--
-- Constraints for table `pendaftaran_siswa_baru`
--
ALTER TABLE `pendaftaran_siswa_baru`
  ADD CONSTRAINT `FK_MENDAFTAR2` FOREIGN KEY (`ID_JENJANG`) REFERENCES `jenjang_kelas` (`ID_JENJANG`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `FK_BERANGGOTAKAN` FOREIGN KEY (`ID_KELAS`) REFERENCES `kelas` (`ID_KELAS`);

--
-- Constraints for table `tentor`
--
ALTER TABLE `tentor`
  ADD CONSTRAINT `FK_MENGAJAR2` FOREIGN KEY (`ID_MAPEL`) REFERENCES `mata_pelajaran` (`ID_MAPEL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
