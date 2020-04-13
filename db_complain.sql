/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.4.8-MariaDB : Database - db_complain
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_complain` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_complain`;

/*Table structure for table `auto_numbers` */

DROP TABLE IF EXISTS `auto_numbers`;

CREATE TABLE `auto_numbers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `auto_numbers` */

insert  into `auto_numbers`(`id`,`name`,`number`,`created_at`,`updated_at`) values 
(1,'d0079d3e751f227e3d4d836afc1b2c2f',5,'2019-11-19 15:15:55','2019-11-19 15:19:19');

/*Table structure for table `memo` */

DROP TABLE IF EXISTS `memo`;

CREATE TABLE `memo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auto_kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiket_id` int(10) unsigned NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_user_id` int(10) unsigned NOT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0 : belum di tangani; 1 : Di tangani; 2 : NG;',
  `notif` int(1) DEFAULT NULL COMMENT '0 : Terkirim 1: dibaca',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `fk_tiket_memo` (`tiket_id`),
  CONSTRAINT `fk_tiket_memo` FOREIGN KEY (`tiket_id`) REFERENCES `mstiket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `memo` */

insert  into `memo`(`id`,`kode`,`auto_kode`,`tiket_id`,`pesan`,`to_user_id`,`status`,`notif`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(4,'Ca','PROD0001',19,'Silahkan Di perbaiki',6,4,1,4,NULL,'2019-11-28 21:36:07',NULL),
(6,'Ca','PROD0001',19,'Silahkan Di perbaiki',5,4,1,4,NULL,'2019-11-28 21:36:09',NULL),
(17,'RN-1212-AH','PROD0002',18,'Coba Lakukan yang terbaik',7,4,1,4,NULL,NULL,NULL),
(18,'ASICS-HAGLOFT','PROD0003',16,'ini pesan ya',7,4,1,4,NULL,NULL,NULL),
(19,'ART-1211231','PROD0004',20,'Lem Tidak Rapih di porses assembling',6,1,1,4,NULL,NULL,NULL),
(20,'TEST-123','PROD0005',21,'TEst Memo',6,1,1,4,NULL,'2020-01-26 09:08:04',NULL),
(21,'TEST-123','PROD0005',21,'TEst Memo',7,1,1,4,NULL,'2020-01-26 09:08:06',NULL);

/*Table structure for table `memotiket` */

DROP TABLE IF EXISTS `memotiket`;

CREATE TABLE `memotiket` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `tiket_id` int(10) unsigned NOT NULL,
  `memo_id` int(10) unsigned NOT NULL,
  `status` int(11) DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC COMMENT='digunakan untuk memo yang sedang di kerjakan oleh masing masing bagian\r\n';

/*Data for the table `memotiket` */

/*Table structure for table `menu_role` */

DROP TABLE IF EXISTS `menu_role`;

CREATE TABLE `menu_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `menu_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `menu_role_role_id_foreign` (`role_id`) USING BTREE,
  KEY `menu_role_menu_id_foreign` (`menu_id`) USING BTREE,
  CONSTRAINT `menu_role_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  CONSTRAINT `menu_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `menu_role` */

insert  into `menu_role`(`id`,`role_id`,`menu_id`,`created_at`,`updated_at`) values 
(1,1,100,'2019-08-22 15:09:47','2019-08-22 15:09:49'),
(2,1,200,'2019-08-22 15:09:51','2019-08-22 15:09:53'),
(3,6,100,'2019-08-29 13:05:05','2019-08-29 13:05:08'),
(4,6,300,'2019-08-29 13:20:05','2019-08-29 13:20:07'),
(5,1,300,'2019-10-16 10:39:39','2019-10-16 10:39:43'),
(6,2,100,'2019-10-16 10:39:35','2019-10-16 10:39:36'),
(7,2,400,'2019-10-16 10:39:57','2019-10-16 10:39:59'),
(8,2,1000,'2019-10-16 10:43:12','2019-10-16 10:43:13'),
(9,2,600,'2019-10-16 10:48:29','2019-10-16 10:48:30'),
(10,4,100,'2019-11-28 20:52:06','2019-11-28 20:52:11'),
(11,5,100,'2019-11-28 21:40:39','2019-11-28 21:40:42'),
(12,4,500,'2019-11-28 21:43:45','2019-11-28 21:43:46'),
(13,5,700,'2019-11-28 21:43:58','2019-11-28 21:44:00'),
(14,5,800,'2019-11-28 21:44:16','2019-11-28 21:44:19'),
(15,4,800,'2019-11-28 21:44:16','2019-11-28 21:44:16'),
(16,3,100,'2019-11-28 21:44:16','2019-11-28 21:44:16'),
(17,3,1000,'2020-01-22 20:55:24','2020-01-22 20:55:26'),
(18,3,600,'2019-11-28 21:44:16','2019-11-28 21:44:16'),
(19,6,900,'2019-12-01 09:54:15','2019-12-01 09:54:20'),
(20,5,600,'2020-01-15 22:14:56','2020-01-15 22:14:59'),
(21,4,600,'2020-01-15 22:15:34','2020-01-15 22:15:37'),
(22,3,800,'2019-11-28 21:46:11','2019-11-28 21:46:14'),
(25,6,600,'2020-01-30 22:13:27','2020-01-30 22:13:30'),
(29,2,800,'2020-02-06 20:46:19','2020-02-06 20:46:23');

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_menu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1003 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `menus` */

insert  into `menus`(`id`,`menu`,`sub_menu`,`parent_id`,`link`,`icon`,`is_active`,`target`,`created_at`,`updated_at`) values 
(100,'Dashboard',NULL,0,NULL,'home',1,'dashboard','2019-08-22 08:05:12','2019-08-22 08:05:12'),
(200,'User Management',NULL,0,NULL,'users',1,'user','2019-08-22 08:05:12','2019-08-22 08:05:12'),
(201,NULL,'User Profile',200,'user-profile','users',1,'rofile','2019-08-22 08:05:12','2019-08-22 08:05:12'),
(202,NULL,'List User',200,'list-user',NULL,1,'list-user','2020-01-15 22:14:01','2020-01-15 22:14:04'),
(300,'Complain',NULL,0,NULL,'list',1,'complain','2019-08-22 15:16:05','2019-08-22 15:16:08'),
(301,'','Tiket',300,'tiket','list',1,'tiket','2019-08-22 15:16:05','2019-08-22 15:16:08'),
(302,'','History',300,'tiket-history','history',1,'history','2019-08-22 15:16:05','2019-08-22 15:16:08'),
(400,'Memo',NULL,0,NULL,'book',1,'complain','2019-10-16 10:39:10','2019-10-16 10:39:13'),
(401,NULL,'create Memo',400,'create-memo','book',1,'list','2019-10-16 10:41:06','2019-10-16 10:41:08'),
(402,NULL,'List Tiket',400,'tiket-list',NULL,1,'tiket-list','2020-01-15 20:29:27','2020-01-15 20:29:30'),
(500,'Inspeksi',NULL,0,NULL,'zoom-in',1,'inspeksi','2019-10-16 10:42:46','2019-10-16 10:42:48'),
(501,'','Cek',500,'inspek','zoom-in',1,'inspeksi','2019-10-16 10:52:21','2019-10-16 10:52:23'),
(600,'Laporan',NULL,0,NULL,'file-text',1,'laporan','2019-10-16 10:48:06','2019-10-16 10:48:09'),
(601,'','Laporan Tiket',600,'laporan-tiket','file-text',1,'laporan-tiket','2019-10-16 10:49:34','2019-10-16 10:49:37'),
(700,'Checking',NULL,0,NULL,'award',1,'pmqacek','2019-11-28 21:40:14','2019-11-28 21:40:21'),
(701,NULL,'Cek',700,'pmqa-cek',NULL,1,'pmqa-cek','2019-11-28 21:40:18','2019-11-28 21:40:23'),
(702,NULL,'Produck Cek',700,'produck-cek',NULL,1,'produck-cek','2020-01-10 19:37:21','2020-01-10 19:37:28'),
(800,'History',NULL,0,NULL,'book',1,'historys','2019-11-28 21:42:07','2019-11-28 21:42:10'),
(801,NULL,'memo',800,'history-memo',NULL,1,'history-memo','2019-11-28 21:43:01','2019-11-28 21:43:03'),
(900,'Timeline',NULL,0,NULL,'activity',1,'timeline','2019-12-01 09:51:19','2019-12-01 09:51:24'),
(901,'','status',900,'list-status',NULL,1,'list-status','2020-01-10 19:37:23','2020-01-10 19:37:25'),
(1000,'Inspeksi',NULL,0,NULL,'zoom-in',1,'inspeksi','2019-10-16 10:42:46','2019-10-16 10:42:48'),
(1001,NULL,'Result',1000,'result-inspeck',NULL,1,'result-inspeck','2020-01-16 20:44:28','2020-01-16 20:44:31');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(63,'2014_10_12_000000_create_users_table',1),
(64,'2014_10_12_100000_create_password_resets_table',1),
(65,'2017_08_03_055212_create_auto_numbers',1),
(66,'2019_08_22_135831_create_table_menus',1),
(67,'2019_08_22_140302_create_table_roles',1),
(68,'2019_08_22_140523_create_menu_role_table',1),
(69,'2019_08_22_141041_create_table_mstiket',1),
(70,'2019_10_16_100620_create_memotiket_table',1),
(71,'2019_10_16_100822_create_memo_table',1),
(72,'2019_10_16_100846_create_msinspek_table',1),
(73,'2019_11_19_141917_create_msproduck_table',1);

/*Table structure for table `msinspek` */

DROP TABLE IF EXISTS `msinspek`;

CREATE TABLE `msinspek` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tiket_id` int(10) unsigned NOT NULL,
  `memo_id` int(10) unsigned NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Hasil Inspeksi berupa OK/NG',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT 0 COMMENT '0 : belum cek; 1 : Oke Cek PMPA; 2 : NG;',
  `notif` int(11) DEFAULT 0 COMMENT '0 : baru, 1, process, 2, waiting Approved',
  `kind_id` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `msinspek` */

