-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2020 at 02:43 PM
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
-- Table structure for table `bukti_pembayaran`
--

CREATE TABLE `bukti_pembayaran` (
  `ID_BUKTI_PEMBAYARAN` varchar(25) NOT NULL,
  `NO_PENDAFTARAN` varchar(12) NOT NULL,
  `NAMA_PEMILIK_REKENING` varchar(50) NOT NULL,
  `NAMA_BANK` varchar(50) NOT NULL,
  `FOTO_BUKTI` varchar(25) NOT NULL,
  `TANGGAL_UPLOAD_BUKTI` datetime NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukti_pembayaran`
--

INSERT INTO `bukti_pembayaran` (`ID_BUKTI_PEMBAYARAN`, `NO_PENDAFTARAN`, `NAMA_PEMILIK_REKENING`, `NAMA_BANK`, `FOTO_BUKTI`, `TANGGAL_UPLOAD_BUKTI`, `STATUS`) VALUES
('BUKTIREG090520001', 'REG090520001', 'Ronny', 'BRI', 'BUKTI-REG0905200011.png', '2020-05-09 11:30:22', 1),
('BUKTIREG130520003', 'REG130520003', 'lola', 'BNI', 'BUKTI-REG130520003.png', '2020-05-13 00:46:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bukti_pembayaran_daftar_ulang`
--

CREATE TABLE `bukti_pembayaran_daftar_ulang` (
  `ID_BUKTI_PEMBAYARAN_DAFTAR_ULANG` varchar(14) NOT NULL,
  `ID_DAFTAR_ULANG` varchar(12) NOT NULL,
  `NAMA_PEMILIK_REKENING` varchar(50) NOT NULL,
  `NAMA_BANK` varchar(50) NOT NULL,
  `FOTO_BUKTI_PEMBAYARAN_DAFTAR_ULANG` varchar(25) NOT NULL,
  `TANGGAL_UPLOAD_BUKTI_PEMBAYARAN_DAFTAR_ULANG` datetime NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukti_pembayaran_daftar_ulang`
--

INSERT INTO `bukti_pembayaran_daftar_ulang` (`ID_BUKTI_PEMBAYARAN_DAFTAR_ULANG`, `ID_DAFTAR_ULANG`, `NAMA_PEMILIK_REKENING`, `NAMA_BANK`, `FOTO_BUKTI_PEMBAYARAN_DAFTAR_ULANG`, `TANGGAL_UPLOAD_BUKTI_PEMBAYARAN_DAFTAR_ULANG`, `STATUS`) VALUES
('BDUDU120520001', 'DU120520001', 'Rizal', 'BRI', 'BDU-DU120520001.png', '2020-05-13 00:30:26', 0);

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
  `STATUS_DAFTAR_ULANG` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_ulang`
--

INSERT INTO `daftar_ulang` (`ID_DAFTAR_ULANG`, `ID_JENJANG`, `NO_INDUK`, `TGL_DAFTAR_ULANG`, `TOTAL_BIAYA_DAFTAR_ULANG`, `STATUS_DAFTAR_ULANG`) VALUES
('DU120520001', '02', '0001', '2020-05-12', 1000000, 0),
('DU120520002', '03', '0002', '2020-05-12', 1000000, 1);

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

--
-- Dumping data for table `jadwal_les`
--

INSERT INTO `jadwal_les` (`ID_JADWAL`, `ID_TENTOR`, `ID_MAPEL`, `ID_KELAS`, `ID_RUANGAN`, `ID_SESI`, `TANGGAL`) VALUES
('J0001040520', 'TNTR002', 'BING', '0001', 'R001', 'SES2', '2020-05-04'),
('J0001060520', 'TNTR001', 'MTK', '0001', 'R001', 'SES2', '2020-05-06'),
('J0001090520', 'TNTR002', 'BINDO', '0001', 'R001', 'SES1', '2020-05-09'),
('J0001110520', 'TNTR001', 'IPA', '0001', 'R001', 'SES2', '2020-05-11'),
('J0001130520', 'TNTR001', 'MTK', '0001', 'R001', 'SES2', '2020-05-13'),
('J0001160520', 'TNTR002', 'BING', '0001', 'R001', 'SES1', '2020-05-16');

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
('01', '3 SMP', 1000000),
('02', '1 SMA', 1000000),
('03', '2 SMA', 1000000),
('04', '3 SMA', 1200000);

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
('0001', '01', '3 SMP A'),
('0002', '01', '3 SMP B'),
('0003', '02', '1 SMA A'),
('0004', '02', '1 SMA B'),
('0005', '03', '2 SMA A'),
('0006', '03', '2 SMA B'),
('0007', '04', '3 SMA A'),
('0008', '04', '3 SMA B');

--
-- Triggers `kelas`
--
DELIMITER $$
CREATE TRIGGER `ID_Kelas_Auto` BEFORE INSERT ON `kelas` FOR EACH ROW BEGIN
DECLARE nr integer 	DEFAULT 0;
	SELECT COUNT(*)INTO @id FROM kelas;
    set NEW.ID_KELAS  = CONCAT(LPAD(@id+1,4,'0'));
END
$$
DELIMITER ;

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
('BINDO', 'Bahasa Indonesia'),
('BING', 'Bahasa Inggris'),
('FIS', 'Fisika'),
('IPA', 'IPA'),
('KIM', 'Kimia'),
('MTK', 'Matematika');

-- --------------------------------------------------------

--
-- Table structure for table `materi_pembelajaran`
--

CREATE TABLE `materi_pembelajaran` (
  `ID_MODUL` varchar(26) NOT NULL,
  `ID_JENJANG` varchar(6) NOT NULL,
  `ID_MAPEL` varchar(6) NOT NULL,
  `JUDUL` varchar(30) NOT NULL,
  `TANGGAL_UPLOAD_MODUL` datetime NOT NULL,
  `FILE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `STATUS_PEGAWAI` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`ID_PEGAWAI`, `NAMA_PEGAWAI`, `JK_PEGAWAI`, `ALAMAT_PEGAWAI`, `TGL_LAHIR_PEG`, `NOTELP_PEGAWAI`, `EMAIL`, `LEVEL`, `PASSWORD_PEGAWAI`, `STATUS_PEGAWAI`) VALUES
('PEG001', 'Maulana', 'L', 'Komplek Sidotopo Dipo', '1988-04-01', '0811', 'maulana@gmail.com', '1', '26ffcef53c44522efbfe7fef964a4058', 1),
('PEG002', 'Iyus Maulana Ishak', 'L', 'Surabaya', '1988-05-01', '0855', 'iyus@gmail.com', '2', 'd68be6cebcd6d1653ae74776709324d1', 1);

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
  `TANGGAL_PEMBAYARAN` datetime NOT NULL,
  `TOTAL_PEMBAYARAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`ID_PEMBAYARAN`, `ID_PEGAWAI`, `NO_PENDAFTARAN`, `TANGGAL_PEMBAYARAN`, `TOTAL_PEMBAYARAN`) VALUES
('PAY090520001', 'PEG001', 'REG090520001', '2020-05-09 00:00:00', 1050000);

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
  `TGL_PEMBAYARAN_DAFTAR_ULANG` datetime NOT NULL,
  `TOTAL_PEMBAYARAN_DAFTAR_ULANG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran_daftar_ulang`
--

INSERT INTO `pembayaran_daftar_ulang` (`ID_PEMBAYARAN_DAFTAR_ULANG`, `ID_DAFTAR_ULANG`, `ID_PEGAWAI`, `TGL_PEMBAYARAN_DAFTAR_ULANG`, `TOTAL_PEMBAYARAN_DAFTAR_ULANG`) VALUES
('PYU130520001', 'DU120520002', 'PEG001', '2020-05-12 00:00:00', 1000000);

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
  `TOTAL_TAGIHAN` int(11) NOT NULL,
  `BIAYA_REGISTRASI` int(11) NOT NULL,
  `BIAYA_LES` int(11) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `ASAL_SEKOLAH` varchar(20) NOT NULL,
  `EMAIL_PENDAFTAR` varchar(50) NOT NULL,
  `PASSWORD_PENDAFTAR` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran_siswa_baru`
--

INSERT INTO `pendaftaran_siswa_baru` (`NO_PENDAFTARAN`, `ID_JENJANG`, `TANGGAL_PENDAFTARAN`, `NAMA_PENDAFTAR`, `JENIS_KELAMIN`, `ALAMAT_PENDAFTAR`, `TGL_LAHIR_PENDAFTAR`, `NOTELP_PENDAFTAR`, `NOTELP_ORTU`, `TOTAL_TAGIHAN`, `BIAYA_REGISTRASI`, `BIAYA_LES`, `STATUS`, `ASAL_SEKOLAH`, `EMAIL_PENDAFTAR`, `PASSWORD_PENDAFTAR`) VALUES
('REG090520001', '01', '2020-05-09', 'M Rizal Ramadhani', 'L', 'Simokerto', '2004-05-01', '0855', '0855', 1050000, 50000, 1000000, 1, 'SMPN 9 Surabaya', 'rizal@gmail.com', 'd68be6cebcd6d1653ae74776709324d1'),
('REG110520002', '02', '2020-05-11', 'Rara', 'L', 'Surabaya', '2003-05-25', '0855', '0855', 1050000, 50000, 1000000, 0, 'SMAN 5 Surabaya', 'rara@gmail.com', 'd68be6cebcd6d1653ae74776709324d1'),
('REG130520003', '01', '2020-05-12', 'Lola', 'P', 'Surabaya', '2004-02-22', '0855', '0855', 1050000, 50000, 1000000, 0, 'SMPN 30', 'lola@gmail.com', 'd68be6cebcd6d1653ae74776709324d1');

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
('R001', 'Ruangan 1'),
('R002', 'Ruangan 2');

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
  `JAM_MULAI` time NOT NULL,
  `JAM_SELESAI` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sesi`
--

INSERT INTO `sesi` (`ID_SESI`, `JAM_MULAI`, `JAM_SELESAI`) VALUES
('SES1', '12:00:00', '14:00:00'),
('SES2', '16:00:00', '19:00:00'),
('SES3', '17:00:00', '21:00:00'),
('SES4', '19:00:00', '22:00:00');

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
('0001', '0001', 'M Rizal Ramadhani', 'Simokerto', '2004-05-01', 'L', 'rizal@gmail.com', '0855', '0855', 'SMPN 9 Surabaya', 1, 'd68be6cebcd6d1653ae74776709324d1'),
('0002', '0002', 'Rere', 'Surabaya', '2005-08-19', 'P', 'rere@gmail.com', '0855', '0855', 'SMPN 5', 1, 'd68be6cebcd6d1653ae74776709324d1');

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
  `STATUS_TENTOR` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tentor`
--

INSERT INTO `tentor` (`ID_TENTOR`, `ID_MAPEL`, `NAMA_TENTOR`, `JK_TENTOR`, `ALAMAT_TENTOR`, `TGL_LAHIR_TENTOR`, `NOTELP_TENTOR`, `EMAIL_TENTOR`, `PASSWORD_TENTOR`, `STATUS_TENTOR`) VALUES
('TNTR001', 'MTK', 'Taufik', 'L', 'Surabaya', '1990-04-22', '0855', 'taufik@gmail.com', 'd68be6cebcd6d1653ae74776709324d1', 1),
('TNTR002', 'BING', 'Sholeh', 'L', 'Surabaya', '1990-11-11', '0855', 'sholeh@gmail.com', 'd68be6cebcd6d1653ae74776709324d1', 1);

--
-- Triggers `tentor`
--
DELIMITER $$
CREATE TRIGGER `Id_Tentor_Auto` BEFORE INSERT ON `tentor` FOR EACH ROW BEGIN
DECLARE nr integer 	DEFAULT 0;
	SELECT COUNT(*)INTO @id FROM tentor;
    set NEW.ID_TENTOR  = CONCAT("TNTR",LPAD(@id+1,3,'0'));
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  ADD PRIMARY KEY (`ID_BUKTI_PEMBAYARAN`),
  ADD KEY `FK_RELATIONSHIP_18` (`NO_PENDAFTARAN`);

--
-- Indexes for table `bukti_pembayaran_daftar_ulang`
--
ALTER TABLE `bukti_pembayaran_daftar_ulang`
  ADD PRIMARY KEY (`ID_BUKTI_PEMBAYARAN_DAFTAR_ULANG`),
  ADD KEY `FK_RELATIONSHIP_19` (`ID_DAFTAR_ULANG`);

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
-- Indexes for table `materi_pembelajaran`
--
ALTER TABLE `materi_pembelajaran`
  ADD PRIMARY KEY (`ID_MODUL`),
  ADD KEY `FK_DIPERUNTUKKAN` (`ID_JENJANG`),
  ADD KEY `FK_MEMILIKI` (`ID_MAPEL`);

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
-- Constraints for table `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  ADD CONSTRAINT `FK_RELATIONSHIP_18` FOREIGN KEY (`NO_PENDAFTARAN`) REFERENCES `pendaftaran_siswa_baru` (`NO_PENDAFTARAN`);

--
-- Constraints for table `bukti_pembayaran_daftar_ulang`
--
ALTER TABLE `bukti_pembayaran_daftar_ulang`
  ADD CONSTRAINT `FK_RELATIONSHIP_19` FOREIGN KEY (`ID_DAFTAR_ULANG`) REFERENCES `daftar_ulang` (`ID_DAFTAR_ULANG`);

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
-- Constraints for table `materi_pembelajaran`
--
ALTER TABLE `materi_pembelajaran`
  ADD CONSTRAINT `FK_DIPERUNTUKKAN` FOREIGN KEY (`ID_JENJANG`) REFERENCES `jenjang_kelas` (`ID_JENJANG`),
  ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`ID_MAPEL`) REFERENCES `mata_pelajaran` (`ID_MAPEL`);

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
