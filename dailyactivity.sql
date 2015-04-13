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

/*Table structure for table `daily_bo` */

DROP TABLE IF EXISTS `daily_bo`;

CREATE TABLE `daily_bo` (
  `daily_bo_id` int(100) NOT NULL AUTO_INCREMENT,
  `jumlah_transaksi` int(10) DEFAULT NULL,
  `kriteria_transaksi` int(2) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `nama_pegawai` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `info` text COLLATE utf8_bin,
  `tanggal` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `status_transaksi` int(1) DEFAULT NULL,
  PRIMARY KEY (`daily_bo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_bo` */

insert  into `daily_bo`(`daily_bo_id`,`jumlah_transaksi`,`kriteria_transaksi`,`total`,`nama_pegawai`,`info`,`tanggal`,`status`,`status_transaksi`) values (1,12,9,100000000,'Ulil','Sip','2015-04-10',2,2);

/*Table structure for table `daily_bo_kriteria_transaksi` */

DROP TABLE IF EXISTS `daily_bo_kriteria_transaksi`;

CREATE TABLE `daily_bo_kriteria_transaksi` (
  `jenis_transaksi_id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `rank` int(2) NOT NULL,
  PRIMARY KEY (`jenis_transaksi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_bo_kriteria_transaksi` */

insert  into `daily_bo_kriteria_transaksi`(`jenis_transaksi_id`,`nama`,`rank`) values (1,'Transaksi Biaya',2),(2,'Transaksi SKN',0),(3,'Transaksi RTGS',0),(4,'Pembukaan Deposito',0),(5,'Pencairan Deposito',0),(6,'Pencairan Small & Konsumer',0),(7,'Pelunasan Small & Konsumer',0),(8,'Pencairan Mikro',0),(9,'Pelunasan Mikro',0),(10,'Pencairan Talangan Haji',0),(11,'Pelunasan Talangan Haji',0),(12,'Pencairan/Perpanjangan Gadai Emas',0),(13,'Pelunasan Gadai Emas',0),(14,'Penginputan BI Checking',0),(15,'Pembayaran Biaya Bulanan',0),(16,'Pembayaran Rekanan',0),(17,'Transaksi Pembayaran Angsuran',0),(18,'Transaksi Penyusutan Bulanan',0),(19,'Pelaporan - SID',0),(20,'Pelaporan - Pajak',0),(21,'Pelaporan - Lembur Staff',0),(22,'Pelaporan - Lembur Non-Staff',0),(23,'Pelaporan - Proofsheet',0),(24,'Rekap Absensi',0),(25,'Aktivitas Kepegawaian',0),(26,'Saldo Kas Kecil Akhir Hari',0),(27,'Saldo Rekening Perantara Akhir Hari',0),(28,'Saldo Materai Akhir Hari',0),(29,'Waktu Istirahat',0),(30,'SE yang dibaca & dipahami',0),(31,'Lain - Lain',0),(33,'Krita',0),(35,'tes satu',1),(36,'tes tiga',3);

/*Table structure for table `daily_bo_progress` */

DROP TABLE IF EXISTS `daily_bo_progress`;

CREATE TABLE `daily_bo_progress` (
  `dbo_progress_id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`dbo_progress_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_bo_progress` */

insert  into `daily_bo_progress`(`dbo_progress_id`,`nama`) values (1,'DONE'),(2,'ON PROGRESS'),(3,'PENDING');

/*Table structure for table `daily_cs` */

DROP TABLE IF EXISTS `daily_cs`;

CREATE TABLE `daily_cs` (
  `daily_cs_id` int(100) NOT NULL AUTO_INCREMENT,
  `kriteria_nasabah` int(2) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `nama_pegawai` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `info` text COLLATE utf8_bin,
  `tanggal` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`daily_cs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_cs` */

insert  into `daily_cs`(`daily_cs_id`,`kriteria_nasabah`,`jumlah`,`total`,`nama_pegawai`,`info`,`tanggal`,`status`) values (1,1,3,45,'Customer Service1','Yuuu','2015-04-10',1);

/*Table structure for table `daily_cs_kriteria_nasabah` */

DROP TABLE IF EXISTS `daily_cs_kriteria_nasabah`;

CREATE TABLE `daily_cs_kriteria_nasabah` (
  `cs_kriteria_nasabah_id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `rank` int(2) NOT NULL,
  PRIMARY KEY (`cs_kriteria_nasabah_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_cs_kriteria_nasabah` */

insert  into `daily_cs_kriteria_nasabah`(`cs_kriteria_nasabah_id`,`nama`,`rank`) values (1,'Tabungan BSM',2),(2,'Tabungan Simpatik',0),(3,'Tabungan Berencana',0),(4,'Tabungan Investa Cendikia',0),(5,'Tabungan Mabrur',0),(6,'TabunganKu',0),(7,'Giro',0),(8,'Deposito',0),(9,'Talangan Haji',0),(10,'TabunganKu',0),(11,'Giro',1),(12,'BSM Mobile Banking',0),(13,'BSM Net Banking',0),(14,'Top-Up Nasabah Eksisting',0),(15,'Follow-Up Rekening Dormant',0),(16,'Follow-Up Past Due haji',0),(17,'Waktu Istirahat',0),(18,'SE yang dibaca & dipahami',0),(19,'Lain - Lain',0),(22,'tess',3);

/*Table structure for table `daily_sa` */

DROP TABLE IF EXISTS `daily_sa`;

CREATE TABLE `daily_sa` (
  `daily_sa_id` int(100) NOT NULL AUTO_INCREMENT,
  `jumlah_nasabah` int(10) DEFAULT NULL,
  `no_kontak` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `total` float DEFAULT NULL,
  `segmen` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `nama_pegawai` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `info` text COLLATE utf8_bin,
  `status` int(1) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `kriteria_nasabah` int(2) DEFAULT NULL,
  PRIMARY KEY (`daily_sa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_sa` */

insert  into `daily_sa`(`daily_sa_id`,`jumlah_nasabah`,`no_kontak`,`total`,`segmen`,`nama_pegawai`,`info`,`status`,`tanggal`,`kriteria_nasabah`) values (1,2,'56456456456456',1500000000,'Small','Vany','',2,'2015-04-09',15),(2,2,'5456456464',200000000,'Konsumer','Vany','',1,'2015-04-09',3);

/*Table structure for table `daily_sa_kriteria_nasabah` */

DROP TABLE IF EXISTS `daily_sa_kriteria_nasabah`;

CREATE TABLE `daily_sa_kriteria_nasabah` (
  `sa_kriteria_nasabah_id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `rank` int(2) NOT NULL,
  PRIMARY KEY (`sa_kriteria_nasabah_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_sa_kriteria_nasabah` */

insert  into `daily_sa_kriteria_nasabah`(`sa_kriteria_nasabah_id`,`nama`,`rank`) values (1,'Lending - Sosialisasi',2),(2,'Lending - Solisit',0),(3,'Lending - Pengumpulan Data',0),(4,'Lending - BI Checking',0),(5,'Lending - Taksasi Agunan',0),(6,'Lending - Investigasi',0),(7,'Lending - Analisa',0),(8,'Lending - SP3',0),(9,'Lending - Akad',0),(10,'Lending - Pencairan',0),(11,'Perpanjangan - Pengumpulan Data',0),(12,'Perpanjangan - BI Checking',0),(13,'Perpanjangan - Taksasi Agunan',0),(14,'Perpanjangan - Investigasi',0),(15,'Perpanjangan - Analisa',0),(16,'Perpanjangan - SP3',0),(17,'Perpanjangan - Akad',0),(18,'Perpanjangan - Eksekusi Perpanjangan',0),(19,'Pick-up Angsuran Nasabah',0),(20,'Tagih Past Due Bulan Sebelumnya',0),(21,'Peringatan Nasabah - SPMK',0),(22,'Peringatan Nasabah - SP1',0),(23,'Peringatan Nasabah - SP2',0),(24,'Peringatan Nasabah - SP3',0),(25,'Funding - Sosialisasi',0),(26,'Funding - Solisit',0),(27,'Funding - Follow Up',0),(28,'Funding - Closing',0),(29,'Pick-up Tabungan Nasabah',0),(30,'SE yang dibaca & dipahami',0),(31,'Waktu Istirahat',0),(32,'Lain - Lain',0),(34,'tes satu',1),(35,'tes tiga',3);

/*Table structure for table `daily_security` */

DROP TABLE IF EXISTS `daily_security`;

CREATE TABLE `daily_security` (
  `daily_security_id` int(100) NOT NULL AUTO_INCREMENT,
  `nama_inputer` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jenis_nasabah` int(2) NOT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `info` varchar(100) COLLATE utf8_bin NOT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`daily_security_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_security` */

insert  into `daily_security`(`daily_security_id`,`nama_inputer`,`tanggal`,`jenis_nasabah`,`jumlah`,`info`,`status`) values (1,'Ulil','2015-04-10',1,3,'OK',1),(2,'Ulil','2015-04-10',5,4,'Suip',1),(3,'tes','2015-04-13',1,12,'122',1);

/*Table structure for table `daily_security_jenis_nasabah` */

DROP TABLE IF EXISTS `daily_security_jenis_nasabah`;

CREATE TABLE `daily_security_jenis_nasabah` (
  `jenis_nasabah_id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `rank` int(2) NOT NULL,
  PRIMARY KEY (`jenis_nasabah_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_security_jenis_nasabah` */

insert  into `daily_security_jenis_nasabah`(`jenis_nasabah_id`,`nama`,`rank`) values (1,'Nasabah Teller Front',2),(2,'Nasabah Customer Service (CS)',3),(3,'Nasabah Marketing',0),(4,'Nasabah Mikro',0),(5,'Nasabah Gadai',0),(6,'Lain - Lain',0),(8,'Tes',1);

/*Table structure for table `daily_security_status` */

DROP TABLE IF EXISTS `daily_security_status`;

CREATE TABLE `daily_security_status` (
  `status_id` int(1) NOT NULL,
  `nama` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_security_status` */

insert  into `daily_security_status`(`status_id`,`nama`) values (1,'Baru'),(2,'Approve'),(3,'Tolak');

/*Table structure for table `daily_teller` */

DROP TABLE IF EXISTS `daily_teller`;

CREATE TABLE `daily_teller` (
  `daily_teller_id` int(100) NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `kriteria_transaksi` int(2) DEFAULT NULL,
  `jumlah` int(5) NOT NULL,
  `total` float NOT NULL,
  `info` text COLLATE utf8_bin,
  `tanggal` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`daily_teller_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_teller` */

insert  into `daily_teller`(`daily_teller_id`,`nama_pegawai`,`kriteria_transaksi`,`jumlah`,`total`,`info`,`tanggal`,`status`) values (1,'Ulil',2,12,4000000,'Sip','2015-04-10',1);

/*Table structure for table `daily_teller_kriteria_transaksi` */

DROP TABLE IF EXISTS `daily_teller_kriteria_transaksi`;

CREATE TABLE `daily_teller_kriteria_transaksi` (
  `jenis_transaksi_id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `rank` int(2) NOT NULL,
  PRIMARY KEY (`jenis_transaksi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_teller_kriteria_transaksi` */

insert  into `daily_teller_kriteria_transaksi`(`jenis_transaksi_id`,`nama`,`rank`) values (1,'Total Transaksi',2),(2,'Transaksi Setoran',0),(3,'Transaksi Penarikan',0),(4,'Transaksi Net Banking',0),(5,'Transaksi Transfer Tunai',0),(6,'Saldo Teller Akhir Hari',0),(7,'Saldo Khasanah Akhir Hari',0),(8,'Saldo ATM Akhir Hari',0),(9,'Cross Selling',0),(10,'Waktu Istirahat',0),(11,'SE yang dibaca & dipahami',0),(12,'Lain - Lain',0),(14,'tes sat',1),(15,'tes tiga',3);

/*Table structure for table `daily_wm` */

DROP TABLE IF EXISTS `daily_wm`;

CREATE TABLE `daily_wm` (
  `daily_wm_id` int(100) NOT NULL AUTO_INCREMENT,
  `jumlah_nasabah` int(10) DEFAULT NULL,
  `kriteria_nasabah` int(2) DEFAULT NULL,
  `no_kontak` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `total` float DEFAULT NULL,
  `nama_pegawai` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `info` text COLLATE utf8_bin,
  `status` int(1) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`daily_wm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_wm` */

/*Table structure for table `daily_wm_kriteria_nasabah` */

DROP TABLE IF EXISTS `daily_wm_kriteria_nasabah`;

CREATE TABLE `daily_wm_kriteria_nasabah` (
  `wm_kriteria_nasabah_id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `rank` int(2) NOT NULL,
  PRIMARY KEY (`wm_kriteria_nasabah_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_wm_kriteria_nasabah` */

insert  into `daily_wm_kriteria_nasabah`(`wm_kriteria_nasabah_id`,`nama`,`rank`) values (1,'Tahap - Sosialisasi',2),(2,'Tahap - Solisit',0),(3,'Tahap - Pengumpulan Data',0),(4,'Tahap - BI Checking',0),(5,'Tahap - Taksasi Agunan',0),(6,'Tahap - Investigasi',0),(7,'Tahap - Analisa',0),(8,'Tahap - SP3',0),(9,'Tahap - Akad',0),(10,'Tahap - Pencairan',0),(11,'Pick-up Angsuran Nasabah',0),(12,'Tagih Past Due Bulan Sebelumnya',0),(13,'Peringatan Nasabah - SPMK',0),(14,'Peringatan Nasabah - SP1',0),(15,'Peringatan Nasabah - SP2',0),(16,'Peringatan Nasabah - SP3',0),(17,'Funding - Sosialisasi',0),(18,'Funding - Solisit',0),(19,'Funding - Follow Up',0),(20,'Funding - Closing',0),(21,'Pick-up Tabungan Nasabah',0),(22,'SE yang dibaca & dipahami',0),(23,'Waktu Istirahat',0),(24,'Lain - Lain',0),(26,'tes sat',1),(27,'tes ti',3);

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `mtb_jabatan` */

insert  into `mtb_jabatan`(`id_jabatan`,`nama_jabatan`) values (8,'Branch Manager'),(9,'Sub Branch Manager'),(13,'Manager Marketing (MM)'),(14,'Area Sales Manager (ASM)'),(15,'Kepala Warung Mikro (KWM)'),(16,'Retail Banking Officer (RBO)'),(19,'Officer Gadai (OG)'),(20,'Sales Assistant (SA)'),(21,'Asisten Analis Mikro (AAM)'),(22,'Pelaksana Penaksir Gadai (PPG)'),(23,'Account Maintenance');

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
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `mtb_pegawai` */

insert  into `mtb_pegawai`(`pegawai_id`,`no_urut`,`nama`,`NIP`,`jabatan`,`no_handphone`,`email`,`unit_kerja`,`email_atasan`,`level_jabatan`) values (16,'032','Maria Gunarti','108676080',21,'0813-74190906','mgunarti@bsm.co.id',3,'rnur1780@bsm.co.id',3),(15,'031','Nicko Gemayel','148713908',20,'0852-71589848','ngemayel@bsm.co.id',3,'rnur1780@bsm.co.id',3),(14,'030','Silvany Riza','118278205',20,'0812-6524091','sriza@bsm.co.id',3,'rnur1780@bsm.co.id',3),(13,'011','Ridwan Nur','047871780',9,'0852-76102270','rnur1780@bsm.co.id',3,'alhuda@bsm.co.id',2),(12,'010','Alhuda Djannis','007270489',8,'0816-1368853','alhuda@bsm.co.id',2,'ddurachman@bsm.co.id',2),(11,'001','Administrator','76102270',9,'0853-76102270','drankoto25@gmail.com',3,'rnur1780@bsm.co.id',1),(17,'012','Dedi Azmeli','037571378',9,'08126797660','dazmeli@bsm.co.id',8,'alhuda@bsm.co.id',2),(18,'020','Risa Anggraini','118579247',19,'082169583344','ranggraini@bsm.co.id',8,'dazmeli@bsm.co.id',2),(19,'033','Subhannoto','108176697',20,'081363027265','subhannoto@bsm.co.id',8,'dazmeli@bsm.co.id',3),(20,'034','Hendra Wahyudi','128412326',20,'081374222323','hwahyudi1064@bsm.co.id',8,'dazmeli@bsm.co.id',3),(21,'035','Aprizal','118179210',21,'081268377111','aprizal@bsm.co.id',8,'dazmeli@bsm.co.id',3),(22,'036','Ilma Ranita Sari','108777277',22,'081363967495','irsari7277@bsm.co.id',8,'dazmeli@bsm.co.id',3),(23,'013','Arief Hidayat','078272934',9,'08126799440','ahidayat82@bsm.co.id',9,'alhuda@bsm.co.id',2),(24,'021','Indrahman Syaiful','128771041',15,'085272715484','isyaiful@bsm.co.id',9,'ahidayat82@bsm.co.id',3),(25,'037','Donny Kurniawan','108475410',16,'08126745778','dkurniawan5410@bsm.co.id',9,'ahidayat82@bsm.co.id',3),(26,'038','Sri Maria Wahyuni','108675411',20,'081374370086','smwahyuni@bsm.co.id',9,'ahidayat82@bsm.co.id',3),(27,'014','Zulveri','057472638',9,'08126724586','zulveri@bsm.co.id',7,'alhuda@bsm.co.id',2),(28,'022','Ii Iswandi','127911319',15,'082387004623','iiswandi@bsm.co.id',7,'zulveri@bsm.co.id',3),(29,'039','Fadli','118379211',20,'08127668669','fadli@bsm.co.id',7,'zulveri@bsm.co.id',3),(30,'040','Fauziah','118979217',20,'085263637679','fauziah9217@bsm.co.id',7,'zulveri@bsm.co.id',3),(31,'041','Yanche Dede Saputra','108075069',20,'081363886633','ydsaputra@bsm.co.id',7,'zulveri@bsm.co.id',3),(32,'015','Ibnu Fadhli','108276695',9,'081363054582','ifadhli@bsm.co.id',6,'alhuda@bsm.co.id',2),(33,'023','Arsyad Sani','128711036',15,'081267718017','asani1036@bsm.co.id',6,'ifadhli@bsm.co.id',2),(34,'042','Shefri Donaldy','108877571',20,'085274739909','sdonaldy@bsm.co.id',6,'ifadhli@bsm.co.id',3),(35,'043','Franky Diyedra','128912204',20,'081365442508','fdiyedra@bsm.co.id',6,'ifadhli@bsm.co.id',3),(36,'044','Indra Febrian','108777266',21,'085365089130','ifebrian@bsm.co.id',6,'ifadhli@bsm.co.id',3),(37,'045','Tasnim Firdaus','108775137',20,'123456789','tfirdaus@bsm.co.id',8,'dazmeli@bsm.co.id',3),(38,'080','Syamsu Rizal','138312725',23,'0813-20203646','srizal2725@bsm.co.id',3,'dhartanto3821@bsm.co.id',3),(39,'046','Faizal Daus','098574347',20,'123456789','fdaus@bsm.co.id',2,'alhuda@bsm.co.id',3),(40,'047','Jhonny Elda Fera','108487167',16,'123456789','jefera@bsm.co.id',2,'alhuda@bsm.co.id',3),(41,'048','Rahmon','118479196',20,'123456789','rahmon@bsm.co.id',2,'alhuda@bsm.co.id',3),(42,'024','Suwatril Anton','108576119',15,'123456789','santon@bsm.co.id',2,'alhuda@bsm.co.id',2),(43,'049','Wellya Nurmathias ','108875403',21,'123456789','wnurmathias@bsm.co.id',2,'santon@bsm.co.id',3),(44,'050','M. Hamdayon Yusuf Ultissio','118678301',20,'123456789','mhyusuf@bsm.co.id',2,'alhuda@bsm.co.id',3);

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

insert  into `mtb_setting`(`id`,`alert_status`) values (1,'1');

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

insert  into `mtb_text`(`id`,`text`,`show`) values (1,'JANGAN LUPA ISI KUISIONER-NYA YACH....',1),(5,'Bismillah, Perangi Fraud. Integritas Harga Mati !!!',1),(7,'Pahami dan Patuhi Aturan',1),(8,'Jaga diri, jaga keluarga, jaga kawan, jaga BSM',1),(9,'5 to BE ( Be On Time, Belajar tuk Diri, Be Proaktif, Bersih Rapi Areaku, Bugar Sehat & Senyum Selalu )',1),(10,'... Boleh jadi kamu membenci sesuatu, padahal ia amat baik bagimu, dan boleh jadi (pula) kamu menyukai sesuatu, padahal ia amat buruk bagimu; Allah mengetahui, sedang kamu tidak mengetahui. (Al Baqarah : 216)',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `mtb_user` */

insert  into `mtb_user`(`user_id`,`user_name`,`email_address`,`jabatan_id`,`password`,`hak_akses`,`NIP`,`id_pegawai`) values (25,'Silvany Riza','sriza@bsm.co.id',20,'$2a$13$ZpEVPaz3OV2ks3AbHHQHvujkmxnroRMsFM9r0gDGewjIvFJaLyFSq',2,'118278205',14),(27,'Maria Gunarti','mgunarti@bsm.co.id',21,'$2a$13$rrSQT8Io7Oee4Nf81Y2v0.qAe2uVT97Rs//mn/nM9zV2w0Z8hF6Ce',3,'108676080',16),(28,'Alhuda Djannis','alhuda@bsm.co.id',8,'$2a$13$lzu2Wrp84b3mBpbt884jpOXnPv5egkZIUWACjz6bf3F8vH9RWQ.Vu',2,'007270489',12),(29,'Ridwan Nur','rnur1780@bsm.co.id',9,'$2a$13$ItTVNFqT8IMemrgSITnnIuqo4SZovc9wleKxuRoi3hB2skCYsiH8K',2,'047871780',13),(30,'Administrator','drankoto25@gmail.com',9,'$2a$13$QxQ/Tw4kdL8XlFVyqsU8BuXnSUCnlv4931JJdHxx.nLlmZceYefZ.',1,'76102270',11),(31,'Nicko Gemayel','ngemayel@bsm.co.id',20,'$2a$13$qcFFssgxRRHTcc5D3jQchey8RnpSbvHM1gD7xaQm5tz/s5Z5jw4he',3,'148713908',15),(32,'Dedi Azmeli','dazmeli@bsm.co.id',9,'$2a$13$bI0hFP5M9eDhas7uaCwn5.zTZ/HwrwNWGTAObcjkfxsng7XxjO49y',2,'037571378',17),(33,'Risa Anggraini','ranggraini@bsm.co.id',19,'$2a$13$jZN8/fsW6GbtxNG3i9wY1uuw483YBIqHWMjsbs/H8cCt3AlSOiBcm',2,'118579247',18),(34,'Subhannoto','subhannoto@bsm.co.id',20,'$2a$13$KxYS223F/KBlVoV9L24tV.k2/6UHs6DQ6qGyNlHJQ0nDKjX9XjeJm',3,'108176697',19),(35,'Hendra Wahyudi','hwahyudi1064@bsm.co.id',20,'$2a$13$iqM9UcWAmsnYiXTlzqI/6u18nVAY.HtzdIEO6kuOferwW6IXmkoWq',3,'128412326',20),(36,'Aprizal','aprizal@bsm.co.id',21,'$2a$13$xH8L29Jle3K7DD/LLJKO3O2bDcfhSgK43AkuQZo5/9s/7lkt.obzS',3,'118179210',21),(37,'Ilma Ranita Sari','irsari7277@bsm.co.id',22,'$2a$13$9sUArLFWQ0Qjpn2hGsL1EOQHI1IRyGS1ZIepLZd58X8skEf00Qgrq',3,'108777277',22),(38,'Indrahman Syaiful','isyaiful@bsm.co.id',15,'$2a$13$QUrcWSSd6060SOgMSZeCNe.BTPM.pASA9rwyywZDoWARvWTKgWMii',3,'128771041',24),(39,'Donny Kurniawan','dkurniawan5410@bsm.co.id',16,'$2a$13$6KTlIyRM6Oz8BJMoYgNUZOOSPxR7c2ZF1urBEcIC4egMhaxaMiR0.',3,'108475410',25),(40,'Sri Maria Wahyuni','smwahyuni@bsm.co.id',20,'$2a$13$sC5KnB4G.6sXpR.4JPovAeKWRvL9.Q7nn8pYo2wmSn3JdSNRYDvea',3,'108675411',26),(41,'Arief Hidayat','ahidayat82@bsm.co.id',9,'$2a$13$Ns5stiGJYX.YTlwkHbCO0e0VG7.3yjoQl1XDJCnU7S/v1fBy4nhUm',2,'078272934',23),(42,'Zulveri','zulveri@bsm.co.id',9,'$2a$13$/swSMJZJRKswCUlKcI6g8eDOwFmPaamjPT7Sr0HkKCs1BEjRgSkWy',2,'057472638',27),(43,'Ii Iswandi','iiswandi@bsm.co.id',15,'$2a$13$mwQit2EZAyjcuIPZqbRbBuviu6cVbK1DtmEEE.tDfyZK8MMR5JK8e',3,'127911319',28),(44,'Fadli','fadli@bsm.co.id',20,'$2a$13$MxunaAih4g3ZVv9NXlUI4ed8E5SesjEsHEg0afQOgiurrA8r8PHLu',3,'118379211',29),(45,'Fauziah','fauziah9217@bsm.co.id',20,'$2a$13$wVsp8/XJhSrMApFbZuXPzueWR0R1yRC4TLvtPA85EQh88gaud/53G',3,'118979217',30),(46,'Yanche Dede Saputra','ydsaputra@bsm.co.id',20,'$2a$13$Z1Nd3.kFjliD718l89vpa.V8kgzJtHZeOPEbg425bPR7pWiiTkMBe',3,'108075069',31),(47,'Shefri Donaldy','sdonaldy@bsm.co.id',20,'$2a$13$2AV8RXlJHiZi4Lm2xSn4MuPOe63zqo0UEanpVEh/kbJbXiYkF4D0u',3,'108877571',34),(48,'Franky Diyedra','fdiyedra@bsm.co.id',20,'$2a$13$O1pT8o8xeAurgkCT4T403.2AXWLwu7QaA3uq9qxg6StXMOssRwCa2',3,'128912204',35),(50,'Arsyad Sani','asani1036@bsm.co.id',15,'$2a$13$sJD/6WHT64jhUdNkHys25OU.0Ph6Py8ob8nTBpX/9j8MA9r.driua',2,'128711036',33),(51,'Indra Febrian','ifebrian@bsm.co.id',21,'$2a$13$SUEJEOfGogaQ4tgrsSHDxucKSJDaerRgNeZaHVP3vUJRtkkPm64tu',3,'108777266',36),(52,'Ibnu Fadhli','ifadhli@bsm.co.id',9,'$2a$13$pwfKO4Eqt3wgeRUQgR4yG.o5Iz0dGK1z53ZrYsQVLN9bNu/JL5GZi',2,'108276695',32),(53,'Tasnim Firdaus','tfirdaus@bsm.co.id',20,'$2a$13$y2roEMqUm9jLw.BQLybtmua5Hl1OVBpdNdpP4m2qphaY6Im8C62WO',3,'108775137',37),(54,'Syamsu Rizal','srizal2725@bsm.co.id',23,'$2a$13$kRs05Csel/SpebZhaFrKLOmUNgaL1/FDa5p8BZbOUer38xI5wguwS',3,'138312725',38),(55,'Faizal Daus','fdaus@bsm.co.id',20,'$2a$13$N0d767m5pwZjfj7aaUNzuOWwJukrowYzfSv8IdQGsdXfH4c8DBdBy',3,'098574347',39),(56,'Jhonny Elda Fera','jefera@bsm.co.id',16,'$2a$13$qi2VOKQ5HC3YiCOyezWYxOuP359ZTDsvRPt8GDuj9uCWzD.W0bgt.',3,'108487167',40),(57,'Rahmon','rahmon@bsm.co.id',20,'$2a$13$t0gyZk192rBhkuhCOIhHBex7sYiZwYUVhEw/379yaQp6NqkFC6VIq',3,'118479196',41),(58,'Wellya Nurmathias ','wnurmathias@bsm.co.id',21,'$2a$13$hi/RxNT1C6d6wud1t/O4x.gLUGQCIx/VZSKj9cHztE6LVLwG5meni',3,'108875403',43),(59,'Suwatril Anton','santon@bsm.co.id',15,'$2a$13$7ad.ctIXfSNCXkJTbBMUo.lmXaq0VUCZu0oC3cBjZEhIm4dOSzmgm',2,'108576119',42),(60,'M. Hamdayon Yusuf Ultissio','mhyusuf@bsm.co.id',20,'$2a$13$In948PwKKpPjj1J51AxWC.T7wAaKU6WCqG/LOSqSeeO11Cva/FR3O',3,'118678301',44);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `naspoma` */

/*Table structure for table `naspoma_kartu_keluarga` */

DROP TABLE IF EXISTS `naspoma_kartu_keluarga`;

CREATE TABLE `naspoma_kartu_keluarga` (
  `no_kartu_keluarga` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_ktp` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `naspoma_id` int(5) DEFAULT NULL,
  `tempat_lahir` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `naspoma_kartu_keluarga` */

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
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `proposal` */

insert  into `proposal`(`proposal_id`,`plafon`,`tanggal_pengajuan`,`segmen`,`jenis_usaha`,`marketing`,`no_kartu_keluarga`,`no_buku_nikah`,`no_ktp`,`no_proposal`,`status_pengajuan`,`jenis_nasabah`,`existing_plafon`,`existing_os`,`existing_angsuran`,`existing_kolektabilitas`,`referal_nama`,`referal_alamat`,`referal_telp`,`referal_sektor_usaha`,`referal_fasilitas`,`referal_kolektabilitas`,`del_flag`,`nama_nasabah`,`jenis_identitas`,`tanggal_kartu_keluarga`) values (1,'40000000','2014-10-15',6,'Golbertap','16','1308073108070002','','1308071304800002','0001/11/2014','3',1,'','','',NULL,'','','','','','',0,'DIRMAN',1,'2014-03-21'),(2,'150000000','2014-11-03',4,'PNS','14','1308022903070004','344/40/VII/2005','1308055604690001','0002/11/2014','1',1,'','','',NULL,'','','','','','',0,'ITA WISIKARTIYAH',1,'2010-07-26'),(3,'300000000','2014-11-03',5,'TOKO BANGUNAN','15','1308052112090001','235/39/VIII/2007','1308051706840005','0003/11/2014','2',1,'','','',NULL,'','','','','','',0,'AHMAD RAMADHANI',1,'2012-05-02'),(4,'300000000','2014-10-13',5,'TOKO ELEKTRONIK','14','1308172407070003','126/01/X/2002','1308170406770001','0004/11/2014','1',1,'','','',NULL,'','','','','','',0,'M.RAFLIA',1,'2012-03-20'),(5,'40000000','2014-10-05',6,'Dagang Harian','16','1308031408080048','','1308071606650001','0006/11/2014','3',1,'','','',NULL,'','','','','','',0,'SYAMSUDDIN RAMBE',1,'2011-02-28'),(6,'50000000','2014-11-03',6,'KEBUN COKLAT','16','1308193005110001','','1308190405640002','0007/11/2014','3',1,'','','',NULL,'','','','','','',0,'ABDUL HADI LUBIS',1,'2014-09-12'),(7,'50000000','2014-10-20',6,'DAGANG SAYUR DAN KEBUN COKLAT','16','1308071910090007','648/1/1983','1308070709600001','0008/11/2014','1',1,'','','',NULL,'','','','','','',0,'AMRY',1,'2013-09-09'),(8,'20000000','2014-08-11',6,'Dagang Karet','16','1308042112110006','','1308040107620011','0009/11/2014','3',1,'','','',NULL,'','','','','','',0,'ADAM BURI',1,'2011-12-23'),(9,'100000000','2014-08-14',6,'kontraktor','16','1308050102100008','225/03/11/94','1308052307640001','0010/11/2014','3',1,'','','',NULL,'','','','','','',0,'YUSMEDI',1,'2012-02-08'),(10,'20000000','2014-11-18',6,'Dagang Harian','16','1308020203090040','300/26/I/97','1308051201780001','0011/12/2014','1',2,'7000000','3880009','363147',1,'','','','','','',0,'ILHAMDAYANI',1,'2009-03-02'),(11,'50000000','2014-11-25',6,'Dagang Gypsum','16','1308052704100010','331/27/VIII/2003','1308052703750002','0012/12/2014','1',1,'','','',NULL,'','','','','','',0,'SABRI N',1,'2010-04-29'),(12,'200000000','2014-12-04',5,'toko bangunan','15','1308261501082028','','1308191303870002','0013/12/2014','3',1,'','','',NULL,'','','','','','',0,'NASRIL C',1,'2014-06-18'),(13,'300000000','2014-12-05',5,'GROSIR PAKAIAN','15','1375032904100002','196/20/VIII/2009','1375032406760001','0014/12/2014','2',1,'100000000','98014288','3600000',1,'','','','','','',0,'EKO SISWANTO',1,'2013-05-16'),(14,'20000000','2014-12-08',6,'Jual Produk Herbalife','16','1308021801080087','126/03/vII/1999','1308055407730002','16/060-2/467/NAP','1',1,'','','',NULL,'','','','','','',0,'DEVI ALRIANI AZHAR',1,'2011-06-06'),(15,'12000000','2014-12-10',6,'Kebun Coklat','16','1308051903080009','233/10/I/1992','1308055903690002','0017/12/2014','1',1,'10000000','','',NULL,'','','','','','',0,'ERMALIDA',1,'2011-09-20'),(16,'20000000','2014-12-10',6,'Dagang Pakaian','16','1308042911110016','248/27/VIII/98','1308044403740001','0017/12/2014','2',2,'20000000','3001951','1037563',1,'','','','','','',0,'ZIZILIA',1,'2012-10-15'),(17,'40000000','2014-12-12',6,'Golbertap','16','1308070707070003','09/189/XI/2006','1308070308720001','0017/12/2014','1',1,'','','',NULL,'','','','','','',0,'HABIBULLAH NASUTION',1,'2014-07-17'),(18,'50000000','2014-12-17',6,'Golbertap','16','1308052306090067','65/03/1983','1308050807610001','0017/12/2014','1',1,'','','',NULL,'','','','','','',0,'YULI AMRI',1,'2009-06-23'),(19,'20000000','2014-12-04',6,'Kebun karet dan Coklat','16','1308050708090010','63/07/V/1991','1308050910660001','0017/12/2014','2',2,'10000000','3460597950','381904530',1,'','','','','','',0,'SARDUNAS',1,'2009-08-07'),(20,'1500000000','2014-12-17',4,'grosir acesoris hp','15','1306092709120001','148/16/vi/2012','137501180178002','0017/12/2014','1',1,'','','',NULL,'','','','','','',0,'HENGKI EKA PUTRA',1,'2013-02-13'),(21,'20000000','2014-12-16',6,'Golbertap','16','1308052910090005','226/25/VI/2008','1308055802830002','0017/12/2014','1',1,'','','',NULL,'','','','','','',0,'DESI SUDIAWATI',1,'2014-07-04'),(22,'350000000','2014-12-23',5,'PEDAGANG BERAS','15','1308042502090007','359/38/IV/2003','130841808750001','0017/12/2014','1',1,'','','',NULL,'','','','','','',0,'AL GUFLI',1,'2013-10-16'),(23,'350000000','2014-12-18',5,'PEDAGANG HASIL BUMI','15','1374022805140003','208/10/XI/2012','13740012810870001','0017/12/2014','1',1,'','','',NULL,'','','','','','',0,'HOKY OKTAVI',1,'2014-07-03'),(24,'70000000','2014-12-18',6,'JUAL BERAS DAN DISTRIBUTOR BERAS BULOG','16','1308051108110004','111/27/VI/1999','1308050908670001','0017/12/2014','1',1,'','','',NULL,'','','','','','',0,'YELWANSYAH',1,'2011-08-11'),(25,'20000000','2014-12-30',6,'Golbertap','16','1371010705140005','301/16/IX/2013','1471113110820001','0017/01/2015','1',1,'','','',NULL,'','','','','','',0,'SYAMSIR FIRDAUS MANGGAR WANRANTONIARA',1,'2014-12-16'),(26,'11000000','2015-01-02',6,'Dagang sandal','16','1308052904140002','05/05/I/2014','1308040307890003','0017/01/2015','1',1,'','','',NULL,'','','','','','',0,'ASEP DANI SUMANTRI',1,'2014-04-29'),(27,'15000000','2015-01-05',6,'Pengrajin sunting','16','1308052401110003','46/46/IV/1999','1308050901720001','0017/01/2015','1',1,'','','',NULL,'','','','','','',0,'ZELFA EFRIZAL',1,'2011-01-24');

/*Table structure for table `proposal_buku_nikah` */

DROP TABLE IF EXISTS `proposal_buku_nikah`;

CREATE TABLE `proposal_buku_nikah` (
  `proposal_id` int(5) DEFAULT NULL,
  `no_buku_nikah` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_buku_nikah` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `proposal_buku_nikah` */

insert  into `proposal_buku_nikah`(`proposal_id`,`no_buku_nikah`,`tgl_buku_nikah`) values (2,'344/40/VII/2005','2005-07-10'),(3,'235/39/VIII/2007','2007-07-20'),(4,'126/01/X/2002','2002-05-30'),(7,'648/1/1983','1983-08-31'),(9,'225/03/11/94','1994-01-14'),(10,'300/26/I/97','1997-01-18'),(11,'331/27/VIII/2003','2003-02-14'),(13,'196/20/VIII/2009','2009-08-14'),(14,'126/03/vII/1999','1999-07-01'),(15,'233/10/I/1992','1992-02-27'),(16,'248/27/VIII/98','1998-08-19'),(17,'09/189/XI/2006','2006-06-08'),(18,'65/03/1983','1985-05-10'),(19,'63/07/V/1991','1991-04-14'),(20,'148/16/vi/2012','2011-06-01'),(21,'226/25/VI/2008','2008-06-20'),(22,'359/38/IV/2003','2003-04-11'),(23,'208/10/XI/2012','2011-11-02'),(24,'111/27/VI/1999','1999-09-30'),(25,'301/16/IX/2013','2013-09-07'),(26,'05/05/I/2014','2013-12-11'),(27,'46/46/IV/1999','1999-04-09');

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

insert  into `proposal_kartu_keluarga`(`no_kartu_keluarga`,`nama`,`tanggal_lahir`,`no_ktp`,`proposal_id`,`tempat_lahir`) values ('1308073108070002','YUNIATI','1980-06-26','1308076606800001',1,'Muaro Cubadak'),('1308022903070004','MUHAMMAD IRFAN DJ','1965-11-25','1308022511650001',2,'PADANG'),('1308022903070004','ITA WISIKARTIYAH','1969-04-16','1308025604690001',2,'BUKITTINGGI'),('1308022903070004','LUTHFI DARY IRFAN','2007-07-17','1308021707070001',2,'PADANG'),('1308022903070004','BAHY AQIL IRFAN','2010-04-19','1308051904100002',2,'PADANG'),('1308052112090001','RURI SRI WAHYUNI','1985-11-02','1308054211850002',3,'PEKAN BARU'),('1308172407070003','M.RAFLIA','1977-06-06','1308170406770001',4,'CUBADAK DAKEK'),('1308172407070003','JUSNIATI','1983-07-16','1308175607830001',4,'KOTO TANGAH'),('1308172407070003','REVIKA REFANIA','2003-03-11','1308175103030001',4,'CUBADAK DAKEK'),('1308172407070003','DIANI KEYSA REFANIA','2007-12-06','1308174612070002',4,'TAPUS'),('1308031408080048','Gabena Siregar','1967-11-17','1308075711670001',5,'langga Payung'),('1308071910090007','NURHAMIDA','1963-07-11','1308075106630001',7,'TANJUNG ARO II'),('1308020203090040','INDRA NOVITA','1980-11-11','1308055111800001',10,'SUNGAI PANDAHAN'),('1308052704100010','RATNAWATI','1976-12-26','1308056612760001',11,'Pasar Kembang'),('1308261501082028','gustinar','1971-10-01','1308164220710002',12,'petok'),('1308261501082028','rizki ramadhan','1993-03-02','13081602039300001',12,'simpang'),('1308261501082028','arie meisandi','1999-05-28','13081628069600001',12,'simpang'),('1308261501082028','cintya larasati','1999-01-27','13081667019900001',12,'simpang'),('1308261501082028','riska dwi cahyani','2003-03-03','1308164303030001',12,'simpang'),('1375032904100002','QIARA QOTRUNNADA','2010-03-30','1375037003100001',13,'BUKITTINGGI'),('1375032904100002','DHAFA HABIBULLAH','2013-04-13','1375031304130001',13,'BUKITTINGGI'),('1308070707070003','Oly Viana Candra Dewi','1984-11-30','1308077011840001',17,'Boyo Lali'),('1308050708090010','Erni','1971-02-04','1308054402710001',19,'Kp. Sagalo'),('1306092709120001','natasha adi jamaan jamal','1987-03-06','1306094603870003',20,'bukittinggi'),('1306092709120001','maisharah','2003-10-19','130609510030001',20,'bukittinggi'),('1308052910090005','Andespitan','1983-06-25','1308052506830003',21,'Lubuk Sikaping'),('1308042502090007','HILMA YENI','1974-06-15','1308045506740001',22,'KOTO KECIL'),('1374022805140003','ANNISA DEWI ALBERMAN','1991-02-25','1374026502910021',23,'PADANG PANJANG'),('1374022805140003','RAJA ALTAF YUSUF','2013-11-12','1374021211130002',23,'PADANG PANJANG'),('1371010705140005','Venni Silvana','1986-06-11','1371015106860006',25,'Padang'),('1308052904140002','Mustika Safitri','1990-05-12','1308025205900002',26,'Lubuk Sikaping'),('1308052401110003','Fetrina Hendra','1972-02-11','1308055102720001',27,'Payakumbuh'),('1308052401110003','Andri Maizal','1986-05-28','1371102805860004',27,'Padang');

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
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `proposal_ktp` */

insert  into `proposal_ktp`(`proposal_ktp_id`,`no_ktp`,`tempat_lahir`,`tanggal_lahir`,`alamat`,`agama`,`status_perkawinan`,`pekerjaan`,`kewarganegaraan`,`masa_berlaku`,`proposal_id`,`desa`) values (1,'1308071304800002','Kampung Baru','1980-04-13','Pasar Petok',1,'Kawin','PNS','Indonesia','2017-04-13',1,'Panti'),(2,'1308055604690001','BUKITTINGGI','1969-04-16','JL.PERWIRA NO.7 JR.TANJUNG ALAI KEL.PAUH KEC.LUBUK SIKAPING',1,'Kawin','PNS','Indonesia','2019-04-16',2,'PAUH'),(3,'1308051706840005','LUBUK SIKAPING','1984-06-17','JL. PASAR BARU- BENTENG',1,'Kawin','KARYAWAN HONORER','Indonesia','2017-06-17',3,'TANJUNG BARINGIN'),(4,'1308170406770001','CUBADAK DAKEK','1977-06-04','CUBADAK DAKEK,MAKMUR KEL PADANG GELUGUR ',1,'Kawin','WIRASWASTA','Indonesia','2017-06-04',4,'PADANG GELUGUR'),(5,'1308071606650001','RANTAU PRAPAT','1965-06-16','Sumpur Sejati jorong Kuamang ',1,'Kawin','wiraswasta','Indonesia','2017-06-16',5,'Panti'),(6,'1308190405640002','KOTO NOPAN SETIA','1964-05-04','KOTO NOPAN SETIA',1,'Kawin','PENSIUNAN','Indonesia','2018-05-04',6,'LANSEK KADOK'),(7,'1308070709600001','TAPSEL','1960-09-07','KAJAI II JR MURNI PANTI',1,'Kawin','wiraswasta','Indonesia','2017-09-07',7,'Panti'),(8,'1308040107620011','musus','1962-07-01','Jorong Air Abu',1,'Kawin','Petani','Indonesia','2017-07-01',8,'Limo Koto'),(9,'1308052307640001','Talu','1964-07-23','Jl Prof.DR.hamka No.16B',1,'Kawin','PNS','Indonesia','2017-07-23',9,'Tanjung Beringin'),(10,'1308051201780001','SALIBAWAN','1978-01-12','SUNGAI PANDAHAN ',1,'Kawin','Petani','Indonesia','2017-01-12',10,'SUNDATA'),(11,'1308052703750002','Rantau Gedang','1975-03-27','Jln. Jend. Sudirman Komp. Ruko Panapa',1,'Kawin','wiraswasta','Indonesia','2017-03-27',11,'Durian TInggi'),(12,'1308191303870002','kauman','1966-08-18','kp tanjung, jr simpang hilir',1,'Kawin','wiraswasta','Indonesia','2018-03-13',12,'simpang kec alahan mati'),(13,'1375032406760001','SOLO','1976-06-24','PERUM BUNGO TANJUNG 002/002',1,'Kawin','WIRA SWASTA','Indonesia','2017-06-24',13,'KUBU TANJUNG'),(14,'1308055407730002','Lubuk Sikaping','1973-07-14','Jl. Perwira Jr. Tanjung Alai Kel. Pauah Lubuk Sikaping',1,'Kawin','PNS','Indonesia','2017-07-14',14,'Pauah'),(15,'1308055903690002','Jambak','1969-03-19','Jr. Kampuang Alai Kel. jambak Lubuk Sikaping',1,'Kawin','Kerja di kantor Wali Nagari','Indonesia','2017-03-19',15,'Jambak'),(16,'1308044403740001','Pekanbaru','1974-03-04','Jorong Haraban Nag. Tujuah Kec. Palupuh Kab. Agam',1,'Kawin','wiraswasta','Indonesia','2017-04-03',16,'Tujuah'),(17,'1308070308720001','Madina','1972-08-03','Sontang Lama Kel. Panti Kec. Panti',1,'Kawin','Dosen','Indonesia','2017-08-03',17,'Panti'),(18,'1308050807610001','Lubuk Sikaping','1961-07-08','Jl. Prof. M Narun Jr. Tampang kel. Durian Tinggi Kec. Lubuk Sikaping',1,'Kawin','Karyawan BUMD','Indonesia','2017-07-06',18,'Durian TInggi'),(19,'1308050910660001','Kp. Sumur ','1966-10-09','Kp.Sagalo Jorong III Koto Tinggi Nagari Sundata Kec. Lubuk Sikaping',1,'Kawin','wiraswasta','Indonesia','2012-10-09',19,'Sundata'),(20,'137501180178002',' bukittinggi','1978-01-18','tilatang kamang',1,'Kawin','WIRA SWASTA','Indonesia','2017-01-18',20,'koto tangah'),(21,'1308055802830002','Lubuk Sikaping','1983-02-18','Jl. Manunggal No. 28 Kel. Aia Manggih Kec. Lubuk Sikaping',1,'Kawin','Karyawan Swasta','Indonesia','2017-02-18',21,'Aia Manggih'),(22,'130841808750001','PADANG','1975-08-18','PADANG KALODAN ',1,'Kawin','wiraswasta','Indonesia','2017-08-18',22,'KOTO KACIAK KEC BONJOL'),(23,'13740012810870001','BUKITTINGGI','1987-10-28','JL ROHANA KUDUS PERUM CITRA GRAHA MANDIRI',1,'Kawin','wiraswasta','Indonesia','2019-10-28',23,'KAMPUNG MANGGIS'),(24,'1308050908670001','LUBUK SIKAPING','1967-08-09','JL. CENDRAWASIH NO. 04 ',1,'Kawin','wiraswasta (TRANSPORTASI)','Indonesia','2018-08-09',24,'Tanjung Beringin'),(25,'1471113110820001','Manggar','1982-10-13','Jl. Kampung Batu No. 81 RT 004 RW 002',1,'Kawin','Karyawan Swasta','Indonesia','2019-10-31',25,'Batang Arau'),(26,'1308040307890003','Bonjol','1989-07-03','Kp.Tanjung Jorong Musus ',1,'Kawin','wiraswasta','Indonesia','2017-07-03',26,'Ganggo Hilia'),(27,'1308050901720001','Sumanik','1972-01-09','Jl. Adam Malik No. 95 ',1,'Kawin','wiraswasta','Indonesia','2017-01-09',27,'Aia Manggih');

/*Table structure for table `tolak` */

DROP TABLE IF EXISTS `tolak`;

CREATE TABLE `tolak` (
  `tolak_id` int(20) NOT NULL AUTO_INCREMENT,
  `proposal_id` int(5) DEFAULT NULL,
  `tanggal_tolak` date DEFAULT NULL,
  `alasan_ditolak` text COLLATE utf8_unicode_ci,
  `tahap_penolakan` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`tolak_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tolak` */

insert  into `tolak`(`tolak_id`,`proposal_id`,`tanggal_tolak`,`alasan_ditolak`,`tahap_penolakan`) values (1,1,'2014-10-16','Penambahan Modal Usaha yang bersangkutan sudah didapat dari hasil penjualan tanah','OTS Usaha'),(2,5,'2014-11-06','Daftar Riwayat BI Checking bermasalah ( Kol 2 )','BI Checking'),(3,6,'2014-11-04','Riwayat Bi Checking Bermasalah ( Kol 5 )','BI Checking'),(6,8,'2014-08-15','Agunan tidak mengcover 100%','Komite'),(5,9,'2014-08-20','karena Ybs sub Kontraktor','Komite'),(7,3,'2014-11-21','jaminan tidak cover','OTS Agunan'),(8,12,'2014-12-05','data diragukan ke aslianya','BI Checking'),(9,13,'2014-12-11','agunan tidak cover','OTS Agunan'),(10,16,'2014-12-11','Nasabah memiliki pinjaman modal kerja pada Bank lain.','BI Checking'),(11,19,'2014-12-16','Jadwal angsuran kredit di Bank lain tidak lancar','BI Checking');

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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `vote_jawab` */

insert  into `vote_jawab`(`id_jawab`,`soal_id`,`jawaban`,`id_pegawai`,`tanggal_vote`) values (1,1,'Penting','16','2014-11-27'),(2,2,'Penting','16','2014-11-27'),(3,3,'Penting','16','2014-11-27'),(4,4,'Penting','16','2014-11-27'),(5,5,'Penting','16','2014-11-27'),(6,6,'Penting','16','2014-11-27'),(7,1,'Sangat Penting','14','2014-11-27'),(8,2,'Sangat Penting','14','2014-11-27'),(9,3,'Sangat Penting','14','2014-11-27'),(10,4,'Sangat Penting','14','2014-11-27'),(11,5,'Sangat Penting','14','2014-11-27'),(12,6,'Sangat Penting','14','2014-11-27'),(13,1,'Sangat Penting','13','2014-11-27'),(14,2,'Sangat Penting','13','2014-11-27'),(15,3,'Sangat Penting','13','2014-11-27'),(16,4,'Sangat Penting','13','2014-11-27'),(17,5,'Sangat Penting','13','2014-11-27'),(18,6,'Sangat Penting','13','2014-11-27'),(19,1,'Sangat Penting','14','2014-11-27'),(20,2,'Sangat Penting','14','2014-11-27'),(21,3,'Sangat Penting','14','2014-11-27'),(22,4,'Sangat Penting','14','2014-11-27'),(23,5,'Sangat Penting','14','2014-11-27'),(24,6,'Sangat Penting','14','2014-11-27'),(25,1,'Sangat Penting','38','2014-11-27'),(26,2,'Sangat Penting','38','2014-11-27'),(27,3,'Sangat Penting','38','2014-11-27'),(28,4,'Sangat Penting','38','2014-11-27'),(29,5,'Sangat Penting','38','2014-11-27'),(30,6,'Sangat Penting','38','2014-11-27'),(31,1,'Sangat Penting','16','2014-12-02'),(32,2,'Sangat Penting','16','2014-12-02'),(33,3,'Sangat Penting','16','2014-12-02'),(34,4,'Sangat Penting','16','2014-12-02'),(35,5,'Sangat Penting','16','2014-12-02'),(36,6,'Sangat Penting','16','2014-12-02'),(37,1,'Sangat Penting','15','2014-12-05'),(38,2,'Sangat Penting','15','2014-12-05'),(39,3,'Sangat Penting','15','2014-12-05'),(40,4,'Sangat Penting','15','2014-12-05'),(41,5,'Sangat Penting','15','2014-12-05'),(42,6,'Sangat Penting','15','2014-12-05'),(43,1,'Sangat Penting','14','2015-01-15'),(44,2,'Sangat Penting','14','2015-01-15'),(45,3,'Sangat Penting','14','2015-01-15'),(46,4,'Sangat Penting','14','2015-01-15'),(47,5,'Sangat Penting','14','2015-01-15'),(48,6,'Sangat Penting','14','2015-01-15');

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
) ENGINE=MyISAM AUTO_INCREMENT=620 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `watchlist` */

insert  into `watchlist`(`watchlist_id`,`no_loan`,`nama_nasabah`,`total_tunggakan`,`kolektibilitas`,`jenis_produk`,`no_CIF`,`no_rekening_angsuran`,`plafon`,`os_pokok`,`angsuran_bulanan`,`persentase_bagi_hasil`,`usaha_nasabah`,`tujuan_pembiayaan`,`marketing`,`tgl_upload`,`status_tunggakan`,`tgl_bayar`) values (1,'LD1314249872','DEDE ROMEIZON','762856,64','2A','KUR MIKRO JAMKRINDO','77378732','7052264458','20000000,00','12692600,69','','','','','14','2014-10-31','Telah Bayar','29 Oktober 2014'),(2,'LD1314255716','ZULHASMI','2368916,30','2C','KUR MIKRO JAMKRINDO','77247913','7050536747','20000000,00','11620640,90','','','','','14','2014-10-31','Belum Bayar',''),(3,'LD1314256570','HENDRI HIDAYAT','1603221,08','2A','CONSUMER PKPA TNI POLRI C','75025298','7024019602','90000000,00','70232578,45','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(4,'LD1314256928','MULHASBUANDI HSB','111058782,17','5','Murabahah','77251101','7050577834','450000000,00','411629774,48','','','','','14','2014-10-31','Belum Bayar',''),(5,'LD1314257155','ARMIYANTO','768710,55','2A','KUR MIKRO JAMKRINDO','77228610','7050270631','20000000,00','11620640,90','','','','','14','2014-10-31','Belum Bayar',''),(6,'LD1314265080','IRFAN','2314189,42','2A','WM UTAMA PRODUKTIF','77035193','7047708707','70000000,00','51795164,40','','','','','14','2014-10-31','Belum Bayar',''),(7,'LD1314271678','AMRI MASTA','1645271,81','2A','WM UTAMA PRODUKTIF','77059835','7048016008','51000000,00','35384235,57','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(8,'LD1314276280','ZUBAIDAH','16350822,24','5','WM UTAMA PRODUKTIF','76776068','7044050255','51000000,00','37440589,69','','','','','14','2014-10-31','Belum Bayar',''),(9,'LD1314280851','NONO HARYADI','1662665,74','2A','WM MADYA PRODUKTIF','76602568','7041218635','40000000,00','15889958,68','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(10,'LD1314292434','SYOFIAR','1658924,13','2A','CONSUMER IMPLAN SWASTA','76456223','7024019602','60000000,00','31578718,06','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(11,'LD1314296714','HENDRA FITNARDI','260921,91','2A','KUR MIKRO JAMKRINDO','76397247','7038244757','10000000,00','5254507,78','','','','','14','2014-10-31','Telah Bayar','29 Oktober 2014'),(12,'LD1314312767','NUR AINI','1013024,11','2A','WM UTAMA PRODUKTIF','76084015','7034025643','100000000,00','59707562,72','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(13,'LD1314361046','RENI GUSPITA','27479704,33','3A','KECIL KOMERSIAL NON WM','74020178','7024022198','250000000,00','114247055,73','','','','','14','2014-10-31','Belum Bayar',''),(14,'LD1314376068','AMRIL','751649,14','2A','KUR MIKRO JAMKRINDO','75264658','7026889067','20000000,00','9356257,12','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(15,'LD1314376164','SRINARMI','6607679,63','2A','KECIL KOMERSIAL NON WM','75302779','7027366354','300000000,00','235303434,64','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(16,'LD1314379908','HALIJAR','16516988,31','2B','CONSUMER MURABAHAH IRREGU','75199367','7026031677','232082089,54','142121586,37','','','','','14','2014-10-31','Belum Bayar',''),(17,'LD1314380436','HENDY HAMULIA','2713248,28','2A','CONSUMER KENDARAAN OTOMOT','75476983','7029647334','120000000,00','64908701,81','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(18,'LD1314403882','HEFIAL MEIYARDI','1591338,18','2A','CONSUMER IMPLAN SWASTA','75389853','7024019602','75000000,00','48459140,20','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(19,'LD1314404634','DESSY ASFRI YENTIE','952873,70','2A','CONSUMER PKPA TNI POLRI C','75673759','7024019807','100000000,00','80197359,34','','','','','14','2014-10-31','Telah Bayar','29 Oktober 2014'),(20,'LD1314404637','YULFAIZAL','10282,19','1','KECIL KOMERSIAL NON WM','75662803','7032139145','100000000,00','39557521,33','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(21,'LD1314414190','YENTI','1734496,21','2A','CONSUMER PKPA TNI POLRI C','75377107','7024019602','100000000,00','85229395,93','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(22,'LD1314416820','MIRIS','2758791,16','2A','CONSUMER PKPA TNI POLRI C','75222179','7026325697','200000000,00','155503941,26','','','','','14','2014-10-31','Belum Bayar',''),(23,'LD1314417613','HASNIAL KHATIMA','1829697,09','2A','CONSUMER PKPA TNI POLRI C','75655323','7024019602','100000000,00','79085942,27','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(24,'LD1314417621','MASNIZAR','5513456,40','2B','CONSUMER PKPA TNI POLRI C','75575311','7036491692','85000000,00','21892155,36','','','','','14','2014-10-31','Belum Bayar',''),(25,'LD1314418097','YETTI SAPUTRI','957916,62','2A','WM MADYA PRODUKTIF','75161686','7042871038','30000000,00','13987605,64','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(26,'LD1314420854','YUSLINA','1244193,10','2A','CONSUMER PKPA TNI POLRI C','73672988','7024019602','45000000,00','15749875,34','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(27,'LD1314452011','YONNI ZUHARMEN','8774385,07','4A','CONSUMER PKPA TNI POLRI C','73186559','7009631814','50000000,00','31067688,57','','','','','14','2014-10-31','Belum Bayar',''),(28,'LD1314454725','BURHANUDDIN PASARIBU','19586918,29','3A','CONSUMER PERUMAHAN GRIYA','73105683','7024021933','250000000,00','181332275,97','','','','','14','2014-10-31','Belum Bayar',''),(29,'LD1314457516','BURHANUDDIN PASARIBU','43490248,02','3A','CONSUMER PKPA TNI POLRI C','73105683','7024021933','500000000,00','334862410,30','','','','','14','2014-10-31','Belum Bayar',''),(30,'LD1314462645','RAHMAT KARI HUSIN','44574,26','2A','KUR MIKRO JAMKRINDO','77399616','7052547983','20000000,00','7655540,84','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(31,'LD1314466226','HENDRI YANTO','7097787,15','2A','CONSUMER PKPA TNI POLRI C','77213441','7050063897','500000000,00','456810100,04','','','','','14','2014-10-31','Belum Bayar',''),(32,'LD1314478348','MAYONIS','3452650,92','2A','CONSUMER PERUMAHAN GRIYA','77348590','7051852073','270000000,00','259381896,18','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(33,'LD1314481277','IVO OKTAVER','4799657,40','2B','WM UTAMA PRODUKTIF','77120063','7048742909','100000000,00','70229226,75','','','','','14','2014-10-31','Telah Bayar','10 November 2014'),(34,'LD1314484520','MUHAMMAD DIAR','2623794,40','2A','CONSUMER PKPA TNI POLRI C','76207730','7024019653','78000000,00','3035042,19','','','','','14','2014-10-31','Telah Bayar','29 Oktober 2014'),(35,'LD1314484830','SUWARDI','4425283,79','2A','CONSUMER PERUMAHAN GRIYA','77173945','7024019653','250000000,00','210184945,16','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(36,'LD1314489519','NURMIATI','486152,97','2A','CONSUMER PKPA TNI POLRI C','76128630','7034685872','80000000,00','70236150,08','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(37,'LD1314490986','HERI FADLI','1741469,83','2A','CONSUMER PKPA TNI POLRI C','76060175','7024019653','90000000,00','67899562,30','','','','','14','2014-10-31','Telah Bayar','03 November 2014'),(38,'LD1314492527','YUNEDI','1603221,08','2A','CONSUMER IMPLAN SWASTA','76015145','7024019602','90000000,00','75633690,46','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(39,'LD1314496962','ELSA HARSIDA','506065,00','2A','WM MADYA PRODUKTIF','76551274','7040525585','35000000,00','18125658,36','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(40,'LD1314497956','LAYLA NUZLIATI','1677174,36','2A','WM MADYA PRODUKTIF','76485775','7039502679','39000000,00','25809596,24','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(41,'LD1317608596','SYOFIA ELIDA','810068,67','2A','Murabahah Warung Mikro','77184611','7049665029','20000000,00','13611524,46','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(42,'LD1319809181','DEKKY PRIBADI','105147499,54','4C','CONSUMER PERUMAHAN GRIYA','77581696','7055329553','750000000,00','701266606,43','','','','','14','2014-10-31','Belum Bayar',''),(43,'LD1321441101','MILA DARNILA','2685372,72','2A','CONSUMER PERUMAHAN GRIYA','76172341','7035222787','245000000,00','230292537,58','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(44,'LD1321493073','RIZAL EFENDI','3892553,54','2A','CONSUMER PERUMAHAN GRIYA','77627988','7056572893','350000000,00','328989339,54','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(45,'LD1322428579','SYAMSUL KHIAR','2970212,39','2A','CONSUMER PERUMAHAN GRIYA','77637227','7056711516','230000000,00','224192954,85','','','','','14','2014-10-31','Belum Bayar',''),(46,'LD1324231213','IVO OKTAVER','1676092,47','2A','WM TUNAS PRODUKTIF','77120063','7048742909','40000000,00','29192529,99','','','','','14','2014-10-31','Belum Bayar',''),(47,'LD1324245290','ITA YUNI','2175232,07','2A','WM UTAMA PRODUKTIF','77709346','7059902223','100000000,00','81500087,69','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(48,'LD1326849478','DARMALINDA','1382937,37','2A','WM MADYA PRODUKTIF','76621308','7041502791','51000000,00','42679477,95','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(49,'LD1327321159','ROMI MARLISKHA','391379,25','2A','WM TUNAS GOLBERTAP','75025253','7024019084','11000000,00','8289523,09','','','','','14','2014-10-31','Telah Bayar','29 Oktober 2014'),(50,'LD1329455988','RAHMAT HIDAYAT','1421329,52','2A','KUR MIKRO JAMKRINDO','77872091','7062631265','15000000,00','1378640,67','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(51,'LD1329461303','YONESHI WAHYUNI','998611,82','2A','KUR MIKRO JAMKRINDO','76196361','7035530667','20000000,00','11905045,42','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(52,'LD1331870486','DONI DESVIA','250039,76','2A','KUR MIKRO JAMKRINDO','77963990','7064311764','20000000,00','15684390,12','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(53,'LD1335386361','ERWAN','285431,59','2A','CONSUMER PERUMAHAN GRIYA','76406141','7025234116','30000000,00','26598786,71','','','','','14','2014-10-31','Telah Bayar','29 Oktober 2014'),(54,'LD1335396059','ASWIR EFENDI','2450314,79','2A','WM UTAMA PRODUKTIF','75136655','7025234191','100000000,00','87236896,06','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(55,'LD1335837439','CHAIDIR LUBIS','8396295,46','2A','CONSUMER KENDARAAN OTOMOT','78140115','7067039593','260000000,00','203791957,90','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(56,'LD1405761266','EDI SISWANTO','105838,02','2A','KUR MIKRO JAMKRINDO','78315018','7069321881','3000000,00','2255608,71','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(57,'LD1405768957','TONY SETIA','321256,47','2A','KUR MIKRO JAMKRINDO','78315175','7069324481','10000000,00','8531172,45','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(58,'LD1411516160','WENDA EMAFRI','386878,50','2A','KUR MIKRO JAMKRINDO','77881235','7072308624','10000000,00','8970065,74','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(59,'LD1414866048','HENDRA','560812,95','2A','KUR MIKRO JAMKRINDO','78578701','7073238368','15000000,00','13775406,26','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(60,'LD1416114040','EDDY CHANDRA','463511,94','2A','KUR MIKRO JAMKRINDO','78604371','7073577645','11000000,00','9872602,26','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(61,'LD1420473891','DODI','3645956,29','2A','WM UTAMA PRODUKTIF','78360110','7069979402','70000000,00','65260675,82','','','','','14','2014-10-31','Telah Bayar','29 Oktober 2014'),(62,'LD7056792656','RIZAL EFENDI','7853742,38','2A','MUSYARAKAH PDB','77627988','7056572893','400000000,00','399628210,00','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(63,'LD7042548857','SUHARMAN','1120376,63','2A','MUSYARAKAH PDB','76521767','7040017757','100000000,00','80974440,37','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(64,'LD7049729159','WAZRI FIRDAUS','7689426,91','2A','MUSYARAKAH PDB','77182900','7049652218','750000000,00','743993686,57','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(65,'LD7049889296','RAFLIS RACHMAN','7866424,00','2A','MUSYARAKAH PDB','77177242','7049563374','750000000,00','750000000,00','','','','','14','2014-10-31','Telah Bayar','30 Oktober 2014'),(66,'LD7050040059','EPI ERYANTI','8426948,26','2A','MUSYARAKAH PDB','74020523','7049959669','750000000,00','748143751,76','','','','','14','2014-10-31','Telah Bayar','31 Oktober 2014'),(67,'LD7024019367','RENI GUSPITA','78465302,25','2C','MUSYARAKAH PDB','74020178','7024022198','750000000,00','750000000,00','','','','','14','2014-10-31','Belum Bayar',''),(68,'LD7053311819','HIDAYAH','1843862,88','2A','MUSYARAKAH PDB','75025259','7024020608','210000000,00','174398458,59','','','','','14','2014-10-31','Telah Bayar','27 Oktober 2014'),(69,'LD7053617756','SYAHRUDDIN HARAHAP','5420125,57','2A','MUSYARAKAH PDB','77468364','7053526335','500000000,00','499927771,58','','','','','14','2014-10-31','Telah Bayar','27 Oktober 2014'),(70,'LD7024019718','ARIF HIDAYAT','107737226,84','5','MUSYARAKAH PDB','75025562','7024023448','1000000000,00','982981080,86','','','','','14','2014-10-31','Belum Bayar',''),(71,'LD7050694016','MULHASBUANDI HSB','158156799,33','5','MUSYARAKAH PDB','77251101','7050577834','300000000,00','300000000,00','','','','','14','2014-10-31','Belum Bayar',''),(72,'LD7055075209','RIDO ILHAM','6442500,00','2A','MUSYARAKAH PDB','77562679','7054982048','650000000,00','650000000,00','','','','','14','2014-10-31','Telah Bayar','27 Oktober 2014'),(618,'LD7050694016','MULHASBUANDI HSB','50224287,77','5','MUSYARAKAH PDB','77251101','7050577834','140000000,00','140000000,00','','','','','14','2014-11-30','Belum Bayar',''),(619,'LD7049729159','WAZRI FIRDAUS','_(10162026,37','1C','MUSYARAKAH PDB','77182900','7049652218','750000000,00','744008373,44','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(617,'LD7055075209','RIDO ILHAM','6571350,00','1B','MUSYARAKAH PDB','77562679','7054982048','650000000,00','650000000,00','','','','','14','2014-11-30','Telah Bayar','24 Nopember 2014'),(615,'LD7053617756','SYAHRUDDIN HARAHAP','5618533,32','1B','MUSYARAKAH PDB','77468364','7053526335','500000000,00','499940467,95','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(616,'LD7055556932','FIRDAUS','2678400,36','1B','MUSYARAKAH PDB','77577104','7055237535','250000000,00','249703048,11','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(613,'LD7024019367','RENI GUSPITA','59891847,92','3B','MUSYARAKAH PDB','74020178','7024022198','750000000,00','750000000,00','','','','','14','2014-11-30','Belum Bayar',''),(614,'LD7053311819','HIDAYAH','2367817,66','1C','MUSYARAKAH PDB','75025259','7024020608','210000000,00','174411145,46','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(612,'LD7051899525','KOMIS SIREGAR','750000000,00','','MUSYARAKAH PDB','75268396','7026947809','750000000,00','749752197,79','','','','','14','2014-11-30','Telah Bayar','21 November 2014'),(610,'LD7050691308','DARMAYANTI','500000000,00','','MUSYARAKAH PDB','75662799','7032139137','500000000,00','421662972,20','','','','','14','2014-11-30','Telah Bayar','20 November 2014'),(611,'LD7051801835','HUSNAN HARAHAP','200000000,00','','MUSYARAKAH PDB','77340007','7051743312','200000000,00','199036677,17','','','','','14','2014-11-30','Telah Bayar','21 November 2014'),(605,'LD1428005348','REKY ANTONI','1181947,42','2A','WM MADYA PRODUKTIF','75025291','7024020929','35000000,00','34326850,16','','','','','14','2014-11-30','Telah Bayar','26 Nopember 2014'),(606,'LD7056792656','RIZAL EFENDI','3961310,57','3','MUSYARAKAH PDB','77627988','7056572893','400000000,00','399628210,00','','','','','14','2014-11-30','Telah Bayar','27 Nopember 2014'),(607,'LD7042548857','SUHARMAN','1105279,77','1C','MUSYARAKAH PDB','76521767','7040017757','100000000,00','90984409,23','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(608,'LD7049889296','RAFLIS RACHMAN','8996531,38','1A','MUSYARAKAH PDB','77177242','7049563374','750000000,00','750000000,00','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(609,'LD7050040059','EPI ERYANTI','10857574,31','1C','MUSYARAKAH PDB','74020523','7049959669','750000000,00','748166438,63','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(603,'LD1418931778','MARLIS WATI','734155,21','2A','WM MADYA PRODUKTIF','77146868','7049167592','20000000,00','18460958,18','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(604,'LD1420473891','DODI','3662238,49','2A','WM UTAMA PRODUKTIF','78360110','7069979402','70000000,00','60345983,48','','','','','14','2014-11-30','Telah Bayar','26 Nopember 2014'),(599,'LD1405768957','TONY SETIA','304210,22','2A','KUR MIKRO JAMKRINDO','78315175','7069324481','10000000,00','8076038,89','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(600,'LD1408624661','AKHMAD JUNI','1469734,73','2A','WM UTAMA PRODUKTIF','75025262','7024020635','51000000,00','45483780,64','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(601,'LD1414866048','HENDRA','561584,85','2A','KUR MIKRO JAMKRINDO','78578701','7073238368','15000000,00','13128918,58','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(602,'LD1416830949','RADINAL','429723,62','2A','WM TUNAS PRODUKTIF','78617867','7073757236','5000000,00','3083300,27','','','','','14','2014-11-30','Telah Bayar','26 Nopember 2014'),(597,'LD1405255025','PONIMAN','1437346,58','2A','WM MADYA PRODUKTIF','78301498','7069138769','45000000,00','37182507,84','','','','','14','2014-11-30','Telah Bayar','26 Nopember 2014'),(598,'LD1405761266','EDI SISWANTO','106908,05','2A','KUR MIKRO JAMKRINDO','78315018','7069321881','3000000,00','2024950,28','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(595,'LD1335396059','ASWIR EFENDI','611286,58','2A','WM UTAMA PRODUKTIF','75136655','7025234191','100000000,00','84105926,83','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(596,'LD1335837439','CHAIDIR LUBIS','8693983,41','2A','CONSUMER KENDARAAN OTOMOT','78140115','7067039593','260000000,00','190573247,66','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(593,'LD1331870486','DONI DESVIA','667841,58','2A','KUR MIKRO JAMKRINDO','77963990','7064311764','20000000,00','14723134,83','','','','','14','2014-11-30','Telah Bayar','26 Nopember 2014'),(594,'LD1335370665','NOVI ISWANDI','812479,73','2A','WM MADYA PRODUKTIF','77389649','7052410694','50000000,00','38020320,42','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(592,'LD1330418034','ELDA NINGSIH','1037823,16','2A','KUR MIKRO JAMKRINDO','77198792','7049849642','20000000,00','10251417,00','','','','','14','2014-11-30','Telah Bayar','26 Nopember 2014'),(590,'LD1329504597','NOVA DESMITA','762819,72','2A','KUR MIKRO JAMKRINDO','77004780','7047265805','20000000,00','14229249,91','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(591,'LD1329600129','IRWANSYAH LUBIS','583849,84','2A','KUR MIKRO JAMKRINDO','77880054','7063047699','20000000,00','14229249,91','','','','','14','2014-11-30','Telah Bayar','26 Nopember 2014'),(588,'LD1326849478','DARMALINDA','1681203,42','2A','WM MADYA PRODUKTIF','76621308','7041502791','51000000,00','41072534,71','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(589,'LD1329461303','YONESHI WAHYUNI','996218,75','2A','KUR MIKRO JAMKRINDO','76196361','7035530667','20000000,00','10251417,00','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(585,'LD1322428579','SYAMSUL KHIAR','5960060,74','2B','CONSUMER PERUMAHAN GRIYA','77637227','7056711516','230000000,00','223225140,83','','','','','14','2014-11-30','Telah Bayar','27 Nopember 2014'),(586,'LD1324231213','IVO OKTAVER','1961307,92','2B','WM TUNAS PRODUKTIF','77120063','7048742909','100000000,00','66488946,43','','','','','14','2014-11-30','Belum Bayar',''),(587,'LD1324245290','ITA YUNI','2047635,77','2A','WM UTAMA PRODUKTIF','77709346','7059902223','100000000,00','78207120,46','','','','','14','2014-11-30','Telah Bayar','30 Nopember 2014'),(583,'LD1319809181','DEKKY PRIBADI','117657460,04','5','CONSUMER PERUMAHAN GRIYA','77581696','7055329553','750000000,00','693733819,74','','','','','14','2014-11-30','Belum Bayar',''),(584,'LD1320328039','SUHENDRI NOER','776251,30','2A','Murabahah Warung Mikro','77590763','7055507958','15000000,00','5741655,67','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(580,'LD1314969201','AMRIZAL','537976,17','2A','Murabahah Warung Mikro','77447808','7053195916','20000000,00','11620640,95','','','','','14','2014-11-30','Telah Bayar','26 Nopember 2014'),(581,'LD1316270897','FAZLY UMAR PURBA','3786899,87','2A','KECIL KOMERSIAL NON WM','77466810','7053496614','180000000,00','138562593,62','','','','','14','2014-11-30','Telah Bayar','27 Nopember 2014'),(582,'LD1317608596','SYOFIA ELIDA','526327,77','2A','Murabahah Warung Mikro','77184611','7049665029','20000000,00','12580293,15','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(577,'LD1314492527','YUNEDI','1597815,14','2A','CONSUMER IMPLAN SWASTA','76015145','7024019602','90000000,00','74488459,41','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(578,'LD1314496962','ELSA HARSIDA','1607415,87','2A','WM MADYA PRODUKTIF','76551274','7040525585','35000000,00','16225658,36','','','','','14','2014-11-30','Belum Bayar',''),(579,'LD1314497956','LAYLA NUZLIATI','1639757,17','2A','WM MADYA PRODUKTIF','76485775','7039502679','39000000,00','23763593,77','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(573,'LD1314481277','IVO OKTAVER','3380975,69','2A','WM UTAMA PRODUKTIF','77120063','7048742909','100000000,00','66488946,43','','','','','14','2014-11-30','Belum Bayar',''),(574,'LD1314486152','ASMA HALIM','2144692,37','2A','CONSUMER PENSIUNAN','77001934','7053019848','100000000,00','78478995,44','','','','','14','2014-11-30','Telah Bayar','27 Nopember 2014'),(575,'LD1314486153','ZULDESMAN','1551404,38','2A','CONSUMER PENSIUNAN','77001871','7053019848','65000000,00','42923618,20','','','','','14','2014-11-30','Telah Bayar','27 Nopember 2014'),(576,'LD1314487454','MUSPANDI','427673,39','2A','KUR MIKRO JAMKRINDO','77026981','7047551468','10000000,00','509441,68','','','','','14','2014-11-30','Telah Bayar','26 Nopember 2014'),(569,'LD1314462645','RAHMAT KARI HUSIN','1034992,51','2A','KUR MIKRO JAMKRINDO','77399616','7052547983','20000000,00','5844668,94','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(570,'LD1314463269','JONIZAR','359787,31','2A','KUR MIKRO JAMKRINDO','77332051','7051620393','7000000,00','1719990,33','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(571,'LD1314478340','YULNASRI','765061,63','2A','KUR MIKRO JAMKRINDO','77348791','7051854432','20000000,00','11069876,91','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(572,'LD1314478348','MAYONIS','3493686,42','2A','CONSUMER PERUMAHAN GRIYA','77348590','7051852073','270000000,00','257999968,82','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(566,'LD1314454725','BURHANUDDIN PASARIBU','25373213,03','3B','CONSUMER PERUMAHAN GRIYA','73105683','7024021933','250000000,00','173750900,06','','','','','14','2014-11-30','Belum Bayar',''),(567,'LD1314457516','BURHANUDDIN PASARIBU','44238372,84','3A','CONSUMER PKPA TNI POLRI C','73105683','7024021933','250000000,00','173750900,06','','','','','14','2014-11-30','Belum Bayar',''),(568,'LD1314462538','DENDI SAPUTRA','102737,48','2A','KUR MIKRO JAMKRINDO','77363796','7052066478','9000000,00','2211416,11','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(564,'LD1314420854','YUSLINA','1212319,25','2A','CONSUMER PKPA TNI POLRI C','73672988','7024019602','45000000,00','13650741,11','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(565,'LD1314452011','YONNI ZUHARMEN','8921151,33','4A','CONSUMER PKPA TNI POLRI C','73186559','7009631814','50000000,00','30266675,75','','','','','14','2014-11-30','Belum Bayar',''),(560,'LD1314417623','ZAL AZMI SETIAWAN','826665,19','2A','CONSUMER PKPA TNI POLRI C','75553412','7039551637','30000000,00','9804191,34','','','','','14','2014-11-30','Belum Bayar',''),(561,'LD1314417627','JUNAIDI LUBIS','393714,15','2A','CONSUMER PKPA TNI POLRI C','75519317','7030237042','100000000,00','70385948,53','','','','','14','2014-11-30','Telah Bayar','27 Nopember 2014'),(562,'LD1314418097','YETTI SAPUTRI','1268418,04','2A','WM MADYA PRODUKTIF','75161686','7042871038','30000000,00','12116794,89','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(563,'LD1314418213','GUSTI ALIMAN','2012440,29','2A','CONSUMER PKPA TNI POLRI C','75462948','7025234116','120000000,00','58155018,31','','','','','14','2014-11-30','Telah Bayar','27 Nopember 2014'),(559,'LD1314417621','MASNIZAR','8469609,48','2C','CONSUMER PKPA TNI POLRI C','75575311','7036491692','85000000,00','16598075,96','','','','','14','2014-11-30','Belum Bayar',''),(556,'LD1314414192','YUSMAR','637063,38','2A','KUR MIKRO JAMKRINDO','75372442','7028270652','20000000,00','9937871,84','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(557,'LD1314416820','MIRIS','5988224,41','2B','CONSUMER PKPA TNI POLRI C','75222179','7026325697','200000000,00','152555875,60','','','','','14','2014-11-30','Belum Bayar',''),(558,'LD1314417613','HASNIAL KHATIMA','1847342,94','2A','CONSUMER PKPA TNI POLRI C','75655323','7024019602','100000000,00','77471451,22','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(554,'LD1314413872','ASMA MURNI','319057,63','2A','CONSUMER IMPLAN SWASTA','75688631','7032482591','100000000,00','78283876,75','','','','','14','2014-11-30','Telah Bayar','27 Nopember 2014'),(555,'LD1314414190','YENTI','1728647,62','2A','CONSUMER PKPA TNI POLRI C','75377107','7024019602','100000000,00','84153008,72','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(550,'LD1314380436','HENDY HAMULIA','2704006,01','2A','CONSUMER KENDARAAN OTOMOT','75476983','7029647334','120000000,00','60848005,93','','','','','14','2014-11-30','Telah Bayar','01 Desember 2014'),(551,'LD1314393286','SUKMA RIYANDHA','6017142,44','2A','KECIL KOMERSIAL NON WM','74020098','7024020578','250000000,00','195661289,98','','','','','14','2014-11-30','Telah Bayar','27 Nopember 2014'),(552,'LD1314403882','HEFIAL MEIYARDI','1585972,31','2A','CONSUMER IMPLAN SWASTA','75389853','7024019602','75000000,00','46487230,00','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(553,'LD1314404637','YULFAIZAL','10606,41','1','KECIL KOMERSIAL NON WM','75662803','7032139145','100000000,00','36757521,33','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(547,'LD1314376164','SRINARMI','6607325,66','2A','KECIL KOMERSIAL NON WM','75302779','7027366354','300000000,00','226531857,46','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(548,'LD1314378954','MISLAINA','758749,74','2A','WM MADYA PRODUKTIF','73716758','7024023782','30000000,00','16626163,41','','','','','14','2014-11-30','Telah Bayar','26 Nopember 2014'),(549,'LD1314379908','HALIJAR','24952628,57','2C','CONSUMER MURABAHAH IRREGU','75199367','7026031677','232082089,54','130033631,83','','','','','14','2014-11-30','Belum Bayar',''),(543,'LD1314312767','NUR AINI','1002741,92','2A','WM UTAMA PRODUKTIF','76084015','7034025643','100000000,00','57907562,72','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(544,'LD1314318140','HIKMAH RIDHA','1075606,66','2A','CONSUMER PKPA TNI POLRI C','75025567','7024019637','90000000,00','47356821,90','','','','','14','2014-11-30','Telah Bayar','27 Nopember 2014'),(545,'LD1314361046','RENI GUSPITA','27870306,47','3A','KECIL KOMERSIAL NON WM','74020178','7024022198','250000000,00','104993667,08','','','','','14','2014-11-30','Belum Bayar',''),(546,'LD1314376068','AMRIL','723926,00','2A','KUR MIKRO JAMKRINDO','75264658','7026889067','20000000,00','8160843,33','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(542,'LD1314296714','HENDRA FITNARDI','349697,89','2A','KUR MIKRO JAMKRINDO','76397247','7038244757','10000000,00','4678128,51','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(539,'LD1314276280','ZUBAIDAH','18218642,39','5','WM UTAMA PRODUKTIF','76776068','7044050255','51000000,00','35440589,69','','','','','14','2014-11-30','Belum Bayar',''),(540,'LD1314280851','NONO HARYADI','1629905,29','2A','WM MADYA PRODUKTIF','76602568','7041218635','40000000,00','13292448,26','','','','','14','2014-11-30','Telah Bayar','30 Nopember 2014'),(541,'LD1314292434','SYOFIAR','1653330,36','2A','CONSUMER IMPLAN SWASTA','76456223','7024019602','60000000,00','29023694,13','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(536,'LD1314259610','PRETTI SEPSINOLA','677151,40','2A','KECIL KOMERSIAL NON WM','75025318','7024019807','130000000,00','98163804,82','','','','','14','2014-11-30','Telah Bayar','27 Nopember 2014'),(537,'LD1314265080','IRFAN','3441745,48','2B','WM UTAMA PRODUKTIF','77035193','7047708707','70000000,00','48795164,40','','','','','14','2014-11-30','Belum Bayar',''),(538,'LD1314271678','AMRI MASTA','1630003,72','2A','WM UTAMA PRODUKTIF','77059835','7048016008','51000000,00','33455117,59','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(533,'LD1314256570','HENDRI HIDAYAT','1597815,14','2A','CONSUMER PKPA TNI POLRI C','75025298','7024019602','90000000,00','68942357,55','','','','','14','2014-11-30','Telah Bayar','28 Nopember 2014'),(534,'LD1314256928','MULHASBUANDI HSB','119268313,24','5','Murabahah','77251101','7050577834','450000000,00','406926585,67','','','','','14','2014-11-30','Belum Bayar',''),(535,'LD1314257155','ARMIYANTO','1548138,09','2B','KUR MIKRO JAMKRINDO','77228610','7050270631','20000000,00','10509015,60','','','','','14','2014-11-30','Belum Bayar',''),(531,'LD1314249872','DEDE ROMEIZON','766512,01','2A','KUR MIKRO JAMKRINDO','77378732','7052264458','20000000,00','11620640,87','','','','','14','2014-11-30','Telah Bayar','26 Nopember 2014'),(532,'LD1314255716','ZULHASMI','3175658,54','3A','KUR MIKRO JAMKRINDO','77247913','7050536747','20000000,00','10509015,60','','','','','14','2014-11-30','Belum Bayar','');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `watchlist_temp` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
