-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.40-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for ketikaku
CREATE DATABASE IF NOT EXISTS `ketikaku` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ketikaku`;

-- Dumping structure for table ketikaku.d_mem
CREATE TABLE IF NOT EXISTS `d_mem` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_token` varchar(300) NOT NULL DEFAULT '0',
  `m_code` varchar(50) DEFAULT NULL,
  `m_email` varchar(100) DEFAULT NULL,
  `m_username` varchar(20) DEFAULT NULL,
  `m_password` varchar(100) DEFAULT NULL,
  `m_name` varchar(100) DEFAULT NULL,
  `m_birth_tgl` date DEFAULT NULL,
  `m_address` text,
  `m_lastlogin` timestamp NULL DEFAULT NULL,
  `m_lastlogout` timestamp NULL DEFAULT NULL,
  `m_created_at` timestamp NULL DEFAULT NULL,
  `m_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `m_birtdate` varchar(50) DEFAULT NULL,
  `m_isactive` enum('Y','N') DEFAULT 'N',
  `m_role` int(11) DEFAULT NULL,
  `m_desc_short` text,
  `m_desc_full` longtext,
  `m_instagram` varchar(100) DEFAULT NULL,
  `m_twitter` varchar(100) DEFAULT NULL,
  `m_youtube` varchar(100) DEFAULT NULL,
  `m_facebook` varchar(100) DEFAULT NULL,
  `m_image` varchar(200) DEFAULT NULL,
  `m_follower` int(11) DEFAULT '0',
  `m_phone` varchar(50) DEFAULT NULL,
  `m_fullname` varchar(100) DEFAULT NULL,
  `m_gender` enum('W','L') DEFAULT NULL,
  PRIMARY KEY (`m_id`),
  UNIQUE KEY `m_username` (`m_username`),
  UNIQUE KEY `m_email` (`m_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='m_nik diisi nomor KTP';

-- Dumping data for table ketikaku.d_mem: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_mem` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_mem` ENABLE KEYS */;

