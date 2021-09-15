-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2021 at 07:46 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simanjp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_absen_nilai`
--

CREATE TABLE `tabel_absen_nilai` (
  `idabsen` int(11) NOT NULL,
  `idpertemuan` int(11) NOT NULL,
  `idsiswa` int(11) NOT NULL,
  `kehadiran` int(11) NOT NULL COMMENT '0=absen 1=hadir 2=sakit 3=izin',
  `keterangan` varchar(100) DEFAULT NULL,
  `nilai_tugas` int(11) DEFAULT NULL,
  `nilai_sikap` int(11) DEFAULT NULL,
  `nilai_tugas_akhir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_absen_nilai`
--

INSERT INTO `tabel_absen_nilai` (`idabsen`, `idpertemuan`, `idsiswa`, `kehadiran`, `keterangan`, `nilai_tugas`, `nilai_sikap`, `nilai_tugas_akhir`) VALUES
(49, 1, 1, 1, '', 80, 100, 0),
(50, 1, 2, 1, '', 80, 80, 0),
(51, 1, 3, 2, 'Biasaan', 90, 100, 0),
(52, 1, 4, 1, '', 80, 100, 0),
(53, 1, 5, 1, '', 90, 100, 0),
(54, 1, 6, 1, '', 90, 100, 0),
(55, 2, 1, 1, 'Yuhu', 80, 100, 0),
(56, 2, 2, 2, '', 80, 100, 0),
(57, 2, 3, 0, '', 70, 100, 0),
(58, 2, 4, 2, 'Dikelas Nakal', 90, 100, 0),
(59, 2, 5, 3, '', 70, 100, 0),
(60, 2, 6, 1, '', 60, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_jadwal_kelas`
--

