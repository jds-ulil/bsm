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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `mtb_list_email` */

insert  into `mtb_list_email`(`id_list_email`,`email_address`,`nama_pengguna`,`jabatan_id`,`status`,`NIP`) values (4,'rnur1780@bsm.co.id','Ridwan Nur',9,1,'047871780'),(5,'dazmeli@bsm.co.id','Dedi Azmeli',9,1,'037571378');

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

insert  into `mtb_mailer`(`mail_id`,`host`,`nama`,`password`,`port`,`proposal_baru`,`nasabah_tolak`,`approval`) values (1,'10.1.50.20','rnur1780','hasbunallah01','25','0','0','0');

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
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `mtb_pegawai` */

insert  into `mtb_pegawai`(`pegawai_id`,`no_urut`,`nama`,`NIP`,`jabatan`,`no_handphone`,`email`,`unit_kerja`,`email_atasan`,`level_jabatan`) values (16,'032','Maria Gunarti','108676080',21,'0813-74190906','mgunarti@bsm.co.id',3,'rnur1780@bsm.co.id',3),(15,'031','Nicko Gemayel','148713908',20,'0852-71589848','ngemayel@bsm.co.id',7,'rnur1780@bsm.co.id',3),(14,'030','Silvany Riza','118278205',20,'0812-6524091','sriza@bsm.co.id',7,'rnur1780@bsm.co.id',3),(13,'011','Ridwan Nur','047871780',9,'0852-76102270','rnur1780@bsm.co.id',3,'alhuda@bsm.co.id',2),(12,'010','Alhuda Djannis','007270489',8,'0816-1368853','alhuda@bsm.co.id',2,'ddurachman@bsm.co.id',2),(11,'001','Administrator','76102270',9,'0853-76102270','drankoto25@gmail.com',3,'rnur1780@bsm.co.id',1),(17,'012','Dedi Azmeli','037571378',9,'08126797660','dazmeli@bsm.co.id',8,'alhuda@bsm.co.id',2),(18,'020','Risa Anggraini','118579247',19,'082169583344','ranggraini@bsm.co.id',8,'dazmeli@bsm.co.id',2),(19,'033','Subhannoto','108176697',20,'081363027265','subhannoto@bsm.co.id',8,'dazmeli@bsm.co.id',3),(20,'034','Hendra Wahyudi','128412326',20,'081374222323','hwahyudi1064@bsm.co.id',8,'dazmeli@bsm.co.id',3),(21,'035','Aprizal','118179210',21,'081268377111','aprizal@bsm.co.id',8,'dazmeli@bsm.co.id',3),(22,'036','Ilma Ranita Sari','108777277',22,'081363967495','irsari7277@bsm.co.id',8,'dazmeli@bsm.co.id',3),(23,'013','Arief Hidayat','078272934',9,'08126799440','ahidayat82@bsm.co.id',9,'alhuda@bsm.co.id',2),(24,'021','Indrahman Syaiful','128771041',15,'085272715484','isyaiful@bsm.co.id',9,'ahidayat82@bsm.co.id',3),(25,'037','Donny Kurniawan','108475410',16,'08126745778','dkurniawan5410@bsm.co.id',9,'ahidayat82@bsm.co.id',3),(26,'038','Sri Maria Wahyuni','108675411',20,'081374370086','smwahyuni@bsm.co.id',9,'ahidayat82@bsm.co.id',3),(27,'014','Zulveri','057472638',9,'08126724586','zulveri@bsm.co.id',7,'alhuda@bsm.co.id',2),(28,'022','Ii Iswandi','127911319',15,'082387004623','iiswandi@bsm.co.id',7,'zulveri@bsm.co.id',3),(29,'039','Fadli','118379211',20,'08127668669','fadli@bsm.co.id',7,'zulveri@bsm.co.id',3),(30,'040','Fauziah','118979217',20,'085263637679','fauziah9217@bsm.co.id',7,'zulveri@bsm.co.id',3),(31,'041','Yanche Dede Saputra','108075069',20,'081363886633','ydsaputra@bsm.co.id',7,'zulveri@bsm.co.id',3),(32,'015','Ibnu Fadhli','108276695',9,'081363054582','ifadhli@bsm.co.id',6,'alhuda@bsm.co.id',2),(33,'023','Arsyad Sani','128711036',15,'081267718017','asani1036@bsm.co.id',6,'ifadhli@bsm.co.id',2),(34,'042','Shefri Donaldy','108877571',20,'085274739909','sdonaldy@bsm.co.id',6,'ifadhli@bsm.co.id',3),(35,'043','Franky Diyedra','128912204',20,'081365442508','fdiyedra@bsm.co.id',6,'ifadhli@bsm.co.id',3),(36,'044','Indra Febrian','108777266',21,'085365089130','ifadhli@bsm.co.id',6,'ifadhli@bsm.co.id',3);

/*Table structure for table `mtb_segmen` */

DROP TABLE IF EXISTS `mtb_segmen`;

