
USE `nasdo`;

/*Table structure for table `mtb_text` */

DROP TABLE IF EXISTS `mtb_text`;

CREATE TABLE `mtb_text` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8_bin,
  `show` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `mtb_text` */

insert  into `mtb_text`(`id`,`text`,`show`) values (1,'Jangan Lupa Kuisionare Yaa',1),(4,'Selamat Datang',1);

