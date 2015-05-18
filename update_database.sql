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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_bo_kriteria_transaksi` */

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_cs` */

insert  into `daily_cs`(`daily_cs_id`,`kriteria_nasabah`,`jumlah`,`total`,`nama_pegawai`,`info`,`tanggal`,`status`) values (1,14,45,4500000,'Ulil','Lancar','2015-04-01',1),(2,0,0,0,'Ulil','Waktu istirahat : 13:00 SD 14:00','2015-04-01',1),(3,0,0,0,'Ulil','SE yang dipahami/baca : Kitab Pajak','2015-04-01',1),(4,7,1,500000,'Ulil','Giro ','2015-04-01',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_sa` */

insert  into `daily_sa`(`daily_sa_id`,`jumlah_nasabah`,`no_kontak`,`total`,`segmen`,`nama_pegawai`,`info`,`status`,`tanggal`,`kriteria_nasabah`) values (1,2,'56456456456456',1500000000,'Small','Vany','',2,'2015-04-09',15),(2,2,'5456456464',200000000,'Konsumer','Vany','',1,'2015-04-09',3),(3,23,'',NULL,'','Ulil','',1,'2015-04-22',1),(4,0,NULL,0,NULL,'Ulil','Waktu istirahat : 11:13 SD 09:04',1,'2015-04-22',0),(5,0,NULL,0,NULL,'Ulil','SE yang dipahami/baca : SE read',1,'2015-04-22',0),(6,11,'',NULL,'','Ulil','',1,'2015-04-22',1);

/*Table structure for table `daily_sa_kriteria_nasabah` */

DROP TABLE IF EXISTS `daily_sa_kriteria_nasabah`;

CREATE TABLE `daily_sa_kriteria_nasabah` (
  `sa_kriteria_nasabah_id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `rank` int(2) NOT NULL,
  PRIMARY KEY (`sa_kriteria_nasabah_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_sa_kriteria_nasabah` */

insert  into `daily_sa_kriteria_nasabah`(`sa_kriteria_nasabah_id`,`nama`,`rank`) values (1,'Nasabah prior',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_security` */

insert  into `daily_security`(`daily_security_id`,`nama_inputer`,`tanggal`,`jenis_nasabah`,`jumlah`,`info`,`status`) values (1,'Ulil','2015-04-10',1,3,'OK',1),(2,'Ulil','2015-04-10',5,4,'Suip',1),(3,'tes','2015-04-13',1,12,'122',1),(4,'Ulil','2015-04-14',3,2,'23',1),(5,'Ulil','2015-04-14',4,4,'sep',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_teller` */

insert  into `daily_teller`(`daily_teller_id`,`nama_pegawai`,`kriteria_transaksi`,`jumlah`,`total`,`info`,`tanggal`,`status`) values (1,'Ulil',2,12,4000000,'Sip','2015-04-10',1),(2,'tes',6,45,3500000,'Sip','2015-04-14',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_wm` */

insert  into `daily_wm`(`daily_wm_id`,`jumlah_nasabah`,`kriteria_nasabah`,`no_kontak`,`total`,`nama_pegawai`,`info`,`status`,`tanggal`) values (1,4,15,'123',450000,'Ulil','',1,'2015-04-14'),(2,34,17,'885',122343,'Ulil','',1,'2015-04-14'),(3,NULL,19,'',NULL,'Coe Ing','',1,'2015-04-22'),(4,0,0,NULL,0,'Coe Ing','SE yang dipahami/baca : se boy',1,'2015-04-22');

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
