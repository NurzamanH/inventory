# ************************************************************
# Sequel Ace SQL dump
# Version 20046
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 8.0.31)
# Database: nuansa-wangi
# Generation Time: 2023-05-26 23:52:30 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table attendance
# ------------------------------------------------------------

DROP TABLE IF EXISTS `attendance`;

CREATE TABLE `attendance` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `noted` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_late` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_overtime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `attendance` WRITE;
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;

INSERT INTO `attendance` (`id`, `name`, `status`, `date`, `noted`, `created_at`, `updated_at`, `is_late`, `is_overtime`)
VALUES
	(4,'Awal','Hadir','2023-05-12 06:53:00','Terlambat 10 Menit','2023-05-11 23:53:40','2023-05-11 23:53:40','Ya','Tidak'),
	(5,'Risma','Hadir','2023-05-12 07:35:00','Terlambat 15 Menit','2023-05-12 00:36:06','2023-05-12 00:36:06','Ya','Tidak'),
	(9,'Test Name','Hadir','0000-00-00 00:00:00','Tidak ada','2023-05-26 23:07:17','2023-05-26 23:07:17','Tidak','Tidak'),
	(10,'Test Name 1','Izin','0000-00-00 00:00:00','Terlambat','2023-05-26 23:07:17','2023-05-26 23:07:17','Ya','Tidak'),
	(11,'Test Name 2','Alpa','0000-00-00 00:00:00','Terlambat','2023-05-26 23:07:17','2023-05-26 23:07:17','Ya','Ya');

/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table customer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;

INSERT INTO `customer` (`id`, `name`, `phone`, `address`, `enabled`, `created_at`, `updated_at`)
VALUES
	(1,'Awaludhi Ardian Ramadhan','082128454137','Jln Pagarsih Gg Onong','1','2023-05-07 16:52:50','2023-05-07 16:52:50'),
	(2,'Dendi','087266125253535','Jln Jalan','1','2023-05-10 14:48:24','2023-05-10 14:48:24'),
	(3,'Alex','087633551344','Jln Jalan','1','2023-05-10 14:48:58','2023-05-10 22:21:11'),
	(4,'Syaiful','087621524154','Jln Jalan saja','1','2023-05-10 22:20:24','2023-05-10 22:20:24'),
	(5,'Subhan','087624413331','Jln Jalan','1','2023-05-10 22:21:01','2023-05-10 22:21:01'),
	(6,'Teh Risma','08621645314543','Jln Aja','1','2023-05-12 00:32:52','2023-05-12 00:32:52');

/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table menus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;

INSERT INTO `menus` (`id`, `name`, `route`, `enabled`, `created_at`, `updated_at`)
VALUES
	(1,'Product','product','1',NULL,NULL),
	(2,'Absensi','attendance','1',NULL,NULL),
	(3,'Pelanggan','customer','1',NULL,NULL),
	(4,'Transaksi','transaction','1',NULL,NULL),
	(5,'Account Management','user','1',NULL,NULL),
	(6,'Laporan','report','1',NULL,NULL);

/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table menus_has_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menus_has_user`;

CREATE TABLE `menus_has_user` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `menus_has_user` WRITE;
/*!40000 ALTER TABLE `menus_has_user` DISABLE KEYS */;

INSERT INTO `menus_has_user` (`id`, `user_id`, `menu_id`, `created_at`, `updated_at`)
VALUES
	(10,'2','1','2023-05-18 00:14:30','2023-05-18 00:14:30'),
	(11,'2','4','2023-05-18 00:14:30','2023-05-18 00:14:30'),
	(32,'1','1','2023-05-26 23:08:33','2023-05-26 23:08:33'),
	(33,'1','2','2023-05-26 23:08:33','2023-05-26 23:08:33'),
	(34,'1','3','2023-05-26 23:08:33','2023-05-26 23:08:33'),
	(35,'1','4','2023-05-26 23:08:33','2023-05-26 23:08:33'),
	(36,'1','5','2023-05-26 23:08:33','2023-05-26 23:08:33'),
	(37,'1','6','2023-05-26 23:08:33','2023-05-26 23:08:33'),
	(38,'5','1','2023-05-26 23:18:12','2023-05-26 23:18:12'),
	(39,'5','2','2023-05-26 23:18:12','2023-05-26 23:18:12');

