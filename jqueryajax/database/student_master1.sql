/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.16 : Database - sample
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sample` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sample`;

/*Table structure for table `student_master` */

DROP TABLE IF EXISTS `student_master`;

CREATE TABLE `student_master` (
  `student_master_id` int(10) NOT NULL AUTO_INCREMENT,
  `roll_no` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`student_master_id`),
  UNIQUE KEY `roll_no` (`roll_no`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `student_master` */

insert  into `student_master`(`student_master_id`,`roll_no`,`name`) values (2,12,'Rajan Rawal');
insert  into `student_master`(`student_master_id`,`roll_no`,`name`) values (3,13,'Dinesh Pawar');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