CREATE TABLE `mtb_segmen` (
  `segmen_id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`segmen_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `mtb_segmen` */

insert  into `mtb_segmen`(`segmen_id`,`nama`) values (1,'Komersial'),(4,'Konsumer'),(5,'Small'),(6,'Mikro'),(7,'Gadai');

/*Table structure for table `mtb_setting` */

DROP TABLE IF EXISTS `mtb_setting`;

CREATE TABLE `mtb_setting` (
  `id` int(1) NOT NULL,
  `alert_status` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `mtb_setting` */

insert  into `mtb_setting`(`id`,`alert_status`) values (1,'0');

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

/*Table structure for table `mtb_text` */

DROP TABLE IF EXISTS `mtb_text`;

CREATE TABLE `mtb_text` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8_bin,
  `show` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `mtb_text` */

insert  into `mtb_text`(`id`,`text`,`show`) values (1,'JANGAN LUPA ISI KUISIONER-NYA YACH....',0),(5,'Bismillah, Perangi Fraud. Integritas Harga Mati !!!',0),(7,'Pahami dan Patuhi Aturan',0),(8,'Jaga diri, jaga keluarga, jaga kawan, jaga BSM',0),(9,'5 to BE ( Be On Time, Belajar tuk Diri, Be Proaktif, Bersih Rapi Areaku, Bugar Sehat & Senyum Selalu )',0),(10,'... Boleh jadi kamu membenci sesuatu, padahal ia amat baik bagimu, dan boleh jadi (pula) kamu menyukai sesuatu, padahal ia amat buruk bagimu; Allah mengetahui, sedang kamu tidak mengetahui. (Al Baqarah : 216)',0);

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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `mtb_user` */

insert  into `mtb_user`(`user_id`,`user_name`,`email_address`,`jabatan_id`,`password`,`hak_akses`,`NIP`,`id_pegawai`) values (25,'Silvany Riza','sriza@bsm.co.id',20,'$2a$13$ZpEVPaz3OV2ks3AbHHQHvujkmxnroRMsFM9r0gDGewjIvFJaLyFSq',1,'118278205',14),(27,'Maria Gunarti','mgunarti@bsm.co.id',21,'$2a$13$rrSQT8Io7Oee4Nf81Y2v0.qAe2uVT97Rs//mn/nM9zV2w0Z8hF6Ce',3,'108676080',16),(28,'Alhuda Djannis','alhuda@bsm.co.id',8,'$2a$13$lzu2Wrp84b3mBpbt884jpOXnPv5egkZIUWACjz6bf3F8vH9RWQ.Vu',2,'007270489',12),(29,'Ridwan Nur','rnur1780@bsm.co.id',9,'$2a$13$ItTVNFqT8IMemrgSITnnIuqo4SZovc9wleKxuRoi3hB2skCYsiH8K',2,'047871780',13),(30,'Administrator','drankoto25@gmail.com',9,'$2a$13$QxQ/Tw4kdL8XlFVyqsU8BuXnSUCnlv4931JJdHxx.nLlmZceYefZ.',1,'76102270',11),(31,'Nicko Gemayel','ngemayel@bsm.co.id',20,'$2a$13$qcFFssgxRRHTcc5D3jQchey8RnpSbvHM1gD7xaQm5tz/s5Z5jw4he',3,'148713908',15),(32,'Dedi Azmeli','dazmeli@bsm.co.id',9,'$2a$13$bI0hFP5M9eDhas7uaCwn5.zTZ/HwrwNWGTAObcjkfxsng7XxjO49y',2,'037571378',17),(33,'Risa Anggraini','ranggraini@bsm.co.id',19,'$2a$13$jZN8/fsW6GbtxNG3i9wY1uuw483YBIqHWMjsbs/H8cCt3AlSOiBcm',2,'118579247',18),(34,'Subhannoto','subhannoto@bsm.co.id',20,'$2a$13$KxYS223F/KBlVoV9L24tV.k2/6UHs6DQ6qGyNlHJQ0nDKjX9XjeJm',3,'108176697',19),(35,'Hendra Wahyudi','hwahyudi1064@bsm.co.id',20,'$2a$13$iqM9UcWAmsnYiXTlzqI/6u18nVAY.HtzdIEO6kuOferwW6IXmkoWq',3,'128412326',20),(36,'Aprizal','aprizal@bsm.co.id',21,'$2a$13$xH8L29Jle3K7DD/LLJKO3O2bDcfhSgK43AkuQZo5/9s/7lkt.obzS',3,'118179210',21),(37,'Ilma Ranita Sari','irsari7277@bsm.co.id',22,'$2a$13$9sUArLFWQ0Qjpn2hGsL1EOQHI1IRyGS1ZIepLZd58X8skEf00Qgrq',3,'108777277',22),(38,'Indrahman Syaiful','isyaiful@bsm.co.id',15,'$2a$13$QUrcWSSd6060SOgMSZeCNe.BTPM.pASA9rwyywZDoWARvWTKgWMii',3,'128771041',24),(39,'Donny Kurniawan','dkurniawan5410@bsm.co.id',16,'$2a$13$6KTlIyRM6Oz8BJMoYgNUZOOSPxR7c2ZF1urBEcIC4egMhaxaMiR0.',3,'108475410',25),(40,'Sri Maria Wahyuni','smwahyuni@bsm.co.id',20,'$2a$13$sC5KnB4G.6sXpR.4JPovAeKWRvL9.Q7nn8pYo2wmSn3JdSNRYDvea',3,'108675411',26),(41,'Arief Hidayat','ahidayat82@bsm.co.id',9,'$2a$13$Ns5stiGJYX.YTlwkHbCO0e0VG7.3yjoQl1XDJCnU7S/v1fBy4nhUm',2,'078272934',23),(42,'Zulveri','zulveri@bsm.co.id',9,'$2a$13$/swSMJZJRKswCUlKcI6g8eDOwFmPaamjPT7Sr0HkKCs1BEjRgSkWy',2,'057472638',27),(43,'Ii Iswandi','iiswandi@bsm.co.id',15,'$2a$13$mwQit2EZAyjcuIPZqbRbBuviu6cVbK1DtmEEE.tDfyZK8MMR5JK8e',3,'127911319',28),(44,'Fadli','fadli@bsm.co.id',20,'$2a$13$MxunaAih4g3ZVv9NXlUI4ed8E5SesjEsHEg0afQOgiurrA8r8PHLu',3,'118379211',29),(45,'Fauziah','fauziah9217@bsm.co.id',20,'$2a$13$wVsp8/XJhSrMApFbZuXPzueWR0R1yRC4TLvtPA85EQh88gaud/53G',3,'118979217',30),(46,'Yanche Dede Saputra','ydsaputra@bsm.co.id',20,'$2a$13$Z1Nd3.kFjliD718l89vpa.V8kgzJtHZeOPEbg425bPR7pWiiTkMBe',3,'108075069',31),(47,'Shefri Donaldy','sdonaldy@bsm.co.id',20,'$2a$13$2AV8RXlJHiZi4Lm2xSn4MuPOe63zqo0UEanpVEh/kbJbXiYkF4D0u',3,'108877571',34),(48,'Franky Diyedra','fdiyedra@bsm.co.id',20,'$2a$13$O1pT8o8xeAurgkCT4T403.2AXWLwu7QaA3uq9qxg6StXMOssRwCa2',3,'128912204',35),(49,'Indra Febrian','ifadhli@bsm.co.id',21,'$2a$13$ARqHDBGbERJFH.92nK.MBe80ZyYasu/bxGRLdjEBSLlNOdo4cbudK',3,'108777266',36),(50,'Arsyad Sani','asani1036@bsm.co.id',15,'$2a$13$sJD/6WHT64jhUdNkHys25OU.0Ph6Py8ob8nTBpX/9j8MA9r.driua',2,'128711036',33);

/*Table structure for table `naspoma` */

DROP TABLE IF EXISTS `naspoma`;

CREATE TABLE `naspoma` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE utf8_bin NOT NULL,
  `segmen` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `alasan` text COLLATE utf8_bin,
  `jenis_pembiayaan` int(2) DEFAULT NULL,
  `jenis_usaha` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `no_CIF` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `no_rekening` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `plafon_awal` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `OS_pokok_terakhir` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `angs_per_hasil` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `kolektibilitas_terakhir` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `margin` varchar(8) COLLATE utf8_bin DEFAULT NULL,
  `tunggakan` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `jenis_identitas` int(2) DEFAULT NULL,
  `no_identitas` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text COLLATE utf8_bin,
  `agama` int(2) DEFAULT NULL,
  `status_perkawinan` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `pekerjaan` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `kewarganegaraan` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `masa_berlaku` date DEFAULT NULL,
  `desa` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `no_buku_nikah` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `tgl_buku_nikah` date DEFAULT NULL,
  `no_kartu_keluarga` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `tgl_kartu_keluarga` date DEFAULT NULL,
  `marketing` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `naspoma` */

insert  into `naspoma`(`id`,`nama`,`segmen`,`alasan`,`jenis_pembiayaan`,`jenis_usaha`,`no_CIF`,`no_rekening`,`plafon_awal`,`OS_pokok_terakhir`,`angs_per_hasil`,`kolektibilitas_terakhir`,`margin`,`tunggakan`,`jenis_identitas`,`no_identitas`,`tempat_lahir`,`tanggal_lahir`,`alamat`,`agama`,`status_perkawinan`,`pekerjaan`,`kewarganegaraan`,`masa_berlaku`,`desa`,`no_buku_nikah`,`tgl_buku_nikah`,`no_kartu_keluarga`,`tgl_kartu_keluarga`,`marketing`) values (1,'namaku','1','alesan',1,'jenis usaha','no cif','no rek','1','2','3','1','10','4',1,'no identitas','medan','0000-00-00','alamat',1,'Kawin','programmer','indonesia','0000-00-00','desa','buku nikah','0000-00-00','no kk','0000-00-00',14),(2,'Kedua','1','',3,'','','','','','','1','','',1,'1','','2014-12-17','',1,'Tidak Kawin','','','2014-12-03','','','0000-00-00','111','0000-00-00',14);

/*Table structure for table `naspoma_kartu_keluarga` */

DROP TABLE IF EXISTS `naspoma_kartu_keluarga`;

CREATE TABLE `naspoma_kartu_keluarga` (
  `no_kartu_keluarga` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_ktp` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `naspoma_id` int(5) DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `naspoma_kartu_keluarga` */

insert  into `naspoma_kartu_keluarga`(`no_kartu_keluarga`,`nama`,`tanggal_lahir`,`no_ktp`,`naspoma_id`,`tempat_lahir`) values ('no kk','adik','0000-00-00','no ktp 1',1,'medan');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `pelunasan` */

insert  into `pelunasan`(`pelunasan_id`,`tanggal_pelunasan`,`penyebab`,`segmen`,`jenis_usaha`,`nama_nasabah`,`no_CIF`,`no_rekening`,`plafon_awal`,`OS_pokok_terakhir`,`angsuran`,`kolektibilitas_terakhir`,`alamat_nasabah`,`jenis_pembiayaan`,`margin`,`tunggakan_terakhir`,`status_pelunasan`,`marketing`) values (2,'2014-10-28','Write Off',6,'Dagang Hasil Bumi','Madong Lubis','76301158','7036950603','100000000','73812547','3320741','8','Pasar Salibawan, Sundata, Lubuk Sikaping, Pasaman, Sumatera Barat',1,'26','41290456','3','16'),(4,'2014-10-28','Write Off',5,'Developer','Arif Hidayat','75025562','7024023448','1000000000,00','982981080,00','11480234,00','8','Jl. Putri Bungsu No.13, Balai Nan Duo, Payakumbuh Barat, Payakumbuh, Sumatera Barat ',5,'14','107737227,00','3','14');

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `proposal` */

insert  into `proposal`(`proposal_id`,`plafon`,`tanggal_pengajuan`,`segmen`,`jenis_usaha`,`marketing`,`no_kartu_keluarga`,`no_buku_nikah`,`no_ktp`,`no_proposal`,`status_pengajuan`,`jenis_nasabah`,`existing_plafon`,`existing_os`,`existing_angsuran`,`existing_kolektabilitas`,`referal_nama`,`referal_alamat`,`referal_telp`,`referal_sektor_usaha`,`referal_fasilitas`,`referal_kolektabilitas`,`del_flag`,`nama_nasabah`,`jenis_identitas`,`tanggal_kartu_keluarga`) values (1,'40000000','2014-10-15',6,'Golbertap','16','1308073108070002','','1308071304800002','0001/11/2014','3',1,'','','',NULL,'','','','','','',0,'DIRMAN',1,'2014-03-21'),(2,'150000000','2014-11-03',4,'PNS','16','1308022903070004','344/40/VII/2005','1308055604690001','0002/11/2014','1',1,'','','',NULL,'','','','','','',0,'ITA WISIKARTIYAH',1,'2010-07-26'),(4,'300000000','2014-10-13',5,'TOKO ELEKTRONIK','16','1308172407070003','126/01/X/2002','1308170406770001','0004/11/2014','1',1,'','','',NULL,'','','','','','',0,'M.RAFLIA',1,'2012-03-20'),(5,'40000000','2014-10-05',6,'Dagang Harian','16','1308031408080048','','1308071606650001','0006/11/2014','3',1,'','','',NULL,'','','','','','',0,'SYAMSUDDIN RAMBE',1,'2011-02-28'),(6,'50000000','2014-11-03',6,'KEBUN COKLAT','16','1308193005110001','','1308190405640002','0007/11/2014','3',1,'','','',NULL,'','','','','','',0,'ABDUL HADI LUBIS',1,'2014-09-12'),(7,'50000000','2014-10-20',6,'DAGANG SAYUR DAN KEBUN COKLAT','16','1308071910090007','648/1/1983','1308070709600001','0008/11/2014','1',1,'','','',NULL,'','','','','','',0,'AMRY',1,'2013-09-09'),(8,'20000000','2014-08-11',6,'Dagang Karet','16','1308042112110006','','1308040107620011','0009/11/2014','3',1,'','','',NULL,'','','','','','',0,'ADAM BURI',1,'2011-12-23'),(9,'100000000','2014-08-14',6,'kontraktor','16','1308050102100008','225/03/11/94','1308052307640001','0010/11/2014','3',1,'','','',NULL,'','','','','','',0,'YUSMEDI',1,'2012-02-08'),(10,'','2014-12-03',1,'121','14','112211','','211','0004/12/2014','1',1,'','','',NULL,'','','','','','',0,'TES',1,'');

/*Table structure for table `proposal_buku_nikah` */

DROP TABLE IF EXISTS `proposal_buku_nikah`;

CREATE TABLE `proposal_buku_nikah` (
  `proposal_id` int(5) DEFAULT NULL,
  `no_buku_nikah` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_buku_nikah` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `proposal_buku_nikah` */

insert  into `proposal_buku_nikah`(`proposal_id`,`no_buku_nikah`,`tgl_buku_nikah`) values (2,'344/40/VII/2005','2005-07-10'),(3,'235/39/VIII/2007','2007-07-20'),(4,'126/01/X/2002','2002-05-30'),(7,'648/1/1983','1983-08-31'),(9,'225/03/11/94','1994-01-14');

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

insert  into `proposal_kartu_keluarga`(`no_kartu_keluarga`,`nama`,`tanggal_lahir`,`no_ktp`,`proposal_id`,`tempat_lahir`) values ('1308073108070002','YUNIATI','1980-06-26','1308076606800001',1,'Muaro Cubadak'),('1308022903070004','MUHAMMAD IRFAN DJ','1965-11-25','1308022511650001',2,'PADANG'),('1308022903070004','ITA WISIKARTIYAH','1969-04-16','1308025604690001',2,'BUKITTINGGI'),('1308022903070004','LUTHFI DARY IRFAN','2007-07-17','1308021707070001',2,'PADANG'),('1308022903070004','BAHY AQIL IRFAN','2010-04-19','1308051904100002',2,'PADANG'),('1308052112090001','RURI SRI WAHYUNI','1985-11-02','1308054211850002',3,'PEKAN BARU'),('1308172407070003','M.RAFLIA','1977-06-06','1308170406770001',4,'CUBADAK DAKEK'),('1308172407070003','JUSNIATI','1983-07-16','1308175607830001',4,'KOTO TANGAH'),('1308172407070003','REVIKA REFANIA','2003-03-11','1308175103030001',4,'CUBADAK DAKEK'),('1308172407070003','DIANI KEYSA REFANIA','2007-12-06','1308174612070002',4,'TAPUS'),('1308031408080048','Gabena Siregar','1967-11-17','1308075711670001',5,'langga Payung'),('1308071910090007','NURHAMIDA','1963-07-11','1308075106630001',7,'TANJUNG ARO II');

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `proposal_ktp` */

insert  into `proposal_ktp`(`proposal_ktp_id`,`no_ktp`,`tempat_lahir`,`tanggal_lahir`,`alamat`,`agama`,`status_perkawinan`,`pekerjaan`,`kewarganegaraan`,`masa_berlaku`,`proposal_id`,`desa`) values (1,'1308071304800002','Kampung Baru','1980-04-13','Pasar Petok',1,'Kawin','PNS','Indonesia','2017-04-13',1,'Panti'),(2,'1308055604690001','BUKITTINGGI','1969-04-16','JL.PERWIRA NO.7 JR.TANJUNG ALAI KEL.PAUH KEC.LUBUK SIKAPING',1,'Kawin','PNS','Indonesia','2019-04-16',2,'PAUH'),(3,'1308051706840005','LUBUK SIKAPING','1984-06-17','JL. PASAR BARU- BENTENG',1,'Kawin','KARYAWAN HONORER','Indonesia','2017-06-17',3,'TANJUNG BARINGIN'),(4,'1308170406770001','CUBADAK DAKEK','1977-06-04','CUBADAK DAKEK,MAKMUR KEL PADANG GELUGUR ',1,'Kawin','WIRASWASTA','Indonesia','2017-06-04',4,'PADANG GELUGUR'),(5,'1308071606650001','RANTAU PRAPAT','1965-06-16','Sumpur Sejati jorong Kuamang ',1,'Kawin','wiraswasta','Indonesia','2017-06-16',5,'Panti'),(6,'1308190405640002','KOTO NOPAN SETIA','1964-05-04','KOTO NOPAN SETIA',1,'Kawin','PENSIUNAN','Indonesia','2018-05-04',6,'LANSEK KADOK'),(7,'1308070709600001','TAPSEL','1960-09-07','KAJAI II JR MURNI PANTI',1,'Kawin','wiraswasta','Indonesia','2017-09-07',7,'Panti'),(8,'1308040107620011','musus','1962-07-01','Jorong Air Abu',1,'Kawin','Petani','Indonesia','2017-07-01',8,'Limo Koto'),(9,'1308052307640001','Talu','1964-07-23','Jl Prof.DR.hamka No.16B',1,'Kawin','PNS','Indonesia','2017-07-23',9,'Tanjung Beringin'),(10,'211','','2014-12-03','',1,'Kawin','','Indonesia','2014-12-03',10,'');

/*Table structure for table `tolak` */

DROP TABLE IF EXISTS `tolak`;

CREATE TABLE `tolak` (
  `tolak_id` int(20) NOT NULL AUTO_INCREMENT,
  `proposal_id` int(5) DEFAULT NULL,
  `tanggal_tolak` date DEFAULT NULL,
  `alasan_ditolak` text COLLATE utf8_unicode_ci,
  `tahap_penolakan` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`tolak_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tolak` */

insert  into `tolak`(`tolak_id`,`proposal_id`,`tanggal_tolak`,`alasan_ditolak`,`tahap_penolakan`) values (1,1,'2014-10-16','Penambahan Modal Usaha yang bersangkutan sudah didapat dari hasil penjualan tanah','OTS Usaha'),(2,5,'2014-11-06','Daftar Riwayat BI Checking bermasalah ( Kol 2 )','BI Checking'),(3,6,'2014-11-04','Riwayat Bi Checking Bermasalah ( Kol 5 )','BI Checking'),(6,8,'2014-08-15','Agunan tidak mengcover 100%','Komite'),(5,9,'2014-08-20','karena Ybs sub Kontraktor','Komite');

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

insert  into `vote_jawab`(`id_jawab`,`soal_id`,`jawaban`,`id_pegawai`,`tanggal_vote`) values (1,1,'Sangat Penting','14','2014-11-05'),(2,2,'Sangat Penting','14','2014-11-05'),(3,3,'Sangat Penting','14','2014-11-05'),(4,4,'Sangat Penting','14','2014-11-05'),(5,5,'Sangat Penting','14','2014-11-05'),(6,6,'Sangat Penting','14','2014-11-05'),(7,1,'Penting','13','2014-11-05'),(8,2,'Sangat Penting','13','2014-11-05'),(9,3,'Penting','13','2014-11-05'),(10,4,'Sangat Penting','13','2014-11-05'),(11,5,'Penting','13','2014-11-05'),(12,6,'Sangat Penting','13','2014-11-05'),(13,1,'Sangat Penting','13','2014-11-10'),(14,2,'Sangat Penting','13','2014-11-10'),(15,3,'Sangat Penting','13','2014-11-10'),(16,4,'Sangat Penting','13','2014-11-10'),(17,5,'Sangat Penting','13','2014-11-10'),(18,6,'Sangat Penting','13','2014-11-10'),(19,1,'Sangat Penting','15','2014-11-10'),(20,2,'Sangat Penting','15','2014-11-10'),(21,3,'Sangat Penting','15','2014-11-10'),(22,4,'Sangat Penting','15','2014-11-10'),(23,5,'Sangat Penting','15','2014-11-10'),(24,6,'Sangat Penting','15','2014-11-10'),(25,1,'Penting','16','2014-11-11'),(26,2,'Penting','16','2014-11-11'),(27,3,'Penting','16','2014-11-11'),(28,4,'Penting','16','2014-11-11'),(29,5,'Penting','16','2014-11-11'),(30,6,'Penting','16','2014-11-11'),(31,1,'Sangat Penting','13','2014-11-11'),(32,2,'Sangat Penting','13','2014-11-11'),(33,3,'Sangat Penting','13','2014-11-11'),(34,4,'Sangat Penting','13','2014-11-11'),(35,5,'Sangat Penting','13','2014-11-11'),(36,6,'Sangat Penting','13','2014-11-11');

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

insert  into `vote_soal`(`id_soal`,`soal`,`group_soal`,`rank`,`pilihan_jawaban`) values (1,'Seberapa penting Aplikasi SNkP membantu dalam melaksanakan proses pembiayaan sesuai ketentuan di BSM?',1,1,'Sangat Penting,Penting,Cukup Penting,Biasa Saja,Tidak Penting'),(2,'Seberapa penting Aplikasi SNkP membantu dalam proses pemeriksaan internal on-desk di tahap investigasi pembiayaan?',1,2,'Sangat Penting,Penting,Cukup Penting,Biasa Saja,Tidak Penting'),(3,'Seberapa penting Aplikasi SNkP membantu Ka.Unit dalam pengambilan keputusan pembiayaan?\r\n',1,3,'Sangat Penting,Penting,Cukup Penting,Biasa Saja,Tidak Penting'),(4,'Seberapa penting Aplikasi SNkP membantu dalam menghindari potensi pembiayaan bermasalah?',1,4,'Sangat Penting,Penting,Cukup Penting,Biasa Saja,Tidak Penting'),(5,'Seberapa penting Aplikasi SNkP membantu Ka.Unit dalam mereview produktivitas marketing?',1,5,'Sangat Penting,Penting,Cukup Penting,Biasa Saja,Tidak Penting'),(6,'Seberapa penting Aplikasi SNkP membantu dalam memitigasi resiko dan penerapan prudensial banking?\r\n',1,6,'Sangat Penting,Penting,Cukup Penting,Biasa Saja,Tidak Penting');

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
  `marketing` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_upload` date DEFAULT NULL,
  `status_tunggakan` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_bayar` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`watchlist_id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `watchlist` */

insert  into `watchlist`(`watchlist_id`,`no_loan`,`nama_nasabah`,`total_tunggakan`,`kolektibilitas`,`jenis_produk`,`no_CIF`,`no_rekening_angsuran`,`plafon`,`os_pokok`,`angsuran_bulanan`,`persentase_bagi_hasil`,`usaha_nasabah`,`tujuan_pembiayaan`,`marketing`,`tgl_upload`,`status_tunggakan`,`tgl_bayar`) values (1,'LD1314249872','DEDE ROMEIZON','762856,64','2A','KUR MIKRO JAMKRINDO','77378732','7052264458','20000000,00','12692600,69','','','','','14','2014-10-31','Telah Bayar','29 Oktober 2014'),(2,'LD1314255716','ZULHASMI','2368916,30','2C','KUR MIKRO JAMKRINDO','77247913','7050536747','20000000,00','11620640,90','','','','','14','2014-10-31','Belum Bayar',''),(3,'LD1314256570','HENDRI HIDAYAT','1603221,08','2A','CONSUMER PKPA TNI POLRI C','75025298','7024019602','90000000,00','70232578,45','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(4,'LD1314256928','MULHASBUANDI HSB','111058782,17','5','Murabahah','77251101','7050577834','450000000,00','411629774,48','','','','','14','2014-10-31','Belum Bayar',''),(5,'LD1314257155','ARMIYANTO','768710,55','2A','KUR MIKRO JAMKRINDO','77228610','7050270631','20000000,00','11620640,90','','','','','14','2014-10-31','Belum Bayar',''),(6,'LD1314265080','IRFAN','2314189,42','2A','WM UTAMA PRODUKTIF','77035193','7047708707','70000000,00','51795164,40','','','','','14','2014-10-31','Belum Bayar',''),(7,'LD1314271678','AMRI MASTA','1645271,81','2A','WM UTAMA PRODUKTIF','77059835','7048016008','51000000,00','35384235,57','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(8,'LD1314276280','ZUBAIDAH','16350822,24','5','WM UTAMA PRODUKTIF','76776068','7044050255','51000000,00','37440589,69','','','','','14','2014-10-31','Belum Bayar',''),(9,'LD1314280851','NONO HARYADI','1662665,74','2A','WM MADYA PRODUKTIF','76602568','7041218635','40000000,00','15889958,68','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(10,'LD1314292434','SYOFIAR','1658924,13','2A','CONSUMER IMPLAN SWASTA','76456223','7024019602','60000000,00','31578718,06','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(11,'LD1314296714','HENDRA FITNARDI','260921,91','2A','KUR MIKRO JAMKRINDO','76397247','7038244757','10000000,00','5254507,78','','','','','14','2014-10-31','Telah Bayar','29 Oktober 2014'),(12,'LD1314312767','NUR AINI','1013024,11','2A','WM UTAMA PRODUKTIF','76084015','7034025643','100000000,00','59707562,72','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(13,'LD1314361046','RENI GUSPITA','27479704,33','3A','KECIL KOMERSIAL NON WM','74020178','7024022198','250000000,00','114247055,73','','','','','14','2014-10-31','Belum Bayar',''),(14,'LD1314376068','AMRIL','751649,14','2A','KUR MIKRO JAMKRINDO','75264658','7026889067','20000000,00','9356257,12','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(15,'LD1314376164','SRINARMI','6607679,63','2A','KECIL KOMERSIAL NON WM','75302779','7027366354','300000000,00','235303434,64','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(16,'LD1314379908','HALIJAR','16516988,31','2B','CONSUMER MURABAHAH IRREGU','75199367','7026031677','232082089,54','142121586,37','','','','','14','2014-10-31','Belum Bayar',''),(17,'LD1314380436','HENDY HAMULIA','2713248,28','2A','CONSUMER KENDARAAN OTOMOT','75476983','7029647334','120000000,00','64908701,81','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(18,'LD1314403882','HEFIAL MEIYARDI','1591338,18','2A','CONSUMER IMPLAN SWASTA','75389853','7024019602','75000000,00','48459140,20','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(19,'LD1314404634','DESSY ASFRI YENTIE','952873,70','2A','CONSUMER PKPA TNI POLRI C','75673759','7024019807','100000000,00','80197359,34','','','','','14','2014-10-31','Telah Bayar','29 Oktober 2014'),(20,'LD1314404637','YULFAIZAL','10282,19','1','KECIL KOMERSIAL NON WM','75662803','7032139145','100000000,00','39557521,33','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(21,'LD1314414190','YENTI','1734496,21','2A','CONSUMER PKPA TNI POLRI C','75377107','7024019602','100000000,00','85229395,93','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(22,'LD1314416820','MIRIS','2758791,16','2A','CONSUMER PKPA TNI POLRI C','75222179','7026325697','200000000,00','155503941,26','','','','','14','2014-10-31','Belum Bayar',''),(23,'LD1314417613','HASNIAL KHATIMA','1829697,09','2A','CONSUMER PKPA TNI POLRI C','75655323','7024019602','100000000,00','79085942,27','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(24,'LD1314417621','MASNIZAR','5513456,40','2B','CONSUMER PKPA TNI POLRI C','75575311','7036491692','85000000,00','21892155,36','','','','','14','2014-10-31','Belum Bayar',''),(25,'LD1314418097','YETTI SAPUTRI','957916,62','2A','WM MADYA PRODUKTIF','75161686','7042871038','30000000,00','13987605,64','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(26,'LD1314420854','YUSLINA','1244193,10','2A','CONSUMER PKPA TNI POLRI C','73672988','7024019602','45000000,00','15749875,34','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(27,'LD1314452011','YONNI ZUHARMEN','8774385,07','4A','CONSUMER PKPA TNI POLRI C','73186559','7009631814','50000000,00','31067688,57','','','','','14','2014-10-31','Belum Bayar',''),(28,'LD1314454725','BURHANUDDIN PASARIBU','19586918,29','3A','CONSUMER PERUMAHAN GRIYA','73105683','7024021933','250000000,00','181332275,97','','','','','14','2014-10-31','Belum Bayar',''),(29,'LD1314457516','BURHANUDDIN PASARIBU','43490248,02','3A','CONSUMER PKPA TNI POLRI C','73105683','7024021933','500000000,00','334862410,30','','','','','14','2014-10-31','Belum Bayar',''),(30,'LD1314462645','RAHMAT KARI HUSIN','44574,26','2A','KUR MIKRO JAMKRINDO','77399616','7052547983','20000000,00','7655540,84','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(31,'LD1314466226','HENDRI YANTO','7097787,15','2A','CONSUMER PKPA TNI POLRI C','77213441','7050063897','500000000,00','456810100,04','','','','','14','2014-10-31','Belum Bayar',''),(32,'LD1314478348','MAYONIS','3452650,92','2A','CONSUMER PERUMAHAN GRIYA','77348590','7051852073','270000000,00','259381896,18','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(33,'LD1314481277','IVO OKTAVER','4799657,40','2B','WM UTAMA PRODUKTIF','77120063','7048742909','100000000,00','70229226,75','','','','','14','2014-10-31','Telah Bayar','10 November 2014'),(34,'LD1314484520','MUHAMMAD DIAR','2623794,40','2A','CONSUMER PKPA TNI POLRI C','76207730','7024019653','78000000,00','3035042,19','','','','','14','2014-10-31','Telah Bayar','29 Oktober 2014'),(35,'LD1314484830','SUWARDI','4425283,79','2A','CONSUMER PERUMAHAN GRIYA','77173945','7024019653','250000000,00','210184945,16','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(36,'LD1314489519','NURMIATI','486152,97','2A','CONSUMER PKPA TNI POLRI C','76128630','7034685872','80000000,00','70236150,08','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(37,'LD1314490986','HERI FADLI','1741469,83','2A','CONSUMER PKPA TNI POLRI C','76060175','7024019653','90000000,00','67899562,30','','','','','14','2014-10-31','Telah Bayar','03 November 2014'),(38,'LD1314492527','YUNEDI','1603221,08','2A','CONSUMER IMPLAN SWASTA','76015145','7024019602','90000000,00','75633690,46','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(39,'LD1314496962','ELSA HARSIDA','506065,00','2A','WM MADYA PRODUKTIF','76551274','7040525585','35000000,00','18125658,36','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(40,'LD1314497956','LAYLA NUZLIATI','1677174,36','2A','WM MADYA PRODUKTIF','76485775','7039502679','39000000,00','25809596,24','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(41,'LD1317608596','SYOFIA ELIDA','810068,67','2A','Murabahah Warung Mikro','77184611','7049665029','20000000,00','13611524,46','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(42,'LD1319809181','DEKKY PRIBADI','105147499,54','4C','CONSUMER PERUMAHAN GRIYA','77581696','7055329553','750000000,00','701266606,43','','','','','14','2014-10-31','Belum Bayar',''),(43,'LD1321441101','MILA DARNILA','2685372,72','2A','CONSUMER PERUMAHAN GRIYA','76172341','7035222787','245000000,00','230292537,58','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(44,'LD1321493073','RIZAL EFENDI','3892553,54','2A','CONSUMER PERUMAHAN GRIYA','77627988','7056572893','350000000,00','328989339,54','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(45,'LD1322428579','SYAMSUL KHIAR','2970212,39','2A','CONSUMER PERUMAHAN GRIYA','77637227','7056711516','230000000,00','224192954,85','','','','','14','2014-10-31','Belum Bayar',''),(46,'LD1324231213','IVO OKTAVER','1676092,47','2A','WM TUNAS PRODUKTIF','77120063','7048742909','40000000,00','29192529,99','','','','','14','2014-10-31','Belum Bayar',''),(47,'LD1324245290','ITA YUNI','2175232,07','2A','WM UTAMA PRODUKTIF','77709346','7059902223','100000000,00','81500087,69','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(48,'LD1326849478','DARMALINDA','1382937,37','2A','WM MADYA PRODUKTIF','76621308','7041502791','51000000,00','42679477,95','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(49,'LD1327321159','ROMI MARLISKHA','391379,25','2A','WM TUNAS GOLBERTAP','75025253','7024019084','11000000,00','8289523,09','','','','','14','2014-10-31','Telah Bayar','29 Oktober 2014'),(50,'LD1329455988','RAHMAT HIDAYAT','1421329,52','2A','KUR MIKRO JAMKRINDO','77872091','7062631265','15000000,00','1378640,67','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(51,'LD1329461303','YONESHI WAHYUNI','998611,82','2A','KUR MIKRO JAMKRINDO','76196361','7035530667','20000000,00','11905045,42','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(52,'LD1331870486','DONI DESVIA','250039,76','2A','KUR MIKRO JAMKRINDO','77963990','7064311764','20000000,00','15684390,12','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(53,'LD1335386361','ERWAN','285431,59','2A','CONSUMER PERUMAHAN GRIYA','76406141','7025234116','30000000,00','26598786,71','','','','','14','2014-10-31','Telah Bayar','29 Oktober 2014'),(54,'LD1335396059','ASWIR EFENDI','2450314,79','2A','WM UTAMA PRODUKTIF','75136655','7025234191','100000000,00','87236896,06','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(55,'LD1335837439','CHAIDIR LUBIS','8396295,46','2A','CONSUMER KENDARAAN OTOMOT','78140115','7067039593','260000000,00','203791957,90','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(56,'LD1405761266','EDI SISWANTO','105838,02','2A','KUR MIKRO JAMKRINDO','78315018','7069321881','3000000,00','2255608,71','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(57,'LD1405768957','TONY SETIA','321256,47','2A','KUR MIKRO JAMKRINDO','78315175','7069324481','10000000,00','8531172,45','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(58,'LD1411516160','WENDA EMAFRI','386878,50','2A','KUR MIKRO JAMKRINDO','77881235','7072308624','10000000,00','8970065,74','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(59,'LD1414866048','HENDRA','560812,95','2A','KUR MIKRO JAMKRINDO','78578701','7073238368','15000000,00','13775406,26','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(60,'LD1416114040','EDDY CHANDRA','463511,94','2A','KUR MIKRO JAMKRINDO','78604371','7073577645','11000000,00','9872602,26','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(61,'LD1420473891','DODI','3645956,29','2A','WM UTAMA PRODUKTIF','78360110','7069979402','70000000,00','65260675,82','','','','','14','2014-10-31','Telah Bayar','29 Oktober 2014'),(62,'LD7056792656','RIZAL EFENDI','7853742,38','2A','MUSYARAKAH PDB','77627988','7056572893','400000000,00','399628210,00','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(63,'LD7042548857','SUHARMAN','1120376,63','2A','MUSYARAKAH PDB','76521767','7040017757','100000000,00','80974440,37','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(64,'LD7049729159','WAZRI FIRDAUS','7689426,91','2A','MUSYARAKAH PDB','77182900','7049652218','750000000,00','743993686,57','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(65,'LD7049889296','RAFLIS RACHMAN','7866424,00','2A','MUSYARAKAH PDB','77177242','7049563374','750000000,00','750000000,00','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(66,'LD7050040059','EPI ERYANTI','8426948,26','2A','MUSYARAKAH PDB','74020523','7049959669','750000000,00','748143751,76','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(67,'LD7024019367','RENI GUSPITA','78465302,25','2C','MUSYARAKAH PDB','74020178','7024022198','750000000,00','750000000,00','','','','','14','2014-10-31','Belum Bayar',''),(68,'LD7053311819','HIDAYAH','1843862,88','2A','MUSYARAKAH PDB','75025259','7024020608','210000000,00','174398458,59','','','','','14','2014-10-31','Telah Bayar','27 Oktober 2014'),(69,'LD7053617756','SYAHRUDDIN HARAHAP','5420125,57','2A','MUSYARAKAH PDB','77468364','7053526335','500000000,00','499927771,58','','','','','14','2014-10-31','Telah Bayar','27 Oktober 2014'),(70,'LD7024019718','ARIF HIDAYAT','107737226,84','5','MUSYARAKAH PDB','75025562','7024023448','1000000000,00','982981080,86','','','','','14','2014-10-31','Belum Bayar',''),(71,'LD7050694016','MULHASBUANDI HSB','158156799,33','5','MUSYARAKAH PDB','77251101','7050577834','300000000,00','300000000,00','','','','','14','2014-10-31','Belum Bayar',''),(72,'LD7055075209','RIDO ILHAM','6442500,00','2A','MUSYARAKAH PDB','77562679','7054982048','650000000,00','650000000,00','','','','','14','2014-10-31','Telah Bayar','27 Oktober 2014');

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
  `marketing` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_upload` date DEFAULT NULL,
  `status_tunggakan` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_bayar` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`watchlist_id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `watchlist_temp` */

insert  into `watchlist_temp`(`watchlist_id`,`no_loan`,`nama_nasabah`,`total_tunggakan`,`kolektibilitas`,`jenis_produk`,`no_CIF`,`no_rekening_angsuran`,`plafon`,`os_pokok`,`angsuran_bulanan`,`persentase_bagi_hasil`,`usaha_nasabah`,`tujuan_pembiayaan`,`marketing`,`tgl_upload`,`status_tunggakan`,`tgl_bayar`) values (1,'LD1314249872','DEDE ROMEIZON','762.856,64','2A','KUR MIKRO JAMKRINDO','77378732','7052264458','20.000.000,00','12.692.600,69','','','','','13','2014-11-11','Telah Bayar','29 Oktober 2014'),(2,'LD1314255716','ZULHASMI','2.368.916,30','2C','KUR MIKRO JAMKRINDO','77247913','7050536747','20.000.000,00','11.620.640,90','','','','','13','2014-11-11','Belum Bayar',''),(3,'LD1314256570','HENDRI HIDAYAT','1.603.221,08','2A','CONSUMER PKPA TNI POLRI C','75025298','7024019602','90.000.000,00','70.232.578,45','','','','','13','2014-11-11','Telah Bayar','30 Oktober 2014'),(4,'LD1314256928','MULHASBUANDI HSB','111.058.782,17','5','Murabahah','77251101','7050577834','450.000.000,00','411.629.774,48','','','','','13','2014-11-11','Belum Bayar',''),(5,'LD1314257155','ARMIYANTO','768.710,55','2A','KUR MIKRO JAMKRINDO','77228610','7050270631','20.000.000,00','11.620.640,90','','','','','13','2014-11-11','Belum Bayar',''),(6,'LD1314265080','IRFAN','2.314.189,42','2A','WM UTAMA PRODUKTIF','77035193','7047708707','70.000.000,00','51.795.164,40','','','','','13','2014-11-11','Belum Bayar',''),(7,'LD1314271678','AMRI MASTA','1.645.271,81','2A','WM UTAMA PRODUKTIF','77059835','7048016008','51.000.000,00','35.384.235,57','','','','','13','2014-11-11','Telah Bayar','30 Oktober 2014'),(8,'LD1314276280','ZUBAIDAH','16.350.822,24','5','WM UTAMA PRODUKTIF','76776068','7044050255','51.000.000,00','37.440.589,69','','','','','13','2014-11-11','Belum Bayar',''),(9,'LD1314280851','NONO HARYADI','1.662.665,74','2A','WM MADYA PRODUKTIF','76602568','7041218635','40.000.000,00','15.889.958,68','','','','','13','2014-11-11','Telah Bayar','31 Oktober 2014'),(10,'LD1314292434','SYOFIAR','1.658.924,13','2A','CONSUMER IMPLAN SWASTA','76456223','7024019602','60.000.000,00','31.578.718,06','','','','','13','2014-11-11','Telah Bayar','30 Oktober 2014'),(11,'LD1314296714','HENDRA FITNARDI','260.921,91','2A','KUR MIKRO JAMKRINDO','76397247','7038244757','10.000.000,00','5.254.507,78','','','','','13','2014-11-11','Telah Bayar','29 Oktober 2014'),(12,'LD1314312767','NUR AINI','1.013.024,11','2A','WM UTAMA PRODUKTIF','76084015','7034025643','100.000.000,00','59.707.562,72','','','','','13','2014-11-11','Telah Bayar','30 Oktober 2014'),(13,'LD1314361046','RENI GUSPITA','27.479.704,33','3A','KECIL KOMERSIAL NON WM','74020178','7024022198','250.000.000,00','114.247.055,73','','','','','13','2014-11-11','Belum Bayar',''),(14,'LD1314376068','AMRIL','751.649,14','2A','KUR MIKRO JAMKRINDO','75264658','7026889067','20.000.000,00','9.356.257,12','','','','','13','2014-11-11','Telah Bayar','30 Oktober 2014'),(15,'LD1314376164','SRINARMI','6.607.679,63','2A','KECIL KOMERSIAL NON WM','75302779','7027366354','300.000.000,00','235.303.434,64','','','','','13','2014-11-11','Telah Bayar','30 Oktober 2014'),(16,'LD1314379908','HALIJAR','16.516.988,31','2B','CONSUMER MURABAHAH IRREGU','75199367','7026031677','232.082.089,54','142.121.586,37','','','','','13','2014-11-11','Belum Bayar',''),(17,'LD1314380436','HENDY HAMULIA','2.713.248,28','2A','CONSUMER KENDARAAN OTOMOT','75476983','7029647334','120.000.000,00','64.908.701,81','','','','','13','2014-11-11','Telah Bayar','31 Oktober 2014'),(18,'LD1314403882','HEFIAL MEIYARDI','1.591.338,18','2A','CONSUMER IMPLAN SWASTA','75389853','7024019602','75.000.000,00','48.459.140,20','','','','','13','2014-11-11','Telah Bayar','30 Oktober 2014'),(19,'LD1314404634','DESSY ASFRI YENTIE','952.873,70','2A','CONSUMER PKPA TNI POLRI C','75673759','7024019807','100.000.000,00','80.197.359,34','','','','','13','2014-11-11','Telah Bayar','29 Oktober 2014'),(20,'LD1314404637','YULFAIZAL','10.282,19','1','KECIL KOMERSIAL NON WM','75662803','7032139145','100.000.000,00','39.557.521,33','','','','','13','2014-11-11','Telah Bayar','30 Oktober 2014'),(21,'LD1314414190','YENTI','1.734.496,21','2A','CONSUMER PKPA TNI POLRI C','75377107','7024019602','100.000.000,00','85.229.395,93','','','','','13','2014-11-11','Telah Bayar','30 Oktober 2014'),(22,'LD1314416820','MIRIS','2.758.791,16','2A','CONSUMER PKPA TNI POLRI C','75222179','7026325697','200.000.000,00','155.503.941,26','','','','','13','2014-11-11','Belum Bayar',''),(23,'LD1314417613','HASNIAL KHATIMA','1.829.697,09','2A','CONSUMER PKPA TNI POLRI C','75655323','7024019602','100.000.000,00','79.085.942,27','','','','','13','2014-11-11','Telah Bayar','30 Oktober 2014'),(24,'LD1314417621','MASNIZAR','5.513.456,40','2B','CONSUMER PKPA TNI POLRI C','75575311','7036491692','85.000.000,00','21.892.155,36','','','','','13','2014-11-11','Belum Bayar',''),(25,'LD1314418097','YETTI SAPUTRI','957.916,62','2A','WM MADYA PRODUKTIF','75161686','7042871038','30.000.000,00','13.987.605,64','','','','','13','2014-11-11','Telah Bayar','30 Oktober 2014'),(26,'LD1314420854','YUSLINA','1.244.193,10','2A','CONSUMER PKPA TNI POLRI C','73672988','7024019602','45.000.000,00','15.749.875,34','','','','','13','2014-11-11','Telah Bayar','30 Oktober 2014'),(27,'LD1314452011','YONNI ZUHARMEN','8.774.385,07','4A','CONSUMER PKPA TNI POLRI C','73186559','7009631814','50.000.000,00','31.067.688,57','','','','','13','2014-11-11','Belum Bayar',''),(28,'LD1314454725','BURHANUDDIN PASARIBU','19.586.918,29','3A','CONSUMER PERUMAHAN GRIYA','73105683','7024021933','250.000.000,00','181.332.275,97','','','','','13','2014-11-11','Belum Bayar',''),(29,'LD1314457516','BURHANUDDIN PASARIBU','43.490.248,02','3A','CONSUMER PKPA TNI POLRI C','73105683','7024021933','500.000.000,00','334.862.410,30','','','','','13','2014-11-11','Belum Bayar',''),(30,'LD1314462645','RAHMAT KARI HUSIN','44.574,26','2A','KUR MIKRO JAMKRINDO','77399616','7052547983','20.000.000,00','7.655.540,84','','','','','13','2014-11-11','Telah Bayar','30 Oktober 2014'),(31,'LD1314466226','HENDRI YANTO','7.097.787,15','2A','CONSUMER PKPA TNI POLRI C','77213441','7050063897','500.000.000,00','456.810.100,04','','','','','13','2014-11-11','Belum Bayar',''),(32,'LD1314478348','MAYONIS','3.452.650,92','2A','CONSUMER PERUMAHAN GRIYA','77348590','7051852073','270.000.000,00','259.381.896,18','','','','','13','2014-11-11','Telah Bayar','31 Oktober 2014'),(33,'LD1314481277','IVO OKTAVER','4.799.657,40','2B','WM UTAMA PRODUKTIF','77120063','7048742909','100.000.000,00','70.229.226,75','','','','','13','2014-11-11','Belum Bayar',''),(34,'LD1314484520','MUHAMMAD DIAR','2.623.794,40','2A','CONSUMER PKPA TNI POLRI C','76207730','7024019653','78.000.000,00','3.035.042,19','','','','','13','2014-11-11','Telah Bayar','29 Oktober 2014'),(35,'LD1314484830','SUWARDI','4.425.283,79','2A','CONSUMER PERUMAHAN GRIYA','77173945','7024019653','250.000.000,00','210.184.945,16','','','','','13','2014-11-11','Belum Bayar',''),(36,'LD1314489519','NURMIATI','486.152,97','2A','CONSUMER PKPA TNI POLRI C','76128630','7034685872','80.000.000,00','70.236.150,08','','','','','13','2014-11-11','Belum Bayar',''),(37,'LD1314490986','HERI FADLI','1.741.469,83','2A','CONSUMER PKPA TNI POLRI C','76060175','7024019653','90.000.000,00','67.899.562,30','','','','','13','2014-11-11','Belum Bayar',''),(38,'LD1314492527','YUNEDI','1.603.221,08','2A','CONSUMER IMPLAN SWASTA','76015145','7024019602','90.000.000,00','75.633.690,46','','','','','13','2014-11-11','Telah Bayar','30 Oktober 2014'),(39,'LD1314496962','ELSA HARSIDA','506.065,00','2A','WM MADYA PRODUKTIF','76551274','7040525585','35.000.000,00','18.125.658,36','','','','','13','2014-11-11','Telah Bayar','31 Oktober 2014'),(40,'LD1314497956','LAYLA NUZLIATI','1.677.174,36','2A','WM MADYA PRODUKTIF','76485775','7039502679','39.000.000,00','25.809.596,24','','','','','13','2014-11-11','Telah Bayar','31 Oktober 2014'),(41,'LD1317608596','SYOFIA ELIDA','810.068,67','2A','Murabahah Warung Mikro','77184611','7049665029','20.000.000,00','13.611.524,46','','','','','13','2014-11-11','Telah Bayar','30 Oktober 2014'),(42,'LD1319809181','DEKKY PRIBADI','105.147.499,54','4C','CONSUMER PERUMAHAN GRIYA','77581696','7055329553','750.000.000,00','701.266.606,43','','','','','13','2014-11-11','Belum Bayar',''),(43,'LD1321441101','MILA DARNILA','2.685.372,72','2A','CONSUMER PERUMAHAN GRIYA','76172341','7035222787','245.000.000,00','230.292.537,58','','','','','13','2014-11-11','Telah Bayar','30 Oktober 2014'),(44,'LD1321493073','RIZAL EFENDI','3.892.553,54','2A','CONSUMER PERUMAHAN GRIYA','77627988','7056572893','350.000.000,00','328.989.339,54','','','','','13','2014-11-11','Telah Bayar','31 Oktober 2014'),(45,'LD1322428579','SYAMSUL KHIAR','2.970.212,39','2A','CONSUMER PERUMAHAN GRIYA','77637227','7056711516','230.000.000,00','224.192.954,85','','','','','13','2014-11-11','Belum Bayar',''),(46,'LD1324231213','IVO OKTAVER','1.676.092,47','2A','WM TUNAS PRODUKTIF','77120063','7048742909','40.000.000,00','29.192.529,99','','','','','13','2014-11-11','Belum Bayar',''),(47,'LD1324245290','ITA YUNI','2.175.232,07','2A','WM UTAMA PRODUKTIF','77709346','7059902223','100.000.000,00','81.500.087,69','','','','','13','2014-11-11','Telah Bayar','30 Oktober 2014'),(48,'LD1326849478','DARMALINDA','1.382.937,37','2A','WM MADYA PRODUKTIF','76621308','7041502791','51.000.000,00','42.679.477,95','','','','','13','2014-11-11','Telah Bayar','31 Oktober 2014'),(49,'LD1327321159','ROMI MARLISKHA','391.379,25','2A','WM TUNAS GOLBERTAP','75025253','7024019084','11.000.000,00','8.289.523,09','','','','','13','2014-11-11','Telah Bayar','29 Oktober 2014'),(50,'LD1329455988','RAHMAT HIDAYAT','1.421.329,52','2A','KUR MIKRO JAMKRINDO','77872091','7062631265','15.000.000,00','1.378.640,67','','','','','13','2014-11-11','Telah Bayar','31 Oktober 2014'),(51,'LD1329461303','YONESHI WAHYUNI','998.611,82','2A','KUR MIKRO JAMKRINDO','76196361','7035530667','20.000.000,00','11.905.045,42','','','','','13','2014-11-11','Telah Bayar','31 Oktober 2014'),(52,'LD1331870486','DONI DESVIA','250.039,76','2A','KUR MIKRO JAMKRINDO','77963990','7064311764','20.000.000,00','15.684.390,12','','','','','13','2014-11-11','Telah Bayar','31 Oktober 2014'),(53,'LD1335386361','ERWAN','285.431,59','2A','CONSUMER PERUMAHAN GRIYA','76406141','7025234116','30.000.000,00','26.598.786,71','','','','','13','2014-11-11','Telah Bayar','29 Oktober 2014'),(54,'LD1335396059','ASWIR EFENDI','2.450.314,79','2A','WM UTAMA PRODUKTIF','75136655','7025234191','100.000.000,00','87.236.896,06','','','','','13','2014-11-11','Telah Bayar','31 Oktober 2014'),(55,'LD1335837439','CHAIDIR LUBIS','8.396.295,46','2A','CONSUMER KENDARAAN OTOMOT','78140115','7067039593','260.000.000,00','203.791.957,90','','','','','13','2014-11-11','Telah Bayar','31 Oktober 2014'),(56,'LD1405761266','EDI SISWANTO','105.838,02','2A','KUR MIKRO JAMKRINDO','78315018','7069321881','3.000.000,00','2.255.608,71','','','','','13','2014-11-11','Telah Bayar','31 Oktober 2014'),(57,'LD1405768957','TONY SETIA','321.256,47','2A','KUR MIKRO JAMKRINDO','78315175','7069324481','10.000.000,00','8.531.172,45','','','','','13','2014-11-11','Telah Bayar','30 Oktober 2014'),(58,'LD1411516160','WENDA EMAFRI','386.878,50','2A','KUR MIKRO JAMKRINDO','77881235','7072308624','10.000.000,00','8.970.065,74','','','','','13','2014-11-11','Telah Bayar','30 Oktober 2014'),(59,'LD1414866048','HENDRA','560.812,95','2A','KUR MIKRO JAMKRINDO','78578701','7073238368','15.000.000,00','13.775.406,26','','','','','13','2014-11-11','Telah Bayar','30 Oktober 2014'),(60,'LD1416114040','EDDY CHANDRA','463.511,94','2A','KUR MIKRO JAMKRINDO','78604371','7073577645','11.000.000,00','9.872.602,26','','','','','13','2014-11-11','Telah Bayar','30 Oktober 2014'),(61,'LD1420473891','DODI','3.645.956,29','2A','WM UTAMA PRODUKTIF','78360110','7069979402','70.000.000,00','65.260.675,82','','','','','13','2014-11-11','Telah Bayar','29 Oktober 2014'),(62,'LD7056792656','RIZAL EFENDI','7.853.742,38','2A','MUSYARAKAH PDB','77627988','7056572893','400.000.000,00','399.628.210,00','','','','','13','2014-11-11','Telah Bayar','31 Oktober 2014'),(63,'LD7042548857','SUHARMAN','1.120.376,63','2A','MUSYARAKAH PDB','76521767','7040017757','100.000.000,00','80.974.440,37','','','','','13','2014-11-11','Telah Bayar','31 Oktober 2014'),(64,'LD7049729159','WAZRI FIRDAUS','7.689.426,91','2A','MUSYARAKAH PDB','77182900','7049652218','750.000.000,00','743.993.686,57','','','','','13','2014-11-11','Telah Bayar','30 Oktober 2014'),(65,'LD7049889296','RAFLIS RACHMAN','7.866.424,00','2A','MUSYARAKAH PDB','77177242','7049563374','750.000.000,00','750.000.000,00','','','','','13','2014-11-11','Telah Bayar','30 Oktober 2014'),(66,'LD7050040059','EPI ERYANTI','8.426.948,26','2A','MUSYARAKAH PDB','74020523','7049959669','750.000.000,00','748.143.751,76','','','','','13','2014-11-11','Telah Bayar','31 Oktober 2014'),(67,'LD7024019367','RENI GUSPITA','78.465.302,25','2C','MUSYARAKAH PDB','74020178','7024022198','750.000.000,00','750.000.000,00','','','','','13','2014-11-11','Belum Bayar',''),(68,'LD7053311819','HIDAYAH','1.843.862,88','2A','MUSYARAKAH PDB','75025259','7024020608','210.000.000,00','174.398.458,59','','','','','13','2014-11-11','Telah Bayar','27 Oktober 2014'),(69,'LD7053617756','SYAHRUDDIN HARAHAP','5.420.125,57','2A','MUSYARAKAH PDB','77468364','7053526335','500.000.000,00','499.927.771,58','','','','','13','2014-11-11','Telah Bayar','27 Oktober 2014'),(70,'LD7024019718','ARIF HIDAYAT','107.737.226,84','5','MUSYARAKAH PDB','75025562','7024023448','1.000.000.000,00','982.981.080,86','','','','','13','2014-11-11','Belum Bayar',''),(71,'LD7050694016','MULHASBUANDI HSB','158.156.799,33','5','MUSYARAKAH PDB','77251101','7050577834','300.000.000,00','300.000.000,00','','','','','13','2014-11-11','Belum Bayar',''),(72,'LD7055075209','RIDO ILHAM','6.442.500,00','2A','MUSYARAKAH PDB','77562679','7054982048','650.000.000,00','650.000.000,00','','','','','13','2014-11-11','Telah Bayar','27 Oktober 2014');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