CREATE TABLE `tabel_jadwal_kelas` (
  `idjadwalkelas` int(11) NOT NULL,
  `kodejadwalkelas` varchar(15) NOT NULL,
  `idsekolah` int(11) NOT NULL,
  `idmapel` int(11) NOT NULL,
  `iduser1` int(11) NOT NULL,
  `iduser2` int(11) NOT NULL,
  `namakelas` varchar(25) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_jadwal_kelas`
--

INSERT INTO `tabel_jadwal_kelas` (`idjadwalkelas`, `kodejadwalkelas`, `idsekolah`, `idmapel`, `iduser1`, `iduser2`, `namakelas`, `hari`, `waktu`) VALUES
(1, 'SF-10IPA1-20', 1, 1, 4, 3, '10 IPA 1', 'Selasa', '08:30 - 10:00'),
(2, 'SF-10IPA2-20', 1, 2, 3, 4, '10 IPA 2', 'Selasa', '14:00 - 15:30'),
(3, 'SK-10IPA2-20', 2, 2, 3, 4, 'X IPA 1', 'Jum\'at', '14:00 - 16:00');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_mata_pelajaran`
--

CREATE TABLE `tabel_mata_pelajaran` (
  `idmapel` int(11) NOT NULL,
  `namamapel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_mata_pelajaran`
--

INSERT INTO `tabel_mata_pelajaran` (`idmapel`, `namamapel`) VALUES
(1, 'Adobe Photoshop'),
(2, 'Adobe Illustrator');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pertemuan`
--

CREATE TABLE `tabel_pertemuan` (
  `idpertemuan` int(11) NOT NULL,
  `idjadwalkelas` int(11) NOT NULL,
  `abspgjr1` int(11) NOT NULL,
  `abspgjr2` int(11) NOT NULL,
  `pertemuan_ke` varchar(2) NOT NULL,
  `metode` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `materi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_pertemuan`
--

INSERT INTO `tabel_pertemuan` (`idpertemuan`, `idjadwalkelas`, `abspgjr1`, `abspgjr2`, `pertemuan_ke`, `metode`, `tanggal`, `materi`) VALUES
(1, 1, 0, 1, '1', 'Ceramah & Praktek', '2020-07-28', 'Pengenalan Photoshop'),
(2, 1, 1, 0, '2', 'Praktik & Ceramah', '2020-08-04', 'Pengenalan Tools Photoshop'),
(3, 1, 0, 1, '3', 'Praktik & Ceramah', '2021-02-11', 'Membaca'),
(4, 3, 1, 0, '1', 'Praktik & Ceramah', '2020-07-28', 'Pengenalan Illustrator');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_sekolah`
--

CREATE TABLE `tabel_sekolah` (
  `idsekolah` int(11) NOT NULL,
  `namasekolah` varchar(50) NOT NULL,
  `alamatsekolah` varchar(100) NOT NULL,
  `notelsekolah` varchar(25) NOT NULL,
  `penanggungjawab` varchar(50) NOT NULL,
  `notelpngjwb` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_sekolah`
--

INSERT INTO `tabel_sekolah` (`idsekolah`, `namasekolah`, `alamatsekolah`, `notelsekolah`, `penanggungjawab`, `notelpngjwb`) VALUES
(1, 'SMAK Frateran Malang', 'Jl. Jaksa Agung Suprapto No.21 Samaan Klojen', '323264', 'Bapak Penanggungjawab', '081233455677'),
(2, 'SMAKr Kalam Kudus', 'Jl. Malenggang No.12 - 14 Pisang Candi Sukun Malang', '(0341) 584488', 'Ibu Penanggungjawab', '081234432556');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_siswa`
--

CREATE TABLE `tabel_siswa` (
  `idsiswa` int(11) NOT NULL,
  `namasiswa` varchar(100) NOT NULL,
  `idjadwalkelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_siswa`
--

INSERT INTO `tabel_siswa` (`idsiswa`, `namasiswa`, `idjadwalkelas`) VALUES
(1, 'Jonathan Liandi', 1),
(2, 'Joshua Pangaribuan', 1),
(3, 'Unai Emery', 1),
(4, 'Veronica', 1),
(5, 'Pjanic', 1),
(6, 'Rooney', 1),
(7, 'Ahmad', 2),
(13, 'Udil Surbakti', 3),
(14, 'Ahmad Musoddiq', 3),
(15, 'William', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE `tabel_user` (
  `iduser` int(11) NOT NULL,
  `namauser` varchar(100) NOT NULL,
  `nrp` varchar(10) NOT NULL,
  `prodi` varchar(25) NOT NULL,
  `jk` char(1) NOT NULL,
  `nomerhp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`iduser`, `namauser`, `nrp`, `prodi`, `jk`, `nomerhp`, `email`, `jabatan`, `username`, `password`) VALUES
(1, 'Admin', '1', '1', 'L', '1', 'admin@admin.com', 'Admin', 'admin', 'admin'),
(2, 'Kepala PPTIK', '1', '1', 'P', '085675675675', 'pptik@stiki.ac.id', 'Kepala', 'kepala', 'kepala'),
(3, 'Hafit Syams W', '161221017', 'Manajemen Informatika', 'L', '087874957945', 'hafit@gmail.com', 'Pengajar', 'hafit', 'hafit'),
(4, 'Christian Axel', '162111023', 'Desain Komunikasi Visual', 'L', '+628813374950', 'axel@gmail.com', 'Pengajar', 'axel', 'axel'),
(5, 'Koordinator', '1', '1', 'L', '081111222333', 'koordinator@stiki.ac.id', 'Koordinator', 'koordinator', 'koordinator'),
(6, 'Staff PPTIK', '1', '1', 'L', '087874957967', 'staf@stiki.ac.id', 'Staf', 'staf', 'staf'),
(7, 'Ahmad Masrud', '171111001', 'Teknik Informatika', 'L', '0898 789 8789', 'masrud@gmail.com', 'Pengajar', 'masrud', 'masrud');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_absen_nilai`
--
ALTER TABLE `tabel_absen_nilai`
  ADD PRIMARY KEY (`idabsen`),
  ADD KEY `fk_abspert` (`idpertemuan`),
  ADD KEY `fk_absssw` (`idsiswa`);

--
-- Indexes for table `tabel_jadwal_kelas`
--
ALTER TABLE `tabel_jadwal_kelas`
  ADD PRIMARY KEY (`idjadwalkelas`),
  ADD KEY `fk_jdwlsklh` (`idsekolah`),
  ADD KEY `fk_jdwlmpl` (`idmapel`),
  ADD KEY `fk_jdwluser1` (`iduser1`),
  ADD KEY `fk_jdwluser2` (`iduser2`);

--
-- Indexes for table `tabel_mata_pelajaran`
--
ALTER TABLE `tabel_mata_pelajaran`
  ADD PRIMARY KEY (`idmapel`);

--
-- Indexes for table `tabel_pertemuan`
--
ALTER TABLE `tabel_pertemuan`
  ADD PRIMARY KEY (`idpertemuan`),
  ADD KEY `fk_jdwlpert` (`idjadwalkelas`);

--
-- Indexes for table `tabel_sekolah`
--
ALTER TABLE `tabel_sekolah`
  ADD PRIMARY KEY (`idsekolah`);

--
-- Indexes for table `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  ADD PRIMARY KEY (`idsiswa`),
  ADD KEY `fk_swajdwl` (`idjadwalkelas`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_absen_nilai`
--
ALTER TABLE `tabel_absen_nilai`
  MODIFY `idabsen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tabel_jadwal_kelas`
--
ALTER TABLE `tabel_jadwal_kelas`
  MODIFY `idjadwalkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabel_mata_pelajaran`
--
ALTER TABLE `tabel_mata_pelajaran`
  MODIFY `idmapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabel_pertemuan`
--
ALTER TABLE `tabel_pertemuan`
  MODIFY `idpertemuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabel_sekolah`
--
ALTER TABLE `tabel_sekolah`
  MODIFY `idsekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  MODIFY `idsiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_absen_nilai`
--
ALTER TABLE `tabel_absen_nilai`
  ADD CONSTRAINT `fk_abspert` FOREIGN KEY (`idpertemuan`) REFERENCES `tabel_pertemuan` (`idpertemuan`),
  ADD CONSTRAINT `fk_absssw` FOREIGN KEY (`idsiswa`) REFERENCES `tabel_siswa` (`idsiswa`);

--
-- Constraints for table `tabel_jadwal_kelas`
--
ALTER TABLE `tabel_jadwal_kelas`
  ADD CONSTRAINT `fk_jdwlmpl` FOREIGN KEY (`idmapel`) REFERENCES `tabel_mata_pelajaran` (`idmapel`),
  ADD CONSTRAINT `fk_jdwlsklh` FOREIGN KEY (`idsekolah`) REFERENCES `tabel_sekolah` (`idsekolah`),
  ADD CONSTRAINT `fk_jdwluser1` FOREIGN KEY (`iduser1`) REFERENCES `tabel_user` (`iduser`),
  ADD CONSTRAINT `fk_jdwluser2` FOREIGN KEY (`iduser2`) REFERENCES `tabel_user` (`iduser`);

--
-- Constraints for table `tabel_pertemuan`
--
ALTER TABLE `tabel_pertemuan`
  ADD CONSTRAINT `fk_jdwlpert` FOREIGN KEY (`idjadwalkelas`) REFERENCES `tabel_jadwal_kelas` (`idjadwalkelas`);

--
-- Constraints for table `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  ADD CONSTRAINT `fk_swajdwl` FOREIGN KEY (`idjadwalkelas`) REFERENCES `tabel_jadwal_kelas` (`idjadwalkelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
