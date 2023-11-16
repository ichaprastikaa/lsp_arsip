/*
SQLyog Professional
MySQL - 10.4.25-MariaDB-log : Database - lsp_arsip
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lsp_arsip` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `lsp_arsip`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2023_11_12_063809_buat_tabel_arsip',1),
(6,'2023_11_12_063815_buat_tabel_kategori',1);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `tb_arsip` */

DROP TABLE IF EXISTS `tb_arsip`;

CREATE TABLE `tb_arsip` (
  `kdSurat` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomorSurat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judulSurat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategoriSurat` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fileSurat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktuPengarsipan` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kdSurat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_arsip` */

insert  into `tb_arsip`(`kdSurat`,`nomorSurat`,`judulSurat`,`kategoriSurat`,`fileSurat`,`waktuPengarsipan`,`created_at`,`updated_at`) values 
('S001','2023/PD3/TU/002','INI BANTUAN SUBSIDI','K001','KOP.pdf','2023-11-15 01:44:40','2023-11-15 01:44:40','2023-11-15 02:18:35');

/*Table structure for table `tb_kategori` */

DROP TABLE IF EXISTS `tb_kategori`;

CREATE TABLE `tb_kategori` (
  `kdKategori` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaKategori` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kdKategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_kategori` */

insert  into `tb_kategori`(`kdKategori`,`namaKategori`,`keterangan`,`created_at`,`updated_at`,`deleted_at`) values 
('K001','Pengumuman','icha cantiiiiiiiiiiiiiiiiiiiiiiiiik','2023-11-12 08:59:24','2023-11-12 11:23:10',NULL),
('K002','BOP','BOP jare','2023-11-12 14:34:26','2023-11-12 15:41:51','2023-11-12 15:41:51'),
('K003','BOP','Biaya Operasional Kerja','2023-11-12 14:48:22','2023-11-12 15:41:15','2023-11-12 15:41:15'),
('K004','Undangan','Ini Undangan','2023-11-13 00:46:04','2023-11-13 00:49:29','2023-11-13 00:49:29'),
('K005','Undangan','INI','2023-11-13 00:51:06','2023-11-13 05:38:59','2023-11-13 05:38:59'),
('K006','PengumumanBaru','JBsaijsaas','2023-11-13 00:53:03','2023-11-13 00:53:11','2023-11-13 00:53:11'),
('K007','Undangan','Surat yang digunakan untuk pemberitahuan','2023-11-13 11:49:25','2023-11-15 01:56:36',NULL),
('K008','Biaya Operasional','Biaya Operasional merupakan dana yang dikeluarkan untuk operasional kerja.','2023-11-15 01:55:27','2023-11-15 01:55:27',NULL),
('K009','Biaya','Biaya biaya','2023-11-15 02:13:20','2023-11-15 02:13:20',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Admin Kelurahan','kelurahan@gmail.com',NULL,'kelurahan123',NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
