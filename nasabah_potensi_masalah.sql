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
) ;

DROP TABLE IF EXISTS `naspoma_kartu_keluarga`;

CREATE TABLE `naspoma_kartu_keluarga` (
  `no_kartu_keluarga` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_ktp` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `naspoma_id` int(5) DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ;
