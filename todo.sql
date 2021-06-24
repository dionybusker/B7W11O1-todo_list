-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.17-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for b7w11o1-todo_list
CREATE DATABASE IF NOT EXISTS `b7w11o1-todo_list` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `b7w11o1-todo_list`;

-- Dumping structure for table b7w11o1-todo_list.lists
CREATE TABLE IF NOT EXISTS `lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table b7w11o1-todo_list.lists: ~7 rows (approximately)
/*!40000 ALTER TABLE `lists` DISABLE KEYS */;
INSERT INTO `lists` (`id`, `name`) VALUES
	(1, 'Boodschappen2'),
	(2, 'Huiswerk'),
	(3, 'Dieren'),
	(5, 'Vakantie'),
	(6, 'nieuwe lijst'),
	(7, 'Examens'),
	(22, 'nieuwe lijst');
/*!40000 ALTER TABLE `lists` ENABLE KEYS */;

-- Dumping structure for table b7w11o1-todo_list.statuses
CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table b7w11o1-todo_list.statuses: ~4 rows (approximately)
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` (`id`, `name`) VALUES
	(1, 'Niet gestart'),
	(2, 'Bezig'),
	(3, 'Voltooid'),
	(4, 'Uitgesteld');
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;

-- Dumping structure for table b7w11o1-todo_list.tasks
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `list_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL DEFAULT 0,
  `status_id` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `list_id` (`list_id`),
  KEY `status_id` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table b7w11o1-todo_list.tasks: ~12 rows (approximately)
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` (`id`, `list_id`, `name`, `description`, `duration`, `status_id`) VALUES
	(1, 1, 'tosti brood kopen', 'voor tosti', 5, 1),
	(2, 1, 'jonge kaas kopen', 'voor ham/kaas tosti', 10, 2),
	(3, 1, 'ham kopen', 'voor tosti', 5, 1),
	(4, 2, 'rekenen', 'rekenen oefenen', 60, 1),
	(5, 2, 'project', 'database in orde maken', 60, 2),
	(6, 3, 'voeren', 'dieren eten geven', 5, 3),
	(7, 3, 'borstelen', 'katten borstelen', 15, 1),
	(8, 5, 'Vakantie boeken', 'Ergens in het buitenland', 0, 1),
	(13, 3, 'taak 1', 'beschrijving van de taak', 10, 1),
	(16, 2, 'taak 1', 'beschrijving van de taak', 10, 1),
	(17, 6, 'taak 1', 'beschrijving van de taak', 10, 1),
	(35, 7, 'taak 1', 'beschrijving van de taak', 10, 1);
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