-- Dumping structure for table ketikaku.d_mem_comment
CREATE TABLE IF NOT EXISTS `d_mem_comment` (
  `dmc_id` int(11) DEFAULT NULL,
  `dmc_message` longtext,
  `dmc_comment_by` int(11) DEFAULT NULL,
  `dmc_commended` int(11) DEFAULT NULL,
  `dmc_created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ketikaku.d_mem_comment: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_mem_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_mem_comment` ENABLE KEYS */;

-- Dumping structure for table ketikaku.d_mem_follow
CREATE TABLE IF NOT EXISTS `d_mem_follow` (
  `dmf_id` int(11) NOT NULL AUTO_INCREMENT,
  `dmf_follow_by` int(11) DEFAULT NULL,
  `dmf_followed` int(11) DEFAULT NULL,
  `dmf_read` varchar(50) DEFAULT 'N',
  `dmf_created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`dmf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ketikaku.d_mem_follow: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_mem_follow` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_mem_follow` ENABLE KEYS */;

-- Dumping structure for table ketikaku.d_novel
CREATE TABLE IF NOT EXISTS `d_novel` (
  `dn_id` int(11) NOT NULL AUTO_INCREMENT,
  `dn_title` text,
  `dn_description` longtext,
  `dn_cover` varchar(50) DEFAULT NULL,
  `dn_type_novel` int(11) DEFAULT '2',
  `dn_view` int(11) DEFAULT NULL,
  `dn_vote` int(11) DEFAULT NULL,
  `dn_rating` int(11) DEFAULT NULL,
  `dn_created_at` timestamp NULL DEFAULT NULL,
  `dn_created_by` int(11) DEFAULT NULL,
  `dn_updated_by` int(11) DEFAULT NULL,
  `dn_updated_at` timestamp NULL DEFAULT NULL,
  `dn_status` enum('publish','draft') DEFAULT NULL,
  `dn_approve_by` int(11) DEFAULT NULL,
  `dn_category` int(11) DEFAULT NULL,
  PRIMARY KEY (`dn_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='status_novel\r\n\r\n1:  publish\r\n2:  draft to admin\r\n3:  draft for writter\r\n\r\ntype_novel\r\n\r\n1: official story\r\n2: story';

-- Dumping data for table ketikaku.d_novel: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_novel` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_novel` ENABLE KEYS */;

-- Dumping structure for table ketikaku.d_novel_category
CREATE TABLE IF NOT EXISTS `d_novel_category` (
  `dnc_id` int(11) NOT NULL AUTO_INCREMENT,
  `dnc_category_id` int(11) DEFAULT NULL,
  `dnc_ref_id` int(11) DEFAULT NULL,
  `dnc_created_at` timestamp NULL DEFAULT NULL,
  `dnc_updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`dnc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ketikaku.d_novel_category: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_novel_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_novel_category` ENABLE KEYS */;

-- Dumping structure for table ketikaku.d_novel_chapter
CREATE TABLE IF NOT EXISTS `d_novel_chapter` (
  `dnch_id` int(11) NOT NULL AUTO_INCREMENT,
  `dnch_ref_id` int(11) DEFAULT NULL,
  `dnch_title` longtext,
  `dnch_content` longtext,
  `dnch_created_by` int(11) DEFAULT NULL,
  `dnch_created_at` timestamp NULL DEFAULT NULL,
  `dnch_updated_at` timestamp NULL DEFAULT NULL,
  `dnch_status` enum('publish','draft') DEFAULT NULL,
  `dnch_approved_by` int(11) DEFAULT NULL,
  `dnch_viewer` int(11) DEFAULT NULL,
  PRIMARY KEY (`dnch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='status_novel\r\n\r\n1:  publish\r\n2:  draft to admin\r\n3:  draft for writter\r\n';

-- Dumping data for table ketikaku.d_novel_chapter: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_novel_chapter` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_novel_chapter` ENABLE KEYS */;

-- Dumping structure for table ketikaku.d_novel_chapter_comment
CREATE TABLE IF NOT EXISTS `d_novel_chapter_comment` (
  `dncc_id` int(11) NOT NULL AUTO_INCREMENT,
  `dncc_ref_id` int(11) DEFAULT NULL,
  `dncc_ref_iddt` int(11) DEFAULT NULL,
  `dncc_message` longtext,
  `dncc_creator` int(11) DEFAULT NULL,
  `dncc_comment_by` int(11) DEFAULT NULL,
  `dncc_created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`dncc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ketikaku.d_novel_chapter_comment: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_novel_chapter_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_novel_chapter_comment` ENABLE KEYS */;

-- Dumping structure for table ketikaku.d_novel_chapter_comment_dt
CREATE TABLE IF NOT EXISTS `d_novel_chapter_comment_dt` (
  `dnccdt_id` int(11) NOT NULL AUTO_INCREMENT,
  `dnccdt_ref_iddt` int(11) NOT NULL DEFAULT '0',
  `dnccdt_ref_id` int(11) DEFAULT NULL,
  `dnccdt_comment_id` int(11) DEFAULT NULL,
  `dnccdt_reply_by` int(11) DEFAULT NULL,
  `dnccdt_message` longtext,
  `dnccdt_created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`dnccdt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ketikaku.d_novel_chapter_comment_dt: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_novel_chapter_comment_dt` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_novel_chapter_comment_dt` ENABLE KEYS */;

-- Dumping structure for table ketikaku.d_novel_like
CREATE TABLE IF NOT EXISTS `d_novel_like` (
  `dnl_id` int(11) NOT NULL AUTO_INCREMENT,
  `dnl_ref_id` int(11) DEFAULT NULL,
  `dnl_like_by` int(11) DEFAULT NULL,
  `dnl_creator` int(11) DEFAULT NULL,
  `dnl_created_at` timestamp NULL DEFAULT NULL,
  `dnl_read` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`dnl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ketikaku.d_novel_like: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_novel_like` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_novel_like` ENABLE KEYS */;

-- Dumping structure for table ketikaku.d_novel_notif
CREATE TABLE IF NOT EXISTS `d_novel_notif` (
  `dnn_id` int(11) NOT NULL AUTO_INCREMENT,
  `dnn_creator` int(11) DEFAULT NULL,
  `dnn_subscriber` int(11) DEFAULT NULL,
  `dnn_novel` int(11) DEFAULT NULL,
  `dnn_read` varchar(50) DEFAULT NULL,
  `dnn_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`dnn_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ketikaku.d_novel_notif: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_novel_notif` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_novel_notif` ENABLE KEYS */;

-- Dumping structure for table ketikaku.d_novel_notif_chapter
CREATE TABLE IF NOT EXISTS `d_novel_notif_chapter` (
  `dnnc_id` int(11) NOT NULL AUTO_INCREMENT,
  `dnnc_creator` int(11) DEFAULT NULL,
  `dnnc_subscriber` int(11) DEFAULT NULL,
  `dnnc_novel` int(11) DEFAULT NULL,
  `dnnc_read` varchar(50) DEFAULT NULL,
  `dnnc_chapter` int(11) DEFAULT NULL,
  `dnnc_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`dnnc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ketikaku.d_novel_notif_chapter: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_novel_notif_chapter` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_novel_notif_chapter` ENABLE KEYS */;

-- Dumping structure for table ketikaku.d_novel_rate
CREATE TABLE IF NOT EXISTS `d_novel_rate` (
  `dr_id` int(11) NOT NULL AUTO_INCREMENT,
  `dr_rate` int(11) NOT NULL DEFAULT '0',
  `dr_ref_id` int(11) DEFAULT NULL,
  `dr_rated_by` int(11) DEFAULT NULL,
  `dr_message` longtext,
  `dr_created_at` timestamp NULL DEFAULT NULL,
  `dr_updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`dr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ketikaku.d_novel_rate: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_novel_rate` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_novel_rate` ENABLE KEYS */;

-- Dumping structure for table ketikaku.d_novel_rate_dt
CREATE TABLE IF NOT EXISTS `d_novel_rate_dt` (
  `drdt_id` int(11) NOT NULL AUTO_INCREMENT,
  `drdt_reply_by` int(11) NOT NULL DEFAULT '0',
  `drdt_message` longtext,
  `drdt_ref_id` int(11) DEFAULT NULL,
  `drdt_ref_rate_id` int(11) DEFAULT NULL,
  `drdt_created_at` timestamp NULL DEFAULT NULL,
  `drdt_updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`drdt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ketikaku.d_novel_rate_dt: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_novel_rate_dt` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_novel_rate_dt` ENABLE KEYS */;

-- Dumping structure for table ketikaku.d_novel_review
CREATE TABLE IF NOT EXISTS `d_novel_review` (
  `dnr_id` int(11) NOT NULL AUTO_INCREMENT,
  `dnr_review` longtext,
  `dnr_rate` float DEFAULT NULL,
  `dnr_created_by` int(11) DEFAULT NULL,
  `dnr_created_at` int(11) DEFAULT NULL,
  `dnr_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`dnr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ketikaku.d_novel_review: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_novel_review` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_novel_review` ENABLE KEYS */;

-- Dumping structure for table ketikaku.d_novel_subscribe
CREATE TABLE IF NOT EXISTS `d_novel_subscribe` (
  `dns_id` int(11) NOT NULL AUTO_INCREMENT,
  `dns_ref_id` int(11) DEFAULT NULL,
  `dns_subscribe_by` int(11) DEFAULT NULL,
  `dns_created_at` timestamp NULL DEFAULT NULL,
  `dns_creator` int(11) DEFAULT NULL,
  `dns_read` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`dns_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ketikaku.d_novel_subscribe: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_novel_subscribe` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_novel_subscribe` ENABLE KEYS */;

-- Dumping structure for table ketikaku.d_novel_tags
CREATE TABLE IF NOT EXISTS `d_novel_tags` (
  `dnt_id` int(11) NOT NULL AUTO_INCREMENT,
  `dnt_name` text,
  `dnt_ref_id` int(11) DEFAULT NULL,
  `dnt_created_at` timestamp NULL DEFAULT NULL,
  `dnt_updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`dnt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ketikaku.d_novel_tags: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_novel_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_novel_tags` ENABLE KEYS */;

-- Dumping structure for table ketikaku.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ketikaku.migrations: ~0 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table ketikaku.m_category
CREATE TABLE IF NOT EXISTS `m_category` (
  `mc_id` int(11) NOT NULL AUTO_INCREMENT,
  `mc_name` varchar(50) DEFAULT NULL,
  `mc_created_at` timestamp NULL DEFAULT NULL,
  `mc_updated_at` timestamp NULL DEFAULT NULL,
  `mc_color` varchar(50) DEFAULT NULL,
  `mc_bgcolor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`mc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ketikaku.m_category: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_category` ENABLE KEYS */;

-- Dumping structure for table ketikaku.m_role
CREATE TABLE IF NOT EXISTS `m_role` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_name` varchar(50) DEFAULT NULL,
  `r_created_at` timestamp NULL DEFAULT NULL,
  `r_updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ketikaku.m_role: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_role` ENABLE KEYS */;

-- Dumping structure for table ketikaku.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ketikaku.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
