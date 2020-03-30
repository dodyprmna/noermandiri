-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2019 at 01:50 PM
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
  `NOINDUK` varchar(13) NOT NULL,
  `TGTL_DAFTAR_ULANG` date NOT NULL,
  `TOTAL_BIAYA_DAFUL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `ID_JABATAN` varchar(6) NOT NULL,
  `JABATAN` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`ID_JABATAN`, `JABATAN`) VALUES
('ADM', 'Admin'),
('OWNR', 'Pemilik'),
('TNTR', 'Tentor');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_les`
--

CREATE TABLE `jadwal_les` (
  `ID_JADWAL` varchar(12) NOT NULL,
  `ID_PEGAWAI` varchar(12) NOT NULL,
  `ID_MAPEL` varchar(6) NOT NULL,
  `ID_KELAS` varchar(6) NOT NULL,
  `ID_RUANGAN` varchar(6) NOT NULL,
  `ID_WAKTU` varchar(4) NOT NULL,
  `TANGGAL` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_les`
--

INSERT INTO `jadwal_les` (`ID_JADWAL`, `ID_PEGAWAI`, `ID_MAPEL`, `ID_KELAS`, `ID_RUANGAN`, `ID_WAKTU`, `TANGGAL`) VALUES
('J1SMAA141219', 'PEG001', 'BINDO', '1SMAA', 'R001', 'SES1', '2019-12-14'),
('J1SMAA151219', 'PEG002', 'BING', '1SMAA', 'R003', 'SES1', '2019-12-15'),
('J2SMAA281219', 'PEG002', 'MTK', '2SMAA', 'R001', 'SES1', '2019-12-28'),
('J3SMAA201219', 'PEG001', 'BINDO', '3SMAA', 'R001', 'SES2', '2019-12-20'),
('J3SMAB181219', 'PEG001', 'BINDO', '3SMAB', 'R001', 'SES2', '2019-12-18');

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
('1SMA', '1 SMA', 1000000),
('1SMP', '1 SMP', 1000000),
('2SMA', '2 SMA', 1000000),
('3SMA', '3 SMA', 1200000),
('3SMP', '3 SMP', 1000000);

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
('1SMAA', '1SMA', '1 SMA A'),
('2SMAA', '2SMA', '2 SMA A'),
('3SMAA', '3SMA', '3 SMA A'),
('3SMAB', '3SMA', '3 SMA B'),
('3SMPA', '3SMP', '3 SMP A'),
('3SMPB', '3SMP', '3 SMP B'),
('3SMPC', '3SMP', '3 SMP C');

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
('BIO', 'Biologi'),
('EMP', 'Kosong'),
('FIS', 'Fisika'),
('KIM', 'Kimia'),
('MTK', 'Matematika');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `ID_PEGAWAI` varchar(12) NOT NULL,
  `ID_MAPEL` varchar(6) NOT NULL,
  `ID_JABATAN` varchar(6) NOT NULL,
  `NAMA_PEGAWAI` varchar(30) NOT NULL,
  `ALAMAT_PEGAWAI` varchar(50) NOT NULL,
  `TGL_LAHIR_PEG` date NOT NULL,
  `NOTELP_PEGAWAI` varchar(13) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `LEVEL` varchar(6) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `PASSWORD_PEGAWAI` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`ID_PEGAWAI`, `ID_MAPEL`, `ID_JABATAN`, `NAMA_PEGAWAI`, `ALAMAT_PEGAWAI`, `TGL_LAHIR_PEG`, `NOTELP_PEGAWAI`, `EMAIL`, `LEVEL`, `STATUS`, `PASSWORD_PEGAWAI`) VALUES
('OWNER', 'EMP', 'OWNR', 'Iyus Maulana I', 'kjhksad', '1980-12-02', '54554', 'jhhskjaidhkl', '2', 1, '7d0ea7482f842d31aadd256539493ab0'),
('PEG001', 'BINDO', 'TNTR', 'Ilham Surya', 'Gembong', '1990-11-11', '0858554564', 'ilhamsurya', '3', 1, 'b63d204bf086017e34d8bd27ab969f28'),
('PEG002', 'MTK', 'TNTR', 'Aminatuzz', 'Mulyorejo', '1990-12-02', '08585747', 'aminatuz', '3', 0, '0342b83178553a9796be83e08dd409f0'),
('PEG003', 'BING', 'TNTR', 'boboboy', 'kjdhsfk', '1980-12-01', '08454512', 'aminatuzz@gmail.com', '3', 1, '3f408268a0f34c88eabd36dc2ac9e594'),
('PEG004', 'BIO', 'TNTR', 'AKANG', 'KJHSDKJE', '1990-12-01', '0858554564', 'ilhamsurya', '3', 1, 'fa58d511af20b791cb7d856fcb70c201'),
('PEG005', 'FIS', 'TNTR', 'KJHASD', 'HJSAD', '1990-02-02', '0251', 'KJHSAKDAS', '3', 1, 'd707792f5a98cdcd41a4d16e4a4f5f10'),
('PEG006', 'MTK', 'TNTR', 'KJNDSKJF', 'KJHSDFKLJAS', '2019-12-01', '2566232', 'HNJASKJD', '3', 1, 'd707792f5a98cdcd41a4d16e4a4f5f10'),
('PEG007', 'BING', 'TNTR', 'ASDAS', 'SDFASDF', '2019-12-02', '32542354', 'SDSFD', '3', 1, 'd707792f5a98cdcd41a4d16e4a4f5f10'),
('PEG008', 'BINDO', 'TNTR', 'DGFDSFG', 'DGFDG', '2019-12-01', 'DFDFDG', 'FDGFDG', '1', 1, 'f9156398d52d9061ce52b2b2728d504f'),
('PEG009', 'BING', 'TNTR', 'DFDSF', 'DFDGDF', '2019-12-09', '345435', 'FDGDFG', '3', 1, '515a056b88cbd2bce4fcd6e2f760ba7b'),
('PEGADMIN', 'EMP', 'ADM', 'Dody Pramana', 'Jl. Simokerto 3 No.29', '1998-02-21', '085855761091', 'dodyprmna6@gmail.com', '1', 1, '6613c97ad4ade214711f08961d33373e');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `ID_PEMBAYARAN` varchar(12) NOT NULL,
  `ID_PEGAWAI` varchar(12) NOT NULL,
  `NO_PENDAFTARAN` varchar(12) NOT NULL,
  `TANGGAL_PEMBAYARAN` date NOT NULL,
  `TOTAL_PEMBAYARAN_DAFUL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_daful`
--

CREATE TABLE `pembayaran_daful` (
  `ID_PEMBAYARAN_DAFUL` varchar(12) NOT NULL,
  `ID_DAFTAR_ULANG` varchar(12) NOT NULL,
  `TGL_PEMBAYARAN_DAFUL` date NOT NULL,
  `TOTAL_PEMBAYARAN_DAFUL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_siswa_baru`
--

CREATE TABLE `pendaftaran_siswa_baru` (
  `NO_PENDAFTARAN` varchar(12) NOT NULL,
  `ID_JENJANG` varchar(6) NOT NULL,
  `TANGGAL_PENDAFTARAN` date NOT NULL,
  `NAMA_PENDAFTAR` varchar(30) NOT NULL,
  `ALAMAT_PENDAFTAR` varchar(50) NOT NULL,
  `TGL_LAHIR_PENDAFTAR` date NOT NULL,
  `NOTELP_PENDAFTAR` varchar(13) NOT NULL,
  `NOTELP_ORTU` varchar(13) NOT NULL,
  `BIAYA_REGISTRASI` int(11) NOT NULL,
  `BIAYA_LES` int(11) NOT NULL,
  `TOTAL_TAGIHAN` int(11) NOT NULL,
  `STATUS` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran_siswa_baru`
--

INSERT INTO `pendaftaran_siswa_baru` (`NO_PENDAFTARAN`, `ID_JENJANG`, `TANGGAL_PENDAFTARAN`, `NAMA_PENDAFTAR`, `ALAMAT_PENDAFTAR`, `TGL_LAHIR_PENDAFTAR`, `NOTELP_PENDAFTAR`, `NOTELP_ORTU`, `BIAYA_REGISTRASI`, `BIAYA_LES`, `TOTAL_TAGIHAN`, `STATUS`) VALUES
('REG061219001', '1SMA', '2019-12-05', 'M Rizal Ramadhani', 'Simokerto', '2019-12-05', '3625454', '0784544554', 50000, 1000000, 1050000, 0),
('REG061219002', '1SMA', '2019-12-05', 'M Rizal Ramadhani', 'Simokerto', '2019-12-05', '3625454', '0784544554', 50000, 1000000, 1050000, 0),
('REG061219003', '1SMP', '2019-12-05', 'M Rizal Ramadhani', 'Simokerto', '2019-12-05', '3625454', '0784544554', 50000, 1000000, 1050000, 0),
('REG061219004', '1SMP', '2019-12-05', 'M Rizal Ramadhani', 'Simokerto', '2019-12-05', '3625454', '0784544554', 50000, 1000000, 1050000, 0),
('REG061219005', '1SMP', '2019-12-05', 'M Rizal Ramadhani', 'Simokerto', '2019-12-05', '3625454', '0784544554', 50000, 1000000, 1050000, 0),
('REG111219006', '3SMA', '2019-12-11', 'sghgfh', 'Simokerto', '0000-00-00', '0585454', '054885', 50000, 1200000, 1250000, 0),
('REG111219007', '1SMA', '2019-12-11', 'sghgfh', 'dsfdsf', '0000-00-00', '08545454', '2543254354', 50000, 1000000, 1050000, 0);

--
-- Triggers `pendaftaran_siswa_baru`
--
DELIMITER $$
CREATE TRIGGER `idpendaftaranAuto` BEFORE INSERT ON `pendaftaran_siswa_baru` FOR EACH ROW BEGIN
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
('R002', 'Ruangan 2'),
('R003', 'Ruangan 3');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `NOINDUK` varchar(13) NOT NULL,
  `ID_KELAS` varchar(6) DEFAULT NULL,
  `NAMA_SISWA` varchar(30) NOT NULL,
  `ALAMAT_SISWA` varchar(50) NOT NULL,
  `TGL_LAHIR_SISWA` date NOT NULL,
  `NOTELP_ORTU_SISWA` varchar(13) NOT NULL,
  `NOTELP_SISWA` varchar(13) NOT NULL,
  `ASAL_SEKOLAH` varchar(10) NOT NULL,
  `STATUS_SISWA` tinyint(1) NOT NULL,
  `PASSWORD_SISWA` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`NOINDUK`, `ID_KELAS`, `NAMA_SISWA`, `ALAMAT_SISWA`, `TGL_LAHIR_SISWA`, `NOTELP_ORTU_SISWA`, `NOTELP_SISWA`, `ASAL_SEKOLAH`, `STATUS_SISWA`, `PASSWORD_SISWA`) VALUES
