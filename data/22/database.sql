-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 20, 2014 at 11:08 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `mtb_jabatan`
--

INSERT INTO `mtb_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(13, 'Administrator'),
(14, 'Branch Manager'),
(15, 'Sub Branch Manager'),
(16, 'Marketing Manager (MM)'),
(17, 'Area Sales Manager (ASM)'),
(18, 'Kepala Warung Mikro (KWM)'),
(19, 'Retail Banking Officer (RBO)'),
(20, 'Sales Assistant (SA)'),
(21, 'Asisten Analis Mikro (AAM)'),
(22, 'Pelaksana Penaksir Gadai (PPG)');

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
(4, 'rnur1780@bsm.co.id', 'Ridwan Nur', 15, 1, '047871780');

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
(1, 'ssl://smtp.gmail.com', 'drankoto25@gmail.com', 'rimbha02', '465', '0', '0', '0');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `mtb_pegawai`
--

INSERT INTO `mtb_pegawai` (`pegawai_id`, `no_urut`, `nama`, `NIP`, `jabatan`, `no_handphone`, `email`, `unit_kerja`, `email_atasan`, `level_jabatan`) VALUES
(2, '010', 'Alhuda Djannis', '007270489', 14, '0816-1368853', 'alhuda@bsm.co.id', 2, 'ddurachman@bsm.co.id', 1),
(3, '011', 'Ridwan Nur', '047871780', 15, '0853-76102270', 'rnur1780@bsm.co.id', 3, 'alhuda@bsm.co.id', 2),
(4, '020', 'Silvany Riza', '118278205', 20, '0812-6524091', 'sriza@bsm.co.id', 3, 'rnur1780@bsm.co.id', 3),
(5, '021', 'Nicko Gemayel', '148713908', 20, '0852-71589848', 'ngemayel@bsm.co.id', 3, 'rnur1780@bsm.co.id', 3),
(6, '022', 'Andi Rachman Guci', '118478201', 20, '0813-74005586', 'arguci@bsm.co.id', 3, 'rnur1780@bsm.co.id', 3),
(7, '023', 'Maria Gunarti', '108676080', 21, '0813-74190906', 'mgunarti@bsm.co.id', 3, 'rnur1780@bsm.co.id', 3),
(8, '024', 'Ekko Febrian', '118678196', 22, '0823-8766616', 'efebrian@bsm.co.id', 3, 'rnur1780@bsm.co.id', 3),
(9, '002', 'Ulil', '123', 11, '', '', NULL, '', 1),
(11, '001', 'ERRI', '76102270', 13, '0853-76102270', 'drankoto25@gmail.com', 3, 'rnur1780@bsm.co.id', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `mtb_unit_kerja`
--

INSERT INTO `mtb_unit_kerja` (`unit_kerja_id`, `nama`) VALUES
(2, 'KC Bukittinggi'),
(3, 'KCP Lubuk Sikaping'),
(4, 'KCP Padang Panjang'),
(5, 'KCP Pasaman Barat'),
(6, 'KCP Lubuk Basung'),
(7, 'KCP Batusangkar'),
(8, 'KCP Pasar Aur'),
(9, 'KCP Sawahlunto');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `mtb_user`
--

INSERT INTO `mtb_user` (`user_id`, `user_name`, `email_address`, `jabatan_id`, `password`, `hak_akses`, `NIP`, `id_pegawai`) VALUES
(25, 'ERRI', 'drankoto25@gmail.com', 13, '$2a$13$tjTeUFOupQIhIImk7sDaUuKY3WB4lKpOLlACmSwF4e5OHN8s6lWvC', 1, '76102270', 11),
(26, 'Silvany Riza', 'sriza@bsm.co.id', 20, '$2a$13$OH7kFE7XhPWcRJkeBIqQH.cWah8e4Dx4SvYRwykQ0Qc8lRO1ZuY0m', 3, '118278205', 4),
(27, 'Nicko Gemayel', 'ngemayel@bsm.co.id', 20, '$2a$13$d/U.shgYagOxMScEJ1kJke/0IeWJgFYkWO.A7knAmBrFeldPqtwju', 3, '148713908', 5),
(28, 'Maria Gunarti', 'mgunarti@bsm.co.id', 21, '$2a$13$yB8MdwM5o1jF7NCmov/LPOuNQbSMjqhXNKqjaYiNnXdWpEoJkOkm2', 3, '108676080', 7),
(29, 'Ekko Febrian', 'efebrian@bsm.co.id', 22, '$2a$13$q.7/cSAbBFAC2tRddbtbt.x4wrSqNhr1kMPfx4fGr/81SMUzPzeVq', 3, '118678196', 8),
(30, 'Ridwan Nur', 'rnur1780@bsm.co.id', 15, '$2a$13$6A3J6tEhVRZgUTR36Qa9POEHJ7LcOqcwB1xlHo87t2CSTxZv4SiUG', 2, '047871780', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pelunasan`
--

