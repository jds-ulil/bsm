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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_bo` */

/*Table structure for table `daily_bo_kriteria_transaksi` */

DROP TABLE IF EXISTS `daily_bo_kriteria_transaksi`;

CREATE TABLE `daily_bo_kriteria_transaksi` (
  `jenis_transaksi_id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`jenis_transaksi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_bo_kriteria_transaksi` */

insert  into `daily_bo_kriteria_transaksi`(`jenis_transaksi_id`,`nama`) values (1,'Transaksi Biaya'),(2,'Transaksi SKN'),(3,'Transaksi RTGS'),(4,'Pembukaan Deposito'),(5,'Pencairan Deposito'),(6,'Pencairan Small & Konsumer'),(7,'Pelunasan Small & Konsumer'),(8,'Pencairan Mikro'),(9,'Pelunasan Mikro'),(10,'Pencairan Talangan Haji'),(11,'Pelunasan Talangan Haji'),(12,'Pencairan/Perpanjangan Gadai Emas'),(13,'Pelunasan Gadai Emas'),(14,'Penginputan BI Checking'),(15,'Pembayaran Biaya Bulanan'),(16,'Pembayaran Rekanan'),(17,'Transaksi Pembayaran Angsuran'),(18,'Transaksi Penyusutan Bulanan'),(19,'Pelaporan - SID'),(20,'Pelaporan - Pajak'),(21,'Pelaporan - Lembur Staff'),(22,'Pelaporan - Lembur Non-Staff'),(23,'Pelaporan - Proofsheet'),(24,'Rekap Absensi'),(25,'Aktivitas Kepegawaian'),(26,'Saldo Kas Kecil Akhir Hari'),(27,'Saldo Rekening Perantara Akhir Hari'),(28,'Saldo Materai Akhir Hari'),(29,'Waktu Istirahat'),(30,'SE yang dibaca & dipahami'),(31,'Lain - Lain'),(33,'Krita');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_cs` */

/*Table structure for table `daily_cs_kriteria_nasabah` */

DROP TABLE IF EXISTS `daily_cs_kriteria_nasabah`;

CREATE TABLE `daily_cs_kriteria_nasabah` (
  `cs_kriteria_nasabah_id` int(2) NOT NULL,
  `nama` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`cs_kriteria_nasabah_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_cs_kriteria_nasabah` */

insert  into `daily_cs_kriteria_nasabah`(`cs_kriteria_nasabah_id`,`nama`) values (1,'Tabungan BSM'),(2,'Tabungan Simpatik'),(3,'Tabungan Berencana'),(4,'Tabungan Investa Cendikia'),(5,'Tabungan Mabrur'),(6,'TabunganKu'),(7,'Giro'),(8,'Deposito'),(9,'Talangan Haji'),(10,'TabunganKu'),(11,'Giro'),(12,'BSM Mobile Banking'),(13,'BSM Net Banking'),(14,'Top-Up Nasabah Eksisting'),(15,'Follow-Up Rekening Dormant'),(16,'Follow-Up Past Due haji'),(17,'Waktu Istirahat'),(18,'SE yang dibaca & dipahami'),(19,'Lain - Lain');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_sa` */

/*Table structure for table `daily_sa_kriteria_nasabah` */

DROP TABLE IF EXISTS `daily_sa_kriteria_nasabah`;