insert  into `msinspek`(`id`,`tiket_id`,`memo_id`,`category`,`result`,`description`,`images`,`status`,`notif`,`kind_id`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(14,18,17,'Running','OK','OKE Quality','pmqa/images/uPGholFYMbYPcbeMovlqqY7nF5oBsNq7hM5WPxbI.jpeg',1,0,'Q',7,NULL,'2020-01-07 11:00:28','2020-01-07 11:00:28'),
(15,19,4,'Running','OK','Hasil Inspek asembling sudah oke sesuai standard','pmqa/images/AFz3hbLI7lNjzNdQobCHZDmdw7T2YqvQeRAVv9ci.jpeg',1,0,'Q',7,NULL,'2020-01-16 13:40:38','2020-01-16 13:40:38'),
(21,19,4,'Running','OK','oke la','pmqa/images/M3PofDqqp1HOQRz2pv6iZVkii50QsYq6dvrdE9yz.jpeg',1,0,'P',7,NULL,'2020-01-16 14:51:47','2020-01-16 14:51:47'),
(22,16,18,'Haglofs','OK','Hasil Ok','pmqa/images/liBY8l7FD1mb7SorxWbMRrHm1QzDjlZrrnMo1s42.jpeg',1,0,'Q',7,NULL,'2020-01-16 14:57:41','2020-01-16 14:57:41');

/*Table structure for table `mskind` */

DROP TABLE IF EXISTS `mskind`;

CREATE TABLE `mskind` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `kind_id` varchar(5) NOT NULL,
  `kind_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mskind` */

insert  into `mskind`(`id`,`kind_id`,`kind_name`) values 
(1,'Q','Product'),
(2,'P','Production');

/*Table structure for table `msproduck` */

DROP TABLE IF EXISTS `msproduck`;

CREATE TABLE `msproduck` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tiket_id` int(10) unsigned NOT NULL,
  `memo_id` int(10) unsigned NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Cutting, Sewing, Assembling',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT 0 COMMENT '0 : belum cek; 1 : Oke Cek PMPA; 2 : NG;',
  `notif` int(11) DEFAULT 0 COMMENT '0 : baru, 1, process, 2: PMQA Cek; 3, waiting Approved',
  `kind_id` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `msproduck` */

insert  into `msproduck`(`id`,`tiket_id`,`memo_id`,`category`,`result`,`description`,`images`,`status`,`notif`,`kind_id`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(4,19,4,'Running','Assembling','Assembling Lem','inspek/images/4gAHn9Bjkze0315EpHmIZ9QABeOicY1ygjeOpzui.jpeg',1,2,'P',6,NULL,'2020-01-16 12:41:54','2020-01-16 12:41:54'),
(6,21,20,'Onitsuka Tiger','Sewing','Test Hasil Sewing','inspek/images/GcNjX88yqE6gotXqIoUSP9Z7asIQDVtSuUDQbvd9.jpeg',1,2,'P',6,NULL,'2020-01-26 01:49:13','2020-01-26 01:49:13'),
(7,20,19,'Walking Shoes','Stockfit','test triger','inspek/images/6uQW3nsxjeagpNLqJ5jflvAETJn3d1MdZ5n858va.jpeg',1,2,'P',6,NULL,'2020-02-06 23:32:59','2020-02-06 23:32:59');

/*Table structure for table `mstiket` */

DROP TABLE IF EXISTS `mstiket`;

CREATE TABLE `mstiket` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_complain` enum('PRODUCT','PRODUCTION') COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT 0 COMMENT '0 : baru, 1: Process; 2 :  Not Good; 3 : Persetujuan; 4 : Closed;',
  `notif` int(11) DEFAULT 0 COMMENT '0 : new;  1 : untuk memo; 2: untuk ke pmqa; 3 : kembali ke Direktur untuk persetujuan;',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `mstiket` */

insert  into `mstiket`(`id`,`category`,`kode`,`jenis_complain`,`images`,`description`,`status`,`notif`,`created_by`,`updated_by`,`deleted_by`,`deleted_at`,`created_at`,`updated_at`) values 
(16,'Haglofs','ASICS-HAGLOFT','PRODUCT','images/bm8ngZ887uQizKiqTpkNJVAiVZciu52NRL1qLX2A.jpeg','Kurang',4,4,2,4,NULL,NULL,'2019-08-27 05:51:46','2020-01-26 14:08:42'),
(18,'Running','RN-1212-AH','PRODUCT','images/pvClXvZoU536EUSwdXw0j544EQS9TCAUt4Epwkpi.jpeg','PRODUKSI KURANG RAPIH Ada Lem yang tidak di bersihkan',4,4,3,5,NULL,NULL,'2019-08-29 07:37:05','2020-02-06 23:03:44'),
(19,'Running','Ca','PRODUCTION','images/DhUFYw5fHjiomFBVM1PtrrqKywOssm6g4g6CqInr.png','DESK',4,4,2,4,NULL,NULL,'2019-11-14 06:16:03','2020-02-06 23:44:09'),
(20,'Walking Shoes','ART-1211231','PRODUCTION','images/oHwXiapbxnkcGPeRTaq4EMO4Oyfs7wvtc2L83m9v.jpeg','Lem Kotor Upper',1,2,2,2,NULL,NULL,'2020-01-07 14:18:37','2020-01-16 14:58:44'),
(21,'Onitsuka Tiger','TEST-123','PRODUCTION','images/tJrw4oAcUVQwoKUhMwMb56lvKLX1C5AoRnwNTzFN.jpeg','Test',1,2,2,2,NULL,NULL,'2020-01-26 01:47:30','2020-01-26 01:47:30'),
(22,'Running','TEST-123as','PRODUCT','images/KZAE3zkfG6VMa9OwqIzC1Ldclv6zM0axfyNyY2Tr.jpeg','test time',0,0,2,2,NULL,NULL,'2020-02-06 13:15:03','2020-02-06 13:15:03'),
(23,'Onitsuka Tiger','TEST-123assasa','PRODUCT','images/wU1oTzbdLhyRwSaxGUE1xyznOH2aPY0AKWrnTy7m.jpeg','sagd',0,0,2,2,NULL,NULL,'2020-02-06 13:20:17','2020-02-06 13:20:17'),
(24,'Asics Tiger','yays','PRODUCT','images/VjuGszPZ7WsX8FMAUEjn2vBl8CridK2SUQMJ3rRw.jpeg','teststsasaasd',0,0,2,2,NULL,NULL,'2020-02-06 21:01:14','2020-02-06 21:01:14');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `password_resets` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `roles` */

insert  into `roles`(`id`,`role`,`created_at`,`updated_at`) values 
(1,'Administrator','2019-08-22 08:05:12','2019-08-22 08:05:12'),
(2,'Direktur','2019-08-22 08:05:12','2019-08-22 08:05:12'),
(3,'Manager Produksi','2019-08-22 08:05:12','2019-08-22 08:05:12'),
(4,'Kepala Bagian','2019-08-22 08:05:12','2019-08-22 08:05:12'),
(5,'PMQA','2019-08-22 08:05:12','2019-08-22 08:05:12'),
(6,'Member','2019-08-22 08:05:12','2019-08-22 08:05:12');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) unsigned NOT NULL DEFAULT 6,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '/images/userpic.jpg',
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`) USING BTREE,
  UNIQUE KEY `users_username_unique` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`username`,`email_verified_at`,`password`,`role_id`,`avatar`,`status`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Administrator','admin@mail.com','admin@mail.com',NULL,'$2y$10$jl/kQqTR1OlhW83fWVGr2.9fzmjSd55MaBBtIgYLMMWRHG9wupUQa',1,'/images/userpic.jpg','ACTIVE','AqexRHCPZxaFWVaXNYv7YNO3sDe3wh5FQB7LaQz0TdOTCf1sEpmKx14KoGbn','2019-08-22 08:07:30','2019-08-22 08:07:30'),
(2,'Costumer','cs@mail.com','cs@mail.com',NULL,'$2y$10$yrpuZPjty29IabV8Yr1Pyu7Z8nR/4dpQeo5CL.TMecQw/7T7K.kfq',6,'/images/userpic.jpg','ACTIVE','PnOzit86Vef38YI1OLxk12eejELTtKlBj6NMsKN82Lj04xnkcpGYXi9EVLX3','2019-08-29 06:04:22','2019-08-29 06:04:22'),
(3,'cs2','cs2@mail.com','cs2@mail.com',NULL,'$2y$10$FiMQAsiXhOFBYsWmFRk.uOWVd03F8n1sL.v4F9xyUUTt/LKm.KRi2',6,'/images/userpic.jpg','ACTIVE','i3rnF7d6A1QAug01FDB3xRGB7yxthV9dPT7RcWKfKEUv5TfrWilxA3OMEn4n','2019-08-29 06:16:33','2019-08-29 06:16:33'),
(4,'Direktur','direktur@mail.com','direktur@mail.com',NULL,'$2y$10$rw3hqj2LVEs8RUvBzUNxEOslT2pnqTIc3pb7WsdqwflXSbnRKBILK',2,'/images/userpic.jpg','ACTIVE','TRJmuz5pKHqZq7uZ4LfP6Q4nLxY3A9nyUtYKHowMdSdyV8DgVF3nOLl9Ho3y','2019-10-16 02:47:22','2019-10-16 02:47:22'),
(5,'Manager Produksi','manager@mail.com','manager@mail.com',NULL,'$2y$10$rw3hqj2LVEs8RUvBzUNxEOslT2pnqTIc3pb7WsdqwflXSbnRKBILK',3,'/images/userpic.jpg','ACTIVE','aLKuR5uMvJaRWokwDXnFcqm7RnVZWiHPmcaGCPdvKQJ4rJwF8PqKJVCbZhAe','2019-10-16 02:47:22','2019-10-16 02:47:22'),
(6,'Kepala Bagian','bagian@mail.com','bagian@mail.com',NULL,'$2y$10$rw3hqj2LVEs8RUvBzUNxEOslT2pnqTIc3pb7WsdqwflXSbnRKBILK',4,'/images/userpic.jpg','ACTIVE','pRxwHuSUZVE0KN2OHwrJVrMQYyP0Sdzp2X5c5O9nqqCTo0TmbNEiRv8EhAcu','2019-10-16 02:47:22','2019-10-16 02:47:22'),
(7,'PMQA','pmqa@mail.com','pmqa@mail.com',NULL,'$2y$10$rw3hqj2LVEs8RUvBzUNxEOslT2pnqTIc3pb7WsdqwflXSbnRKBILK',5,'/images/userpic.jpg','ACTIVE','dcM8jc4AZc29xNYAQHDdBJDbks1q8I366JXJqFicEvZs6b6aF54jPkh0qcJ3','2019-10-16 02:47:22','2020-02-06 21:45:45'),
(8,'test','test@test.com','test@test.com',NULL,'$2y$10$VraxOPfWVg1441EI7EBpAuYl943aos6MrRQGCQUuqqE6ICBpQf1qW',6,'/images/userpic.jpg','ACTIVE','40817e9YsY64vDtTSMKoxkPhiGsBzDcGkpQMDRHJ4bhWBFNmjeTnO0Xi545q','2020-01-25 10:26:16','2020-01-25 10:26:16'),
(9,'Syarif Hidayatuloh','admin2@mail.com','admin2@mail.com',NULL,'$2y$10$8cPdoowusdb34J8zp3WECe7NAecjd6Kg8wrRqcXK9VZ6B7cz99dtO',1,'/avatar/SDzG3fNKPg9uMw8FtNEFCfIpAAOIGAJXZAVYjKPZ.jpeg','INACTIVE',NULL,'2020-01-28 14:45:02','2020-01-28 16:08:11');

/* Trigger structure for table `memo` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tr_tiket_memo` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tr_tiket_memo` AFTER INSERT ON `memo` FOR EACH ROW BEGIN
	UPDATE mstiket  SET status = 1 AND notif = 1 WHERE id = NEW.tiket_id;
END */$$


DELIMITER ;

/* Trigger structure for table `msinspek` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tr_ins_cekMemo` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tr_ins_cekMemo` AFTER INSERT ON `msinspek` FOR EACH ROW BEGIN
	IF NEW.result = 'OK' THEN
		UPDATE `memo` SET notif = 1, `status` = 1 WHERE `tiket_id` = NEW.tiket_id AND memo.`id` = new.memo_id;
		UPDATE mstiket SET notif = 3, `status` = 3 WHERE `id` = NEW.tiket_id;
	ELSE 
		UPDATE `memo` SET notif = 1, `status` = 2 WHERE `tiket_id` = NEW.tiket_id AND memo.`id` = new.memo_id;
		update mstiket set notif = 3, `status` = 3 where `id` = NEW.tiket_id;
	END IF;
    END */$$


DELIMITER ;

/* Trigger structure for table `msproduck` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tr_ins_produk` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tr_ins_produk` AFTER INSERT ON `msproduck` FOR EACH ROW BEGIN
	UPDATE memo SET notif = 1, `status` = 1 WHERE `tiket_id` = NEW.tiket_id AND memo.`id` = new.memo_id;
	UPDATE mstiket SET notif = 2, `status` = 1 WHERE `id` = NEW.tiket_id;
    END */$$


DELIMITER ;

/* Trigger structure for table `mstiket` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tr_upd_mstiket` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tr_upd_mstiket` AFTER UPDATE ON `mstiket` FOR EACH ROW BEGIN
	if(NEW.status = 4)then
		update memo set memo.status = 4  
			where memo.tiket_id = NEW.id
			AND memo.kode = NEW.kode;
	end if;
    END */$$


DELIMITER ;

/* Function  structure for function  `f_name` */

/*!50003 DROP FUNCTION IF EXISTS `f_name` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `f_name`(vid int) RETURNS varchar(50) CHARSET utf8mb4
BEGIN
    declare vname varchar(50);
    
	select `name` into vname from users
	where id = vid;
	return vname;
    END */$$
DELIMITER ;

/* Function  structure for function  `f_users` */

/*!50003 DROP FUNCTION IF EXISTS `f_users` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `f_users`(vid int, vkind int) RETURNS varchar(50) CHARSET utf8mb4
BEGIN
    declare vuser varchar(50);
	
	if vkind = 1 then -- name
	  select `name` into vuser from users
	    where id = vid;
	elseif vkind = 2 THEN -- avatar image
	  SELECT `avatar` INTO vuser FROM users
	    WHERE id = vid;
	ELSEIF vkind = 3 THEN -- email
	  SELECT `email` INTO vuser FROM users
	    WHERE id = vid;
	end if;
	
	return vuser;
    END */$$
DELIMITER ;

/*Table structure for table `vpercent` */

DROP TABLE IF EXISTS `vpercent`;

/*!50001 DROP VIEW IF EXISTS `vpercent` */;
/*!50001 DROP TABLE IF EXISTS `vpercent` */;

/*!50001 CREATE TABLE  `vpercent`(
 `persent` decimal(25,0) ,
 `count` bigint(21) 
)*/;

/*Table structure for table `vtimehistory` */

DROP TABLE IF EXISTS `vtimehistory`;

/*!50001 DROP VIEW IF EXISTS `vtimehistory` */;
/*!50001 DROP TABLE IF EXISTS `vtimehistory` */;

/*!50001 CREATE TABLE  `vtimehistory`(
 `id` int(10) unsigned ,
 `category` varchar(100) ,
 `kode` varchar(100) ,
 `jenis_complain` varchar(10) ,
 `images` varchar(200) ,
 `stat` varchar(200) ,
 `description` mediumtext ,
 `tanggal` timestamp ,
 `users` int(11) ,
 `urutan` int(1) 
)*/;

/*Table structure for table `vtimeline` */

DROP TABLE IF EXISTS `vtimeline`;

/*!50001 DROP VIEW IF EXISTS `vtimeline` */;
/*!50001 DROP TABLE IF EXISTS `vtimeline` */;

/*!50001 CREATE TABLE  `vtimeline`(
 `id` int(10) unsigned ,
 `category` varchar(100) ,
 `kode` varchar(100) ,
 `jenis_complain` varchar(10) ,
 `images` varchar(200) ,
 `stat` varchar(200) ,
 `description` mediumtext ,
 `tanggal` timestamp ,
 `users` int(11) 
)*/;

/*Table structure for table `v_check` */

DROP TABLE IF EXISTS `v_check`;

/*!50001 DROP VIEW IF EXISTS `v_check` */;
/*!50001 DROP TABLE IF EXISTS `v_check` */;

/*!50001 CREATE TABLE  `v_check`(
 `id` int(10) unsigned ,
 `tiket_id` int(10) unsigned ,
 `memo_id` int(10) unsigned ,
 `category` varchar(100) ,
 `result` varchar(200) ,
 `description` mediumtext ,
 `images` varchar(200) ,
 `status` int(11) ,
 `notif` int(11) 
)*/;

/*View structure for view vpercent */

/*!50001 DROP TABLE IF EXISTS `vpercent` */;
/*!50001 DROP VIEW IF EXISTS `vpercent` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpercent` AS (select round(avg(`a`.`persent`),0) AS `persent`,count(`a`.`persent`) AS `count` from (select count(`vtimeline`.`id`) * 0.2 * 100 AS `persent` from `db_complain`.`vtimeline` group by `vtimeline`.`id`) `a`) */;

