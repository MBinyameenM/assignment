-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for assignment
CREATE DATABASE IF NOT EXISTS `assignment` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `assignment`;

-- Dumping structure for table assignment.profile
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` text,
  `bio` longtext,
  PRIMARY KEY (`id`),
  KEY `userfk` (`user_id`),
  CONSTRAINT `userfk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table assignment.profile: ~1 rows (approximately)
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` (`id`, `user_id`, `city`, `state`, `country`, `phone`, `address`, `bio`) VALUES
	(1, 2, 'Lahore', 'Punjab', 'Pakistan', '03046171063', 'House E601, street 1, Block , Nishat Colony,Lahore', '<p>I am a <strong>full stack</strong> developer.</p>');
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;

-- Dumping structure for table assignment.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table assignment.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
	(2, 'Muhammad Binyameen Malik', 'ymalik495@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-08-16 21:11:11', '2020-08-16 21:11:11');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table assignment.user_pictures
CREATE TABLE IF NOT EXISTS `user_pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `dp` varchar(50) NOT NULL DEFAULT '',
  `cover` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `user_fk` (`user_id`),
  CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table assignment.user_pictures: ~1 rows (approximately)
/*!40000 ALTER TABLE `user_pictures` DISABLE KEYS */;
INSERT INTO `user_pictures` (`id`, `user_id`, `dp`, `cover`) VALUES
	(1, 2, 'images/users/768 .jpg', 'images/users/2.png');
/*!40000 ALTER TABLE `user_pictures` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
