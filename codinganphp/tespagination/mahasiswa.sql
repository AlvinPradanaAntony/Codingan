/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.28-MariaDB : Database - mahasiswa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mahasiswa` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `mahasiswa`;

/*Table structure for table `tb_mahasiswa` */

DROP TABLE IF EXISTS `tb_mahasiswa`;

CREATE TABLE `tb_mahasiswa` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `fakultas` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `tb_mahasiswa` */

insert  into `tb_mahasiswa`(`id`,`nama`,`fakultas`) values (1,'Indah Seni','MIPA'),(2,'Nurul Huda','Teknik'),(3,'Madia Sari','MIPA'),(4,'Retno Kasih','Teknik'),(5,'Santiani','Kedokteran'),(6,'Mirajani','Kedokteran'),(7,'Narima Indah','Ekonomi'),(8,'Ida Kasida','Ekonomi'),(9,'Widya Wilma','Ekonomi'),(10,'Mira Antari','Ekonomi'),(11,'Delima Cinta','MIPA'),(12,'Farhan','Teknik'),(13,'Edo Sido','Teknik'),(14,'Sukrasih','Pertanian'),(15,'Mirani','Pertanian'),(16,'Makra Sani','Pertanian'),(17,'Ernawati','Pertanian'),(18,'Sarma Saleh','MIPA'),(19,'Dara Cantik','MIPA'),(20,'Indah Sinta','MIPA');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
