-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 04:10 PM
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
  `idjadwalkelas` int(11) DEFAULT NULL,
  `kehadiran` int(11) NOT NULL COMMENT '0=absen 1=hadir 2=sakit 3=izin',
  `keterangan` varchar(100) DEFAULT NULL,
  `nilai_tugas` int(11) DEFAULT NULL,
  `nilai_sikap` int(11) DEFAULT NULL,
  `nilai_tugas_akhir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_absen_nilai`
--

INSERT INTO `tabel_absen_nilai` (`idabsen`, `idpertemuan`, `idsiswa`, `idjadwalkelas`, `kehadiran`, `keterangan`, `nilai_tugas`, `nilai_sikap`, `nilai_tugas_akhir`) VALUES
(67, 11, 16, 12, 1, '', 80, 100, NULL),
(68, 11, 17, 12, 1, '', 80, 100, NULL),
(69, 11, 18, 12, 2, '', 70, 90, NULL),
(70, 12, 16, 12, 2, '', 90, 100, NULL),
(71, 12, 17, 12, 2, '', 90, 90, NULL),
(72, 12, 18, 12, 1, '', 70, 100, NULL),
(82, 13, 16, 12, 1, '', NULL, 100, 90),
(83, 13, 17, 12, 1, '', NULL, 100, 90),
(84, 13, 18, 12, 1, '', NULL, 100, 90),
(85, 16, 19, 14, 1, '', 80, 100, NULL),
(86, 16, 20, 14, 1, '', 90, 100, NULL),
(87, 16, 21, 14, 0, '', 90, 100, NULL),
(88, 17, 22, 15, 1, '', 80, 100, NULL),
(89, 17, 23, 15, 2, '', 80, 90, NULL),
(90, 17, 24, 15, 3, '', 90, 80, NULL);

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
  `namakelas` varchar(50) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `semester` int(11) NOT NULL,
  `idwaktu` int(11) NOT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `waktu` varchar(20) DEFAULT NULL,
  `jmlpert` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_jadwal_kelas`
--

INSERT INTO `tabel_jadwal_kelas` (`idjadwalkelas`, `kodejadwalkelas`, `idsekolah`, `idmapel`, `iduser1`, `iduser2`, `namakelas`, `tahun`, `semester`, `idwaktu`, `hari`, `waktu`, `jmlpert`) VALUES
(12, 'SK-10IPA2-21', 2, 1, 3, 4, 'LAB C ', '2021', 1, 1, '0', '0', 3),
(13, 'SK-10IPA1-21', 2, 1, 11, 7, 'LAB B', '2021', 1, 1, '0', '0', 3),
(14, 'PJ-10IPA1-21', 7, 1, 3, 8, '10 IPA 1', '2021', 2, 8, '0', '0', 10),
(15, 'SP-10IPA2-20', 8, 7, 12, 11, '10 IPA 2', '2021', 1, 13, '0', '0', 3);

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
(2, 'Adobe Illustrator'),
(3, 'Pemrograman Web (HTML)'),
(4, 'Adobe Flash'),
(7, 'Pemrograman Web (PHP)');

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
(11, 12, 1, 1, '1', 'Praktik & Ceramah', '2021-06-02', 'Pengenalan Photoshop'),
(12, 12, 1, 0, '2', 'Praktik & Ceramah', '2021-06-22', 'Pengenalan Tools Photoshop'),
(13, 12, 0, 0, '3', 'Praktik & Ceramah', '2021-06-30', 'Mengarang'),
(16, 14, 1, 1, '1', 'Praktik & Ceramah', '2021-07-15', 'Pengenalan Photoshop'),
(17, 15, 1, 1, '1', 'Ceramah', '2021-07-13', 'Pengenalan PHP');

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
(2, 'SMAKr Kalam Kudus', 'Jl. Malenggang No.12 - 14 Pisang Candi Sukun Malang', '(0341) 584488', 'Ibu Penanggungjawab', '081234432556'),
(7, 'PJ GLOBAL', 'Jalan. Jalan', '08979879879', 'Bapak Guru', '087859765567'),
(8, 'SMAN 1 Sumberpucung', 'Jl. Sumberpucung', '0341 123456', 'Bapak Guru', '0341 567890');

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
(16, 'Albert', 12),
(17, 'Anam', 12),
(18, 'Aldy', 12),
(19, 'Ahmad', 14),
(20, 'Aziz', 14),
(21, 'Ali', 14),
(22, 'Ahmad', 15),
(23, 'Ajiz', 15),
(24, 'Alif', 15);

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
(7, 'Ahmad Masrud', '171111001', 'Teknik Informatika', 'L', '0898 789 8789', 'masrud@gmail.com', 'Pengajar', 'masrud', 'masrud'),
(8, 'Febri Yohanes Adi', '141111111', 'Teknik Informatika', 'L', '0898 789 8789', 'febri@gmail.com', 'Pengajar', 'febri', 'febri'),
(11, 'Ahmad Sandi', '161221001', 'Manajemen Informatika', 'L', '0898 789 8785', 'sandi@gmail.com', 'Pengajar', 'sandi', 'sandi'),
(12, 'Ade', '154678', 'Manajemen Informatika', 'L', '08768987653', 'ade@gmail.com', 'Pengajar', 'ade', 'ade');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_waktu`
--