('001', '2SMAA', 'Rizal', 'Gembong 3', '2005-10-19', '08455', '0874525', 'SMAN 5', 1, '150fb021c56c33f82eef99253eb36ee1');

-- --------------------------------------------------------

--
-- Table structure for table `waktu`
--

CREATE TABLE `waktu` (
  `ID_WAKTU` varchar(4) NOT NULL,
  `WAKTU` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waktu`
--

INSERT INTO `waktu` (`ID_WAKTU`, `WAKTU`) VALUES
('SES1', '12.00 - 14.00'),
('SES2', '15.00 - 17.00'),
('SES3', '16.00 - 19.00'),
('SES4', '19.00 - 21.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_ulang`
--
ALTER TABLE `daftar_ulang`
  ADD PRIMARY KEY (`ID_DAFTAR_ULANG`),
  ADD KEY `FK_MELAKUKAN1` (`NOINDUK`),
  ADD KEY `FK_MENGAMBIL` (`ID_JENJANG`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`ID_JABATAN`);

--
-- Indexes for table `jadwal_les`
--
ALTER TABLE `jadwal_les`
  ADD PRIMARY KEY (`ID_JADWAL`),
  ADD KEY `FK_BERISII` (`ID_MAPEL`),
  ADD KEY `FK_BERTEMPAT` (`ID_RUANGAN`),
  ADD KEY `FK_DILAKUKAN_PADA` (`ID_WAKTU`),
  ADD KEY `FK_MEMILIKIII` (`ID_KELAS`),
  ADD KEY `FK_MENGAJAR` (`ID_PEGAWAI`);

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
  ADD PRIMARY KEY (`ID_PEGAWAI`),
  ADD KEY `FK_MEMILIKI` (`ID_JABATAN`),
  ADD KEY `FK_MENGAJAR2` (`ID_MAPEL`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`ID_PEMBAYARAN`),
  ADD KEY `FK_DILAKUKAN` (`NO_PENDAFTARAN`),
  ADD KEY `FK_MELAKUKAN` (`ID_PEGAWAI`);

--
-- Indexes for table `pembayaran_daful`
--
ALTER TABLE `pembayaran_daful`
  ADD PRIMARY KEY (`ID_PEMBAYARAN_DAFUL`),
  ADD KEY `FK_DILAKUKAN1` (`ID_DAFTAR_ULANG`);

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
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NOINDUK`),
  ADD KEY `FK_BERANGGOTAKAN` (`ID_KELAS`);

--
-- Indexes for table `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`ID_WAKTU`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_ulang`
--
ALTER TABLE `daftar_ulang`
  ADD CONSTRAINT `FK_MELAKUKAN1` FOREIGN KEY (`NOINDUK`) REFERENCES `siswa` (`NOINDUK`),
  ADD CONSTRAINT `FK_MENGAMBIL` FOREIGN KEY (`ID_JENJANG`) REFERENCES `jenjang_kelas` (`ID_JENJANG`);

--
-- Constraints for table `jadwal_les`
--
ALTER TABLE `jadwal_les`
  ADD CONSTRAINT `FK_BERISII` FOREIGN KEY (`ID_MAPEL`) REFERENCES `mata_pelajaran` (`ID_MAPEL`),
  ADD CONSTRAINT `FK_BERTEMPAT` FOREIGN KEY (`ID_RUANGAN`) REFERENCES `ruangan` (`ID_RUANGAN`),
  ADD CONSTRAINT `FK_DILAKUKAN_PADA` FOREIGN KEY (`ID_WAKTU`) REFERENCES `waktu` (`ID_WAKTU`),
  ADD CONSTRAINT `FK_MEMILIKIII` FOREIGN KEY (`ID_KELAS`) REFERENCES `kelas` (`ID_KELAS`),
  ADD CONSTRAINT `FK_MENGAJAR` FOREIGN KEY (`ID_PEGAWAI`) REFERENCES `pegawai` (`ID_PEGAWAI`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `FK_BERDASARKAN` FOREIGN KEY (`ID_JENJANG`) REFERENCES `jenjang_kelas` (`ID_JENJANG`);

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`ID_JABATAN`) REFERENCES `jabatan` (`ID_JABATAN`),
  ADD CONSTRAINT `FK_MENGAJAR2` FOREIGN KEY (`ID_MAPEL`) REFERENCES `mata_pelajaran` (`ID_MAPEL`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `FK_DILAKUKAN` FOREIGN KEY (`NO_PENDAFTARAN`) REFERENCES `pendaftaran_siswa_baru` (`NO_PENDAFTARAN`),
  ADD CONSTRAINT `FK_MELAKUKAN` FOREIGN KEY (`ID_PEGAWAI`) REFERENCES `pegawai` (`ID_PEGAWAI`);

--
-- Constraints for table `pembayaran_daful`
--
ALTER TABLE `pembayaran_daful`
  ADD CONSTRAINT `FK_DILAKUKAN1` FOREIGN KEY (`ID_DAFTAR_ULANG`) REFERENCES `daftar_ulang` (`ID_DAFTAR_ULANG`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
