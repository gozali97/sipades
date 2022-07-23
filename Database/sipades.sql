-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 07:34 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipades`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_informasi`
--

CREATE TABLE `tbl_informasi` (
  `id_informasi` int(11) NOT NULL,
  `judul_informasi` varchar(50) NOT NULL,
  `ket_informasi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_informasi`
--

INSERT INTO `tbl_informasi` (`id_informasi`, `judul_informasi`, `ket_informasi`, `tanggal`, `gambar`) VALUES
(1, 'Kerja Bakti', 'Sehubungan degan semakin mewabahnya penyakit demam berdarah dilingkungan kita, maka kami beritahukan kepada seluruh warga RT 2 RW 4 Desa Tamenrejo untuk berpartisipasi dalam kerja bakti.  ', '2021-04-05', 'info.jpg'),
(3, 'Kantor Desa', 'Bangunan baru kantor desa Dukuhmulyo', '2021-03-25', 'desa.jpg'),
(4, 'Kepala Desa Dukuhmulyo', 'Kepala Desa baru dukuhmulyo', '2021-05-10', 'kepala.jpg'),
(5, 'Stop penyebaran Covid-19', 'Kepala Desa Dukuhmulyo Menghimbau kepada seluruh lapisan masyarakat Desa Dukuhmulyo, dalam menyikapi situasi dan kondisi saat ini tentang penyakit Novel Coronavirus (COVID-19) atau yang kita kenal Virus Corona.', '2021-05-19', 'stop-virus-corona.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penduduk`
--

CREATE TABLE `tbl_penduduk` (
  `nik` varchar(50) NOT NULL,
  `nm_lengkap` varchar(50) NOT NULL,
  `tmpt_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `stts_kawin` varchar(11) NOT NULL,
  `pekerjaan` varchar(15) NOT NULL,
  `stts_penduduk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penduduk`
--

INSERT INTO `tbl_penduduk` (`nik`, `nm_lengkap`, `tmpt_lahir`, `tgl_lahir`, `alamat`, `agama`, `jk`, `stts_kawin`, `pekerjaan`, `stts_penduduk`) VALUES
('3318061606820005', 'Sukimin', 'Pati', '2021-03-10', 'DK. SLEKO', 'Islam', 'Laki-Laki', 'Belum Kawin', 'Mahasiswa', 'Penduduk tetap'),
('3318090711130001', 'DENISH WAHYU NOVA B.', 'Pati', '2013-07-11', 'DUKUHMULYO', 'Islam', 'Laki-Laki', 'Belum Kawin', 'Pelajar', 'Penduduk tetap'),
('3318094505930005', 'FARIDA FATMAWATI', 'Pati', '1999-05-05', 'DUKUHMULYO', 'Islam', 'Perempuan', 'Kawin', 'Karyawan', 'Penduduk tetap'),
('3318095302740002', 'Sukeri', 'Pati', '1974-02-13', 'DK. SLEKO', 'Islam', 'Perempuan', 'Kawin', 'WIRASWASTA', 'Penduduk tetap'),
('6201021003970001', 'Muhammad Fadli Anjasmoro', 'Jakarta', '2021-03-02', 'Temanggung', 'Islam', 'Laki-Laki', 'Belum Kawin', 'Mahasiswa', 'Pindahan'),
('6201021003970002', 'Dimas Ridho Amali', 'Banjarmasin', '2000-10-17', 'DUKUHMULYO', 'Islam', 'Laki-Laki', 'Belum Kawin', 'Mahasiswa', 'Pendatang'),
('6201021003970003', 'Ahmad Gozali', 'Pangkalan Bun', '1999-03-10', 'Pangkalan Bun', 'Islam', 'Laki-Laki', 'Belum Kawin', 'Mahasiswa', 'Pendatang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengaduan`
--

CREATE TABLE `tbl_pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` varchar(20) NOT NULL,
  `isi_laporan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('Proses','Ditanggapi','Selesai','') NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengaduan`
--

INSERT INTO `tbl_pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`, `id_user`) VALUES
(12, '2021-05-10', '6201021003970001', 'Banjir', 'Banjir.jpg', 'Selesai', 17),
(14, '2021-05-19', '6201021003970001', 'Tanah Longsor', 'longsor.jpg', 'Ditanggapi', 17);

--
-- Triggers `tbl_pengaduan`
--
DELIMITER $$
CREATE TRIGGER `insert_aduan` AFTER INSERT ON `tbl_pengaduan` FOR EACH ROW INSERT INTO `tbl_tindakan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`) VALUES (NULL, NEW.id_pengaduan, CURRENT_DATE(), '-')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan_surat`
--

CREATE TABLE `tbl_pengajuan_surat` (
  `no_surat` int(11) NOT NULL,
  `kode_surat` varchar(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nm_surat` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengajuan_surat`
--

INSERT INTO `tbl_pengajuan_surat` (`no_surat`, `kode_surat`, `tanggal`, `nik`, `nm_surat`, `id_user`) VALUES
(22, '145.1', '2021-03-27', '3318061606820005', 'Surat Keterangan', 17),
(24, '470', '2021-03-29', '3318094505930005', 'Surat Domisili', 16),
(25, '474.3', '2021-03-06', '3318090711130001', 'Surat Kematian', 16),
(26, '474.1', '2021-03-29', '3318061606820005', 'Surat Izin Usaha', 16),
(27, '474.1', '2021-03-29', '3318090711130001', 'Surat Izin Usaha', 17),
(28, '474', '2021-03-29', '3318061606820005', 'Surat Pindah', 17),
(29, '145.1', '2021-03-30', '3318090711130001', 'Surat Keterangan', 17),
(30, '145.1', '2021-03-31', '3318061606820005', 'Surat Izin Usaha', 16);

--
-- Triggers `tbl_pengajuan_surat`
--
DELIMITER $$
CREATE TRIGGER `after_input_surat` AFTER INSERT ON `tbl_pengajuan_surat` FOR EACH ROW INSERT INTO `tbl_validasi` (`id_validasi`, `status_surat`, `tanggal`, `no_surat`) VALUES (NULL, 'Proses', CURRENT_DATE(), NEW.no_surat)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat`
--

CREATE TABLE `tbl_surat` (
  `kode_surat` varchar(11) NOT NULL,
  `nm_surat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_surat`
--

INSERT INTO `tbl_surat` (`kode_surat`, `nm_surat`) VALUES
('145.1', 'Surat Keterangan'),
('470', 'Surat Domisili'),
('474', 'Surat Pindah'),
('474.3', 'Surat Kematian'),
('503', 'Surat Izin Usaha');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_izin`
--

CREATE TABLE `tbl_surat_izin` (
  `no_surat` int(11) NOT NULL,
  `kode_surat` varchar(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nm_surat` varchar(20) NOT NULL,
  `nm_usaha` varchar(50) NOT NULL,
  `jenis_usaha` varchar(50) NOT NULL,
  `alamat_usaha` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_surat_izin`
--

INSERT INTO `tbl_surat_izin` (`no_surat`, `kode_surat`, `tanggal`, `nik`, `nm_surat`, `nm_usaha`, `jenis_usaha`, `alamat_usaha`, `keterangan`, `id_user`) VALUES
(10, '503', '2021-05-09', '6201021003970001', 'Surat Izin usaha', 'Dentis', 'Kesehatan', 'Temanggung', 'Orang tersebut diatas benar-benar mempunyai usaha :', 17),
(12, '503', '2021-05-27', '6201021003970003', 'Surat Izin usaha', 'Toko Bangunan', 'Jual Beli', 'jl.pangeran antasari no 1', 'Orang tersebut diatas benar-benar mempunyai usaha :', 16);

--
-- Triggers `tbl_surat_izin`
--
DELIMITER $$
CREATE TRIGGER `hapus_surat_izin` AFTER DELETE ON `tbl_surat_izin` FOR EACH ROW DELETE FROM tbl_validasi WHERE tbl_validasi.no_surat = OLD.no_surat
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_surat_izin` AFTER INSERT ON `tbl_surat_izin` FOR EACH ROW INSERT INTO `tbl_validasi` (`id_validasi`, `status_surat`, `tanggal`,`ket`, `no_surat`) VALUES (NULL, 'Proses', CURRENT_DATE(), 'Mohon Tunggu', NEW.no_surat)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_ket`
--

CREATE TABLE `tbl_surat_ket` (
  `no_surat` int(11) NOT NULL,
  `kode_surat` varchar(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nm_surat` varchar(20) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_surat_ket`
--

INSERT INTO `tbl_surat_ket` (`no_surat`, `kode_surat`, `tanggal`, `nik`, `nm_surat`, `keterangan`, `id_user`) VALUES
(23, '145.1', '2021-05-09', '6201021003970001', 'Surat Keterangan', 'Orang tersebut benar benar warga Desa Dukuhmulyo Kec. Jakenan Kab. Pati dan benar-benar berkelakuan baik', 17),
(24, '145.1', '2021-05-09', '6201021003970001', 'Surat Keterangan', 'Orang tersebut benar benar warga Desa Dukuhmulyo Kec. Jakenan Kab. Pati dan benar-benar berkelakuan baik', 17),
(25, '145.1', '2021-05-10', '6201021003970001', 'Surat Keterangan', 'Orang tersebut benar benar warga Desa Dukuhmulyo Kec. Jakenan Kab. Pati dan benar-benar berkelakuan baik', 17),
(26, '145.1', '2021-05-17', '3318090711130001', 'Surat Keterangan', 'Orang tersebut benar benar warga Desa Dukuhmulyo Kec. Jakenan Kab. Pati dan benar-benar berkelakuan baik', 17),
(27, '145.1', '2021-05-19', '6201021003970001', 'Surat Keterangan', 'Orang tersebut benar benar warga Desa Dukuhmulyo Kec. Jakenan Kab. Pati dan benar-benar berkelakuan baik', 17),
(28, '145.1', '2021-05-19', '6201021003970001', 'Surat Keterangan', 'Orang tersebut benar benar warga Desa Dukuhmulyo Kec. Jakenan Kab. Pati dan benar-benar berkelakuan baik', 17);

--
-- Triggers `tbl_surat_ket`
--
DELIMITER $$
CREATE TRIGGER `hapus_surat_ket` AFTER DELETE ON `tbl_surat_ket` FOR EACH ROW DELETE FROM tbl_validasi WHERE tbl_validasi.no_surat = OLD.no_surat
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_surat_ket` AFTER INSERT ON `tbl_surat_ket` FOR EACH ROW INSERT INTO `tbl_validasi` (`id_validasi`, `status_surat`, `tanggal`,`ket`, `no_surat`) VALUES (NULL, 'Proses', CURRENT_DATE(), 'Mohon Tunggu', NEW.no_surat)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_mati`
--

CREATE TABLE `tbl_surat_mati` (
  `no_surat` int(11) NOT NULL,
  `kode_surat` varchar(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nm_surat` varchar(20) NOT NULL,
  `hari_m` varchar(11) NOT NULL,
  `tgl_m` date NOT NULL,
  `sebab` varchar(25) NOT NULL,
  `alamat_m` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_surat_mati`
--

INSERT INTO `tbl_surat_mati` (`no_surat`, `kode_surat`, `tanggal`, `nik`, `nm_surat`, `hari_m`, `tgl_m`, `sebab`, `alamat_m`, `id_user`) VALUES
(11, '474.3', '2021-05-09', '6201021003970001', 'Surat Kematian', 'Selasa', '2021-05-09', 'Sakit', 'Jogja', 17),
(12, '474.3', '2021-05-19', '6201021003970002', 'Surat Kematian', 'Rabu', '2021-05-19', 'Sakit', 'Rumah Sakit', 17);

--
-- Triggers `tbl_surat_mati`
--
DELIMITER $$
CREATE TRIGGER `hapus_surat_mati` AFTER DELETE ON `tbl_surat_mati` FOR EACH ROW DELETE FROM tbl_validasi WHERE tbl_validasi.no_surat = OLD.no_surat
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_surat_mati` AFTER INSERT ON `tbl_surat_mati` FOR EACH ROW INSERT INTO `tbl_validasi` (`id_validasi`, `status_surat`, `tanggal`,`ket`, `no_surat`) VALUES (NULL, 'Proses', CURRENT_DATE(), 'Mohon Tunggu', NEW.no_surat)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_pindah`
--

CREATE TABLE `tbl_surat_pindah` (
  `no_surat` int(11) NOT NULL,
  `kode_surat` varchar(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nm_surat` varchar(20) NOT NULL,
  `alamat_baru` varchar(128) NOT NULL,
  `jml_kel` varchar(2) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_surat_pindah`
--

INSERT INTO `tbl_surat_pindah` (`no_surat`, `kode_surat`, `tanggal`, `nik`, `nm_surat`, `alamat_baru`, `jml_kel`, `id_user`) VALUES
(6, '474', '2021-05-09', '6201021003970001', 'Surat Pindah', 'Solo', '2', 17),
(7, '474', '2021-05-09', '6201021003970001', 'Surat Pindah', 'Jogja', '2', 17);

--
-- Triggers `tbl_surat_pindah`
--
DELIMITER $$
CREATE TRIGGER `hapus_surat_pindah` AFTER DELETE ON `tbl_surat_pindah` FOR EACH ROW DELETE FROM tbl_validasi WHERE tbl_validasi.no_surat = OLD.no_surat
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_surat_pindah` AFTER INSERT ON `tbl_surat_pindah` FOR EACH ROW INSERT INTO `tbl_validasi` (`id_validasi`, `status_surat`, `tanggal`,`ket`, `no_surat`) VALUES (NULL, 'Proses', CURRENT_DATE(), 'Mohon Tunggu', NEW.no_surat)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tindakan`
--

CREATE TABLE `tbl_tindakan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tindakan`
--

INSERT INTO `tbl_tindakan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`) VALUES
(10, 12, '2021-05-10', 'Oke, nanti akan dievakuasi'),
(12, 14, '2021-05-19', 'Terimakasih atas laporannya\r\nTim kami dan semua bantuan akan segera kami kerahkan dan siap untuk membantu dengan sepenuh hati\r\nMohon ditunggu dengan sabar dan tenang\r\nTerimakasih');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(16, 'Ahmad Gozali', 'ahmadmulti10@gmail.com', 'ahmad.jpg', '$2y$10$Fmo2bNuSxzLZ.EGzCKqxz.BCTMSRba60/HssUdwfWjf8IGaEXBMUm', 1, 1, 1616868383),
(17, 'Fadli Anjas', 'anjas@gmail.com', 'cwok.png', '$2y$10$gcxSfSHWjp1ne3/UybNpCuUx9Ofn4Fi7UZ7CHTnrdg3vmeBSiFovu', 2, 1, 1621218718),
(19, 'Dimas Ridho Amali', 'dimas@gmail.com', 'user.png', '$2y$10$7VkFqgKb8bKJH/2OTcl0ieKl5rLPplDe16V3WSvlRFqsrNhHXSy/u', 2, 0, 1621390635);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_validasi`
--

CREATE TABLE `tbl_validasi` (
  `id_validasi` int(11) NOT NULL,
  `status_surat` enum('Proses','Selesai','Ditolak','') NOT NULL,
  `tanggal` date NOT NULL,
  `ket` varchar(50) NOT NULL,
  `no_surat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_validasi`
--

INSERT INTO `tbl_validasi` (`id_validasi`, `status_surat`, `tanggal`, `ket`, `no_surat`) VALUES
(63, 'Ditolak', '2021-05-09', 'Mohon maaf data yang anda inputkan belum lengkap', 23),
(64, 'Selesai', '2021-05-09', 'Permohonan surat disetujui', 24),
(67, 'Ditolak', '2021-05-09', 'Mohon maaf data yang anda inputkan belum lengkap', 6),
(68, 'Selesai', '2021-05-09', 'Permohonan surat disetujui', 7),
(69, 'Selesai', '2021-05-10', 'Permohonan surat disetujui', 25),
(71, 'Ditolak', '2021-05-19', 'Mohon maaf data yang anda inputkan belum lengkap', 26),
(72, 'Ditolak', '2021-05-19', 'Mohon maaf data yang anda inputkan belum lengkap', 27),
(73, 'Selesai', '2021-05-19', 'Permohonan surat disetujui', 28),
(74, 'Selesai', '2021-05-27', 'Permohonan surat disetujui', 12),
(75, 'Selesai', '2021-05-27', 'Permohonan surat disetujui', 12);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Administrator'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `judul`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Home', 'user', 'fas fa-fw fa-home', 1),
(4, 1, 'Data Penduduk', 'penduduk', 'fas fa-fw fa-users', 1),
(5, 2, 'Profil', 'user/profil', 'fas fa-fw fa-user', 1),
(6, 2, 'Edit Profil', 'user/edit_user', 'fas fa-fw fa-user-edit', 1),
(7, 2, 'Pengajuan Surat', 'pengajuan_user', 'fas fa-fw fa-book', 1),
(9, 1, 'Kelola Informasi', 'informasi', 'fas fa-fw fa-info-circle', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_informasi`
--
ALTER TABLE `tbl_informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_pengajuan_surat`
--
ALTER TABLE `tbl_pengajuan_surat`
  ADD PRIMARY KEY (`no_surat`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  ADD PRIMARY KEY (`kode_surat`);

--
-- Indexes for table `tbl_surat_izin`
--
ALTER TABLE `tbl_surat_izin`
  ADD PRIMARY KEY (`no_surat`),
  ADD KEY `relasi_penduduk` (`nik`),
  ADD KEY `relasi_kode_surat` (`kode_surat`),
  ADD KEY `relasi_user` (`id_user`);

--
-- Indexes for table `tbl_surat_ket`
--
ALTER TABLE `tbl_surat_ket`
  ADD PRIMARY KEY (`no_surat`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `relasi_nik` (`nik`),
  ADD KEY `relasi_surat` (`kode_surat`);

--
-- Indexes for table `tbl_surat_mati`
--
ALTER TABLE `tbl_surat_mati`
  ADD PRIMARY KEY (`no_surat`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kode_surat` (`kode_surat`);

--
-- Indexes for table `tbl_surat_pindah`
--
ALTER TABLE `tbl_surat_pindah`
  ADD PRIMARY KEY (`no_surat`),
  ADD KEY `kode_surat` (`kode_surat`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `tbl_tindakan`
--
ALTER TABLE `tbl_tindakan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `tbl_tindakan_ibfk_1` (`id_pengaduan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `tbl_validasi`
--
ALTER TABLE `tbl_validasi`
  ADD PRIMARY KEY (`id_validasi`),
  ADD KEY `relasi_surat_mati` (`no_surat`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_informasi`
--
ALTER TABLE `tbl_informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_pengajuan_surat`
--
ALTER TABLE `tbl_pengajuan_surat`
  MODIFY `no_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_surat_izin`
--
ALTER TABLE `tbl_surat_izin`
  MODIFY `no_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_surat_ket`
--
ALTER TABLE `tbl_surat_ket`
  MODIFY `no_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_surat_mati`
--
ALTER TABLE `tbl_surat_mati`
  MODIFY `no_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_surat_pindah`
--
ALTER TABLE `tbl_surat_pindah`
  MODIFY `no_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_tindakan`
--
ALTER TABLE `tbl_tindakan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_validasi`
--
ALTER TABLE `tbl_validasi`
  MODIFY `id_validasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  ADD CONSTRAINT `tbl_pengaduan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);

--
-- Constraints for table `tbl_pengajuan_surat`
--
ALTER TABLE `tbl_pengajuan_surat`
  ADD CONSTRAINT `tbl_pengajuan_surat_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `tbl_penduduk` (`nik`),
  ADD CONSTRAINT `tbl_pengajuan_surat_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);

--
-- Constraints for table `tbl_surat_izin`
--
ALTER TABLE `tbl_surat_izin`
  ADD CONSTRAINT `relasi_kode_surat` FOREIGN KEY (`kode_surat`) REFERENCES `tbl_surat` (`kode_surat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_penduduk` FOREIGN KEY (`nik`) REFERENCES `tbl_penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_surat_ket`
--
ALTER TABLE `tbl_surat_ket`
  ADD CONSTRAINT `relasi_nik` FOREIGN KEY (`nik`) REFERENCES `tbl_penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_surat` FOREIGN KEY (`kode_surat`) REFERENCES `tbl_surat` (`kode_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_surat_mati`
--
ALTER TABLE `tbl_surat_mati`
  ADD CONSTRAINT `tbl_surat_mati_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tbl_penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_surat_mati_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_surat_mati_ibfk_3` FOREIGN KEY (`kode_surat`) REFERENCES `tbl_surat` (`kode_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_surat_pindah`
--
ALTER TABLE `tbl_surat_pindah`
  ADD CONSTRAINT `tbl_surat_pindah_ibfk_1` FOREIGN KEY (`kode_surat`) REFERENCES `tbl_surat` (`kode_surat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_surat_pindah_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_surat_pindah_ibfk_3` FOREIGN KEY (`nik`) REFERENCES `tbl_penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_tindakan`
--
ALTER TABLE `tbl_tindakan`
  ADD CONSTRAINT `tbl_tindakan_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `tbl_pengaduan` (`id_pengaduan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