/*View structure for view vtimehistory */

/*!50001 DROP TABLE IF EXISTS `vtimehistory` */;
/*!50001 DROP VIEW IF EXISTS `vtimehistory` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtimehistory` AS select `a`.`id` AS `id`,`a`.`category` AS `category`,`a`.`kode` AS `kode`,`a`.`jenis_complain` AS `jenis_complain`,NULL AS `images`,'Memo Tiket' AS `stat`,`b`.`pesan` AS `description`,`b`.`created_at` AS `tanggal`,`b`.`created_by` AS `users`,1 AS `urutan` from (`mstiket` `a` left join `memo` `b` on(`a`.`id` = `b`.`tiket_id`)) group by `a`.`id`,`a`.`category`,`a`.`kode` union all select `a`.`id` AS `id`,`a`.`category` AS `category`,`a`.`kode` AS `kode`,`a`.`jenis_complain` AS `jenis_complain`,`d`.`images` AS `images`,`d`.`result` AS `result`,`d`.`description` AS `description`,`d`.`created_at` AS `tanggal`,`d`.`created_by` AS `users`,2 AS `urutan` from ((`msproduck` `d` join `mstiket` `a` on(`a`.`id` = `d`.`tiket_id`)) left join `msinspek` `c` on(`d`.`tiket_id` = `c`.`tiket_id` and `d`.`kind_id` = `c`.`kind_id`)) union all select `a`.`id` AS `id`,`a`.`category` AS `category`,`a`.`kode` AS `kode`,`a`.`jenis_complain` AS `jenis_complain`,`d`.`images` AS `images`,`d`.`result` AS `result`,`d`.`description` AS `description`,`d`.`created_at` AS `tanggal`,`d`.`created_by` AS `users`,3 AS `urutan` from (`msinspek` `d` join `mstiket` `a` on(`a`.`id` = `d`.`tiket_id`)) where `d`.`kind_id` = 'Q' union all select `a`.`id` AS `id`,`a`.`category` AS `category`,`a`.`kode` AS `kode`,`a`.`jenis_complain` AS `jenis_complain`,`a`.`images` AS `images`,case when `a`.`status` = 4 then 'CLOSED' end AS `stat`,'Approved by' AS `description`,`a`.`created_at` AS `tanggal`,`a`.`updated_by` AS `users`,4 AS `urutan` from `mstiket` `a` where `a`.`status` = 4 */;

