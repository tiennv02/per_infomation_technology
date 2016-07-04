/*
SQLyog Ultimate v9.33 GA
MySQL - 5.5.5-10.1.10-MariaDB : Database - per_infomation_technology
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`per_infomation_technology` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `per_infomation_technology`;

/*Table structure for table `contacts` */

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `contacts` */

LOCK TABLES `contacts` WRITE;

insert  into `contacts`(`id`,`name`,`email`,`phone`,`content`,`type`,`created_at`,`updated_at`) values (1,'Tiến Văn Nguyễn','tiennv02@gmail.com','0982630749','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour\n',0,'2016-06-30 15:44:25','2016-06-30 15:44:25'),(2,'Tiến Văn Nguyễn','tiennv02@gmail.com','0982630749','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour\n',0,'2016-06-30 15:51:45','2016-06-30 15:51:45'),(3,'Tiến Văn Nguyễn','tiennv02@gmail.com','0982630749','fdsa',0,'2016-06-30 17:05:43','2016-06-30 17:05:43'),(4,'Tiến Văn Nguyễn','tiennv02@gmail.com','0982630749','phone|phone|phone|',0,'2016-06-30 17:06:09','2016-06-30 17:06:09'),(5,'Tiến Văn Nguyễn','tiennv02@gmail.com','982630749','http://localhost/per_infomation_technology/public/?XDEBUG_SESSION_START=15244#home',0,'2016-07-03 18:43:51','2016-07-03 18:43:51'),(6,'Tiến Văn Nguyễn','tiennv02@gmail.com','982630749','$objectSendMail$objectSendMail$objectSendMail',0,'2016-07-03 18:59:07','2016-07-03 18:59:07'),(7,'Tiến Văn Nguyễn','tiennv02@gmail.com','982630749','Email: tiennv02@gmail.com\nEmail: tiennv02@gmail.com\n\nEmail: tiennv02@gmail.com\n\n',0,'2016-07-03 19:00:09','2016-07-03 19:00:09'),(8,'Tiến Văn Nguyễn','tiennv02@gmail.com','982630749','Email: tiennv02@gmail.com\nEmail: tiennv02@gmail.com\n\nEmail: tiennv02@gmail.com\n\n',0,'2016-07-03 19:00:39','2016-07-03 19:00:39'),(9,'Tiến Văn Nguyễn','tiennv02@gmail.com','982630749','Email: tiennv02@gmail.com\nEmail: tiennv02@gmail.com\n\nEmail: tiennv02@gmail.com\n\n',0,'2016-07-03 19:01:27','2016-07-03 19:01:27'),(10,'Tiến Văn Nguyễn','tiennv02@gmail.com','982630749','Email: tiennv02@gmail.com\nEmail: tiennv02@gmail.com\n\nEmail: tiennv02@gmail.com\n\n',0,'2016-07-03 19:01:51','2016-07-03 19:01:51'),(11,'Tiến Văn Nguyễn','tiennv02@gmail.com','982630749','http://localhost/per_infomation_technology/public/?XDEBUG_SESSION_START=15244#homehttp://localhost/per_infomation_technology/public/?XDEBUG_SESSION_START=15244#home',0,'2016-07-03 19:03:25','2016-07-03 19:03:25'),(12,'Tiến Văn Nguyễn','tiennv02@gmail.com','982630749','g',0,'2016-07-03 19:04:04','2016-07-03 19:04:04'),(13,'Tiến Văn Nguyễn','tiennv02@gmail.com','982630749','g',0,'2016-07-03 19:04:12','2016-07-03 19:04:12'),(14,'Tiến Văn Nguyễn','tiennv02@gmail.com','982630749','tiennv02@gmail.comtiennv02@gmail.com',0,'2016-07-03 19:06:37','2016-07-03 19:06:37'),(15,'Tiến Văn Nguyễn','tiennv02@gmail.com','982630749','tiennv02tiennv02tiennv02tiennv02',0,'2016-07-03 19:08:11','2016-07-03 19:08:11'),(16,'Tiến Văn Nguyễn','tiennv02@gmail.com','982630749','tiennv02tiennv02tiennv02tiennv02',0,'2016-07-03 19:09:23','2016-07-03 19:09:23'),(17,'Tiến Văn Nguyễn','tiennv02@gmail.com','982630749','764',0,'2016-07-03 19:09:51','2016-07-03 19:09:51'),(18,'Tiến Văn Nguyễn','tiennv02@gmail.com','982630749','764',0,'2016-07-03 19:10:25','2016-07-03 19:10:25'),(19,'Tiến Văn Nguyễn','tiennv02@gmail.com','982630749','tưe',0,'2016-07-03 19:14:46','2016-07-03 19:14:46'),(20,'Tiến Văn Nguyễn','tiennv02@gmail.com','982630749','http://localhost/per_infomation_technology/public/?XDEBUG_SESSION_START=15244#home',0,'2016-07-03 19:19:39','2016-07-03 19:19:39'),(21,'Tiến Văn Nguyễn','tiennv02@gmail.com','982630749','Hãy liên hệ với Chúng Tôi để nhận được sự hỗ trợ, giải pháp và tư vấn sản phẩm\nHãy liên hệ với Chúng Tôi để nhận được sự hỗ trợ, giải pháp và tư vấn sản phẩm\nHãy liên hệ với Chúng Tôi để nhận được sự hỗ trợ, giải pháp và tư vấn sản phẩm\nHãy liên hệ với Ch',0,'2016-07-03 19:26:02','2016-07-03 19:26:02'),(22,'Tiến Văn Nguyễn','tiennv02@gmail.com','982630749','Hãy liên hệ với Chúng Tôi để nhận được sự hỗ trợ, giải pháp và tư vấn sản phẩm\nHãy liên hệ với Chúng Tôi để nhận được sự hỗ trợ, giải pháp và tư vấn sản phẩm\nHãy liên hệ với Chúng Tôi để nhận được sự hỗ trợ, giải pháp và tư vấn sản phẩm\nHãy liên hệ với Ch',0,'2016-07-03 19:27:09','2016-07-03 19:27:09'),(23,'Tiến Văn Nguyễn','tiennv02@gmail.com','982630749','Hãy liên hệ với Chúng Tôi để nhận được sự hỗ trợ, giải pháp và tư vấn sản phẩm\nHãy liên hệ với Chúng Tôi để nhận được sự hỗ trợ, giải pháp và tư vấn sản phẩm\nHãy liên hệ với Chúng Tôi để nhận được sự hỗ trợ, giải pháp và tư vấn sản phẩm\nHãy liên hệ với Ch',0,'2016-07-03 19:27:55','2016-07-03 19:27:55'),(24,'Tiến Văn Nguyễn','tiennv02@gmail.com','982630749','Hãy liên hệ với Chúng Tôi để nhận được sự hỗ trợ, giải pháp và tư vấn sản phẩm\nHãy liên hệ với Chúng Tôi để nhận được sự hỗ trợ, giải pháp và tư vấn sản phẩm\nHãy liên hệ với Chúng Tôi để nhận được sự hỗ trợ, giải pháp và tư vấn sản phẩm\nHãy liên hệ với Ch',0,'2016-07-03 19:29:48','2016-07-03 19:29:48'),(25,'Tiến Văn Nguyễn','tiennv02@gmail.com','982630749','Hãy liên hệ với Chúng Tôi để nhận được sự hỗ trợ, giải pháp và tư vấn sản phẩm\nHãy liên hệ với Chúng Tôi để nhận được sự hỗ trợ, giải pháp và tư vấn sản phẩm\nHãy liên hệ với Chúng Tôi để nhận được sự hỗ trợ, giải pháp và tư vấn sản phẩm\nHãy liên hệ với Ch',0,'2016-07-03 19:30:00','2016-07-03 19:30:00'),(26,'Tiến Văn Nguyễn','tiennv02@gmail.com','982630749','Hãy liên hệ với Chúng Tôi để nhận được sự hỗ trợ, giải pháp và tư vấn sản phẩm\nHãy liên hệ với Chúng Tôi để nhận được sự hỗ trợ, giải pháp và tư vấn sản phẩm\nHãy liên hệ với Chúng Tôi để nhận được sự hỗ trợ, giải pháp và tư vấn sản phẩm\nHãy liên hệ với Ch',0,'2016-07-03 19:32:30','2016-07-03 19:32:30');