CREATE TABLE `tabel_waktu` (
  `idwaktu` int(11) NOT NULL,
  `waktucok` int(1) NOT NULL,
  `kodehari` int(11) NOT NULL COMMENT '1 mulai dari senin',
  `kodewaktu` int(11) NOT NULL,
  `ketwaktu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_waktu`
--

INSERT INTO `tabel_waktu` (`idwaktu`, `waktucok`, `kodehari`, `kodewaktu`, `ketwaktu`) VALUES
(1, 1, 1, 1, '06:30 - 08:00'),
(2, 1, 1, 2, '08:00 - 09:30'),
(3, 0, 1, 3, '10:00 - 11:30'),
(4, 0, 1, 4, '11:30 - 13:00'),
(5, 0, 1, 5, '13:00 - 14:30'),
(6, 0, 1, 6, '14:30 - 16:00'),
(7, 0, 2, 1, '06:30 - 08:00'),
(8, 0, 2, 2, '08:00 - 09:30'),
(9, 0, 2, 3, '10:00 - 11:30'),
(10, 0, 2, 4, '11:30 - 13:00'),
(11, 0, 2, 5, '13:00 - 14:30'),
(12, 0, 2, 6, '14:30 - 16:00'),
(13, 0, 3, 1, '06:30 - 08:00'),
(14, 0, 3, 2, '08:00 - 09:30'),
(15, 0, 3, 3, '10:00 - 11:30'),
(16, 0, 3, 4, '11:30 - 13:00'),
(17, 0, 3, 5, '13:00 - 14:30'),
(18, 0, 3, 6, '14:30 - 16:00'),
(19, 0, 4, 1, '06:30 - 08:00'),
(20, 0, 4, 2, '08:00 - 09:30'),
(21, 0, 4, 3, '10:00 - 11:30'),
(22, 0, 4, 4, '11:30 - 13:00'),
(23, 0, 4, 5, '13:00 - 14:30'),
(24, 0, 4, 6, '14:30 - 16:00'),
(25, 0, 5, 1, '06:30 - 08:00'),
(26, 0, 5, 2, '08:00 - 09:30'),
(27, 0, 5, 3, '10:00 - 11:30'),
(28, 0, 5, 4, '11:30 - 13:00'),
(29, 0, 5, 5, '13:00 - 14:30'),
(30, 0, 5, 6, '14:30 - 16:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_absen_nilai`
--
ALTER TABLE `tabel_absen_nilai`
  ADD PRIMARY KEY (`idabsen`),
  ADD KEY `fk_abspert` (`idpertemuan`),
  ADD KEY `fk_absssw` (`idsiswa`),
  ADD KEY `fk_idjdwlkls` (`idjadwalkelas`);

--
-- Indexes for table `tabel_jadwal_kelas`
--
ALTER TABLE `tabel_jadwal_kelas`
  ADD PRIMARY KEY (`idjadwalkelas`),
  ADD KEY `fk_jdwlsklh` (`idsekolah`),
  ADD KEY `fk_jdwlmpl` (`idmapel`),
  ADD KEY `fk_jdwluser1` (`iduser1`),
  ADD KEY `fk_jdwluser2` (`iduser2`),
  ADD KEY `fk_waktuuuu` (`idwaktu`);

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
-- Indexes for table `tabel_waktu`
--
ALTER TABLE `tabel_waktu`
  ADD PRIMARY KEY (`idwaktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_absen_nilai`
--
ALTER TABLE `tabel_absen_nilai`
  MODIFY `idabsen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tabel_jadwal_kelas`
--
ALTER TABLE `tabel_jadwal_kelas`
  MODIFY `idjadwalkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tabel_mata_pelajaran`
--
ALTER TABLE `tabel_mata_pelajaran`
  MODIFY `idmapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tabel_pertemuan`
--
ALTER TABLE `tabel_pertemuan`
  MODIFY `idpertemuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tabel_sekolah`
--
ALTER TABLE `tabel_sekolah`
  MODIFY `idsekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  MODIFY `idsiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tabel_waktu`
--
ALTER TABLE `tabel_waktu`
  MODIFY `idwaktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_absen_nilai`
--
ALTER TABLE `tabel_absen_nilai`
  ADD CONSTRAINT `fk_abspert` FOREIGN KEY (`idpertemuan`) REFERENCES `tabel_pertemuan` (`idpertemuan`),
  ADD CONSTRAINT `fk_absssw` FOREIGN KEY (`idsiswa`) REFERENCES `tabel_siswa` (`idsiswa`),
  ADD CONSTRAINT `fk_idjdwlkls` FOREIGN KEY (`idjadwalkelas`) REFERENCES `tabel_jadwal_kelas` (`idjadwalkelas`);

--
-- Constraints for table `tabel_jadwal_kelas`
--
ALTER TABLE `tabel_jadwal_kelas`
  ADD CONSTRAINT `fk_jdwlmpl` FOREIGN KEY (`idmapel`) REFERENCES `tabel_mata_pelajaran` (`idmapel`),
  ADD CONSTRAINT `fk_jdwlsklh` FOREIGN KEY (`idsekolah`) REFERENCES `tabel_sekolah` (`idsekolah`),
  ADD CONSTRAINT `fk_jdwluser1` FOREIGN KEY (`iduser1`) REFERENCES `tabel_user` (`iduser`),
  ADD CONSTRAINT `fk_jdwluser2` FOREIGN KEY (`iduser2`) REFERENCES `tabel_user` (`iduser`),
  ADD CONSTRAINT `fk_waktuuuu` FOREIGN KEY (`idwaktu`) REFERENCES `tabel_waktu` (`idwaktu`);

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
