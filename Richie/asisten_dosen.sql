-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2016 at 08:55 AM
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
-- Table structure for table `hasiltgs`
--

CREATE TABLE IF NOT EXISTS `hasiltgs` (
`idHasiltgs` int(11) NOT NULL,
  `idTugas` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idKelas` int(11) NOT NULL,
  `fileHasiltgs` varchar(255) NOT NULL,
  `tglUploadHasiltgs` date NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `hasiltgs`
--

INSERT INTO `hasiltgs` (`idHasiltgs`, `idTugas`, `idUser`, `idKelas`, `fileHasiltgs`, `tglUploadHasiltgs`, `nilai`) VALUES
(41, 2, 5, 2, 'tugas/blueprint_UTS.docx', '2016-05-02', 0),
(42, 2, 6, 2, 'hasiltgs/jurnal_itprof.docx', '2016-05-04', 0),
(43, 3, 8, 8, 'blueprint_UTS.docx', '2016-05-11', 0),
(44, 6, 8, 9, '', '2016-05-21', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idKelas`, `namaKelas`, `idDosen`, `deskripsiKelas`, `statusKelas`) VALUES
(1, '6PTI1 - Basis Data Enterprise', 4, 'Andrew', 1),
(2, '6PTI2 - Basis Data Enterprise', 3, 'Baru', 1),
(3, '6PTI3 - Basis Data Enterprise', 4, NULL, 1),
(4, '6PTI4 - Basis Data Enterprise', 3, 'Deskripsi', 1),
(5, 'test', 4, 'test', 0),
(6, '6PTI2-RPL', 3, 'test', 1),
(7, 'barubaru', 4, 'barubaru', 1),
(8, '5PTI1 - Kalkulus', 7, 'UBM semester 5 Jurusan TI', 1),
(9, '4PTI 2', 9, 'kelas baik baik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelasdtl`
--

CREATE TABLE IF NOT EXISTS `kelasdtl` (
`idKelasdtl` int(11) NOT NULL,
  `idKelas` int(11) NOT NULL,
  `idMhs` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `kelasdtl`
--

INSERT INTO `kelasdtl` (`idKelasdtl`, `idKelas`, `idMhs`) VALUES
(1, 2, 1),
(2, 2, 6),
(3, 3, 1),
(4, 8, 5),
(7, 9, 7),
(8, 8, 8),
(9, 9, 8);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`idMateri`, `namaMateri`, `fileMateri`, `idKelas`, `tglUploadMateri`) VALUES
(1, 'DBE_PERT1', 'DBE_PERT1.pdf', 1, '2016-04-05'),
(2, 'DBE_PERT2', 'DBE_PERT2.pdf', 1, '2016-04-05'),
(3, 'DBE_PERT3', 'DBE_PERT3.pdf', 1, '2016-04-05'),
(18, 'DBE_PERT1.pdf', 'materi/DBE_PERT1.pdf', 2, '2016-04-26'),
(19, 'Tugas Baru.pdf', 'Tugas Baru.pdf', 8, '2016-05-11');

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
  `extTugas` varchar(255) NOT NULL,
  `tglUploadTugas` date NOT NULL,
  `idKelas` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`idTugas`, `namaTugas`, `deskripsiTugas`, `tglMulaiTugas`, `tglSelesaiTugas`, `fileTugas`, `extTugas`, `tglUploadTugas`, `idKelas`) VALUES
(1, 'TUGAS_DBE_PERT1', 'buat di doc', '2016-04-12', '2016-04-19', 'debug', '', '2016-04-05', 1),
(2, 'TUGAS_DBE_PERT1', 'buat di doc', '2016-04-26', '2016-05-17', 'Tugas Baru.pdf', '', '2016-04-05', 2),
(3, 'Tugas Pertama', 'Tugas pertama', '2016-10-05', '2016-12-05', 'Banner.docx', '', '2016-05-11', 8),
(4, 'Tugas Proposal', 'proposal baru', '2016-05-21', '2016-05-24', 'Proposal aplikasi V.2.1.pdf', '', '2016-05-21', 9),
(6, 'Tugas 2', 'matematika', '2016-05-21', '2016-05-28', 'when_zachman.docx', 'doc,docx,xls,xlsx,', '2016-05-21', 9),
(7, 'Tugas doc', '', '2016-05-11', '2016-05-31', '', '', '2016-05-21', 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`idUser` int(11) NOT NULL,
  `namaUser` varchar(50) NOT NULL,
  `passwordUser` varchar(255) NOT NULL,
  `emailUser` varchar(100) NOT NULL,
  `tglLahirUser` date NOT NULL,
  `fotoUser` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `namaUser`, `passwordUser`, `emailUser`, `tglLahirUser`, `fotoUser`, `status`) VALUES
(1, 'John', 'debug', 'halimagung@gmail.com', '1990-11-10', '../images/fulls/foto/foto_1jpg', 1),
(2, 'Lukman Hakim', 'debug', 'lukmanhakim@gmail.com', '1990-11-11', 'debug', 1),
(3, 'Krintin', 'debug', 'kristin@bundamulia.ac.id', '1990-11-19', 'debug', 1),
(4, 'Wawo', 'debug', 'wawo@gmail.com', '1990-11-11', 'debug', 1),
(5, 'Andrew Nugraha', 'debug', 'rafael012896@gmail.com', '1996-01-28', 'debug', 2),
(6, 'Antony K.W.', 'debug', 'antony@gmail.com', '1990-11-11', 'debug', 2),
(7, 'Richie Budiman', '$2y$10$8dG9ZIfJNxVfCgy5mEpqOe/WbwnFW/wbh0doXFNbZJsNFJMtXAFPK', 'Richie_peace@rocketmail.com', '1995-07-05', '../images/fulls/nopic', 0),
(8, 'ocol', '$2y$10$btgMnAzQxJvHLnyLkgefF.N7gklj1lJfWPsukesjfTK1655uEPosa', 'richie.peace1995@gmail.com', '0000-00-00', '', 1),
(9, 'RichieDosen', '$2y$10$37Me.AZtlQx9hSxnG/70VuBCkcCP9YGsA48ByR/P.uPIelTSzVmIW', 'Richie_dosen@gmail.com', '1995-07-05', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasiltgs`
--
ALTER TABLE `hasiltgs`
 ADD PRIMARY KEY (`idHasiltgs`), ADD KEY `idTugas` (`idTugas`), ADD KEY `idKelas` (`idKelas`), ADD KEY `idUser` (`idUser`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasiltgs`
--
ALTER TABLE `hasiltgs`
MODIFY `idHasiltgs` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `jenispsn`
--
ALTER TABLE `jenispsn`
MODIFY `idJenispsn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
MODIFY `idKelas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kelasdtl`
--
ALTER TABLE `kelasdtl`
MODIFY `idKelasdtl` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
MODIFY `idMateri` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
MODIFY `idPesan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
MODIFY `idTugas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasiltgs`
--
ALTER TABLE `hasiltgs`
ADD CONSTRAINT `hasiltgs_ibfk_1` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`),
ADD CONSTRAINT `hasiltgs_ibfk_2` FOREIGN KEY (`idTugas`) REFERENCES `tugas` (`idTugas`),
ADD CONSTRAINT `hasiltgs_ibfk_3` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`idDosen`) REFERENCES `user` (`idUser`);

--
-- Constraints for table `kelasdtl`
--
ALTER TABLE `kelasdtl`
ADD CONSTRAINT `kelasdtl_ibfk_1` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`),
ADD CONSTRAINT `kelasdtl_ibfk_2` FOREIGN KEY (`idMhs`) REFERENCES `user` (`idUser`);

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