/*View structure for view vtimeline */

/*!50001 DROP TABLE IF EXISTS `vtimeline` */;
/*!50001 DROP VIEW IF EXISTS `vtimeline` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtimeline` AS select `a`.`id` AS `id`,`a`.`category` AS `category`,`a`.`kode` AS `kode`,`a`.`jenis_complain` AS `jenis_complain`,`a`.`images` AS `images`,'New Tiket' AS `stat`,`a`.`description` AS `description`,`a`.`created_at` AS `tanggal`,`a`.`created_by` AS `users` from `mstiket` `a` union all select `a`.`id` AS `id`,`a`.`category` AS `category`,`a`.`kode` AS `kode`,`a`.`jenis_complain` AS `jenis_complain`,NULL AS `images`,'Memo Tiket' AS `stat`,`b`.`pesan` AS `description`,`b`.`created_at` AS `tanggal`,`b`.`created_by` AS `users` from (`mstiket` `a` left join `memo` `b` on(`a`.`id` = `b`.`tiket_id`)) group by `a`.`id`,`a`.`category`,`a`.`kode` union all select `a`.`id` AS `id`,`a`.`category` AS `category`,`a`.`kode` AS `kode`,`a`.`jenis_complain` AS `jenis_complain`,`d`.`images` AS `images`,`d`.`result` AS `result`,`d`.`description` AS `description`,`d`.`created_at` AS `tanggal`,`d`.`created_by` AS `users` from ((`msproduck` `d` join `mstiket` `a` on(`a`.`id` = `d`.`tiket_id`)) left join `msinspek` `c` on(`d`.`tiket_id` = `c`.`tiket_id` and `d`.`kind_id` = `c`.`kind_id`)) union all select `a`.`id` AS `id`,`a`.`category` AS `category`,`a`.`kode` AS `kode`,`a`.`jenis_complain` AS `jenis_complain`,`d`.`images` AS `images`,`d`.`result` AS `result`,`d`.`description` AS `description`,`d`.`created_at` AS `tanggal`,`d`.`created_by` AS `users` from (`msinspek` `d` join `mstiket` `a` on(`a`.`id` = `d`.`tiket_id`)) where `d`.`kind_id` = 'Q' union all select `a`.`id` AS `id`,`a`.`category` AS `category`,`a`.`kode` AS `kode`,`a`.`jenis_complain` AS `jenis_complain`,`a`.`images` AS `images`,case when `a`.`status` = 4 then 'CLOSED' end AS `stat`,'Approved by' AS `description`,`a`.`created_at` AS `tanggal`,`a`.`updated_by` AS `users` from `mstiket` `a` where `a`.`status` = 4 */;

/*View structure for view v_check */

/*!50001 DROP TABLE IF EXISTS `v_check` */;
/*!50001 DROP VIEW IF EXISTS `v_check` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_check` AS select `a`.`id` AS `id`,`a`.`tiket_id` AS `tiket_id`,`a`.`memo_id` AS `memo_id`,`a`.`category` AS `category`,`a`.`result` AS `result`,`a`.`description` AS `description`,`a`.`images` AS `images`,`a`.`status` AS `status`,`a`.`notif` AS `notif` from `msinspek` `a` union all select `a`.`id` AS `id`,`a`.`tiket_id` AS `tiket_id`,`a`.`memo_id` AS `memo_id`,`a`.`category` AS `category`,`a`.`result` AS `result`,`a`.`description` AS `description`,`a`.`images` AS `images`,`a`.`status` AS `status`,`a`.`notif` AS `notif` from `msproduck` `a` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
