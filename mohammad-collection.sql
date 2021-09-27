# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.35)
# Database: mohammad-collection
# Generation Time: 2021-09-27 12:53:48 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table collection-items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `collection-items`;

CREATE TABLE `collection-items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `artist` varchar(255) NOT NULL DEFAULT '',
  `year-made` int(4) NOT NULL,
  `painting-name` varchar(255) NOT NULL DEFAULT '',
  `image-link` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `collection-items` WRITE;
/*!40000 ALTER TABLE `collection-items` DISABLE KEYS */;

INSERT INTO `collection-items` (`id`, `artist`, `year-made`, `painting-name`, `image-link`)
VALUES
	(1,'Osaias Beer the Elder',1615,'Flowers in a porcelain Wan-Li Vase','./images/flowers.jpeg'),
	(2,'Canaletto',1740,'Venice: The Grand Canal','./images/canal.jpeg'),
	(3,'Alexandre-Hyacinthe Dunouy',1800,'Panoramic View of the Bay of Naples','./images/naples.jpeg'),
	(4,'John Constable',1821,'The Hay Wain','./images/haywain.jpeg'),
	(5,'Jackson Pollock',1935,'Going West','./images/goingwest.jpeg'),
	(6,'James Thornhill',1726,'Painted Hall','./images/paintedhall.jpeg');

/*!40000 ALTER TABLE `collection-items` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
