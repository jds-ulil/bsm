/*
SQLyog Ultimate v9.63 
MySQL - 5.5.27 : Database - nasdo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`nasdo` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE `nasdo`;

/*Table structure for table `error_nasabah` */

DROP TABLE IF EXISTS `error_nasabah`;

CREATE TABLE `error_nasabah` (
  `error_id` int(20) NOT NULL AUTO_INCREMENT,
  `jenis_error` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_proposal` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`error_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `error_nasabah` */

/*Table structure for table `mtb_agama` */

DROP TABLE IF EXISTS `mtb_agama`;

CREATE TABLE `mtb_agama` (
  `agama_id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`agama_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `mtb_agama` */

insert  into `mtb_agama`(`agama_id`,`nama`) values (1,'Islam'),(2,'Katholik'),(3,'Protestan'),(4,'Hindu'),(5,'Budha'),(6,'Konghuchu');

/*Table structure for table `mtb_email_notif` */

DROP TABLE IF EXISTS `mtb_email_notif`;

CREATE TABLE `mtb_email_notif` (
  `email_notif_id` int(2) NOT NULL,
  `nama` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`email_notif_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `mtb_email_notif` */

insert  into `mtb_email_notif`(`email_notif_id`,`nama`) values (1,'Semua (Email notifikasi saat input proposal, nasabah ditolak dan approval)'),(2,'Proposal (Email notifikasi saat input proposal)'),(3,'Approval (Email notifikasi saat proses approval)'),(4,'Nasabah Tolak (Email notifikasi saat input nasabah di tolak)'),(5,'Tidak Aktif');

/*Table structure for table `mtb_hak_akses` */

DROP TABLE IF EXISTS `mtb_hak_akses`;

CREATE TABLE `mtb_hak_akses` (
  `id_hak_akses` int(3) NOT NULL,
  `nama_hak_akses` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_hak_akses`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `mtb_hak_akses` */

insert  into `mtb_hak_akses`(`id_hak_akses`,`nama_hak_akses`) values (1,'Admin'),(2,'Approval'),(3,'Inputer'),(4,'User');

/*Table structure for table `mtb_jabatan` */

DROP TABLE IF EXISTS `mtb_jabatan`;

CREATE TABLE `mtb_jabatan` (
  `id_jabatan` int(3) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `mtb_jabatan` */

insert  into `mtb_jabatan`(`id_jabatan`,`nama_jabatan`) values (8,'Branch Manager'),(9,'Sub Branch Manager'),(13,'Manager Marketing (MM)'),(14,'Area Sales Manager (ASM)'),(15,'Kepala Warung Mikro (KWM)'),(16,'Retail Banking Officer (RBO)'),(19,'Officer Gadai (OG)'),(20,'Sales Assistant (SA)'),(21,'Asisten Analis Mikro (AAM)'),(22,'Pelaksana Penaksir Gadai (PPG)');

/*Table structure for table `mtb_jenis_identitas` */

DROP TABLE IF EXISTS `mtb_jenis_identitas`;

CREATE TABLE `mtb_jenis_identitas` (
  `identitas_id` int(2) NOT NULL,
  `nama` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`identitas_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `mtb_jenis_identitas` */

insert  into `mtb_jenis_identitas`(`identitas_id`,`nama`) values (1,'KTP'),(2,'SIM'),(3,'Passport');

/*Table structure for table `mtb_kolektabilitas` */

DROP TABLE IF EXISTS `mtb_kolektabilitas`;

CREATE TABLE `mtb_kolektabilitas` (
  `kolektabilitas_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`kolektabilitas_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `mtb_kolektabilitas` */

insert  into `mtb_kolektabilitas`(`kolektabilitas_id`,`nama`) values (1,'Lancar'),(5,'Dalam Perhatian Khusus'),(6,'Kurang Lancar'),(7,'Diragukan'),(8,'Macet');

/*Table structure for table `mtb_level_jabatan` */

DROP TABLE IF EXISTS `mtb_level_jabatan`;

CREATE TABLE `mtb_level_jabatan` (
  `level_jabatan_id` int(3) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`level_jabatan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `mtb_level_jabatan` */

insert  into `mtb_level_jabatan`(`level_jabatan_id`,`nama_jabatan`) values (1,'Admin'),(2,'Supervisor'),(3,'Pelaksana');

/*Table structure for table `mtb_list_email` */

DROP TABLE IF EXISTS `mtb_list_email`;

CREATE TABLE `mtb_list_email` (
  `id_list_email` int(10) NOT NULL AUTO_INCREMENT,
  `email_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nama_pengguna` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jabatan_id` int(3) DEFAULT NULL,
  `status` tinyint(2) NOT NULL,
  `NIP` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_list_email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `mtb_list_email` */

insert  into `mtb_list_email`(`id_list_email`,`email_address`,`nama_pengguna`,`jabatan_id`,`status`,`NIP`) values (4,'rnur1780@bsm.co.id','Ridwan Nur',9,1,'047871780');

/*Table structure for table `mtb_mailer` */

DROP TABLE IF EXISTS `mtb_mailer`;

CREATE TABLE `mtb_mailer` (
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

/*Data for the table `mtb_mailer` */

insert  into `mtb_mailer`(`mail_id`,`host`,`nama`,`password`,`port`,`proposal_baru`,`nasabah_tolak`,`approval`) values (1,'mail.syariahmandiri.co.id','rnur1780@syariahmandiri.co.id','hasbunallah01','443','0','0','0');

/*Table structure for table `mtb_pegawai` */

DROP TABLE IF EXISTS `mtb_pegawai`;

CREATE TABLE `mtb_pegawai` (
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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `mtb_pegawai` */

insert  into `mtb_pegawai`(`pegawai_id`,`no_urut`,`nama`,`NIP`,`jabatan`,`no_handphone`,`email`,`unit_kerja`,`email_atasan`,`level_jabatan`) values (16,'032','Maria Gunarti','108676080',21,'0813-74190906','mgunarti@bsm.co.id',3,'rnur1780@bsm.co.id',3),(15,'031','Nicko Gemayel','148713908',20,'0852-71589848','ngemayel@bsm.co.id',3,'rnur1780@bsm.co.id',3),(14,'030','Silvany Riza','118278205',20,'0812-6524091','sriza@bsm.co.id',3,'rnur1780@bsm.co.id',3),(13,'011','Ridwan Nur','047871780',9,'0852-76102270','rnur1780@bsm.co.id',3,'alhuda@bsm.co.id',2),(12,'010','Alhuda Djannis','007270489',8,'0816-1368853','alhuda@bsm.co.id',2,'ddurachman@bsm.co.id',2),(11,'001','Administrator','76102270',9,'0853-76102270','drankoto25@gmail.com',3,'rnur1780@bsm.co.id',1);

/*Table structure for table `mtb_segmen` */

DROP TABLE IF EXISTS `mtb_segmen`;

CREATE TABLE `mtb_segmen` (
  `segmen_id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`segmen_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `mtb_segmen` */

insert  into `mtb_segmen`(`segmen_id`,`nama`) values (1,'Komersial'),(4,'Konsumer'),(5,'Small'),(6,'Mikro'),(7,'Gadai');

/*Table structure for table `mtb_status_nasabah` */

DROP TABLE IF EXISTS `mtb_status_nasabah`;

CREATE TABLE `mtb_status_nasabah` (
  `id_status` int(2) NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `mtb_status_nasabah` */

insert  into `mtb_status_nasabah`(`id_status`,`nama_status`) values (1,'Baru'),(2,'Ditolak'),(3,'Diterima'),(4,'Applied');

/*Table structure for table `mtb_status_proposal` */

DROP TABLE IF EXISTS `mtb_status_proposal`;

CREATE TABLE `mtb_status_proposal` (
  `status_id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `mtb_status_proposal` */

insert  into `mtb_status_proposal`(`status_id`,`nama`) values (1,'Proposal'),(2,'Pengajuan Tolak'),(3,'Tolak');

/*Table structure for table `mtb_unit_kerja` */

DROP TABLE IF EXISTS `mtb_unit_kerja`;

CREATE TABLE `mtb_unit_kerja` (
  `unit_kerja_id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`unit_kerja_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `mtb_unit_kerja` */

insert  into `mtb_unit_kerja`(`unit_kerja_id`,`nama`) values (2,'KC Bukittinggi'),(3,'KCP Lubuk Sikaping'),(4,'KCP Padang Panjang'),(5,'KCP Pasaman Barat'),(6,'KCP Lubuk Basung'),(7,'KCP Batusangkar'),(8,'KCP Pasar Aur'),(9,'KCP Sawahlunto');

/*Table structure for table `mtb_user` */

DROP TABLE IF EXISTS `mtb_user`;

CREATE TABLE `mtb_user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jabatan_id` int(2) NOT NULL DEFAULT '0',
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `hak_akses` int(2) NOT NULL DEFAULT '0',
  `NIP` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_pegawai` int(5) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `mtb_user` */

insert  into `mtb_user`(`user_id`,`user_name`,`email_address`,`jabatan_id`,`password`,`hak_akses`,`NIP`,`id_pegawai`) values (25,'Silvany Riza','sriza@bsm.co.id',20,'$2a$13$ZpEVPaz3OV2ks3AbHHQHvujkmxnroRMsFM9r0gDGewjIvFJaLyFSq',1,'118278205',14),(26,'Nicko Gemayel','ngemayel@bsm.co.id',20,'$2a$13$ce.cboX9jbVNd2T2fv8pbOSa2cuY6jM8Gzd45DYU2JjVu49ZEi60G',3,'148713908',15),(27,'Maria Gunarti','mgunarti@bsm.co.id',21,'$2a$13$rrSQT8Io7Oee4Nf81Y2v0.qAe2uVT97Rs//mn/nM9zV2w0Z8hF6Ce',3,'108676080',16),(28,'Alhuda Djannis','alhuda@bsm.co.id',8,'$2a$13$lzu2Wrp84b3mBpbt884jpOXnPv5egkZIUWACjz6bf3F8vH9RWQ.Vu',2,'007270489',12),(29,'Ridwan Nur','rnur1780@bsm.co.id',9,'$2a$13$ItTVNFqT8IMemrgSITnnIuqo4SZovc9wleKxuRoi3hB2skCYsiH8K',2,'047871780',13),(30,'Administrator','drankoto25@gmail.com',9,'$2a$13$QxQ/Tw4kdL8XlFVyqsU8BuXnSUCnlv4931JJdHxx.nLlmZceYefZ.',1,'76102270',11);

/*Table structure for table `pelunasan` */

DROP TABLE IF EXISTS `pelunasan`;

CREATE TABLE `pelunasan` (
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
  `marketing` varchar(5) COLLATE utf8_bin DEFAULT '10',
  PRIMARY KEY (`pelunasan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `pelunasan` */

insert  into `pelunasan`(`pelunasan_id`,`tanggal_pelunasan`,`penyebab`,`segmen`,`jenis_usaha`,`nama_nasabah`,`no_CIF`,`no_rekening`,`plafon_awal`,`OS_pokok_terakhir`,`angsuran`,`kolektibilitas_terakhir`,`alamat_nasabah`,`jenis_pembiayaan`,`margin`,`tunggakan_terakhir`,`status_pelunasan`,`marketing`) values (1,'2014-10-27','Pasca Restrukturisasi',6,'Furniture','Basrun','76756155','76756155','100000000','55000000','1570000','5','Lubuk Sikaping',1,'14','15000000','3','14');

/*Table structure for table `pelunasan_jenis_pembiayaan` */

DROP TABLE IF EXISTS `pelunasan_jenis_pembiayaan`;

CREATE TABLE `pelunasan_jenis_pembiayaan` (
  `pembiayaan_id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`pembiayaan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pelunasan_jenis_pembiayaan` */

insert  into `pelunasan_jenis_pembiayaan`(`pembiayaan_id`,`nama`) values (1,'Murabahah'),(2,'Salam'),(3,'Istishna'),(4,'Qardh'),(5,'Musyarakah'),(6,'Mudharabah'),(7,'Ijarah');

/*Table structure for table `pelunasan_sebab` */

DROP TABLE IF EXISTS `pelunasan_sebab`;

CREATE TABLE `pelunasan_sebab` (
  `id_sebab` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_sebab`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `pelunasan_sebab` */

insert  into `pelunasan_sebab`(`id_sebab`,`nama`) values (1,'Write Off'),(2,'Pasca Restrukturisasi'),(3,'Penjualan Agunan'),(4,'Lelang Agunan'),(5,'Litigasi'),(6,'Lain-lain');

/*Table structure for table `proposal` */

DROP TABLE IF EXISTS `proposal`;

CREATE TABLE `proposal` (
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `proposal` */

insert  into `proposal`(`proposal_id`,`plafon`,`tanggal_pengajuan`,`segmen`,`jenis_usaha`,`marketing`,`no_kartu_keluarga`,`no_buku_nikah`,`no_ktp`,`no_proposal`,`status_pengajuan`,`jenis_nasabah`,`existing_plafon`,`existing_os`,`existing_angsuran`,`existing_kolektabilitas`,`referal_nama`,`referal_alamat`,`referal_telp`,`referal_sektor_usaha`,`referal_fasilitas`,`referal_kolektabilitas`,`del_flag`,`nama_nasabah`,`jenis_identitas`,`tanggal_kartu_keluarga`) values (1,'750000000','2014-10-02',5,'Developer','14','AAAAAA-KK','AAAAAA-BN','AAAAAA-KTP','0001/10/2014','3',1,'','','',NULL,'','','','','','',0,'Tuan A',1,'1980-11-07'),(2,'250000000','2014-10-09',4,'PNS','14','BBBBBB-KK','','BBBBBB-KTP','0002/10/2014','3',2,'250000000','200000000','1500000',1,'','','','','','',0,'Tuan B',1,'2014-10-19'),(3,'85000000','2014-10-20',6,'Toko Kelontong','16','CCCCCC-KK','CCCCCC=BN','CCCCCC-KTP','0003/10/2014','1',3,'','','',NULL,'Happy ','Dua Koto','0853-888888','Pedagang Emas','150000000','1',0,'Tuan C',2,'2000-11-31'),(4,'1000000000','2014-10-09',5,'P & D','15','DDDDDD-KK','DDDDDD-BN','DDDDDD-KTP','0004/10/2014','1',1,'','','',NULL,'','','','','','',0,'Tuan D',1,'1979-11-22');

/*Table structure for table `proposal_buku_nikah` */

DROP TABLE IF EXISTS `proposal_buku_nikah`;

CREATE TABLE `proposal_buku_nikah` (
  `proposal_id` int(5) DEFAULT NULL,
  `no_buku_nikah` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_buku_nikah` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `proposal_buku_nikah` */

insert  into `proposal_buku_nikah`(`proposal_id`,`no_buku_nikah`,`tgl_buku_nikah`) values (1,'AAAAAA-BN','1980-10-07'),(3,'CCCCCC=BN','2000-10-31'),(4,'DDDDDD-BN','1979-10-22');

/*Table structure for table `proposal_kartu_keluarga` */

DROP TABLE IF EXISTS `proposal_kartu_keluarga`;

CREATE TABLE `proposal_kartu_keluarga` (
  `no_kartu_keluarga` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_ktp` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proposal_id` int(5) DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `proposal_kartu_keluarga` */

insert  into `proposal_kartu_keluarga`(`no_kartu_keluarga`,`nama`,`tanggal_lahir`,`no_ktp`,`proposal_id`,`tempat_lahir`) values ('AAAAAA-KK','Istri Tuan A','1981-10-07','AAAAAA-Istri',1,'Rao'),('AAAAAA-KK','Anak Tuan A','1982-10-07','AAAAAA-Anak',1,'Rao'),('CCCCCC-KK','Istri Tuan C','2001-10-31','CCCCCC-Istri',3,'Duo Koto'),('CCCCCC-KK','Anak Tuan C','2002-10-31','CCCCCC-Anak',3,'Duo Koto'),('DDDDDD-KK','Istri Tuan D','1960-10-22','DDDDDD-Istri',4,'Tapus');

/*Table structure for table `proposal_ktp` */

DROP TABLE IF EXISTS `proposal_ktp`;

CREATE TABLE `proposal_ktp` (
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `proposal_ktp` */

insert  into `proposal_ktp`(`proposal_ktp_id`,`no_ktp`,`tempat_lahir`,`tanggal_lahir`,`alamat`,`agama`,`status_perkawinan`,`pekerjaan`,`kewarganegaraan`,`masa_berlaku`,`proposal_id`,`desa`) values (1,'AAAAAA-KTP','Rao','1960-10-07','Rao',1,'Kawin','Kontraktor','Indonesia','2015-10-07',1,'Rao'),(2,'BBBBBB-KTP','Panti','1950-10-19','Panti',1,'Tidak Kawin','PNS','Indonesia','2017-10-19',2,'Panti'),(3,'CCCCCC-KTP','Duo Koto','1990-10-31','Duo Koto',1,'Kawin','Pedagang','Indonesia','2018-10-31',3,'Duo Koto'),(4,'DDDDDD-KTP','Tapus','1959-10-22','Tapus',1,'Kawin','Pedagang','Indonesia','2018-10-22',4,'Tapus');

/*Table structure for table `tolak` */

DROP TABLE IF EXISTS `tolak`;

CREATE TABLE `tolak` (
  `tolak_id` int(20) NOT NULL AUTO_INCREMENT,
  `proposal_id` int(5) DEFAULT NULL,
  `tanggal_tolak` date DEFAULT NULL,
  `alasan_ditolak` text COLLATE utf8_unicode_ci,
  `tahap_penolakan` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`tolak_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tolak` */

insert  into `tolak`(`tolak_id`,`proposal_id`,`tanggal_tolak`,`alasan_ditolak`,`tahap_penolakan`) values (1,2,'2014-10-27','Kol.5 di BRI','BI Checking'),(2,1,'2014-10-22','Usaha tidak dapat diyakini','Informasi diragukan');

/*Table structure for table `tolak_tahapan` */

DROP TABLE IF EXISTS `tolak_tahapan`;

CREATE TABLE `tolak_tahapan` (
  `tahapan_id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`tahapan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tolak_tahapan` */

insert  into `tolak_tahapan`(`tahapan_id`,`nama`) values (1,'BI Checking'),(2,'DHN BI'),(3,'Blacklist PPATK'),(4,'OTS Usaha'),(5,'OTS Agunan'),(6,'Komite'),(7,'Lain-lain');

/*Table structure for table `vote_jawab` */

DROP TABLE IF EXISTS `vote_jawab`;

CREATE TABLE `vote_jawab` (
  `id_jawab` int(5) NOT NULL AUTO_INCREMENT,
  `soal_id` int(3) DEFAULT NULL,
  `jawaban` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `id_pegawai` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `tanggal_vote` date DEFAULT NULL,
  PRIMARY KEY (`id_jawab`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `vote_jawab` */

insert  into `vote_jawab`(`id_jawab`,`soal_id`,`jawaban`,`id_pegawai`,`tanggal_vote`) values (1,1,'Penting','16','2014-10-27'),(2,2,'Sangat Penting','16','2014-10-27'),(3,3,'Penting','16','2014-10-27'),(4,4,'Penting','16','2014-10-27'),(5,5,'Sangat Penting','16','2014-10-27'),(6,6,'Sangat Penting','16','2014-10-27'),(7,1,'Penting','14','2014-10-27'),(8,2,'Sangat Penting','14','2014-10-27'),(9,3,'Sangat Penting','14','2014-10-27'),(10,4,'Sangat Penting','14','2014-10-27'),(11,5,'Sangat Penting','14','2014-10-27'),(12,6,'Sangat Penting','14','2014-10-27'),(13,1,'Sangat Penting','15','2014-10-27'),(14,2,'Sangat Penting','15','2014-10-27'),(15,3,'Penting','15','2014-10-27'),(16,4,'Cukup Penting','15','2014-10-27'),(17,5,'Sangat Penting','15','2014-10-27'),(18,6,'Sangat Penting','15','2014-10-27'),(19,1,'Sangat Penting','13','2014-10-27'),(20,2,'Sangat Penting','13','2014-10-27'),(21,3,'Sangat Penting','13','2014-10-27'),(22,4,'Sangat Penting','13','2014-10-27'),(23,5,'Sangat Penting','13','2014-10-27'),(24,6,'Sangat Penting','13','2014-10-27'),(25,1,'Sangat Penting','14','2014-10-27'),(26,2,'Sangat Penting','14','2014-10-27'),(27,3,'Sangat Penting','14','2014-10-27'),(28,4,'Sangat Penting','14','2014-10-27'),(29,5,'Sangat Penting','14','2014-10-27'),(30,6,'Sangat Penting','14','2014-10-27'),(31,1,'Sangat Penting','15','2014-10-27'),(32,2,'Sangat Penting','15','2014-10-27'),(33,3,'Sangat Penting','15','2014-10-27'),(34,4,'Sangat Penting','15','2014-10-27'),(35,5,'Sangat Penting','15','2014-10-27'),(36,6,'Penting','15','2014-10-27');

/*Table structure for table `vote_soal` */

DROP TABLE IF EXISTS `vote_soal`;

CREATE TABLE `vote_soal` (
  `id_soal` int(3) NOT NULL AUTO_INCREMENT,
  `soal` text COLLATE utf8_bin,
  `group_soal` int(3) DEFAULT NULL,
  `rank` int(3) DEFAULT NULL,
  `pilihan_jawaban` text COLLATE utf8_bin,
  PRIMARY KEY (`id_soal`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `vote_soal` */

insert  into `vote_soal`(`id_soal`,`soal`,`group_soal`,`rank`,`pilihan_jawaban`) values (1,'Apakah Aplikasi membantu dalam melaksanakan proses pembiayaan sesuai ketentuan di BSM?',1,1,'Sangat Penting,Penting,Cukup Penting,Tidak Penting'),(2,'Apakah Aplikasi membantu dalam proses pemeriksaan internal di tahap investigasi pembiayaan?',1,2,'Sangat Penting,Penting,Cukup Penting,Tidak Penting'),(3,'Apakah aplikasi membantu Ka.Unit dalam pengambilan keputusan pembiayaan?\r\n',1,3,'Sangat Penting,Penting,Cukup Penting,Tidak Penting'),(4,'Apakah Aplikasi membantu dalam menghindari potensi pembiayaan bermasalah?',1,4,'Sangat Penting,Penting,Cukup Penting,Tidak Penting'),(5,'Apakah Aplikasi membantu Ka.Unit dalam mereview produktivitas marketing?',1,5,'Sangat Penting,Penting,Cukup Penting,Tidak Penting'),(6,'Apakah Aplikasi PENTING dalam memitigasi resiko dan penerapan prudensial banking?\r\n',1,6,'Sangat Penting,Penting,Cukup Penting,Tidak Penting');

/*Table structure for table `watchlist` */

DROP TABLE IF EXISTS `watchlist`;

CREATE TABLE `watchlist` (
  `watchlist_id` int(10) NOT NULL AUTO_INCREMENT,
  `no_loan` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_nasabah` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_tunggakan` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kolektibilitas` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis_produk` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_CIF` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_rekening_angsuran` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plafon` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `os_pokok` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `angsuran_bulanan` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `persentase_bagi_hasil` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usaha_nasabah` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tujuan_pembiayaan` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`watchlist_id`)
) ENGINE=MyISAM AUTO_INCREMENT=125 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `watchlist` */

insert  into `watchlist`(`watchlist_id`,`no_loan`,`nama_nasabah`,`total_tunggakan`,`kolektibilitas`,`jenis_produk`,`no_CIF`,`no_rekening_angsuran`,`plafon`,`os_pokok`,`angsuran_bulanan`,`persentase_bagi_hasil`,`usaha_nasabah`,`tujuan_pembiayaan`) values (1,'LD1314238362','DINA RYANI','1045639.87','2A','CONSUMER IMPLAN SWASTA',NULL,NULL,'','','',NULL,NULL,NULL),(2,'LD1314249872','DEDE ROMEIZON','761824.24','2A','KUR MIKRO JAMKRINDO',NULL,NULL,'','','',NULL,NULL,NULL),(3,'LD1314251867','SUCI HARTINI','436549.22','2A','KUR MIKRO JAMKRINDO',NULL,NULL,'','','',NULL,NULL,NULL),(4,'LD1314255716','ZULHASMI','2365774.85','2C','KUR MIKRO JAMKRINDO',NULL,NULL,'','','',NULL,NULL,NULL),(5,'LD1314256570','HENDRI HIDAYAT','1601058.70','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(6,'LD1314256928','MULHASBUANDI HSB','110926973.79','5','Murabahah',NULL,NULL,'','','',NULL,NULL,NULL),(7,'LD1314257155','ARMIYANTO','767670.23','2A','KUR MIKRO JAMKRINDO',NULL,NULL,'','','',NULL,NULL,NULL),(8,'LD1314260020','YUSRIZAL M','1634311.56','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(9,'LD1314264716','JONAFFERI','1864012.05','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(10,'LD1314264999','SYAFRI MUNIR','2873352.82','2A','CONSUMER PERUMAHAN GRIYA',NULL,NULL,'','','',NULL,NULL,NULL),(11,'LD1314265080','IRFAN','2311036.22','2A','WM UTAMA PRODUKTIF',NULL,NULL,'','','',NULL,NULL,NULL),(12,'LD1314271678','AMRI MASTA','1643045.20','2A','WM UTAMA PRODUKTIF',NULL,NULL,'','','',NULL,NULL,NULL),(13,'LD1314274493','JASMAN AHMADI','2090304.47','2A','CONSUMER IMPLAN SWASTA',NULL,NULL,'','','',NULL,NULL,NULL),(14,'LD1314276280','ZUBAIDAH','16330558.24','5','WM UTAMA PRODUKTIF',NULL,NULL,'','','',NULL,NULL,NULL),(15,'LD1314280851','NONO HARYADI','1660415.60','2A','WM MADYA PRODUKTIF',NULL,NULL,'','','',NULL,NULL,NULL),(16,'LD1314281442','ARMEN NASIR','2090304.47','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(17,'LD1314282192','SERENTAK TARIGAN','1416863.26','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(18,'LD1314292434','SYOFIAR','1656686.62','2A','CONSUMER IMPLAN SWASTA',NULL,NULL,'','','',NULL,NULL,NULL),(19,'LD1314294824','WIRA NOVALDI','1932320.98','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(20,'LD1314296714','HENDRA FITNARDI','260568.79','2A','KUR MIKRO JAMKRINDO',NULL,NULL,'','','',NULL,NULL,NULL),(21,'LD1314296781','SYAFRIL','3073434.85','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(22,'LD1314311902','ANGGI MUCHTAR','1826092.34','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(23,'LD1314312095','YUNALDI','3333917.88','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(24,'LD1314312767','NUR AINI','1011653.15','2A','WM UTAMA PRODUKTIF',NULL,NULL,'','','',NULL,NULL,NULL),(25,'LD1314313821','SATRIA EMALDI','1754927.71','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(26,'LD1314321070','JUMADI YASSER','170876.23','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(27,'LD1314327610','ASLAN LUBIS','2330015.06','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(28,'LD1314361046','RENI GUSPITA','27444100.13','3A','KECIL KOMERSIAL NON WM',NULL,NULL,'','','',NULL,NULL,NULL),(29,'LD1314374795','YULISMAN R','2748968.52','2A','CONSUMER IMPLAN SWASTA',NULL,NULL,'','','',NULL,NULL,NULL),(30,'LD1314376068','AMRIL','750631.91','2A','KUR MIKRO JAMKRINDO',NULL,NULL,'','','',NULL,NULL,NULL),(31,'LD1314376164','SRINARMI','6598737.24','2A','KECIL KOMERSIAL NON WM',NULL,NULL,'','','',NULL,NULL,NULL),(32,'LD1314376170','ZULHERMANSYAH','2990308.78','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(33,'LD1314376212','ARIEF BUDIMAN','1932320.98','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(34,'LD1314376223','GUSMAL HARIS','2691277.90','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(35,'LD1314378940','EDWARMAN','1491688.55','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(36,'LD1314379908','HALIJAR','16494934.36','2B','CONSUMER MURABAHAH IRREGU',NULL,NULL,'','','',NULL,NULL,NULL),(37,'LD1314380409','RIO ALATAS PUTRA','1739088.88','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(38,'LD1314380436','HENDY HAMULIA','2709588.74','2A','CONSUMER KENDARAAN OTOMOT',NULL,NULL,'','','',NULL,NULL,NULL),(39,'LD1314400562','ZULKARNAINI','3597743.32','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(40,'LD1314400567','AAN ERFANI','2584858.42','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(41,'LD1314403880','JONWIR IBRA','1747511.31','2A','CONSUMER IMPLAN SWASTA',NULL,NULL,'','','',NULL,NULL,NULL),(42,'LD1314403882','HEFIAL MEIYARDI','1589191.83','2A','CONSUMER IMPLAN SWASTA',NULL,NULL,'','','',NULL,NULL,NULL),(43,'LD1314403888','JASMIWARDI','1932320.98','2A','CONSUMER IMPLAN SWASTA',NULL,NULL,'','','',NULL,NULL,NULL),(44,'LD1314404634','DESSY ASFRI YENTIE','951578.89','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(45,'LD1314404637','YULFAIZAL','10282.19','1','KECIL KOMERSIAL NON WM',NULL,NULL,'','','',NULL,NULL,NULL),(46,'LD1314414185','HAIRUL SALEH HASIBUAN','1826092.34','2A','CONSUMER IMPLAN SWASTA',NULL,NULL,'','','',NULL,NULL,NULL),(47,'LD1314414188','ASHADI','1826092.34','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(48,'LD1314414190','YENTI','1732156.77','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(49,'LD1314414192','YUSMAR','665164.00','2A','KUR MIKRO JAMKRINDO',NULL,NULL,'','','',NULL,NULL,NULL),(50,'LD1314416418','RUDI','2090304.47','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(51,'LD1314416474','WEFRIZAL','2541762.46','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(52,'LD1314416814','EKO SAPUTRA','2904896.11','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(53,'LD1314416817','IDE PEBRIA SANDI','1754927.71','2A','CONSUMER IMPLAN SWASTA',NULL,NULL,'','','',NULL,NULL,NULL),(54,'LD1314416820','MIRIS','2755061.99','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(55,'LD1314417613','HASNIAL KHATIMA','1827229.25','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(56,'LD1314417621','MASNIZAR','5506102.99','2B','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(57,'LD1314418097','YETTI SAPUTRI','956623.62','2A','WM MADYA PRODUKTIF',NULL,NULL,'','','',NULL,NULL,NULL),(58,'LD1314418220','YULHADI','2090304.47','2A','CONSUMER IMPLAN SWASTA',NULL,NULL,'','','',NULL,NULL,NULL),(59,'LD1314418227','ALI SYAHBANA','2090304.47','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(60,'LD1314418778','AFRIAL DATUAK GAMPO','3386085.20','2A','CONSUMER IMPLAN SWASTA',NULL,NULL,'','','',NULL,NULL,NULL),(61,'LD1314418779','ILHAM NUR','2723852.59','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(62,'LD1314418780','RAHMAD FIRDAUS','1398009.04','2A','CONSUMER IMPLAN SWASTA',NULL,NULL,'','','',NULL,NULL,NULL),(63,'LD1314418982','WAHYUDA','1826092.34','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(64,'LD1314420671','ARNIZAL','3200561.15','2A','CONSUMER PERUMAHAN GRIYA',NULL,NULL,'','','',NULL,NULL,NULL),(65,'LD1314420854','YUSLINA','1242514.97','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(66,'LD1314452011','YONNI ZUHARMEN','8763095.40','4A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(67,'LD1314454725','BURHANUDDIN PASARIBU','19561088.68','3A','CONSUMER PERUMAHAN GRIYA',NULL,NULL,'','','',NULL,NULL,NULL),(68,'LD1314457516','BURHANUDDIN PASARIBU','47432699.94','3A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(69,'LD1314462645','RAHMAT KARI HUSIN','44524.14','2A','KUR MIKRO JAMKRINDO',NULL,NULL,'','','',NULL,NULL,NULL),(70,'LD1314463705','BENI SATRIA','817155.77','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(71,'LD1314466226','HENDRI YANTO','7088082.99','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(72,'LD1314466259','RAHMAT RETA','3591691.03','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(73,'LD1314473101','MEFDIA INDRA','1754927.71','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(74,'LD1314478348','MAYONIS','3447978.33','2A','CONSUMER PERUMAHAN GRIYA',NULL,NULL,'','','',NULL,NULL,NULL),(75,'LD1314478909','ZULKIFLI','2651540.10','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(76,'LD1314480004','AZWARDI','3167441.90','2A','CONSUMER PERUMAHAN GRIYA',NULL,NULL,'','','',NULL,NULL,NULL),(77,'LD1314481277','IVO OKTAVER','4793234.70','2B','WM UTAMA PRODUKTIF',NULL,NULL,'','','',NULL,NULL,NULL),(78,'LD1314483377','EFRIJON','1826092.34','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(79,'LD1314484272','MADONG LUBIS','41265103.08','5','WM UTAMA PRODUKTIF',NULL,NULL,'','','',NULL,NULL,NULL),(80,'LD1314484520','MUHAMMAD DIAR','3072761.06','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(81,'LD1314484830','SUWARDI','4419233.49','2A','CONSUMER PERUMAHAN GRIYA',NULL,NULL,'','','',NULL,NULL,NULL),(82,'LD1314486152','ASMA HALIM','2160162.07','2A','CONSUMER PENSIUNAN',NULL,NULL,'','','',NULL,NULL,NULL),(83,'LD1314486153','ZULDESMAN','1522829.60','2A','CONSUMER PENSIUNAN',NULL,NULL,'','','',NULL,NULL,NULL),(84,'LD1314487454','MUSPANDI','424826.59','2A','KUR MIKRO JAMKRINDO',NULL,NULL,'','','',NULL,NULL,NULL),(85,'LD1314489519','NURMIATI','485497.26','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(86,'LD1314490986','HERI FADLI','1739088.88','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(87,'LD1314491675','RAHMAD BAYU BERMANA SAPUTRA','1281508.29','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,'','','',NULL,NULL,NULL),(88,'LD1314492527','YUNEDI','1601058.70','2A','CONSUMER IMPLAN SWASTA',NULL,NULL,'','','',NULL,NULL,NULL),(89,'LD1314496962','ELSA HARSIDA','505380.12','2A','WM MADYA PRODUKTIF',NULL,NULL,'','','',NULL,NULL,NULL),(90,'LD1314497956','LAYLA NUZLIATI','1674904.58','2A','WM MADYA PRODUKTIF',NULL,NULL,'','','',NULL,NULL,NULL),(91,'LD1314992706','RICI ALKENDRO','1826092.35','2A','MIKRO KOMERSIAL NON WM',NULL,NULL,'','','',NULL,NULL,NULL),(92,'LD1316270897','FAZLY UMAR PURBA','3857019.99','2A','KECIL KOMERSIAL NON WM',NULL,NULL,'','','',NULL,NULL,NULL),(93,'LD1317094350','YOKIE NOVRISA YULLANDA','1864012.06','2A','Murabahah Warung Mikro',NULL,NULL,'','','',NULL,NULL,NULL),(94,'LD1317103708','YANNI ALISONDA','2685395.37','2A','CONSUMER IMPLAN SWASTA',NULL,NULL,'','','',NULL,NULL,NULL),(95,'LD1317193737','HENDRI KID RATRIONO','3167441.91','2A','CONSUMER IMPLAN SWASTA',NULL,NULL,'','','',NULL,NULL,NULL),(96,'LD1317608596','SYOFIA ELIDA','808972.38','2A','Murabahah Warung Mikro',NULL,NULL,'','','',NULL,NULL,NULL),(97,'LD1319809181','DEKKY PRIBADI','105015181.42','4C','CONSUMER PERUMAHAN GRIYA',NULL,NULL,'','','',NULL,NULL,NULL),(98,'LD1320328039','SUHENDRI NOER','765656.38','2A','Murabahah Warung Mikro',NULL,NULL,'','','',NULL,NULL,NULL),(99,'LD1321441101','MILA DARNILA','2681701.25','2A','CONSUMER PERUMAHAN GRIYA',NULL,NULL,'','','',NULL,NULL,NULL),(100,'LD1321493073','RIZAL EFENDI','3887231.60','2A','CONSUMER PERUMAHAN GRIYA',NULL,NULL,'','','',NULL,NULL,NULL),(101,'LD1322428579','SYAMSUL KHIAR','2966222.82','2A','CONSUMER PERUMAHAN GRIYA',NULL,NULL,'','','',NULL,NULL,NULL),(102,'LD1324231213','IVO OKTAVER','1673824.15','2A','WM TUNAS PRODUKTIF',NULL,NULL,'','','',NULL,NULL,NULL),(103,'LD1324245290','ITA YUNI','2172288.25','2A','WM UTAMA PRODUKTIF',NULL,NULL,'','','',NULL,NULL,NULL),(104,'LD1326849478','DARMALINDA','1704402.03','2A','WM MADYA PRODUKTIF',NULL,NULL,'','','',NULL,NULL,NULL),(105,'LD1327321159','ROMI MARLISKHA','390845.97','2A','WM TUNAS GOLBERTAP',NULL,NULL,'','','',NULL,NULL,NULL),(106,'LD1327632198','IRWAN','3167441.91','2A','CONSUMER PERUMAHAN GRIYA',NULL,NULL,'','','',NULL,NULL,NULL),(107,'LD1329455988','RAHMAT HIDAYAT','1419405.99','2A','KUR MIKRO JAMKRINDO',NULL,NULL,'','','',NULL,NULL,NULL),(108,'LD1329461303','YONESHI WAHYUNI','997260.36','2A','KUR MIKRO JAMKRINDO',NULL,NULL,'','','',NULL,NULL,NULL),(109,'LD1329504597','NOVA DESMITA','771402.10','2A','KUR MIKRO JAMKRINDO',NULL,NULL,'','','',NULL,NULL,NULL),(110,'LD1331693483','ZULKARNAINI','620639.47','2A','CONSUMER PERUMAHAN GRIYA',NULL,NULL,'','','',NULL,NULL,NULL),(111,'LD1331870486','DONI DESVIA','249706.57','2A','KUR MIKRO JAMKRINDO',NULL,NULL,'','','',NULL,NULL,NULL),(112,'LD1332326706','GUSMAL HARIS','1067381.35','2A','CONSUMER PERUMAHAN GRIYA',NULL,NULL,'','','',NULL,NULL,NULL),(113,'LD1334685611','ZULHERMANSYAH','855579.34','2A','CONSUMER PERUMAHAN GRIYA',NULL,NULL,'','','',NULL,NULL,NULL),(114,'LD1335386361','ERWAN','285045.30','2A','CONSUMER PERUMAHAN GRIYA',NULL,NULL,'','','',NULL,NULL,NULL),(115,'LD1335396059','ASWIR EFENDI','2446998.70','2A','WM UTAMA PRODUKTIF',NULL,NULL,'','','',NULL,NULL,NULL),(116,'LD1335837439','CHAIDIR LUBIS','8384932.48','2A','CONSUMER KENDARAAN OTOMOT',NULL,NULL,'','','',NULL,NULL,NULL),(117,'LD1405255025','PONIMAN','1517512.32','2A','WM MADYA PRODUKTIF',NULL,NULL,'','','',NULL,NULL,NULL),(118,'LD1405761266','EDI SISWANTO','105694.79','2A','KUR MIKRO JAMKRINDO',NULL,NULL,'','','',NULL,NULL,NULL),(119,'LD1405768957','TONY SETIA','320821.70','2A','KUR MIKRO JAMKRINDO',NULL,NULL,'','','',NULL,NULL,NULL),(120,'LD1411516160','WENDA EMAFRI','386354.92','2A','KUR MIKRO JAMKRINDO',NULL,NULL,'','','',NULL,NULL,NULL),(121,'LD1414866048','HENDRA','560053.99','2A','KUR MIKRO JAMKRINDO',NULL,NULL,'','','',NULL,NULL,NULL),(122,'LD1416114040','EDDY CHANDRA','462884.65','2A','KUR MIKRO JAMKRINDO',NULL,NULL,'','','',NULL,NULL,NULL),(123,'LD1416830949','RADINAL','425077.78','2A','WM TUNAS PRODUKTIF',NULL,NULL,'','','',NULL,NULL,NULL),(124,'LD1420473891','DODI','3641022.10','2A','WM UTAMA PRODUKTIF',NULL,NULL,'','','',NULL,NULL,NULL);

/*Table structure for table `watchlist_temp` */

DROP TABLE IF EXISTS `watchlist_temp`;

CREATE TABLE `watchlist_temp` (
  `watchlist_id` int(10) NOT NULL AUTO_INCREMENT,
  `no_loan` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_nasabah` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_tunggakan` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kolektibilitas` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis_produk` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_CIF` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_rekening_angsuran` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plafon` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `os_pokok` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `angsuran_bulanan` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `persentase_bagi_hasil` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usaha_nasabah` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tujuan_pembiayaan` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`watchlist_id`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `watchlist_temp` */

insert  into `watchlist_temp`(`watchlist_id`,`no_loan`,`nama_nasabah`,`total_tunggakan`,`kolektibilitas`,`jenis_produk`,`no_CIF`,`no_rekening_angsuran`,`plafon`,`os_pokok`,`angsuran_bulanan`,`persentase_bagi_hasil`,`usaha_nasabah`,`tujuan_pembiayaan`) values (1,'LD1314236296','ZENDA MARWATI','2,037,776.25','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'LD1314238362','DINA RYANI','1,040,697.06','2A','CONSUMER IMPLAN SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'LD1314249872','DEDE ROMEIZON','758,210.85','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'LD1314251512','DONI ARDINAL','215,230.88','2B','CONSUMER IMPLAN SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'LD1314251867','SUCI HARTINI','434,478.63','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'LD1314255716','ZULHASMI','2,354,779.76','2C','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'LD1314256570','HENDRI HIDAYAT','1,593,490.39','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'LD1314256928','MULHASBUANDI HSB','110,465,644.70','5','Murabahah',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'LD1314257155','ARMIYANTO','764,029.11','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'LD1314258486','HUSNAN HARAHAP','6,526,099.97','1','CONSUMER PKPA TNI POLRI C',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'LD1314259513','ROSDAWATI HARMAINI','204.39','1','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,'LD1314265080','IRFAN','2,300,000.00','1','WM UTAMA PRODUKTIF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'LD1314271678','AMRI MASTA','1,635,252.10','2A','WM UTAMA PRODUKTIF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,'LD1314272201','JUFRIAL','508,068.40','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,'LD1314276280','ZUBAIDAH','16,259,633.94','5','WM UTAMA PRODUKTIF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,'LD1314280851','NONO HARYADI','1,652,540.11','2A','WM MADYA PRODUKTIF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,'LD1314292434','SYOFIAR','1,648,855.35','2A','CONSUMER IMPLAN SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,'LD1314296714','HENDRA FITNARDI','259,332.89','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,'LD1314312767','NUR AINI','1,006,854.79','2A','WM UTAMA PRODUKTIF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,'LD1314315730','BUDI HERIYANTO','1,509,736.51','2A','CONSUMER IMPLAN SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,'LD1314327379','ANDOMI ROZA PUTRA','1,044,675.42','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,'LD1314361046','RENI GUSPITA','27,319,485.40','3A','KECIL KOMERSIAL NON WM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,'LD1314374797','ARSENIUS MANIK','3,948,706.44','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,'LD1314376068','AMRIL','747,071.60','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,'LD1314376164','SRINARMI','6,567,438.87','2A','KECIL KOMERSIAL NON WM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,'LD1314378954','MISLAINA','745,709.75','2A','WM MADYA PRODUKTIF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,'LD1314379908','HALIJAR','16,417,745.50','2B','CONSUMER MURABAHAH IRREGU',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(28,'LD1314380436','HENDY HAMULIA','2,696,780.32','2A','CONSUMER KENDARAAN OTOMOT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,'LD1314393286','SUKMA RIYANDHA','6,022,254.33','1','KECIL KOMERSIAL NON WM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(30,'LD1314403882','HEFIAL MEIYARDI','1,581,679.61','2A','CONSUMER IMPLAN SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(31,'LD1314404018','EMMA HAYATI','441,693.31','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(32,'LD1314404634','DESSY ASFRI YENTIE','947,047.04','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(33,'LD1314404637','YULFAIZAL','10,282.19','1','KECIL KOMERSIAL NON WM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(34,'LD1314414190','YENTI','1,723,968.75','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(35,'LD1314414192','YUSMAR','662,009.07','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(36,'LD1314416820','MIRIS','4,241,021.27','2B','CONSUMER PKPA TNI POLRI C',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(37,'LD1314417613','HASNIAL KHATIMA','1,818,591.81','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(38,'LD1314417621','MASNIZAR','5,815,135.19','2B','CONSUMER PKPA TNI POLRI C',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(39,'LD1314417627','JUNAIDI LUBIS','458,974.85','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(40,'LD1314418097','YETTI SAPUTRI','1,231,522.30','2A','WM MADYA PRODUKTIF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(41,'LD1314420854','YUSLINA','1,236,641.51','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(42,'LD1314452011','YONNI ZUHARMEN','7,551,199.43','3C','CONSUMER PKPA TNI POLRI C',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(43,'LD1314454725','BURHANUDDIN PASARIBU','19,470,685.04','2C','CONSUMER PERUMAHAN GRIYA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(44,'LD1314457516','BURHANUDDIN PASARIBU','36,135,122.82','2C','CONSUMER PKPA TNI POLRI C',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(45,'LD1314462645','RAHMAT KARI HUSIN','1,043,663.24','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(46,'LD1314468133','ROSTIAN','2,691,586.74','2A','KECIL KOMERSIAL NON WM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(47,'LD1314477765','DESNIARI','2,718,251.78','2A','WM UTAMA PRODUKTIF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(48,'LD1314478340','YULNASRI','762,085.22','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(49,'LD1314478348','MAYONIS','3,431,624.28','2A','CONSUMER PERUMAHAN GRIYA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(50,'LD1314481277','IVO OKTAVER','4,770,755.23','2B','WM UTAMA PRODUKTIF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(51,'LD1314483887','JUNAIDI','594,542.76','2A','CONSUMER PERUMAHAN GRIYA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(52,'LD1314484272','MADONG LUBIS','41,087,629.02','5','WM UTAMA PRODUKTIF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(53,'LD1314485581','GUNAWAN','384,522.41','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(54,'LD1314486152','ASMA HALIM','2,149,950.83','2A','CONSUMER PENSIUNAN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(55,'LD1314486153','ZULDESMAN','1,515,631.08','2A','CONSUMER PENSIUNAN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(56,'LD1314487454','MUSPANDI','422,811.60','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(57,'LD1314489519','NURMIATI','483,202.28','2A','CONSUMER PKPA TNI POLRI C',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(58,'LD1314492527','YUNEDI','1,593,490.39','2A','CONSUMER IMPLAN SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(59,'LD1314495099','BASRUN','834,378.19','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(60,'LD1314496962','ELSA HARSIDA','502,983.06','2A','WM MADYA PRODUKTIF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(61,'LD1314497956','LAYLA NUZLIATI','1,666,960.37','2A','WM MADYA PRODUKTIF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(62,'LD1315610959','RAFLIS','1,810,022.12','2A','CONSUMER PKPA SWASTA CHAN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(63,'LD1316270897','FAZLY UMAR PURBA','3,838,725.82','2A','KECIL KOMERSIAL NON WM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(64,'LD1317608596','SYOFIA ELIDA','805,135.35','2A','Murabahah Warung Mikro',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(65,'LD1319809181','DEKKY PRIBADI','104,552,068.06','4B','CONSUMER PERUMAHAN GRIYA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(66,'LD1320328039','SUHENDRI NOER','762,024.81','2A','Murabahah Warung Mikro',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(67,'LD1322428579','SYAMSUL KHIAR','2,952,259.33','2A','CONSUMER PERUMAHAN GRIYA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(68,'LD1324231213','IVO OKTAVER','1,665,885.07','2A','WM TUNAS PRODUKTIF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(69,'LD1324245290','ITA YUNI','2,161,984.91','2A','WM UTAMA PRODUKTIF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(70,'LD1326849478','DARMALINDA','1,696,317.91','2A','WM MADYA PRODUKTIF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(71,'LD1327321159','ROMI MARLISKHA','388,979.51','1','WM TUNAS GOLBERTAP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(72,'LD1329455988','RAHMAT HIDAYAT','1,412,673.63','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(73,'LD1329461303','YONESHI WAHYUNI','992,530.27','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(74,'LD1329504597','NOVA DESMITA','767,743.27','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(75,'LD1331870486','DONI DESVIA','647,443.63','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(76,'LD1334653588','SUARDI','403,606.95','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(77,'LD1335370665','NOVI ISWANDI','699,782.57','2A','WM MADYA PRODUKTIF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(78,'LD1335386361','ERWAN','283,693.31','2A','CONSUMER PERUMAHAN GRIYA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(79,'LD1335396059','ASWIR EFENDI','2,435,392.38','2A','WM UTAMA PRODUKTIF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(80,'LD1335837439','CHAIDIR LUBIS','8,345,162.04','2A','CONSUMER KENDARAAN OTOMOT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(81,'LD1405255025','PONIMAN','1,510,314.63','2A','WM MADYA PRODUKTIF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(82,'LD1405761266','EDI SISWANTO','105,193.47','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(83,'LD1405768957','TONY SETIA','319,300.01','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(84,'LD1408449091','NAIMI','932,656.91','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(85,'LD1410693370','ZULFAJRI PRIMA PUTRA','647,752.01','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(86,'LD1411293010','HUSTINA JUSTIA','727,948.50','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(87,'LD1411516160','WENDA EMAFRI','384,522.41','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(88,'LD1414179486','SITI HAIRIAH','311,633.46','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(89,'LD1414866048','HENDRA','557,397.60','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(90,'LD1416114040','EDDY CHANDRA','460,689.15','2A','KUR MIKRO JAMKRINDO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(91,'LD1416830949','RADINAL','423,061.60','2A','WM TUNAS PRODUKTIF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(92,'LD1418573107','AHMAD ZUKRI','339,828.28','2A','WM TUNAS GOLBERTAP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(93,'LD1420473891','DODI','3,623,752.42','2A','WM UTAMA PRODUKTIF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(94,'LD1422659750','DODI YASMAI','434,371.31','1','WM TUNAS PRODUKTIF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(95,'LD1426693795','SRILISRIATI','530,371.23','1','WM TUNAS PRODUKTIF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
