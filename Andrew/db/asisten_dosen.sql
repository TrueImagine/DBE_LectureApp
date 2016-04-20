-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2016 at 02:42 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `asisten_dosen`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
`idDosen` int(11) NOT NULL,
  `namaDosen` varchar(50) NOT NULL,
  `passwordDosen` varchar(255) NOT NULL,
  `emailDosen` varchar(100) NOT NULL,
  `tglLahirDosen` date NOT NULL,
  `fotoDosen` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`idDosen`, `namaDosen`, `passwordDosen`, `emailDosen`, `tglLahirDosen`, `fotoDosen`) VALUES
(1, 'Halim Agung', 'debug', 'halimagung@gmail.com', '1990-11-10', 'debug'),
(2, 'Lukman Hakim', 'debug', 'lukmanhakim@gmail.com', '1990-11-11', 'debug'),
(3, 'Krintin', 'debug', 'kristin@bundamulia.ac.id', '1990-11-19', 'debug'),
(4, 'Wawo', 'debug', 'wawo@gmail.com', '1990-11-11', 'debug');

-- --------------------------------------------------------

--
-- Table structure for table `hasiltgs`
--

CREATE TABLE IF NOT EXISTS `hasiltgs` (
`idHasiltgs` int(11) NOT NULL,
  `idTugas` int(11) NOT NULL,
  `idKelas` int(11) NOT NULL,
  `fileHasiltgs` varchar(255) NOT NULL,
  `tglUploadHasiltgs` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `hasiltgs`:
--   `idKelas`
--       `kelas` -> `idKelas`
--   `idTugas`
--       `tugas` -> `idTugas`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenispsn`
--

CREATE TABLE IF NOT EXISTS `jenispsn` (
`idJenispsn` int(11) NOT NULL,
  `namaJenispsn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
`idKelas` int(11) NOT NULL,
  `namaKelas` varchar(50) NOT NULL,
  `idDosen` int(11) NOT NULL,
  `deskripsiKelas` varchar(255) DEFAULT NULL,
  `statusKelas` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- RELATIONS FOR TABLE `kelas`:
--   `idDosen`
--       `dosen` -> `idDosen`
--

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idKelas`, `namaKelas`, `idDosen`, `deskripsiKelas`, `statusKelas`) VALUES
(1, '6PTI1 - Basis Data Enterprise ', 4, NULL, 1),
(2, '6PTI2 - Basis Data Enterprise', 3, NULL, 1),
(3, '6PTI3 - Basis Data Enterprise', 4, NULL, 1),
(4, '6PTI4 - Basis Data Enterprise', 3, 'Deskripsi', 1),
(5, 'test', 4, 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kelasdtl`
--

CREATE TABLE IF NOT EXISTS `kelasdtl` (
`idKelasdtl` int(11) NOT NULL,
  `idKelas` int(11) NOT NULL,
  `idMhs` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- RELATIONS FOR TABLE `kelasdtl`:
--   `idKelas`
--       `kelas` -> `idKelas`
--   `idMhs`
--       `mahasiswa` -> `idMhs`
--

--
-- Dumping data for table `kelasdtl`
--

INSERT INTO `kelasdtl` (`idKelasdtl`, `idKelas`, `idMhs`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
`idMhs` int(11) NOT NULL,
  `namaMhs` varchar(50) NOT NULL,
  `passwordMhs` varchar(50) NOT NULL,
  `emailMhs` varchar(50) NOT NULL,
  `tglLahirMhs` date NOT NULL,
  `fotoMhs` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`idMhs`, `namaMhs`, `passwordMhs`, `emailMhs`, `tglLahirMhs`, `fotoMhs`) VALUES
(1, 'Andrew', 'debug', 'andrew@gmail.com', '1996-01-01', 'debug'),
(2, 'Fedrico', 'debug', 'fedrico@gmail.com', '1995-01-01', 'debug'),
(3, 'Antony', 'debug', 'antony@gmail.com', '1990-01-01', 'debug'),
(4, 'Richie', 'debug', 'richie@gmail.com', '1991-01-01', 'debug');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE IF NOT EXISTS `materi` (
`idMateri` int(11) NOT NULL,
  `namaMateri` varchar(255) NOT NULL,
  `fileMateri` varchar(255) NOT NULL,
  `idKelas` int(11) NOT NULL,
  `tglUploadMateri` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- RELATIONS FOR TABLE `materi`:
--   `idKelas`
--       `kelas` -> `idKelas`
--

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`idMateri`, `namaMateri`, `fileMateri`, `idKelas`, `tglUploadMateri`) VALUES
(1, 'DBE_PERT1', 'debug', 1, '2016-04-05'),
(2, 'DBE_PERT2', 'debug', 1, '2016-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
`idPesan` int(11) NOT NULL,
  `isiPesan` int(11) NOT NULL,
  `idJenispsn` int(11) NOT NULL,
  `idKelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `pesan`:
--   `idKelas`
--       `kelas` -> `idKelas`
--   `idJenispsn`
--       `jenispsn` -> `idJenispsn`
--

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE IF NOT EXISTS `tugas` (
`idTugas` int(11) NOT NULL,
  `namaTugas` varchar(255) NOT NULL,
  `deskripsiTugas` varchar(255) NOT NULL,
  `tglMulaiTugas` date NOT NULL,
  `tglSelesaiTugas` date NOT NULL,
  `fileTugas` varchar(255) NOT NULL,
  `tglUploadTugas` date NOT NULL,
  `idKelas` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- RELATIONS FOR TABLE `tugas`:
--   `idKelas`
--       `kelas` -> `idKelas`
--

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`idTugas`, `namaTugas`, `deskripsiTugas`, `tglMulaiTugas`, `tglSelesaiTugas`, `fileTugas`, `tglUploadTugas`, `idKelas`) VALUES
(1, 'TUGAS_DBE_PERT1', 'buat di doc', '2016-04-12', '2016-04-19', 'debug', '2016-04-05', 1),
(2, 'TUGAS_DBE_PERT1', 'buat di doc', '2016-04-12', '2016-04-19', 'debug', '2016-04-05', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
 ADD PRIMARY KEY (`idDosen`);

--
-- Indexes for table `hasiltgs`
--
ALTER TABLE `hasiltgs`
 ADD PRIMARY KEY (`idHasiltgs`), ADD KEY `idTugas` (`idTugas`), ADD KEY `idKelas` (`idKelas`);

--
-- Indexes for table `jenispsn`
--
ALTER TABLE `jenispsn`
 ADD PRIMARY KEY (`idJenispsn`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`idKelas`), ADD KEY `idDosen` (`idDosen`);

--
-- Indexes for table `kelasdtl`
--
ALTER TABLE `kelasdtl`
 ADD PRIMARY KEY (`idKelasdtl`), ADD KEY `idKelas` (`idKelas`), ADD KEY `idMhs` (`idMhs`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
 ADD PRIMARY KEY (`idMhs`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
 ADD PRIMARY KEY (`idMateri`), ADD KEY `idKelas` (`idKelas`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
 ADD PRIMARY KEY (`idPesan`), ADD KEY `idJenispsn` (`idJenispsn`), ADD KEY `idKelas` (`idKelas`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
 ADD PRIMARY KEY (`idTugas`), ADD KEY `idKelas` (`idKelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
MODIFY `idDosen` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `hasiltgs`
--
ALTER TABLE `hasiltgs`
MODIFY `idHasiltgs` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jenispsn`
--
ALTER TABLE `jenispsn`
MODIFY `idJenispsn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
MODIFY `idKelas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kelasdtl`
--
ALTER TABLE `kelasdtl`
MODIFY `idKelasdtl` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
MODIFY `idMhs` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
MODIFY `idMateri` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
MODIFY `idPesan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
MODIFY `idTugas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasiltgs`
--
ALTER TABLE `hasiltgs`
ADD CONSTRAINT `hasiltgs_ibfk_1` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`),
ADD CONSTRAINT `hasiltgs_ibfk_2` FOREIGN KEY (`idTugas`) REFERENCES `tugas` (`idTugas`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`idDosen`) REFERENCES `dosen` (`idDosen`);

--
-- Constraints for table `kelasdtl`
--
ALTER TABLE `kelasdtl`
ADD CONSTRAINT `kelasdtl_ibfk_1` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`),
ADD CONSTRAINT `kelasdtl_ibfk_2` FOREIGN KEY (`idMhs`) REFERENCES `mahasiswa` (`idMhs`);

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`);

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`),
ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`idJenispsn`) REFERENCES `jenispsn` (`idJenispsn`);

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
ADD CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;