CREATE TABLE `daily_sa_kriteria_nasabah` (
  `sa_kriteria_nasabah_id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`sa_kriteria_nasabah_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_sa_kriteria_nasabah` */

insert  into `daily_sa_kriteria_nasabah`(`sa_kriteria_nasabah_id`,`nama`) values (1,'Lending - Sosialisasi'),(2,'Lending - Solisit'),(3,'Lending - Pengumpulan Data'),(4,'Lending - BI Checking'),(5,'Lending - Taksasi Agunan'),(6,'Lending - Investigasi'),(7,'Lending - Analisa'),(8,'Lending - SP3'),(9,'Lending - Akad'),(10,'Lending - Pencairan'),(11,'Perpanjangan - Pengumpulan Data'),(12,'Perpanjangan - BI Checking'),(13,'Perpanjangan - Taksasi Agunan'),(14,'Perpanjangan - Investigasi'),(15,'Perpanjangan - Analisa'),(16,'Perpanjangan - SP3'),(17,'Perpanjangan - Akad'),(18,'Perpanjangan - Eksekusi Perpanjangan'),(19,'Pick-up Angsuran Nasabah'),(20,'Tagih Past Due Bulan Sebelumnya'),(21,'Peringatan Nasabah - SPMK'),(22,'Peringatan Nasabah - SP1'),(23,'Peringatan Nasabah - SP2'),(24,'Peringatan Nasabah - SP3'),(25,'Funding - Sosialisasi'),(26,'Funding - Solisit'),(27,'Funding - Follow Up'),(28,'Funding - Closing'),(29,'Pick-up Tabungan Nasabah'),(30,'SE yang dibaca & dipahami'),(31,'Waktu Istirahat'),(32,'Lain - Lain');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_security` */

/*Table structure for table `daily_security_jenis_nasabah` */

DROP TABLE IF EXISTS `daily_security_jenis_nasabah`;

CREATE TABLE `daily_security_jenis_nasabah` (
  `jenis_nasabah_id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`jenis_nasabah_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_security_jenis_nasabah` */

insert  into `daily_security_jenis_nasabah`(`jenis_nasabah_id`,`nama`) values (1,'Nasabah Teller'),(2,'Nasabah Customer Service (CS)'),(3,'Nasabah Marketing'),(4,'Nasabah Mikro'),(5,'Nasabah Gadai'),(6,'Lain - Lain');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_teller` */

/*Table structure for table `daily_teller_kriteria_transaksi` */

DROP TABLE IF EXISTS `daily_teller_kriteria_transaksi`;

CREATE TABLE `daily_teller_kriteria_transaksi` (
  `jenis_transaksi_id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`jenis_transaksi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_teller_kriteria_transaksi` */

insert  into `daily_teller_kriteria_transaksi`(`jenis_transaksi_id`,`nama`) values (1,'Total Transaksi'),(2,'Transaksi Setoran'),(3,'Transaksi Penarikan'),(4,'Transaksi Net Banking'),(5,'Transaksi Transfer Tunai'),(6,'Saldo Teller Akhir Hari'),(7,'Saldo Khasanah Akhir Hari'),(8,'Saldo ATM Akhir Hari'),(9,'Cross Selling'),(10,'Waktu Istirahat'),(11,'SE yang dibaca & dipahami'),(12,'Lain - Lain');

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
  PRIMARY KEY (`wm_kriteria_nasabah_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `daily_wm_kriteria_nasabah` */

insert  into `daily_wm_kriteria_nasabah`(`wm_kriteria_nasabah_id`,`nama`) values (1,'Tahap - Sosialisasi'),(2,'Tahap - Solisit'),(3,'Tahap - Pengumpulan Data'),(4,'Tahap - BI Checking'),(5,'Tahap - Taksasi Agunan'),(6,'Tahap - Investigasi'),(7,'Tahap - Analisa'),(8,'Tahap - SP3'),(9,'Tahap - Akad'),(10,'Tahap - Pencairan'),(11,'Pick-up Angsuran Nasabah'),(12,'Tagih Past Due Bulan Sebelumnya'),(13,'Peringatan Nasabah - SPMK'),(14,'Peringatan Nasabah - SP1'),(15,'Peringatan Nasabah - SP2'),(16,'Peringatan Nasabah - SP3'),(17,'Funding - Sosialisasi'),(18,'Funding - Solisit'),(19,'Funding - Follow Up'),(20,'Funding - Closing'),(21,'Pick-up Tabungan Nasabah'),(22,'SE yang dibaca & dipahami'),(23,'Waktu Istirahat'),(24,'Lain - Lain');

