/*
SQLyog 企业版 - MySQL GUI v7.14 
MySQL - 5.0.51b-community-nt : Database - yii
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`yii` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `yii`;

/*Table structure for table `profiles` */

DROP TABLE IF EXISTS `profiles`;

CREATE TABLE `profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL default '',
  `firstname` varchar(50) NOT NULL default '',
  `birthday` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `profiles` */

insert  into `profiles`(`user_id`,`lastname`,`firstname`,`birthday`) values (1,'Admin','Administrator','0000-00-00'),(2,'Demo','Demo','0000-00-00');

/*Table structure for table `profiles_fields` */

DROP TABLE IF EXISTS `profiles_fields`;

CREATE TABLE `profiles_fields` (
  `id` int(10) NOT NULL auto_increment,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` int(3) NOT NULL default '0',
  `field_size_min` int(3) NOT NULL default '0',
  `required` int(1) NOT NULL default '0',
  `match` varchar(255) NOT NULL default '',
  `range` varchar(255) NOT NULL default '',
  `error_message` varchar(255) NOT NULL default '',
  `other_validator` varchar(5000) NOT NULL default '',
  `default` varchar(255) NOT NULL default '',
  `widget` varchar(255) NOT NULL default '',
  `widgetparams` varchar(5000) NOT NULL default '',
  `position` int(3) NOT NULL default '0',
  `visible` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `profiles_fields` */

insert  into `profiles_fields`(`id`,`varname`,`title`,`field_type`,`field_size`,`field_size_min`,`required`,`match`,`range`,`error_message`,`other_validator`,`default`,`widget`,`widgetparams`,`position`,`visible`) values (1,'lastname','Last Name','VARCHAR',50,3,1,'','','Incorrect Last Name (length between 3 and 50 characters).','','','','',1,3),(2,'firstname','First Name','VARCHAR',50,3,1,'','','Incorrect First Name (length between 3 and 50 characters).','','','','',0,3),(3,'birthday','Birthday','DATE',0,0,2,'','','','','0000-00-00','UWjuidate','{\"ui-theme\":\"redmond\"}',3,2);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL default '',
  `createtime` int(10) NOT NULL default '0',
  `lastvisit` int(10) NOT NULL default '0',
  `superuser` int(1) NOT NULL default '0',
  `status` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`email`,`activkey`,`createtime`,`lastvisit`,`superuser`,`status`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','webmaster@example.com','9a24eff8c15a6a141ece27eb6947da0f',1261146094,1337907800,1,1),(2,'demo','fe01ce2a7fbac8fafaed7c982a04e229','demo@example.com','099f825543f7850cc038b90aaff39fac',1261146096,0,0,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
