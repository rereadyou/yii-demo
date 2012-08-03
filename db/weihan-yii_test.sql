/*
SQLyog 企业版 - MySQL GUI v7.14 
MySQL - 5.0.51b-community-nt : Database - yii_test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`yii_test` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `yii_test`;

/*Table structure for table `post` */

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `post` */

insert  into `post`(`id`,`userid`) values (2,1),(1,13);

/*Table structure for table `posts0` */

DROP TABLE IF EXISTS `posts0`;

CREATE TABLE `posts0` (
  `id` int(11) NOT NULL,
  `userid` int(11) default NULL,
  `title` varchar(200) default NULL,
  `content` text,
  `addtime` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `posts0` */

insert  into `posts0`(`id`,`userid`,`title`,`content`,`addtime`) values (1,13,'回复1','回复1的内容啊啊  啊啊\r\n发的萨芬四大',NULL),(2,1,'回复2','回复2的内容丹佛iasgihgias\n',NULL);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `user` */

insert  into `user`(`id`,`username`) values (13,'weihan');

/*Table structure for table `users0` */

DROP TABLE IF EXISTS `users0`;

CREATE TABLE `users0` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) default NULL,
  `email` varchar(128) default NULL,
  `activkey` varchar(128) default '',
  `createtime` int(10) default '0',
  `lastvisit` int(10) default '0',
  `superuser` int(1) default '0',
  `status` int(1) default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `users0` */

insert  into `users0`(`id`,`username`,`password`,`email`,`activkey`,`createtime`,`lastvisit`,`superuser`,`status`) values (1,'admin1','21232f297a57a5a743894a0e4a801fc3','webmaster@example.com','9a24eff8c15a6a141ece27eb6947da0f',1261146094,1337907800,1,1),(2,'demo1','fe01ce2a7fbac8fafaed7c982a04e229','demo@example.com','099f825543f7850cc038b90aaff39fac',1261146096,0,0,1);

/*Table structure for table `users1` */

DROP TABLE IF EXISTS `users1`;

CREATE TABLE `users1` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) default NULL,
  `email` varchar(128) default NULL,
  `activkey` varchar(128) default '',
  `createtime` int(10) default '0',
  `lastvisit` int(10) default '0',
  `superuser` int(1) default '0',
  `status` int(1) default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `users1` */

insert  into `users1`(`id`,`username`,`password`,`email`,`activkey`,`createtime`,`lastvisit`,`superuser`,`status`) values (11,'username11','21232f297a57a5a743894a0e4a801fc3','webmaster@example.com','9a24eff8c15a6a141ece27eb6947da0f',1261146094,1337907800,1,1),(12,'demo2','fe01ce2a7fbac8fafaed7c982a04e229','demo@example.com','099f825543f7850cc038b90aaff39fac',1261146096,0,0,1),(13,'weihan','1111',NULL,'',0,0,0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