/*!40000 ALTER TABLE `menus_has_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2019_08_19_000000_create_failed_jobs_table',1),
	(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
	(5,'2023_04_16_223826_create_product',2);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table personal_access_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;

INSERT INTO `product` (`id`, `name`, `description`, `price`, `enabled`, `created_at`, `updated_at`)
VALUES
	(1,'Perfume Eros','Perfume Eros Ukuran 15Liter','450000','0','2023-05-01 14:59:36','2023-05-17 23:35:54'),
	(2,'Perfume Melati','Perfume Melati Ukuran 1,5 Liter','120000','1','2023-05-01 15:01:16','2023-05-01 15:01:16'),
	(3,'Parfume Jayrose','Test edit','15000','0','2023-05-10 15:05:30','2023-05-12 00:31:36'),
	(4,'Parfume Melati','Parfume Uk 1,5 L','50000','1','2023-05-12 00:31:08','2023-05-12 00:31:08');

/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table transaction
# ------------------------------------------------------------

DROP TABLE IF EXISTS `transaction`;

CREATE TABLE `transaction` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `member_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;

INSERT INTO `transaction` (`id`, `member_id`, `name`, `phone`, `address`, `transaction_date`, `total`, `enabled`, `created_at`, `updated_at`)
VALUES
	(6,NULL,'Awal','0872612724','Jln Jalan','2023-05-10 14:52:53',NULL,'1','2023-05-10 14:52:53','2023-05-10 14:52:53'),
	(7,NULL,'Dendi','08762353551','Jln Jlana','2023-05-10 14:53:13',NULL,'0','2023-05-10 14:53:13','2023-05-11 23:28:52'),
	(8,NULL,'Teh Risma','08621645314543','Jln Aja','2023-05-12 00:32:52',NULL,'1','2023-05-12 00:32:52','2023-05-12 00:33:34');

/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table transaction_detail
# ------------------------------------------------------------

DROP TABLE IF EXISTS `transaction_detail`;

CREATE TABLE `transaction_detail` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `transaction_detail` WRITE;
/*!40000 ALTER TABLE `transaction_detail` DISABLE KEYS */;

INSERT INTO `transaction_detail` (`id`, `transaction_id`, `product_id`, `qty`, `amount`, `enabled`, `created_at`, `updated_at`)
VALUES
	(9,'6','1','1','450000','1','2023-05-10 14:52:53','2023-05-10 14:52:53'),
	(10,'6','2','2','240000','1','2023-05-10 14:52:53','2023-05-10 14:52:53'),
	(11,'7','1','2','900000','1','2023-05-10 14:53:13','2023-05-10 14:53:13'),
	(12,'7','2','1','120000','1','2023-05-10 14:53:13','2023-05-10 14:53:13'),
	(13,'8','4','3','150000','1','2023-05-12 00:32:52','2023-05-12 00:32:52'),
	(14,'8','1','1','450000','1','2023-05-12 00:32:52','2023-05-12 00:32:52');

/*!40000 ALTER TABLE `transaction_detail` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `enabled` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`, `enabled`)
VALUES
	(1,'Superadmin User','superadmin@gmail.com',NULL,'$2y$10$xJvz8VGYyBqgOMhlX5eHduAc1Lb2R05/lYtYimry/ZCmwwy0ymmCO','superadmin',NULL,'2023-04-16 14:40:38','2023-05-26 23:08:33','1'),
	(2,'Admin User','admin@gmail.com',NULL,'$2y$10$fkSP4xROf.REK8qAt7tGLOpDW6rjF4M.R/W.Pup3ebLMJayY.ST8G','admin',NULL,'2023-04-16 14:40:38','2023-05-18 00:25:30','1'),
	(3,'Customer Service','cs@gmail.com',NULL,'$2y$10$p2hhUrdJGI3ZcxagJPYlyOlv6q1yReHYrcMfiHe0bQwVgsuPoOKWG','cs',NULL,'2023-04-16 14:40:38','2023-04-16 14:40:38','1'),
	(5,'Risma','risma@gmail.com',NULL,'$2y$10$w3nk7seZ4eMWOFU17aAnAOHF6rELrgdzQ8UvaYcWbA9oGloWvaz/y','admin',NULL,'2023-05-26 23:17:33','2023-05-26 23:18:12','1');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
