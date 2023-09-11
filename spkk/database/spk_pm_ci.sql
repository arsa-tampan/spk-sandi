# Host: localhost  (Version 5.5.5-10.1.19-MariaDB)
# Date: 2022-03-18 15:26:00
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "alternatif"
#

DROP TABLE IF EXISTS `alternatif`;
CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id_alternatif`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

#
# Data for table "alternatif"
#

INSERT INTO `alternatif` VALUES (35,'Wawan'),(36,'Intan'),(37,'Mirza'),(38,'Hilmi'),(39,'Bella'),(40,'Alfian');

#
# Structure for table "aspek"
#

DROP TABLE IF EXISTS `aspek`;
CREATE TABLE `aspek` (
  `id_aspek` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(100) NOT NULL,
  `kode_aspek` varchar(100) NOT NULL,
  `persentase` float NOT NULL,
  `bobot_cf` float NOT NULL,
  `bobot_sf` float NOT NULL,
  PRIMARY KEY (`id_aspek`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

#
# Data for table "aspek"
#

INSERT INTO `aspek` VALUES (29,'Kecerdasan','C1',30,60,40),(30,'Sikap Kerja','C2',30,70,30),(31,'Perilaku','C3',40,65,35);

#
# Structure for table "hasil"
#

DROP TABLE IF EXISTS `hasil`;
CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL AUTO_INCREMENT,
  `id_alternatif` int(11) NOT NULL,
  `nilai` float NOT NULL,
  PRIMARY KEY (`id_hasil`),
  KEY `id_alternatif` (`id_alternatif`),
  CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "hasil"
#

INSERT INTO `hasil` VALUES (1,35,4.00875),(2,36,4.29875),(3,37,3.89),(4,38,3.99875),(5,39,3.50875),(6,40,4.16375);

#
# Structure for table "kriteria"
#

DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kriteria` varchar(50) NOT NULL,
  `id_aspek` int(11) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `nilai` int(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kriteria`),
  KEY `id_aspek` (`id_aspek`),
  CONSTRAINT `kriteria_ibfk_1` FOREIGN KEY (`id_aspek`) REFERENCES `aspek` (`id_aspek`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;

#
# Data for table "kriteria"
#

INSERT INTO `kriteria` VALUES (125,'K1',29,'Common Sense',3,'Secondary Factor'),(126,'K2',29,'Verbalisasi Ide',3,'Secondary Factor'),(127,'K3',29,'Sistematika Berpikir',4,'Core Factor'),(128,'K4',29,'Penalaran dan Solusi Real',4,'Core Factor'),(129,'K5',29,'Konsentrasi',3,'Secondary Factor'),(130,'K6',29,'Logika Praktis',4,'Core Factor'),(131,'K7',29,'Fleksibilitas Berpikir',4,'Core Factor'),(132,'K8',29,'Imajinasi Kreatif',5,'Core Factor'),(133,'K9',29,'Antisipasi',3,'Secondary Factor'),(134,'K10',29,'Potensi Kecerdasan',4,'Core Factor'),(135,'S1',30,'Energi Psikis',3,'Secondary Factor'),(136,'S2',30,'Ketelitian dan tanggung jawab',4,'Core Factor'),(137,'S3',30,'Kehati-hatian',2,'Secondary Factor'),(138,'S4',30,'Pengendalian Perasaan',3,'Secondary Factor'),(139,'S5',30,'Dorongan Berprestasi',3,'Secondary Factor'),(140,'S6',30,'Vitalitas dan Perencanaan',5,'Core Factor'),(141,'P1',31,'Dominance (Kekuasaan)',3,'Secondary Factor'),(142,'P2',31,'Influences (Pengaruh)',3,'Secondary Factor'),(143,'P3',31,'Steadiness (Keteguhan Hati)',4,'Core Factor'),(144,'P4',31,'Compliance (Pemenuhan)',5,'Core Factor');

#
# Structure for table "nilai_bobot"
#

DROP TABLE IF EXISTS `nilai_bobot`;
CREATE TABLE `nilai_bobot` (
  `id_nilai_bobot` int(11) NOT NULL AUTO_INCREMENT,
  `id_alternatif` int(11) NOT NULL,
  `id_aspek` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `nilai` float NOT NULL,
  PRIMARY KEY (`id_nilai_bobot`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;

#
# Data for table "nilai_bobot"
#

INSERT INTO `nilai_bobot` VALUES (1,35,29,125,'Secondary Factor',4),(2,35,29,126,'Secondary Factor',4.5),(3,35,29,127,'Core Factor',4),(4,35,29,128,'Core Factor',4),(5,35,29,129,'Secondary Factor',4),(6,35,29,130,'Core Factor',3),(7,35,29,131,'Core Factor',5),(8,35,29,132,'Core Factor',3),(9,35,29,133,'Secondary Factor',4),(10,35,29,134,'Core Factor',4),(11,36,29,125,'Secondary Factor',5),(12,36,29,126,'Secondary Factor',3.5),(13,36,29,127,'Core Factor',5),(14,36,29,128,'Core Factor',4),(15,36,29,129,'Secondary Factor',4.5),(16,36,29,130,'Core Factor',5),(17,36,29,131,'Core Factor',4),(18,36,29,132,'Core Factor',5),(19,36,29,133,'Secondary Factor',4.5),(20,36,29,134,'Core Factor',4),(21,37,29,125,'Secondary Factor',3.5),(22,37,29,126,'Secondary Factor',5),(23,37,29,127,'Core Factor',3),(24,37,29,128,'Core Factor',5),(25,37,29,129,'Secondary Factor',4),(26,37,29,130,'Core Factor',3),(27,37,29,131,'Core Factor',5),(28,37,29,132,'Core Factor',2),(29,37,29,133,'Secondary Factor',5),(30,37,29,134,'Core Factor',5),(31,38,29,125,'Secondary Factor',5),(32,38,29,126,'Secondary Factor',4.5),(33,38,29,127,'Core Factor',4),(34,38,29,128,'Core Factor',4),(35,38,29,129,'Secondary Factor',4),(36,38,29,130,'Core Factor',4),(37,38,29,131,'Core Factor',5),(38,38,29,132,'Core Factor',2),(39,38,29,133,'Secondary Factor',4.5),(40,38,29,134,'Core Factor',5),(41,39,29,125,'Secondary Factor',4.5),(42,39,29,126,'Secondary Factor',4.5),(43,39,29,127,'Core Factor',4),(44,39,29,128,'Core Factor',4),(45,39,29,129,'Secondary Factor',4.5),(46,39,29,130,'Core Factor',4),(47,39,29,131,'Core Factor',3),(48,39,29,132,'Core Factor',3),(49,39,29,133,'Secondary Factor',5),(50,39,29,134,'Core Factor',3),(51,40,29,125,'Secondary Factor',5),(52,40,29,126,'Secondary Factor',5),(53,40,29,127,'Core Factor',4),(54,40,29,128,'Core Factor',2),(55,40,29,129,'Secondary Factor',4),(56,40,29,130,'Core Factor',4.5),(57,40,29,131,'Core Factor',4),(58,40,29,132,'Core Factor',2),(59,40,29,133,'Secondary Factor',3.5),(60,40,29,134,'Core Factor',5),(61,35,30,135,'Secondary Factor',5),(62,35,30,136,'Core Factor',5),(63,35,30,137,'Secondary Factor',4.5),(64,35,30,138,'Secondary Factor',3),(65,35,30,139,'Secondary Factor',5),(66,35,30,140,'Core Factor',1),(67,36,30,135,'Secondary Factor',3),(68,36,30,136,'Core Factor',4.5),(69,36,30,137,'Secondary Factor',2.5),(70,36,30,138,'Secondary Factor',3.5),(71,36,30,139,'Secondary Factor',3.5),(72,36,30,140,'Core Factor',2),(73,37,30,135,'Secondary Factor',4),(74,37,30,136,'Core Factor',4),(75,37,30,137,'Secondary Factor',4.5),(76,37,30,138,'Secondary Factor',5),(77,37,30,139,'Secondary Factor',4.5),(78,37,30,140,'Core Factor',2),(79,38,30,135,'Secondary Factor',4.5),(80,38,30,136,'Core Factor',4.5),(81,38,30,137,'Secondary Factor',2.5),(82,38,30,138,'Secondary Factor',3),(83,38,30,139,'Secondary Factor',4.5),(84,38,30,140,'Core Factor',1),(85,39,30,135,'Secondary Factor',4.5),(86,39,30,136,'Core Factor',3),(87,39,30,137,'Secondary Factor',5),(88,39,30,138,'Secondary Factor',4.5),(89,39,30,139,'Secondary Factor',3.5),(90,39,30,140,'Core Factor',2),(91,40,30,135,'Secondary Factor',4.5),(92,40,30,136,'Core Factor',4.5),(93,40,30,137,'Secondary Factor',3.5),(94,40,30,138,'Secondary Factor',5),(95,40,30,139,'Secondary Factor',3.5),(96,40,30,140,'Core Factor',3),(97,35,31,141,'Secondary Factor',4.5),(98,35,31,142,'Secondary Factor',4.5),(99,35,31,143,'Core Factor',5),(100,35,31,144,'Core Factor',4),(101,36,31,141,'Secondary Factor',5),(102,36,31,142,'Secondary Factor',5),(103,36,31,143,'Core Factor',5),(104,36,31,144,'Core Factor',5),(105,37,31,141,'Secondary Factor',5),(106,37,31,142,'Secondary Factor',4.5),(107,37,31,143,'Core Factor',4.5),(108,37,31,144,'Core Factor',3),(109,38,31,141,'Secondary Factor',4.5),(110,38,31,142,'Secondary Factor',5),(111,38,31,143,'Core Factor',5),(112,38,31,144,'Core Factor',4),(113,39,31,141,'Secondary Factor',4.5),(114,39,31,142,'Secondary Factor',3.5),(115,39,31,143,'Core Factor',4.5),(116,39,31,144,'Core Factor',2),(117,40,31,141,'Secondary Factor',4.5),(118,40,31,142,'Secondary Factor',5),(119,40,31,143,'Core Factor',4),(120,40,31,144,'Core Factor',5);

#
# Structure for table "penilaian"
#

DROP TABLE IF EXISTS `penilaian`;
CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL AUTO_INCREMENT,
  `id_alternatif` int(11) NOT NULL,
  `id_aspek` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL,
  PRIMARY KEY (`id_penilaian`),
  KEY `id_alternatif` (`id_alternatif`),
  KEY `id_aspek` (`id_aspek`),
  KEY `id_kriteria` (`id_kriteria`),
  CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_aspek`) REFERENCES `aspek` (`id_aspek`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=626 DEFAULT CHARSET=latin1;

#
# Data for table "penilaian"
#

INSERT INTO `penilaian` VALUES (506,35,29,125,2),(507,35,29,126,4),(508,35,29,127,3),(509,35,29,128,3),(510,35,29,129,2),(511,35,29,130,2),(512,35,29,131,4),(513,35,29,132,3),(514,35,29,133,2),(515,35,29,134,3),(516,35,30,135,3),(517,35,30,136,4),(518,35,30,137,3),(519,35,30,138,1),(520,35,30,139,3),(521,35,30,140,1),(522,35,31,141,4),(523,35,31,142,4),(524,35,31,143,4),(525,35,31,144,4),(526,36,29,125,3),(527,36,29,126,5),(528,36,29,127,4),(529,36,29,128,3),(530,36,29,129,4),(531,36,29,130,4),(532,36,29,131,3),(533,36,29,132,5),(534,36,29,133,4),(535,36,29,134,3),(536,36,30,135,1),(537,36,30,136,5),(538,36,30,137,5),(539,36,30,138,5),(540,36,30,139,5),(541,36,30,140,2),(542,36,31,141,3),(543,36,31,142,3),(544,36,31,143,4),(545,36,31,144,5),(546,37,29,125,5),(547,37,29,126,3),(548,37,29,127,2),(549,37,29,128,4),(550,37,29,129,2),(551,37,29,130,2),(552,37,29,131,4),(553,37,29,132,2),(554,37,29,133,3),(555,37,29,134,4),(556,37,30,135,2),(557,37,30,136,3),(558,37,30,137,3),(559,37,30,138,3),(560,37,30,139,4),(561,37,30,140,2),(562,37,31,141,3),(563,37,31,142,4),(564,37,31,143,5),(565,37,31,144,3),(566,38,29,125,3),(567,38,29,126,4),(568,38,29,127,3),(569,38,29,128,3),(570,38,29,129,2),(571,38,29,130,3),(572,38,29,131,4),(573,38,29,132,2),(574,38,29,133,4),(575,38,29,134,4),(576,38,30,135,4),(577,38,30,136,5),(578,38,30,137,5),(579,38,30,138,1),(580,38,30,139,4),(581,38,30,140,1),(582,38,31,141,4),(583,38,31,142,3),(584,38,31,143,4),(585,38,31,144,4),(586,39,29,125,4),(587,39,29,126,4),(588,39,29,127,3),(589,39,29,128,3),(590,39,29,129,4),(591,39,29,130,3),(592,39,29,131,2),(593,39,29,132,3),(594,39,29,133,3),(595,39,29,134,2),(596,39,30,135,4),(597,39,30,136,2),(598,39,30,137,2),(599,39,30,138,4),(600,39,30,139,5),(601,39,30,140,2),(602,39,31,141,4),(603,39,31,142,5),(604,39,31,143,5),(605,39,31,144,2),(606,40,29,125,3),(607,40,29,126,3),(608,40,29,127,3),(609,40,29,128,1),(610,40,29,129,2),(611,40,29,130,5),(612,40,29,131,3),(613,40,29,132,2),(614,40,29,133,5),(615,40,29,134,4),(616,40,30,135,4),(617,40,30,136,5),(618,40,30,137,4),(619,40,30,138,3),(620,40,30,139,5),(621,40,30,140,3),(622,40,31,141,4),(623,40,31,142,3),(624,40,31,143,3),(625,40,31,144,5);

#
# Structure for table "user_level"
#

DROP TABLE IF EXISTS `user_level`;
CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL AUTO_INCREMENT,
  `user_level` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user_level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "user_level"
#

INSERT INTO `user_level` VALUES (1,'Administrator'),(2,'user'),(3,'pimpinan');

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_level` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_user_level` (`id_user_level`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_user_level`) REFERENCES `user_level` (`id_user_level`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,1,'user','user@gmail.com','user','ee11cbb19052e40b07aac0ca060c23ee'),(7,2,'admin','admin@gmail.com','admin','21232f297a57a5a743894a0e4a801fc3'),(8,3,'Rian Eko','pimpinan@gmail.com','pimpinan','90973652b88fe07d05a4304f0a945de8');