UNLOCK TABLES;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

LOCK TABLES `migrations` WRITE;

insert  into `migrations`(`migration`,`batch`) values ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_06_29_090333_create_project_info_table',1),('2016_06_30_091555_create_contacts_table',1);

UNLOCK TABLES;

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

LOCK TABLES `password_resets` WRITE;

UNLOCK TABLES;

/*Table structure for table `project_info` */

DROP TABLE IF EXISTS `project_info`;

CREATE TABLE `project_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_large` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `project_info` */

LOCK TABLES `project_info` WRITE;

insert  into `project_info`(`id`,`name`,`image`,`description`,`content`,`order`,`created_at`,`updated_at`,`image_large`) values (1,'Startup Framework','startup-framework.png','Website Design','<a href=\"http://designmodo.com/startup/?u=787\">Startup Framework</a> is a website builder for',2,'2016-07-04 23:07:40','2016-07-04 23:07:43','roundicons-free.png'),(2,'Round Icons','roundicons.png','Graphic Design','<a href=\"http://designmodo.com/startup/?u=787\">Startup Framework</a> is a website builder for',2,'2016-07-04 23:07:40','2016-07-04 23:07:43','roundicons-free.png'),(3,'Treehouse','treehouse.png','Website Design','<a href=\"http://designmodo.com/startup/?u=787\">Startup Framework</a> is a website builder for',3,'2016-07-04 23:07:40','2016-07-04 23:07:43','roundicons-free.png'),(4,'Golden','golden.png','Website Design','<a href=\"http://designmodo.com/startup/?u=787\">Startup Framework</a> is a website builder for',4,'2016-07-04 23:07:40','2016-07-04 23:07:43','roundicons-free.png'),(5,'Escape','escape.png','Website Design','<a href=\"http://designmodo.com/startup/?u=787\">Startup Framework</a> is a website builder for',5,'2016-07-04 23:07:40','2016-07-04 23:07:43','roundicons-free.png'),(6,'Dreams','dreams.png','Website Design','<a href=\"http://designmodo.com/startup/?u=787\">Startup Framework</a> is a website builder for',6,'2016-07-04 23:07:40','2016-07-04 23:07:43','roundicons-free.png');

UNLOCK TABLES;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

LOCK TABLES `users` WRITE;

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
