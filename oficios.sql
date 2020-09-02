/*
SQLyog Community v12.2.5 (32 bit)
MySQL - 5.7.26 : Database - oficios
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`oficios` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `oficios`;

/*Table structure for table `juzgado` */

DROP TABLE IF EXISTS `juzgado`;

CREATE TABLE `juzgado` (
  `id_juzgado` bigint(50) NOT NULL,
  `nombre_juzgado` varchar(200) DEFAULT NULL,
  `abreviacion_juzgado` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_juzgado`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `juzgado` */

/*Table structure for table `oficios` */

DROP TABLE IF EXISTS `oficios`;

CREATE TABLE `oficios` (
  `id_oficio` bigint(10) NOT NULL AUTO_INCREMENT,
  `letra` char(1) DEFAULT NULL,
  `rit` bigint(50) DEFAULT NULL,
  `anio` year(4) DEFAULT NULL,
  `origen` varchar(50) DEFAULT NULL,
  `destino` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `documento` blob,
  `ip_origen` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_oficio`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `oficios` */

insert  into `oficios`(`id_oficio`,`letra`,`rit`,`anio`,`origen`,`destino`,`descripcion`,`documento`,`ip_origen`,`tipo`) values 
(1,'c',1,2019,'aaa','bbb','xxx',NULL,NULL,'Oficio'),
(2,'c',1,2019,'aaa','bbb','xxx',NULL,NULL,'Oficio'),
(3,'c',1,2019,'aaa','bbb','xxx',NULL,NULL,'Oficio'),
(4,'c',1,2019,'aaa','bbb','xxx',NULL,NULL,'Oficio'),
(5,'c',1,2019,'aaa','bbb','xxx',NULL,NULL,'Oficio'),
(6,'c',1,2019,'aaa','bbb','xxx',NULL,NULL,'Oficio'),
(7,'c',1,2019,'aaa','bbb','xxx',NULL,NULL,'Oficio'),
(8,'a',2,2012,'233','244','2342',NULL,NULL,'Oficio');

/*Table structure for table `unidad` */

DROP TABLE IF EXISTS `unidad`;

CREATE TABLE `unidad` (
  `id_unidad` bigint(50) NOT NULL,
  `nombre_unidad` varchar(200) DEFAULT NULL,
  `id_juzgado` bigint(50) DEFAULT NULL,
  PRIMARY KEY (`id_unidad`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `unidad` */

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` bigint(50) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `usuario_juzgado` bigint(50) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `usuarios` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