CREATE TABLE IF NOT EXISTS `pelunasan` (
  `pelunasan_id` int(10) NOT NULL AUTO_INCREMENT,
  `tanggal_pelunasan` date DEFAULT NULL,
  `penyebab` text COLLATE utf8_bin,
  `segmen` int(2) DEFAULT NULL,
  `jenis_usaha` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `nama_nasabah` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `no_CIF` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `no_rekening` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `plafon_awal` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `OS_pokok_terakhir` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `angsuran` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `kolektibilitas_terakhir` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `alamat_nasabah` text COLLATE utf8_bin,
  `jenis_pembiayaan` int(2) DEFAULT NULL,
  `margin` varchar(8) COLLATE utf8_bin DEFAULT NULL,
  `tunggakan_terakhir` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `status_pelunasan` varchar(2) COLLATE utf8_bin DEFAULT '1',
  PRIMARY KEY (`pelunasan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pelunasan`
--

INSERT INTO `pelunasan` (`pelunasan_id`, `tanggal_pelunasan`, `penyebab`, `segmen`, `jenis_usaha`, `nama_nasabah`, `no_CIF`, `no_rekening`, `plafon_awal`, `OS_pokok_terakhir`, `angsuran`, `kolektibilitas_terakhir`, `alamat_nasabah`, `jenis_pembiayaan`, `margin`, `tunggakan_terakhir`, `status_pelunasan`) VALUES
(2, '2014-10-01', 'tess Lain-lain', 4, '', 'Jaka', '11111111', '1111111111', '11', '111.111', '1.111', '6', '', 3, '', '', '1'),
(3, '2014-10-01', 'Penjualan Agunan', 4, '', 'Testing', '', '1212121111', '', '', '', '', 'Makasar', 3, '', '', '1'),
(4, '2014-10-20', 'Lainya', 5, 'Pertambangan', 'Ukaka', '1422412', '342222113', '2000000', '950000', '300000', '6', 'Papuaa', 2, '95.9', '400000', '3'),
(5, '2014-10-20', 'Pasca Restrukturisasi', 4, 'Bengkel Ban', 'Tuan G', '77877767', '7064311764', '150000000', '75000000', '1500000', '5', 'Panti', 1, '15', '25000000', '3');

-- --------------------------------------------------------

--
-- Table structure for table `pelunasan_jenis_pembiayaan`
--

CREATE TABLE IF NOT EXISTS `pelunasan_jenis_pembiayaan` (
  `pembiayaan_id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`pembiayaan_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pelunasan_jenis_pembiayaan`
--

INSERT INTO `pelunasan_jenis_pembiayaan` (`pembiayaan_id`, `nama`) VALUES
(1, 'Murabahah'),
(2, 'Salam'),
(3, 'Istishna'),
(4, 'Qardh'),
(5, 'Musyarakah'),
(6, 'Mudharabah'),
(7, 'Ijarah');

-- --------------------------------------------------------

--
-- Table structure for table `pelunasan_sebab`
--

CREATE TABLE IF NOT EXISTS `pelunasan_sebab` (
  `id_sebab` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_sebab`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pelunasan_sebab`
--

INSERT INTO `pelunasan_sebab` (`id_sebab`, `nama`) VALUES
(1, 'Write Off'),
(2, 'Pasca Restrukturisasi'),
(3, 'Penjualan Agunan'),
(4, 'Lelang Agunan'),
(5, 'Litigasi'),
(6, 'Lain-lain');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`proposal_id`, `plafon`, `tanggal_pengajuan`, `segmen`, `jenis_usaha`, `marketing`, `no_kartu_keluarga`, `no_buku_nikah`, `no_ktp`, `no_proposal`, `status_pengajuan`, `jenis_nasabah`, `existing_plafon`, `existing_os`, `existing_angsuran`, `existing_kolektabilitas`, `referal_nama`, `referal_alamat`, `referal_telp`, `referal_sektor_usaha`, `referal_fasilitas`, `referal_kolektabilitas`, `del_flag`, `nama_nasabah`, `jenis_identitas`, `tanggal_kartu_keluarga`) VALUES
(7, '', '2014-10-18', 1, 'Pertambangan`', '10', '1221', '', '1211', '0001/10/2014', '1', 1, '', '', '', NULL, '', '', '', '', '', '', 0, 'tuan C', 1, NULL),
(4, '250000000', '2014-10-01', 4, 'Toko Elektronik', '4', '123456789-KK', '123456789-BK', '123456789A', '001', '3', 1, '', '', '', NULL, '', '', '', '', '', '', 0, 'Tuan A', 1, NULL),
(5, '275000000', '2014-10-01', 5, 'Dagang Kelontong', '4', '111111-KK', '111111-BN', '111111A', '002', '1', 1, '', '', '', NULL, '', '', '', '', '', '', 0, 'Tuan B', 1, NULL),
(6, '75000000', '2014-10-01', 6, 'Kelontong', '7', '222222-KK', '222222-BN', '222222A', '003', '1', 1, '', '', '', NULL, '', '', '', '', '', '', 0, 'Tuan C', 1, NULL),
(8, '', '2014-10-22', 4, 're', '10', '1212121', '', '122', '0002/10/2014', '3', 1, '', '', '', NULL, '', '', '', '', '', '', 0, 'tuanD', 1, '2014-10-21'),
(9, '121', '2014-10-18', 6, 'js', '10', '1221', '', '123', '0003/10/2014', '1', 1, '', '', '', NULL, '', '', '', '', '', '', 0, 'Ulil', 1, '2014-10-22'),
(10, '150000000', '2014-10-17', 4, 'Elektronik', '4', 'KK-E', 'BK-E', '111111111-E', '0004/10/2014', '1', 2, '150000000', '75000000', '1500000', 1, '', '', '', '', '', '', 0, 'Tuan E', 1, '1980-10-13'),
(11, '500000000', '2014-10-20', 5, 'Heler', '4', 'KK-F1', 'BK-F1', '1111111-F', '0005/10/2014', '1', 3, '', '', '', NULL, 'Zaki', 'Rao', '0853111111', 'Bengkel Ban', '250000000', '5', 0, 'Tuan F', 1, '1982-10-22'),
(14, '150000000', '2014-10-20', 5, 'Toko Kue', '4', '123456789-KK', '123456789-BK', '123456789', '0006/10/2014', '1', 1, '', '', '', NULL, '', '', '', '', '', '', 0, 'Istri Tuan A', 1, '1980-11-01');

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
(4, '123456789-BK', '1980-10-01'),
(5, '111111-BN', '1983-10-01'),
(6, '222222-BN', '2000-10-01'),
(10, 'BK-E', '1980-10-13'),
(11, 'BK-F1', '1981-10-22'),
(14, '123456789-BK', '1980-10-01');

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
('123456789-KK', 'Istri Tuan A', '1961-10-01', '123456789B', 4, 'Rao'),
('123456789-KK', 'Anak Tuan A', '1975-10-01', '123456789C', 4, 'Rao'),
('111111-KK', 'Anak Tuan B', '1985-10-01', '111111-B', 5, 'Rao'),
('222222-KK', 'Istri Tuan C', '1985-10-01', '222222-C', 6, 'rao'),
('KK-E', 'Istri Tuan E', '1960-11-13', '22222222-E', 10, 'Panti'),
('KK-E', 'Anak Tuan E', '1981-10-13', '33333333-E', 10, 'Panti'),
('KK-F1', 'Istri Tuan F', '1960-10-22', '22222222-F', 11, 'Rao');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `proposal_ktp`
--

INSERT INTO `proposal_ktp` (`proposal_ktp_id`, `no_ktp`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `agama`, `status_perkawinan`, `pekerjaan`, `kewarganegaraan`, `masa_berlaku`, `proposal_id`, `desa`) VALUES
(7, '1211', '', '2014-10-10', '', 1, 'Tidak Kawin', '', '', '2014-10-15', 7, ''),
(4, '123456789A', 'Rao', '1960-10-01', 'Rao', 1, 'Kawin', 'Wiraswasta', 'Indonesia', '2015-10-01', 4, 'Rao'),
(5, '111111A', 'Rao', '1963-10-01', 'Rao', 1, 'Kawin', 'PNS', 'Indonesia', '2014-10-01', 5, 'Rao'),
(6, '222222A', 'Rao', '1990-10-01', 'Rao', 1, 'Kawin', 'Wiraswasta', 'Indonesia', '2015-10-01', 6, 'Rao'),
(8, '122', '', '2014-10-10', '', 1, 'Tidak Kawin', '', '', '2014-10-09', 8, ''),
(9, '123', '', '2014-10-10', '', 1, 'Tidak Kawin', '', '', '2014-10-09', 9, ''),
(10, '111111111-E', 'Panti', '1960-10-13', 'Panti', 1, 'Kawin', 'Pedagang', 'Indonesia', '2015-10-13', 10, 'Panti'),
(11, '1111111-F', 'Panti', '1959-10-22', 'rao', 1, 'Kawin', 'Pedagang', 'Indonesia', '2015-10-22', 11, 'Rao'),
(14, '123456789', 'Rao', '1961-10-01', 'Rao', 1, 'Kawin', 'Pedagang', 'Indonesia', '2015-10-01', 14, 'Rao');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tolak`
--

INSERT INTO `tolak` (`tolak_id`, `proposal_id`, `tanggal_tolak`, `alasan_ditolak`, `tahap_penolakan`) VALUES
(3, 8, '2014-10-01', 'fd', 'OTS Usaha'),
(4, 4, '2014-10-20', 'Kol.5 di Bank Lain', 'BI Checking');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=25 ;

--
-- Dumping data for table `vote_jawab`
--

INSERT INTO `vote_jawab` (`id_jawab`, `soal_id`, `jawaban`, `id_pegawai`, `tanggal_vote`) VALUES
(1, 1, 'Tidak Penting', '10', '2014-10-17'),
(2, 2, 'Penting', '10', '2014-10-17'),
(3, 3, 'Tidak Penting', '10', '2014-10-17'),
(4, 4, 'Cukup Penting', '10', '2014-10-17'),
(5, 5, 'Tidak Penting', '10', '2014-10-17'),
(6, 6, 'Sangat Penting', '10', '2014-10-17'),
(7, 1, 'Tidak Penting', '4', '2014-10-17'),
(8, 2, 'Tidak Penting', '4', '2014-10-17'),
(9, 3, 'Cukup Penting', '4', '2014-10-17'),
(10, 4, 'Penting', '4', '2014-10-17'),
(11, 5, 'Penting', '4', '2014-10-17'),
(12, 6, 'Tidak Penting', '4', '2014-10-17'),
(13, 1, 'Tidak Penting', '3', '2014-10-17'),
(14, 2, 'Cukup Penting', '3', '2014-10-17'),
(15, 3, 'Tidak Penting', '3', '2014-10-17'),
(16, 4, 'Tidak Penting', '3', '2014-10-17'),
(17, 5, 'Cukup Penting', '3', '2014-10-17'),
(18, 6, 'Penting', '3', '2014-10-17'),
(19, 1, 'Sangat Penting ', '10', '2014-10-18'),
(20, 2, 'Sangat Penting', '10', '2014-10-18'),
(21, 3, 'Tidak Penting', '10', '2014-10-18'),
(22, 4, 'Penting', '10', '2014-10-18'),
(23, 5, 'Cukup Penting', '10', '2014-10-18'),
(24, 6, 'Cukup Penting', '10', '2014-10-18');

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
(1, 'Apakah Aplikasi membantu dalam melaksanakan proses pembiayaan sesuai ketentuan di BSM?', 1, 1, 'Tidak Penting,Cukup Penting,Penting,Sangat Penting '),
(2, 'Apakah Aplikasi membantu dalam proses pemeriksaan internal di tahap investigasi pembiayaan?', 1, 2, 'Tidak Penting,Cukup Penting,Penting,Sangat Penting'),
(3, 'Apakah aplikasi membantu Ka.Unit dalam pengambilan keputusan pembiayaan?\r\n', 1, 3, 'Tidak Penting,Cukup Penting,Penting,Sangat Penting'),
(4, 'Apakah Aplikasi membantu dalam menghindari potensi pembiayaan bermasalah?', 1, 4, 'Tidak Penting,Cukup Penting,Penting,Sangat Penting'),
(5, 'Apakah Aplikasi membantu Ka.Unit dalam mereview produktivitas marketing?', 1, 5, 'Tidak Penting,Cukup Penting,Penting,Sangat Penting'),
(6, 'Apakah Aplikasi PENTING dalam memitigasi resiko dan penerapan prudensial banking?\r\n', 1, 6, 'Tidak Penting,Cukup Penting,Penting,Sangat Penting');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
