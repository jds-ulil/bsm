-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 15, 2014 at 08:39 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nasdo`
--

-- --------------------------------------------------------

--
-- Table structure for table `error_nasabah`
--

CREATE TABLE IF NOT EXISTS `error_nasabah` (
  `error_id` int(20) NOT NULL AUTO_INCREMENT,
  `jenis_error` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_proposal` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`error_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mtb_agama`
--

CREATE TABLE IF NOT EXISTS `mtb_agama` (
  `agama_id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`agama_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mtb_agama`
--

INSERT INTO `mtb_agama` (`agama_id`, `nama`) VALUES
(1, 'Islam'),
(2, 'Katholik'),
(3, 'Protestan'),
(4, 'Hindu'),
(5, 'Budha'),
(6, 'Konghuchu');

-- --------------------------------------------------------

--
-- Table structure for table `mtb_daftar_nasabah`
--

CREATE TABLE IF NOT EXISTS `mtb_daftar_nasabah` (
  `nasabah_id` int(10) NOT NULL AUTO_INCREMENT,
  `kartukeluarga_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  PRIMARY KEY (`nasabah_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `mtb_daftar_nasabah`
--

INSERT INTO `mtb_daftar_nasabah` (`nasabah_id`, `kartukeluarga_id`, `nama`, `alamat`, `status`) VALUES
(1, '35151', 'Ulil', 'Malang', 3),
(2, '351512', 'Coe Ing', 'Koto Gadang', 4),
(3, '351513', 'Bambang', 'Suko Lilo', 4),
(4, '351514', 'Jacko', 'Medan', 1),
(6, '351516', 'Sandra', 'Manado', 1),
(7, '351517', 'Dita', 'Kuala Namu', 1),
(8, '351518', 'Masa', 'Graha Bakti', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mtb_email_notif`
--

CREATE TABLE IF NOT EXISTS `mtb_email_notif` (
  `email_notif_id` int(2) NOT NULL,
  `nama` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`email_notif_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mtb_email_notif`
--

INSERT INTO `mtb_email_notif` (`email_notif_id`, `nama`) VALUES
(1, 'Semua (Email notifikasi saat input proposal, nasabah ditolak dan approval)'),
(2, 'Proposal (Email notifikasi saat input proposal)'),
(3, 'Approval (Email notifikasi saat proses approval)'),
(4, 'Nasabah Tolak (Email notifikasi saat input nasabah di tolak)'),
(5, 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `mtb_hak_akses`
--

CREATE TABLE IF NOT EXISTS `mtb_hak_akses` (
  `id_hak_akses` int(3) NOT NULL,
  `nama_hak_akses` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_hak_akses`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mtb_hak_akses`
--

INSERT INTO `mtb_hak_akses` (`id_hak_akses`, `nama_hak_akses`) VALUES
(1, 'Admin'),
(2, 'Approval'),
(3, 'Inputer'),
(4, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `mtb_jabatan`
--

CREATE TABLE IF NOT EXISTS `mtb_jabatan` (
  `id_jabatan` int(3) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `mtb_jabatan`
--

INSERT INTO `mtb_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(8, 'Branch Manager'),
(9, 'Sub Branch Manager'),
(10, 'Sales Assistant'),
(11, 'Ass. Analis Mikro'),
(12, 'Penaksir Gadai');

-- --------------------------------------------------------

--
-- Table structure for table `mtb_jenis_identitas`
--

CREATE TABLE IF NOT EXISTS `mtb_jenis_identitas` (
  `identitas_id` int(2) NOT NULL,
  `nama` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`identitas_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mtb_jenis_identitas`
--

INSERT INTO `mtb_jenis_identitas` (`identitas_id`, `nama`) VALUES
(1, 'KTP'),
(2, 'SIM'),
(3, 'Passport');

-- --------------------------------------------------------

--
-- Table structure for table `mtb_kolektabilitas`
--

CREATE TABLE IF NOT EXISTS `mtb_kolektabilitas` (
  `kolektabilitas_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`kolektabilitas_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `mtb_kolektabilitas`
--

INSERT INTO `mtb_kolektabilitas` (`kolektabilitas_id`, `nama`) VALUES
(1, 'Lancar'),
(5, 'Dalam Perhatian Khusus'),
(6, 'Kurang Lancar'),
(7, 'Diragukan'),
(8, 'Macet');

-- --------------------------------------------------------

--
-- Table structure for table `mtb_level_jabatan`
--

CREATE TABLE IF NOT EXISTS `mtb_level_jabatan` (
  `level_jabatan_id` int(3) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`level_jabatan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mtb_level_jabatan`
--

INSERT INTO `mtb_level_jabatan` (`level_jabatan_id`, `nama_jabatan`) VALUES
(1, 'Supervisor'),
(2, 'Officer'),
(3, 'Pelaksana');

-- --------------------------------------------------------

--
-- Table structure for table `mtb_list_email`
--

CREATE TABLE IF NOT EXISTS `mtb_list_email` (
  `id_list_email` int(10) NOT NULL AUTO_INCREMENT,
  `email_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nama_pengguna` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jabatan_id` int(3) DEFAULT NULL,
  `status` tinyint(2) NOT NULL,
  `NIP` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_list_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mtb_list_email`
--

INSERT INTO `mtb_list_email` (`id_list_email`, `email_address`, `nama_pengguna`, `jabatan_id`, `status`, `NIP`) VALUES
(3, 'rnur1780@bsm.co.id', 'Ridwan Nur', 9, 1, '047871780');

-- --------------------------------------------------------

--
-- Table structure for table `mtb_mailer`
--

CREATE TABLE IF NOT EXISTS `mtb_mailer` (
  `mail_id` int(1) NOT NULL,
  `host` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `port` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proposal_baru` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nasabah_tolak` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approval` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`mail_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mtb_mailer`
--

INSERT INTO `mtb_mailer` (`mail_id`, `host`, `nama`, `password`, `port`, `proposal_baru`, `nasabah_tolak`, `approval`) VALUES
(1, 'https://10.1.50.20', 'rnur1780@syariahmandiri.co.id', 'hasbunallah01', '443', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `mtb_pegawai`
--

CREATE TABLE IF NOT EXISTS `mtb_pegawai` (
  `pegawai_id` int(4) NOT NULL AUTO_INCREMENT,
  `no_urut` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NIP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jabatan` int(3) DEFAULT NULL,
  `no_handphone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_kerja` int(2) DEFAULT NULL,
  `email_atasan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level_jabatan` int(3) DEFAULT NULL,
  PRIMARY KEY (`pegawai_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `mtb_pegawai`
--

INSERT INTO `mtb_pegawai` (`pegawai_id`, `no_urut`, `nama`, `NIP`, `jabatan`, `no_handphone`, `email`, `unit_kerja`, `email_atasan`, `level_jabatan`) VALUES
(2, '01', 'Alhuda Djannis', '007270489', 8, '0816-1368853', 'alhuda@bsm.co.id', 2, 'ddurachman@bsm.co.id', 1),
(3, '02-a', 'Ridwan Nur', '047871780', 9, '0853-76102270', 'rnur1780@bsm.co.id', 3, 'alhuda@bsm.co.id', 2),
(4, '03', 'Silvany Riza', '118278205', 10, '0812-6524091', 'sriza@bsm.co.id', 3, 'rnur1780@bsm.co.id', 3),
(5, '04', 'Nicko Gemayel', '12345678', 10, '0852-71589848', 'ngemayel@bsm.co.id', 3, 'rnur1780@bsm.co.id', 3),
(6, '05', 'Andi Rachman Guci', '118478201', 10, '0813-74005586', 'arguci@bsm.co.id', 3, 'rnur1780@bsm.co.id', 3),
(7, '06', 'Maria Gunarti', '108676080', 11, '0813-74190906', 'mgunarti@bsm.co.id', 3, 'rnur1780@bsm.co.id', 3),
(8, '07', 'Ekko Febrian', '118678196', 12, '0823-8766616', 'efebrian@bsm.co.id', 3, 'rnur1780@bsm.co.id', 3),
(9, '1', 'Ulil', '123', 11, '', '', NULL, '', 1),
(10, '02-b', 'Ridwan Nur', '25041978', 9, '0853-76102270', 'drankoto25@gmail.com', 3, 'rnur1780@bsm.co.id', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mtb_segmen`
--

CREATE TABLE IF NOT EXISTS `mtb_segmen` (
  `segmen_id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`segmen_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `mtb_segmen`
--

INSERT INTO `mtb_segmen` (`segmen_id`, `nama`) VALUES
(1, 'Komersial'),
(4, 'Konsumer'),
(5, 'Small'),
(6, 'Mikro'),
(7, 'Gadai');

-- --------------------------------------------------------

--
-- Table structure for table `mtb_status_nasabah`
--

CREATE TABLE IF NOT EXISTS `mtb_status_nasabah` (
  `id_status` int(2) NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mtb_status_nasabah`
--

INSERT INTO `mtb_status_nasabah` (`id_status`, `nama_status`) VALUES
(1, 'Baru'),
(2, 'Ditolak'),
(3, 'Diterima'),
(4, 'Applied');

-- --------------------------------------------------------

--
-- Table structure for table `mtb_status_proposal`
--

CREATE TABLE IF NOT EXISTS `mtb_status_proposal` (
  `status_id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mtb_status_proposal`
--

INSERT INTO `mtb_status_proposal` (`status_id`, `nama`) VALUES
(1, 'Proposal'),
(2, 'Pengajuan Tolak'),
(3, 'Tolak');

-- --------------------------------------------------------

--
-- Table structure for table `mtb_unit_kerja`
--

CREATE TABLE IF NOT EXISTS `mtb_unit_kerja` (
  `unit_kerja_id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`unit_kerja_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mtb_unit_kerja`
--

INSERT INTO `mtb_unit_kerja` (`unit_kerja_id`, `nama`) VALUES
(2, 'KC Bukittinggi'),
(3, 'KCP Lubuk Sikaping');

-- --------------------------------------------------------

--
-- Table structure for table `mtb_user`
--

CREATE TABLE IF NOT EXISTS `mtb_user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jabatan_id` int(2) NOT NULL DEFAULT '0',
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `hak_akses` int(2) NOT NULL DEFAULT '0',
  `NIP` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_pegawai` int(5) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `mtb_user`
--

INSERT INTO `mtb_user` (`user_id`, `user_name`, `email_address`, `jabatan_id`, `password`, `hak_akses`, `NIP`, `id_pegawai`) VALUES
(1, 'ulil', 'a@b.com', 8, '$2a$13$q0pqVszYTYxzAghTY3PRCu5i9QdFnGXCZhlUthRS4iy4v.q7v/hsW', 1, '123', NULL),
(17, 'Ridwan Nur', 'drankoto25@gmail.com', 9, '$2a$13$FRDuSD/VE1XsaUsy.HTQS.UtNj3usc19odAaVjHxEg9NUoloyFMOO', 1, '25041978', 10),
(18, 'Silvany Riza', 'sriza@bsm.co.id', 10, '$2a$13$Uo0jLeKZHDE.nj20I8ek.eHY3LnPA7AofqRizMhGTCXiMyW2lmD2.', 3, '118278205', 4),
(19, 'Nicko Gemayel', 'ngemayel@bsm.co.id', 10, '$2a$13$Be0tgOAftUQLacG6unrEMOsxjPQRGRLUQdMhEMYGX0vki3HT8knDe', 3, '12345678', 5),
(20, 'Andi Rachman Guci', 'arguci@bsm.co.id', 10, '$2a$13$DdlP614yKtEiBxEUt58zeua8rpBKwp7q2hGuLFUmdhJdiMEO/zJKy', 3, '118478201', 6),
(21, 'Maria Gunarti', 'mgunarti@bsm.co.id', 11, '$2a$13$oBSujl4kcDfBOOWPlgTICeIWkovuPq9S/jukeRK15V1vvT5zmoxei', 3, '108676080', 7),
(22, 'Ekko Febrian', 'efebrian@bsm.co.id', 12, '$2a$13$s6/ZQirZwQwqXsQGY/WY5esXnUny6Miu791W4NRa6pB/UxT/QCRuS', 3, '118678196', 8),
(23, 'Ridwan Nur', 'rnur1780@bsm.co.id', 9, '$2a$13$IgZmSYkuJuWChakyvK6QAe3/GbH/5nR6U129R1W9RBi1UomqV0hwW', 2, '047871780', 3);

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE IF NOT EXISTS `proposal` (
  `proposal_id` int(10) NOT NULL AUTO_INCREMENT,
  `plafon` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `segmen` int(2) NOT NULL,
  `jenis_usaha` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marketing` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `no_kartu_keluarga` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `no_buku_nikah` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_ktp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `no_proposal` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_pengajuan` varchar(3) COLLATE utf8_unicode_ci DEFAULT '1',
  `jenis_nasabah` int(2) DEFAULT NULL,
  `existing_plafon` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `existing_os` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `existing_angsuran` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `existing_kolektabilitas` int(2) DEFAULT NULL,
  `referal_nama` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `referal_alamat` text COLLATE utf8_unicode_ci,
  `referal_telp` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `referal_sektor_usaha` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `referal_fasilitas` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `referal_kolektabilitas` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `del_flag` int(11) DEFAULT '0',
  `nama_nasabah` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis_identitas` int(2) DEFAULT NULL,
  `tanggal_kartu_keluarga` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`proposal_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`proposal_id`, `plafon`, `tanggal_pengajuan`, `segmen`, `jenis_usaha`, `marketing`, `no_kartu_keluarga`, `no_buku_nikah`, `no_ktp`, `no_proposal`, `status_pengajuan`, `jenis_nasabah`, `existing_plafon`, `existing_os`, `existing_angsuran`, `existing_kolektabilitas`, `referal_nama`, `referal_alamat`, `referal_telp`, `referal_sektor_usaha`, `referal_fasilitas`, `referal_kolektabilitas`, `del_flag`, `nama_nasabah`, `jenis_identitas`, `tanggal_kartu_keluarga`) VALUES
(1, '1200000', '2014-10-12', 1, 'Pertambangan', '7', '1222', '1222', '1241', '1', '1', 2, '120000', '34000', '12000', 1, '', '', '', '', '', '', 0, 'Jaka', 1, NULL),
(2, '', '2014-10-02', 5, '111', '7', '121', '', '121', '', '3', 1, '', '', '', NULL, '', '', '', '', '', '', 0, 'tes', 1, NULL),
(3, '', '2014-10-13', 1, '1', '7', '121', '', '1212', '', '1', 1, '', '', '', NULL, '', '', '', '', '', '', 0, '211', 1, NULL),
(4, '250000000', '2014-10-01', 4, 'Toko Elektronik', '4', '123456789-KK', '123456789-BK', '123456789A', '001', '1', 1, '', '', '', NULL, '', '', '', '', '', '', 0, 'Tuan A', 1, NULL),
(5, '275000000', '2014-10-01', 5, 'Dagang Kelontong', '4', '111111-KK', '111111-BN', '111111A', '002', '1', 1, '', '', '', NULL, '', '', '', '', '', '', 0, 'Tuan B', 1, NULL),
(6, '75000000', '2014-10-01', 6, 'Kelontong', '7', '222222-KK', '222222-BN', '222222A', '003', '1', 1, '', '', '', NULL, '', '', '', '', '', '', 0, 'Tuan C', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `proposal_buku_nikah`
--

CREATE TABLE IF NOT EXISTS `proposal_buku_nikah` (
  `proposal_id` int(5) DEFAULT NULL,
  `no_buku_nikah` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_buku_nikah` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proposal_buku_nikah`
--

INSERT INTO `proposal_buku_nikah` (`proposal_id`, `no_buku_nikah`, `tgl_buku_nikah`) VALUES
(1, '1222', '2014-10-29'),
(4, '123456789-BK', '1980-10-01'),
(5, '111111-BN', '1983-10-01'),
(6, '222222-BN', '2000-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `proposal_kartu_keluarga`
--

CREATE TABLE IF NOT EXISTS `proposal_kartu_keluarga` (
  `no_kartu_keluarga` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_ktp` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proposal_id` int(5) DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proposal_kartu_keluarga`
--

INSERT INTO `proposal_kartu_keluarga` (`no_kartu_keluarga`, `nama`, `tanggal_lahir`, `no_ktp`, `proposal_id`, `tempat_lahir`) VALUES
('1222', 'Tika', '2014-10-29', '12444', 1, 'Medan'),
('123456789-KK', 'Istri Tuan A', '1961-10-01', '123456789B', 4, 'Rao'),
('123456789-KK', 'Anak Tuan A', '1975-10-01', '123456789C', 4, 'Rao'),
('111111-KK', 'Anak Tuan B', '1985-10-01', '111111-B', 5, 'Rao'),
('222222-KK', 'Istri Tuan C', '1985-10-01', '222222-C', 6, 'rao');

-- --------------------------------------------------------

--
-- Table structure for table `proposal_ktp`
--

CREATE TABLE IF NOT EXISTS `proposal_ktp` (
  `proposal_ktp_id` int(50) NOT NULL AUTO_INCREMENT,
  `no_ktp` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text COLLATE utf8_unicode_ci,
  `agama` int(2) DEFAULT NULL,
  `status_perkawinan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kewarganegaraan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masa_berlaku` date DEFAULT NULL,
  `proposal_id` int(5) DEFAULT NULL,
  `desa` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`proposal_ktp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `proposal_ktp`
--

INSERT INTO `proposal_ktp` (`proposal_ktp_id`, `no_ktp`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `agama`, `status_perkawinan`, `pekerjaan`, `kewarganegaraan`, `masa_berlaku`, `proposal_id`, `desa`) VALUES
(1, '1241', 'Jakarta', '2014-10-13', '', 1, '', '', '', '2014-10-30', 1, ''),
(2, '121', '', '2014-10-02', '', 1, '', '', '', '2014-10-02', 2, ''),
(3, '1212', '', '2014-10-28', '', 1, '', '', '', '2014-10-29', 3, ''),
(4, '123456789A', 'Rao', '1960-10-01', 'Rao', 1, 'Kawin', 'Wiraswasta', 'Indonesia', '2015-10-01', 4, 'Rao'),
(5, '111111A', 'Rao', '1963-10-01', 'Rao', 1, 'Kawin', 'PNS', 'Indonesia', '2014-10-01', 5, 'Rao'),
(6, '222222A', 'Rao', '1990-10-01', 'Rao', 1, 'Kawin', 'Wiraswasta', 'Indonesia', '2015-10-01', 6, 'Rao');

-- --------------------------------------------------------

--
-- Table structure for table `tolak`
--

CREATE TABLE IF NOT EXISTS `tolak` (
  `tolak_id` int(20) NOT NULL AUTO_INCREMENT,
  `proposal_id` int(5) DEFAULT NULL,
  `tanggal_tolak` date DEFAULT NULL,
  `alasan_ditolak` text COLLATE utf8_unicode_ci,
  `tahap_penolakan` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`tolak_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tolak`
--

INSERT INTO `tolak` (`tolak_id`, `proposal_id`, `tanggal_tolak`, `alasan_ditolak`, `tahap_penolakan`) VALUES
(1, 2, '2014-10-14', '12', 'BI Checking');

-- --------------------------------------------------------

--
-- Table structure for table `tolak_tahapan`
--

CREATE TABLE IF NOT EXISTS `tolak_tahapan` (
  `tahapan_id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`tahapan_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tolak_tahapan`
--

INSERT INTO `tolak_tahapan` (`tahapan_id`, `nama`) VALUES
(1, 'BI Checking'),
(2, 'DHN BI'),
(3, 'Blacklist PPATK'),
(4, 'OTS Usaha'),
(5, 'OTS Agunan'),
(6, 'Komite'),
(7, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `vote_jawab`
--

CREATE TABLE IF NOT EXISTS `vote_jawab` (
  `id_jawab` int(5) NOT NULL AUTO_INCREMENT,
  `soal_id` int(3) DEFAULT NULL,
  `jawaban` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `id_pegawai` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `tanggal_vote` date DEFAULT NULL,
  PRIMARY KEY (`id_jawab`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=31 ;

--
-- Dumping data for table `vote_jawab`
--

INSERT INTO `vote_jawab` (`id_jawab`, `soal_id`, `jawaban`, `id_pegawai`, `tanggal_vote`) VALUES
(13, 1, 'Ya', '4', '2014-10-15'),
(14, 2, 'Ya', '4', '2014-10-15'),
(15, 3, 'Ya', '4', '2014-10-15'),
(16, 4, 'Ya', '4', '2014-10-15'),
(17, 5, 'Ya', '4', '2014-10-15'),
(18, 6, 'Ya', '4', '2014-10-15'),
(19, 1, 'Ya', '7', '2014-10-15'),
(20, 2, 'Tidak', '7', '2014-10-15'),
(21, 3, 'Tidak', '7', '2014-10-15'),
(22, 4, 'Ya', '7', '2014-10-15'),
(23, 5, 'Ya', '7', '2014-10-15'),
(24, 6, 'Ya', '7', '2014-10-15'),
(25, 1, 'Ya', '3', '2014-10-15'),
(26, 2, 'Ya', '3', '2014-10-15'),
(27, 3, 'Ya', '3', '2014-10-15'),
(28, 4, 'Ya', '3', '2014-10-15'),
(29, 5, 'Ya', '3', '2014-10-15'),
(30, 6, 'Ya', '3', '2014-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `vote_soal`
--

CREATE TABLE IF NOT EXISTS `vote_soal` (
  `id_soal` int(3) NOT NULL AUTO_INCREMENT,
  `soal` text COLLATE utf8_bin,
  `group_soal` int(3) DEFAULT NULL,
  `rank` int(3) DEFAULT NULL,
  `pilihan_jawaban` text COLLATE utf8_bin,
  PRIMARY KEY (`id_soal`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `vote_soal`
--

INSERT INTO `vote_soal` (`id_soal`, `soal`, `group_soal`, `rank`, `pilihan_jawaban`) VALUES
(1, 'Apakah Aplikasi membantu dalam melaksanakan proses pembiayaan sesuai ketentuan di BSM?', 1, 1, 'Ya,Tidak'),
(2, 'Apakah Aplikasi membantu dalam proses pemeriksaan internal di tahap investigasi pembiayaan?', 1, 2, 'Ya,Tidak'),
(3, 'Apakah aplikasi membantu Ka.Unit dalam pengambilan keputusan pembiayaan?\r\n', 1, 3, 'Ya,Tidak'),
(4, 'Apakah Aplikasi membantu dalam menghindari potensi pembiayaan bermasalah?', 1, 4, 'Ya,Tidak'),
(5, 'Apakah Aplikasi membantu Ka.Unit dalam mereview produktivitas marketing?', 1, 5, 'Ya,Tidak'),
(6, 'Apakah Aplikasi PENTING dalam memitigasi resiko dan penerapan prudensial banking?\r\n', 1, 6, 'Ya,Tidak');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
